<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Konseling\Models\RequestModel;
use App\Modules\Konseling\Models\ChatModel;
use App\Modules\Konseling\Models\LaporanModel;
use CodeIgniter\Controller;
use App\Modules\Application\Models\DosenModel;
use App\Modules\Admin\Models\ArticleModel;
use App\Modules\Admin\Models\ArticleViewModel;

class Contents extends Controller
{
     /**
     * Constructor.
     */
    public function __construct()
    {      

      $this->DosenModel = new DosenModel();
      $this->ArticleModel = new ArticleModel();
      $this->ArticleViewModel = new ArticleViewModel();
      $this->ChatModel = new ChatModel();
      $this->LaporanModel = new LaporanModel();
      $this->requests = new RequestModel();
      $this->session = \Config\Services::session();
      $this->db      = \Config\Database::connect();
      $this->ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    }

    public function index()
    {
      return 0;
     
    }

    public function publishedits()
    {
      $contentid = $this->session->get('articleid');
      $contenttitle = $this->request->getPost('title');
      $contentheadertype = $this->request->getPost('headertype');
      $contentarea = $this->request->getPost('contentarea');

      if ($contentheadertype == 'upload'){
        $contentupload = $this->request->getFile('attachment');
        $contentheader = $this->headerprocess($contentupload);
      } elseif ($contentheadertype == 'yturl'){
        $url = $this->request->getPost('attachment');
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $youtube_id = $match[1];

        $contentheader = "https://img.youtube.com/vi/".$youtube_id."/hqdefault.jpg";
      } else {
        $contentheader = $this->request->getPost('attachment');
      }

      $data = [
        'Title' => $contenttitle,
        'Header' => $contentheader,
        'Content' => $contentarea,
      ];

      $this->ArticleModel->update($contentid, $data);


      $data = [
        'Title' => $contenttitle,
        'Header' => $contentheader,
        'Content' => $contentarea,
        'ContentID' => $contentid
      ];

      return json_encode($data);
    }

    public function publish()
    {
      $contenttitle = $this->request->getPost('title');
      $contentauthor = $this->session->get('nip');
      $contentheadertype = $this->request->getPost('headertype');
      $contentarea = $this->request->getPost('contentarea');

      if ($contentheadertype == 'upload'){
        $contentupload = $this->request->getFile('attachment');
        $contentheader = $this->headerprocess($contentupload);
      } else {
        $url = $this->request->getPost('attachment');
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $youtube_id = $match[1];

        $contentheader = "https://img.youtube.com/vi/".$youtube_id."/hqdefault.jpg";
      }

      $data = [
        'Title' => $contenttitle,
        'Header' => $contentheader,
        'Content' => $contentarea,
        'KonselorNIP' => $contentauthor,
        'Timestamp' => date('Y-m-d H:i:s'),
      ];

      $this->ArticleModel->insert($data);

      return json_encode($data);
    }


    public function headerprocess($file = null)
    {
      $ext = $file->getClientExtension();
      $newName = 'HKSVCONTENT_IMG_'.date("YmdHis").'.'.$ext;
  
      $file->move('./uploads/contents/', $newName);
      $filePath = base_url('/uploads/contents/').'/'.$newName;
      
      $data = [
          'attachmentpath' => $filePath,
      ];
      return $data["attachmentpath"];
    }

    public function getArticles()
    {

      $articles = $this->ArticleViewModel->orderBy('Timestamp', 'DESC')->findAll();

      return json_encode($articles);

    }

    public function getEditArticles()
    {

      $articles = $this->ArticleModel->where('KonselorNIP', $this->session->get('nip'))->orderBy('Timestamp', 'DESC')->findAll();

      return json_encode($articles);

    }

    public function findArticles()
    {
      $searchquery = $this->request->getPost('query');
      if ($searchquery){

        $builder = $this->ArticleViewModel->builder();
        $builder->like('Title', $searchquery);
        $articles = $builder->get();
  
        return json_encode($articles->getResult());
      } else {
        return $this->getArticles();
      }

    }

    public function findEditArticles()
    {
      $searchquery = $this->request->getPost('query');
      if ($searchquery){

        $builder = $this->ArticleModel->builder();
        $builder->like('KonselorNIP', $this->session->get('nip'));
        $builder->like('Title', $searchquery);
        $articles = $builder->get();
        
        return json_encode($articles->getResult());
      } else {
        return $this->getEditArticles();
      }

    }

    public function deleteArticle()
    {
      $param = $this->request->getPost('ArticleID');
      $selected = $this->ArticleModel->where('ArticleID', $param)->find();
      $this->ArticleModel->where('ArticleID', $param)->delete();
      return json_encode($selected);

    }

    public function getYtId()
    {
      $url = $this->request->getPost('attachment');
      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
      $youtube_id = $match[1];

      $contentheader = "https://img.youtube.com/vi/".$youtube_id."/hqdefault.jpg";

      return ($contentheader);
    }

}
