<?php namespace App\Modules\Dasbor\Controllers;

use CodeIgniter\Controller;

class Signin extends Dashboard
{
    private $userModel;

    /**
     * Constructor.
     */

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
            return redirect()->to(site_url("dasbor"));
        } else {
            return view('dasbor/signin');
        }
	}

}
