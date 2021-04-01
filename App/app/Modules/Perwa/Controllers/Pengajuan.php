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
        $this->keys = new \Config\Api();
        $this->session = \Config\Services::session();
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

        $ipkMhs = $this->getNilai();

        $ip_array = array(0,0,0,0,0,0);
        $ipk = 0;
        $index = 0;

        foreach($ipkMhs as $ip) {
            if($ip->SksSemester!=0){
                $ip_array[$index] = $ip->IP;
            }else {
                array_push($ip_array,0);
                $ipk = $ip->IPK;
                $semester = $ip->SemesterMahasiswa;
            }
            $index++;
        }

        $data = [
            'nama' => $this->session->get('nama'),
            'nim' => $this->session->get('nim'),
            'prodi' => $this->session->get('prodi'),
            'semester' => $semester,
            'ip1' => $ip_array[0],
            'ip2' => $ip_array[1],
            'ip3' => $ip_array[2],
            'ip4' => $ip_array[3],
            'ip5' => $ip_array[4],
            'ip6' => $ip_array[5],
            'ipk' => $ipk,
            'namaBeasiswa' => $this->request->getPost('namaBeasiswa'),
            'deadline' => $this->request->getPost('deadline'),
            'cv' => $newName,
            'tanggalPengajuan' => date('Y-m-d'),
            'status' => "Diproses",
            'dosenPJ' => "Belum Ada",
        ];

        $this->pengajuan->insert($data);

        
        $response = [
            'cvpath' => $data['cv'],
            'deadline' => $data['deadline'],
            'namaBeasiswa' => $data['namaBeasiswa'],
        ];


        return json_encode($response);
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
        $file = $this->pengajuan->where('idPengajuan', $idPengajuan)->findColumn('cv');
        $path = "./uploads/cv/".$file[0];
        unlink($path); 
        return $this->pengajuan->where('idPengajuan', $idPengajuan)->delete();
    }

    public function getCV($idPengajuan){
        $file = $this->pengajuan->where('idPengajuan', $idPengajuan)->findColumn('cv');
        $path = "./uploads/cv/".$file[0];
        return $this->response->download($path, null);
    }

    public function getRekomendasi($idPengajuan){
        $file = $this->pengajuan->where('idPengajuan', $idPengajuan)->findColumn('rekomendasi');
        $path = "./uploads/rekomendasi/".$file[0];
        return $this->response->download($path, null);
    }


    public function showDiprosesSekprodi()
    {
        $result = $this->pengajuan->where("status = 'Diproses'")->findAll();
        return json_encode($result);
    }
    public function showDiselesaikanSekprodi()
    {
        $result = $this->pengajuan->where("status != 'Diproses'")->findAll();
        return json_encode($result);
    }
    public function showPengajuanMhs($idpengajuan)
    {
        $result = $this->pengajuan->where("idpengajuan = $idpengajuan")->findAll();
        return json_encode($result);
    }
    public function getNilai(){

        $id = $this->session->get('mahasiswaid');
        
        // kvstore API url
        $url = 'https://api.ipb.ac.id/v1/nilai/Akademik/IndeksPrestasiMahasiswa?mahasiswaId='.$id;

        
        // Initializes a new cURL session
        $curl = curl_init($url);

        // Set the CURLOPT_RETURNTRANSFER option to true
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Set the CURLOPT_POST option to true for POST request
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        // Set custom headers for RapidAPI Auth and Content-Type header
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            $this->keys->DSITD_TOKEN,
            'Content-Type: application/json'
        ]);

        // Execute cURL request with all previous settings
        $response = curl_exec($curl);
        // Close cURL session
        curl_close($curl);

        return json_decode($response);

        // foreach($response as $ip) {
        //     echo 'Semester : '.$ip->SemesterMahasiswa;
        //     echo '<br />';
        //     echo 'SKS Semester : '.$ip->SksSemester;
        //     echo '<br />';
        //     echo 'SKS Kumulatif : '.$ip->SksKumulatif;
        //     echo '<br />';
        //     echo 'IP Semester : '.$ip->IP;
        //     echo '<br />';
        //     echo 'IP Kumulatif : '.$ip->IPK;
        //     echo '<br />';
        //     echo 'Kelanjutan Studi : '.$ip->KelanjutanStudi;
        //     echo '<br />';
        //     echo '<br />';
        // }
    }
}
