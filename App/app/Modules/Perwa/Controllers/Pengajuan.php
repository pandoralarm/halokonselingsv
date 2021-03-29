<?php

namespace App\Modules\Perwa\Controllers;

use App\Modules\Perwa\Models\PengajuanModel;
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
        return json_encode($result);
    }
    public function showDisetujui($nim)
    {
        $result = $this->pengajuan->where("nim = '" . $nim . "' AND status = 'Disetujui'")->findAll();
        return json_encode($result);
    }
    public function showDitolak($nim)
    {
        $result = $this->pengajuan->where("nim = '" . $nim . "' AND status = 'Ditolak'")->findAll();
        return json_encode($result);
    }

    public function deletePengajuan($idPengajuan)
    {
        $this->pengajuan->where('idPengajuan', $idPengajuan)->delete();
    }


    public function showDiprosesSekrpodi()
    {
        $result = $this->pengajuan->where("status = 'Diproses'")->findAll();
        return json_encode($result);
    }
    public function showDiselesaikanSekrpodi()
    {
        $result = $this->pengajuan->where("status != 'Diproses'")->findAll();
        return json_encode($result);
    }
}
