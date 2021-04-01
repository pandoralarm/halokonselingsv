<?php namespace App\Modules\Konseling\Controllers;

use App\Modules\Konseling\Models\ChatModel;
use App\Modules\Konseling\Models\DosenModel;
use App\Modules\Konseling\Models\LaporanModel;
use App\Modules\Konseling\Models\MessagesModel;
use App\Modules\Konseling\Models\RequestModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Message;
use JsonException;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Chatroom extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->chats = new ChatModel();
      $this->dosen = new DosenModel();
      $this->laporan = new LaporanModel();
      $this->requests = new RequestModel();
      $this->messagehandler = new MessagesModel();
      $this->request = \Config\Services::request();
      $this->session = \Config\Services::session();
    }

    public function index()
    {
      $data = [
          'title' => 'Dashboard Page',
              'view' => 'konseling/dashboard',
              'data' => $this->userModel->getUsers(),
          ];

      return view('template/layout', $data);
    }

    public function getall($title)
    {
        return $title;
    }

    public function hello()
    {
      echo $this->session->get('nip');
    }

    public function getThreadKey(string $identifier = 'current')
    {
      $user = '';
      if ($identifier == 'current'){
        if ($this->session->get('role') == 'MAHASISWA'){
          $user = $this->session->get('nim');
          $whereclause = "ThreadStatus = 'OPEN' AND MahasiswaNIM ='".$user."'";
        } else {
          $user = $this->session->get('nip');
          $whereclause = "ThreadStatus = 'OPEN' AND KonselorNIP ='".$user."'";
        }
      } else {
        $user = $identifier;
      }
    
      $result = $this->chats->where($whereclause)
                  ->first();

      if ($result != null){
        $response = [
          'ThreadKey' => $result->ThreadKey, 
        ];
      } else {
        $response = [
          'ThreadKey' => 'default', 
        ];
      }

      return json_encode($response);
    }

    public function getMessages(string $key)
    {

      $messages = $this->messagehandler
                ->where('ThreadKey', $key)
                ->findAll();

      $response = [];

      foreach ($messages as $message){

        $request = $this->requests->where('ThreadKey', $key)
        ->findAll();
        
        if ($request[0]->MahasiswaNIM == $message->SenderID) {
          $nama = $request[0]->MahasiswaNama;
        } else {
          $chat = $this->chats->where('ThreadKey', $key)->where('KonselorNIP', $message->SenderID)->findAll();
          $dos = $this->dosen->where('NIP', $chat[0]->KonselorNIP)->findAll();
          $nama = $dos[0]->Nama;

          if (count($chat) == 0){
            $nama = 'ADMIN';
          }
        }
        $Time = date("H:i", strtotime( $message->Timestamp)); 

        $response[] = [
          'id' => $message->MessageID,
          'sender' => $message->SenderID,
          'name' => $nama,
          'messagetype' => $message->MessageType,
          'message' => $message->Message,
          'timestamp' => $Time,
        ];
      }
      return json_encode($response);
    }

    public function makeRequest()
    {
      $Request = json_decode(file_get_contents("php://input"),true);
      $data = [
        'RequestID' => '',
        'MahasiswaNIM' => $this->session->get('nim'),
        'MahasiswaNama' => $this->session->get('nama'),
        'RequestDetail' => $Request['message'],
        'ThreadKey' => '',
        'Timestamp' => date('Y-m-d H:i:s'),
      ];
      
      return $this->requests->insert($data);
    }

    public function isRequest()
    {
      /* 
        RETURNS TO hasRequest TO DETERMINE IF USER HAS AN ACTIVE SESSION
        DOSEN WILL ALWAYS RETURN NULL
      */
      if ($this->session->get('role' == 'MAHASISWA')){
        $whereclause = ['MahasiswaNIM' => $this->session->get('nim'), 'THreadKey' => ''];
      } elseif ($this->session->get('role') == 'ADMIN' || 'KONSELOR'){
        $whereclause = ['KonselorNIP' => $this->session->get('nip'), 'THreadKey' => ''];
      } 

      $reqs = $this->requests->where($whereclause)->first();

      return json_encode($reqs);

    }

    public function getOpenRequest()
    {
      return json_encode($this->requests->where('ThreadKey', '')->findAll());
    }

    public function getOpenThread()
    {
      $livechats = $this->chats->where("ThreadStatus = 'OPEN' GROUP BY ThreadKey")->findALl();
      $activerooms = $livechats;

      $index = 0;
      foreach ($livechats as $chat) {
        $konseli = $this->requests->where('ThreadKey', $chat->ThreadKey)->first();
        $activerooms[$index]->MahasiswaNama = $konseli->MahasiswaNama;
        $index++;
      };
      return json_encode($activerooms);
    }

    private function closeRequest($reqID, $key)
    {

      $data = [
        'ThreadKey' => $key,
      ];
      $this->requests->update($reqID, $data);

      $response = [
        'status' => 'Berhasil !',
        'message' => 'Sesi telah dibuat.'
      ];

      return json_encode($response);
    }

    public function findKonselor($query)
    {
      $nama = $query;
      $db      = \Config\Database::connect();
      $dosenquery = "SELECT d.NIP, d.Nama 
                    FROM dosen d JOIN role r on r.NIP = d.NIP 
                    WHERE d.Nama NOT IN 
                    (SELECT d2.nama FROM dosen d2 JOIN chats c ON c.KonselorNIP = d2.NIP WHERE c.ThreadStatus = 'OPEN') 
                    AND d.Nama LIKE ? AND r.Role != 'dosen'"; 

      // default selected table
      $response = $db->query($dosenquery, array('%'.$nama.'%'));

      $response = $response->getResult();
      return json_encode($response);
    }

    public function confirmSession()
    {
      $ReceivedData = json_decode(file_get_contents('php://input'), true);
      $requestid = $ReceivedData['datarequest'];
      $mahasiswa = $ReceivedData['datamahasiswa'];
      $konselors = $ReceivedData['datakonselor']['arrayKonselor'];
      $sessionUniqueKey = md5($mahasiswa['nim'].date('Y-m-d H:i:s'));

      for ($i = 0; $i <= count($konselors); $i++) {
        $data = [
          'ThreadID' => '',
          'ThreadKey' => $sessionUniqueKey,
          'MahasiswaNIM' => $mahasiswa['nim'],
          'KonselorNIP' => $konselors[$i]['nip'],
          'ThreadStatus' => 'OPEN',
          'Started_at' => date('Y-m-d H:i:s'),
          'Closed_at' => NULL,
        ];
        $this->chats->insert($data);
      };

      return $this->closeRequest($requestid, $sessionUniqueKey);
    }
    
    public function addToSession()
    {
      $ReceivedData = json_decode(file_get_contents('php://input'), true);
      $sessionUniqueKey = $ReceivedData['datakey'];
      $request = $this->requests->where('ThreadKey', $sessionUniqueKey)->first();
      $mahasiswa = $request->MahasiswaNIM; 
      $konselors = $ReceivedData['datakonselor']['arrayKonselor'];

      for ($i = 0; $i <= count($konselors); $i++) {
        $data = [
          'ThreadID' => '',
          'ThreadKey' => $sessionUniqueKey,
          'MahasiswaNIM' => $mahasiswa,
          'KonselorNIP' => $konselors[$i]['nip'],
          'ThreadStatus' => 'OPEN',
          'Started_at' => date('Y-m-d H:i:s'),
          'Closed_at' => NULL,
        ];
        $this->chats->insert($data);
      };

      $response = [
        'status' => 'Berhasil !',
        'message' => 'Konselor berhasil ditambah kedalam sesi.'
      ];

      return json_encode($response);
    }

    public function sendMessage()
    {
      $ReceivedData = json_decode(file_get_contents('php://input'), true);
      if ($this->session->get('role') == 'MAHASISWA'){
        $Sender = $this->session->get('nim');
      } else {
        $Sender = $this->session->get('nip');
      }

      $MessageType = $ReceivedData['messagetype'];
      $Message = $ReceivedData['message'];
      $sessionUniqueKey = $ReceivedData['key'];

      $data = [
        'MessageID' => '',
        'SenderID' => $Sender,
        'MessageType' => $MessageType,
        'Message' => $Message,
        'ThreadKey' => $sessionUniqueKey,
        'Timestamp' => date('Y-m-d H:i:s'),
      ];

      $this->messagehandler->insert($data);

      return json_encode($data);
    }

    public function sessionInfo($key)
    {
      
      $request = $this->requests->where('ThreadKey', $key)->first();
      $mhsnim = $request->MahasiswaNIM;
      $mhsnama = $request->MahasiswaNama;
      $mhsreq = $request->RequestDetail;

      $chats = $this->chats->where('ThreadKey', $key)->findAll();
      $i = 0;
      foreach ($chats as $chat) {
        $currentkonselor = $this->dosen->where('NIP',$chat->KonselorNIP)->first();
        $listnama[$i] = $currentkonselor->Nama;
        $i++;
      };

      $response = [
        'mhsnim' => $request->MahasiswaNIM,
        'mhsnama' => $request->MahasiswaNama,
        'mhsreq' => $request->RequestDetail,
        'daftarkonselor' => $listnama,
      ];

      return json_encode($response);

    }

    public function closeSession(){
      $ReceivedData = json_decode(file_get_contents('php://input'), true);
      $sessionUniqueKey = $ReceivedData['datakey'];
      $masalah = $ReceivedData['datamasalah']['arrayMasalah'];
      $totalmasalah = '';

      for ($i = 0; $i <= count($masalah); $i++) {
        $totalmasalah .= $masalah[$i]['kategori'].';';
      };

      $data = [
        'LaporanID' => '',
        'ThreadKey' => $sessionUniqueKey,
        'Masalah' => $totalmasalah,
      ];


      $this->laporan->insert($data);
      $this->chats->where('ThreadKey', $sessionUniqueKey)->set(['ThreadStatus' => 'CLOSED', 'Closed_at' => date('Y-m-d H:i:s')])->update();
    
      $response = [
        'status' => 'Berhasil!',
        'message' => 'Sesi berhasil ditutup dan laporan telah disimpan',
      ];

      return json_encode($response);
    
    }

    public function mediaupload(){
      $file = $this->request->getFile('attachment');
      $ext = array_pop(explode('.', $file->getClientName()));
      $newName = $this->session->get('user').'_'.date("YmdHis").'.'.$ext;
      $sessionUniqueKey = $this->request->getPost('key');
      

      $file->move('./uploads/'.$sessionUniqueKey.'/', $newName);
      $filePath = './uploads/'.$sessionUniqueKey.'/'.$newName;

      $data = [
          'attachmentpath' => $newName,
      ];
      return json_encode($data);
    }





}
