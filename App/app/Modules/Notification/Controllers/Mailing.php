<?php namespace App\Modules\Notification\Controllers;

use App\Modules\Konseling\Models\ChatModel;
use App\Modules\Konseling\Models\DosenModel;
use App\Modules\Konseling\Models\LaporanModel;
use App\Modules\Konseling\Models\MessagesModel;
use App\Modules\Konseling\Models\RequestModel;
use CodeIgniter\Controller;

class Mailing extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->email = \Config\Services::email();
      $this->chats = new ChatModel();
      $this->dosen = new DosenModel();
      $this->laporan = new LaporanModel();
      $this->requests = new RequestModel();
      $this->messagehandler = new MessagesModel();
    }

    public function index()
    {
     
    }

    private function compose($type, $key) {
      
      $request = $this->requests->where('ThreadKey', $key)->first();
      $laporan = $this->laporan->where('ThreadKey', $key)->first();
      $masalah = explode(';', $laporan->Masalah);
      $listprob = '';
      array_pop($masalah);
      foreach ($masalah as $prob){
        $listprob .= $prob.' <br /> ';
      }
      $chats = $this->chats->where('ThreadKey', $key)->findAll();
      $listnama = '';
      $i = 0;
      foreach ($chats as $chat) {
        $currentkonselor = $this->dosen->where('NIP',$chat->KonselorNIP)->first();
        $listnama .= $currentkonselor->Nama.' <br /> ';
        $i++;
      };

      $konselingdata = [
        'sessionkey' => $request->ThreadKey,
        'waktu_diajukan' => $request->Timestamp,
        'waktu_dibuka' => $chats[0]->Started_at,
        'waktu_ditutup' => $chats[0]->Closed_at,
        'nimkonseli' => $request->MahasiswaNIM,
        'namakonseli' => $request->MahasiswaNama,
        'namakonselor' => $listnama,
        'kategori' => $listprob,
        'ceritakonseli' => $request->RequestDetail,
        'external' => 'ext/chat/'.$request->ThreadKey,
      ];

      switch ($type) {

        case 'newsession':
          //EMAIL DIBUKA SESI BARU

          $this->email->setSubject('SESI KONSELING BARU');
          //OUTPUT BUFFER
          //--PREVENTS HTML TO BE PRINTED AND PUTS IT TO A VARIABLE
          //--USED TO INPUT PHP VARS INTO THE MESSAGE TEMPLATE
          
          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/open.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break;


        case 'newrequest':
          //EMAIL DIBUKA SESI BARU

          $this->email->setSubject('PENGAJUAN SESI KONSELING');
          //OUTPUT BUFFER
          //--PREVENTS HTML TO BE PRINTED AND PUTS IT TO A VARIABLE
          //--USED TO INPUT PHP VARS INTO THE MESSAGE TEMPLATE
          
          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/request.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break;


        case 'closedsession':
          //SURAT SESI DITUTUP
          
          $this->email->setSubject('SESI SELESAI');

          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/closed.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break;


        case 'addkonselor':
          //EMAIL PERMINTAAN TAMBAH KONSELOR

          $this->email->setSubject('PERMINTAAN TAMBAHKAN KONSELOR');
          //OUTPUT BUFFER
          //--PREVENTS HTML TO BE PRINTED AND PUTS IT TO A VARIABLE
          //--USED TO INPUT PHP VARS INTO THE MESSAGE TEMPLATE
          
          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/addkonselor.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break;

        /* case 'newmessage':
          //EMAIL NOTIFIKASI ADA PESAN BARU

          $this->email->setSubject('PESAN BARU');
          //OUTPUT BUFFER
          //--PREVENTS HTML TO BE PRINTED AND PUTS IT TO A VARIABLE
          //--USED TO INPUT PHP VARS INTO THE MESSAGE TEMPLATE
          
          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/newmessage.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break; */
          
        case 'survey':
          //EMAIL PERMINTAAN MENGISI SURVEY KEPUASAN

          $this->email->setSubject('SURVEY KEPUASAN KONSELING');
          //OUTPUT BUFFER
          //--PREVENTS HTML TO BE PRINTED AND PUTS IT TO A VARIABLE
          //--USED TO INPUT PHP VARS INTO THE MESSAGE TEMPLATE
          
          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/survey.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break;

        /* case 'report':
          //EMAIL PERMINTAAN MENGISI SURVEY KEPUASAN

          $this->email->setSubject('LAPORAN HALOKONSELING');
          //OUTPUT BUFFER
          //--PREVENTS HTML TO BE PRINTED AND PUTS IT TO A VARIABLE
          //--USED TO INPUT PHP VARS INTO THE MESSAGE TEMPLATE
          
          ob_start();
          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/mail/request.php";
          include $path;
          $message = ob_get_contents();
          ob_end_clean();
          break; */

        default:
          //code to be executed if n is different from all labels;
          break;
      }
        

      return $message;

    }

    public function send($type, $key) { 

        //KEY DECIDES ROOM KEY AND TARGET ROOM DATA TO BE RETRIEVED
        //ACTION SWITCHES DATA AND OUTPUT BUFFER USED TO DEFINE WHAT TEMPLATE TO USE

        //CALL PRIVATE FUNCTION COMPOSE MESSAGE
        //Type variable decides message type going to be composed
        $this->email->setTo('alan_ipb@apps.ipb.ac.id');
        $this->email->setMessage($this->compose($type, $key));
        $this->compose($type, $key);
        
        $this->email->setFrom('konselingsv@apps.ipb.ac.id', 'HaloKonselingSV [NO-REPLY]');

        if ($this->email->send()) 
		{
            echo 'Email successfully sent to '.'alan_ipb@apps.ipb.ac.id';
        } 
		else 
		{
            $data = $this->email->printDebugger(['headers']);
            print_r($data);
        }
    }

}
