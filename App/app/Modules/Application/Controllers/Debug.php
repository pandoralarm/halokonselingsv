<?php namespace App\Modules\Application\Controllers;

use App\Modules\Application\Models\UserModel;
use App\Modules\Konseling\Models\RequestModel;
use CodeIgniter\Controller;
use App\Modules\Application\Models\DosenModel;

class Debug extends Controller
{
     /**
     * Constructor.
     */
    public function __construct()
    {
      $this->DosenModel = new DosenModel();
      $this->requests = new RequestModel();
      $this->session = \Config\Services::session();
      $this->ua = strtolower($_SERVER['HTTP_USER_AGENT']);
      $this->isMob = is_numeric(strpos($this->ua, "mobile"));
    }

    public function index()
    {
      $appData = [
            'title'       => 'HaloKonselingSV',
            'description' => 'Website Komisi Bimbingan dan Konseling Sekolah Vokasi IPB',
            'keywords'    => 'konseling, svipb, sv, bimbingan, konsultasi, masalah, curhat',
            'url'         => base_url(),
            'site'        => 'HaloKonselingSV',
            'role'        => 'ADMIN KONSELOR',
            'name'        => $this->session->get('nama'),
            'prodi'       => $this->session->get('prodi'),
            'role'        => $this->session->get('role'),
            'logged'      => $this->session->get('logged'),
      ];
               
      //SEPARATE VIEW GROUPS AS MOBILE AND DESKTOP APPLICATION
      $data = [
        'RequestID' => '',
        'MahasiswaNIM' => $this->session->get('nim'),
        'RequestDetail' => 'messagenya',
        'ThreadID' => '',
        'Timestamp' => date('Y-m-d H:i:s'),
      ];

      $whereclause = ['MahasiswaNIM' => $this->session->get('nim'), 'THreadID' => 0];
      $reqs = $this->requests->where($whereclause)->findAll();

      echo $this->session->get('nim');
      print_r($reqs);
      echo view('layout/mobile/header', $appData);
      echo view('application/mobile/debug');

      return json_encode($this->requests->where('ThreadID', 0)->findAll());
    }

}
