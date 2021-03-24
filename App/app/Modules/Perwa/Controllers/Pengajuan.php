<?php

namespace App\Modules\Perwa\Controllers;

use App\Modules\Perwa\Models\PengajuanModel;
use App\Modules\Konseling\Models\DosenModel;
use CodeIgniter\Controller;

class Pengajuan extends Controller
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->pengajuan = new PengajuanModel();
        $this->dosen = new DosenModel();
    }

    public function index()
    {
        return view('errors/error_403');
    }

    public function commit()
    {
        $file = $this->request->getFile('cv');
        $newName = $file->getRandomName();

        $file->move('./uploads/cv/', $newName);

        $data = [
            'nama' => $this->session->get('nama'),
            'nim' => $this->session->get('nim'),
            'prodi' => $this->session->get('prodi'),
            'namaBeasiswa' => $this->request->getPost('beasiswa'),
            'deadline' => $this->request->getPost('deadline'),
            'cv' => $newName,
            'tanggalPengajuan' => date('Y-m-d H:i:s'),
            'status' => "Diproses",
        ];
        $this->pengajuan->insert($data);
        return redirect()->to('/');
    }

    public function showDiproses($nim)
    {
        $result = $this->pengajuan->where("nim = '" . $nim . "' AND status = 'Diproses'")->findAll();
        // $result = $this->pengajuan->where('nim', $nim)->where('status', "Diproses")->findAll();
        return $result;
    }
    public function showDiterima($nim)
    {
        $result = $this->pengajuan->where("nim = '" . $nim . "' AND status = 'Disetujui'")->findAll();
        // $result = $this->pengajuan->where('nim', $nim)->where('status', "Diproses")->findAll();
        return $result;
    }
    public function showDitolak($nim)
    {
        $result = $this->pengajuan->where("nim = '" . $nim . "' AND status = 'Ditolak'")->findAll();
        // $result = $this->pengajuan->where('nim', $nim)->where('status', "Diproses")->findAll();
        return $result;
    }

    public function deletePengajuan($idPengajuan)
    {
        $this->pengajuan->where('idPengajuan', $idPengajuan)->delete();
        return redirect()->to('/');
    }

    public function getResponse()
    {

        $response = $this->dosen->findAll();
        return json_encode($response);

    }
    
}
