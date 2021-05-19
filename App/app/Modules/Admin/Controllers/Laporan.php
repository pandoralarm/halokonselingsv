<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Konseling\Models\RequestModel;
use CodeIgniter\Controller;
use App\Modules\Application\Models\DosenModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends Controller
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
      $Request = json_decode(file_get_contents("php://input"),true);
      $data = [
        'startdate' => $Request['startdate'],
        'enddate' => $Request['enddate'],
      ];
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', $data['startdate']);
      $sheet->setCellValue('A2', $data['enddate']);

      $writer = new Xlsx($spreadsheet);
      $writer->save('./docs/hello_world.xlsx');
      $data = [
        'filename' => 'hello_world.xlsx',
        'url' => base_url('/docs/hello_world.xlsx'),
      ];
      return json_encode($data);
    }

}
