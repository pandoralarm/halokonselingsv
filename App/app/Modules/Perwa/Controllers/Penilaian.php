<?php namespace App\Modules\Perwa\Controllers;

use App\Modules\Perwa\Models\PenilaianModel;
use App\Modules\Perwa\Models\PengajuanModel;
use CodeIgniter\Controller;
use TCPDF;

class Penilaian extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->penilaian = new PenilaianModel();
        $this->pengajuan = new PengajuanModel();
    }

    public function index()
	{
		return view('errors/error_403');
	}

    public function addPenilaian(){
        $data = [
            'idPengajuan' => $this->request->getPost('idPengajuan'),
            'kemampuanAkademik' => $this->request->getPost('kemampuanAkademik'),
            'kemampuanLisan' => $this->request->getPost('kemampuanLisan'),
            'kemampuanTertulis' => $this->request->getPost('kemampuanTertulis'),
            'motivasi' => $this->request->getPost('motivasi'),
            'kestabilan' => $this->request->getPost('kestabilan'),
            'kreativitas' => $this->request->getPost('kreativitas'),
            'kemampuanBerkelompok' => $this->request->getPost('kemampuanBerkelompok'),
            'kemampuanTeknis' => $this->request->getPost('kemampuanTeknis'),
        ];
        
        $this->penilaian->insert($data);

        $dataPengajuan = [
            'dosenPJ' => $this->session->get('nama'),
            'nip' => $this->session->get('nip'),
        ];
        $this->pengajuan->update($this->request->getPost('idPengajuan'), $dataPengajuan);
    }

    public function addRekomendasi(){
        $file = $this->request->getFile('rekomendasi');
        $newName = $file->getRandomName();

        $file->move('./uploads/rekomendasi/', $newName);

        $dataRekomendasi = [
            'rekomendasi' => $newName,
            'status' => 'Disetujui',
        ];

        $this->pengajuan->update($this->request->getPost('idPengajuan'), $dataRekomendasi);

        $response = [
            'file' => $dataRekomendasi['rekomendasi'],
            'status' => $dataRekomendasi['status'],
        ];

        return json_encode($response);
    }

    
    public function cetakRekomendasi($idpengajuan){
        $dataPengajuan = $this->pengajuan->where("idPengajuan = $idpengajuan")->findAll();
        $dataPenilaian = $this->penilaian->where("idPengajuan = $idpengajuan")->findAll();
        $dataPengajuan = json_decode( json_encode($dataPengajuan), true);
        $dataPenilaian = json_decode( json_encode($dataPenilaian), true);
        $data = [
            'namaDosen'             => $dataPengajuan[0]['dosenPJ'],
            'nip'                   => $dataPengajuan[0]['nip'],
            'namaMahasiswa'         => $dataPengajuan[0]['nama'],
            'namaBeasiswa'          => $dataPengajuan[0]['namaBeasiswa'],
            'nim'                   => $dataPengajuan[0]['nim'],
            'prodi'                 => $dataPengajuan[0]['prodi'],
            'kemampuanAkademik'     => $dataPenilaian[0]['kemampuanAkademik'],
            'kemampuanLisan'        => $dataPenilaian[0]['kemampuanLisan'],
            'kemampuanTertulis'     => $dataPenilaian[0]['kemampuanTertulis'],
            'motivasi'              => $dataPenilaian[0]['motivasi'],
            'kestabilan'            => $dataPenilaian[0]['kestabilan'],
            'kreativitas'           => $dataPenilaian[0]['kreativitas'],
            'kemampuanBerkelompok'  => $dataPenilaian[0]['kemampuanBerkelompok'],
            'kemampuanTeknis'       => $dataPenilaian[0]['kemampuanTeknis'],
        ];
        $html = view("template/rekomendasi", $data);
        $html .= '<style>'.file_get_contents(base_url('assets/css/template/stylerekomendasi.css')).'</style>';
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
        $pdf->AddPage();
        // Print text using writeHTMLCell()
        $img_file = base_url('assets/img/Components/Template/logo_ipb.png');
        $pdf->Image($img_file, 65, 95, 90, 90, '', '', '', false, 300, '', false, false, 0);
        // Image( filename, left, top, width, height, type, link, align, resize, dpi, align, ismask, imgmask, border, fitbox, hidden, fitonpage)
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output( 'Rekomendasi_'.$dataPengajuan[0]['nim'].'.pdf', 'D');
    }

}
