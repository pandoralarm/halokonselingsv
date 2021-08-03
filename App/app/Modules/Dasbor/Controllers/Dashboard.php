<?php namespace App\Modules\Dasbor\Controllers;

use App\Modules\Dasbor\Models\UserModel;
use CodeIgniter\Controller;
use App\Modules\Account\Models\DosenModel;
use App\Modules\Account\Models\EmailsModel;
use App\Modules\Account\Models\RoleModel;
use App\Modules\Account\Models\MhsModel;
use phpDocumentor\Reflection\Types\Null_;

class Dashboard extends Controller
{
    private $userModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
      // Creating new configuration object by hand
      $this->keys = new \Config\Api();
      $this->RoleModel = new RoleModel();
      $this->DosenModel = new DosenModel();
      $this->EmailsModel = new EmailsModel();
      $this->session = \Config\Services::session();
      $this->request = \Config\Services::request();
    }

    public function index()
	{

        $page = [
            'title' => 'HaloKonselingSV - SIgnIn',
            'description' => 'Website Komisi Bimbingan dan Konseling Sekolah Vokasi IPB',
            'keywords' => 'konseling, svipb, sv, bimbingan, konsultasi, masalah, curhat',
            'url' => base_url(),
            'site' => 'HaloKonselingSV',
            'errmsg' => $this->session->getFlashdata('errorSignin'),
            'role' => $this->session->get('role'),
        ];

        if ($page['role'] == 'ADMIN' || $page['role'] == 'KONSELOR') {
            echo view('dasbor/layout/header');
            echo view('dasbor/layout/navbar');
            echo view('dasbor/layout/sidebar');
            echo view('dasbor/home');
            echo view('dasbor/layout/footer');
        } else {
            return redirect()->to(site_url("dasbor/signin"));
        }
    
	}

}
