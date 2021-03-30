<?php

namespace App\Modules\Perwa\Controllers;

use App\Modules\Perwa\Models\BeasiswaModel;
use CodeIgniter\Controller;

class Beasiswa extends Controller
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->beasiswa = new BeasiswaModel();
    }

    public function index()
    {
        return view('errors/error_403');
    }

    public function addBeasiswa()
    {
        $data = [
            'namaBeasiswa' => $this->request->getPost('namaBeasiswa'),
            'donatur' => $this->request->getPost('donatur'),
            'nominal' => $this->request->getPost('nominal'),
            'syaratSemester' => $this->request->getPost('syaratSemester'),
            'syaratIPK' => $this->request->getPost('syaratIPK'),
            'tglDibuka' => $this->request->getPost('tglDibuka'),
            'tglDitutup' => $this->request->getPost('tglDitutup'),
            'status' => True,
        ];
        $this->beasiswa->insert($data);
    }

    public function showBeasiswa()
    {
        $result = $this->beasiswa->findAll();
        return json_encode($result);
    }

    public function deleteBeasiswa($idBeasiswa)
    {
        return $this->beasiswa->where('idBeasiswa', $idBeasiswa)->delete();
    }
}
