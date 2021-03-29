<?php

namespace App\Modules\Application\Controllers;

use App\Modules\Application\Models\UserModel;
use App\Modules\Perwa\Controllers\Pengajuan;
use CodeIgniter\Controller;

class Home extends Controller
{
  /**
   * Constructor.
   */
  public function __construct()
  {
    setcookie('basepath', base_url(), time() + 86400, '/');
    setcookie('hostname', $_SERVER['HTTP_HOST'], time() + 86400, '/');
    $this->session = \Config\Services::session();
    $this->ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $this->isMob = is_numeric(strpos($this->ua, "mobile"));
    $this->pengajuan = new Pengajuan();
  }

  public function index()
  {
    $appData = [
      'title'       => 'HaloKonselingSV',
      'description' => 'Website Komisi Bimbingan dan Konseling Sekolah Vokasi IPB',
      'keywords'    => 'konseling, svipb, sv, bimbingan, konsultasi, masalah, curhat',
      'url'         => base_url(),
      'site'        => 'HaloKonselingSV',
      'name'        => $this->session->get('nama'),
      'nim'        => $this->session->get('nim'),
      'prodi'       => $this->session->get('prodi'),
      'role'        => $this->session->get('role'),
      'logged'      => $this->session->get('logged'),
      'errmsg' => $this->session->getFlashdata('errorSignin'),
      'logged' => $this->session->get('logged'),
    ];

    //SEPARATE VIEW GROUPS AS MOBILE AND DESKTOP APPLICATION
    if ($this->isMob) {
      echo view('layout/mobile/header', $appData);
      echo view('layout/mobile/nav', $appData);
      echo view('application/mobile/home', $appData);
      if ($this->session->get('role') == 'ADMIN') {
        echo view('konseling/mobile/adminkonselor');
      }
      echo view('konseling/mobile/blogs');
      echo view('konseling/mobile/events');
      echo view('konseling/mobile/chatroom', $appData);
      echo view('konseling/mobile/pantauchat', $appData);
      echo view('konseling/mobile/requestform');
      echo view('layout/mobile/footer');
    } else {
      echo view('layout/desktop/header', $appData);
      echo view('layout/desktop/nav', $appData);
      echo view('application/desktop/home', $appData);
      if ($this->session->get('role') == 'MAHASISWA') {
        echo view('perwa/desktop/menu');
        echo view('perwa/desktop/pengajuan');
        echo view('perwa/desktop/dibuka');
        echo view('perwa/desktop/saya');
      } elseif ($this->session->get('role') == 'KONSELOR') {
        echo view('perwa/desktop/menusekprodi');
        echo view('perwa/desktop/pengajuansekprodi');
      }
      echo view('layout/desktop/footer');
    }
  }
}
