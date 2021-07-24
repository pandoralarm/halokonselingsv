<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Konseling\Models\RequestModel;
use App\Modules\Konseling\Models\ChatModel;
use App\Modules\Konseling\Models\LaporanModel;
use CodeIgniter\Controller;
use App\Modules\Application\Models\DosenModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Style\Style;

class Laporan extends Controller
{
     /**
     * Constructor.
     */
    public function __construct()
    {      

      $this->DosenModel = new DosenModel();
      $this->ChatModel = new ChatModel();
      $this->LaporanModel = new LaporanModel();
      $this->requests = new RequestModel();
      $this->session = \Config\Services::session();
      $this->ua = strtolower($_SERVER['HTTP_USER_AGENT']);
      $this->isMob = is_numeric(strpos($this->ua, "mobile"));
    }

    public function index()
    {
      $result = $this->ChatModel->where('ThreadStatus', 'CLOSED')->where('DATE(Closed_at) BETWEEN "2021-04-07" AND "2021-05-02"')->findAll();   
      $i=0;

      foreach ($result as $res) {
        $datakonseli = $this->requests->where('ThreadKey', $res->ThreadKey)->first();
        $datakonselor = $this->DosenModel->find($res->KonselorNIP);
        $datasesi = $this->LaporanModel->where('ThreadKey', $res->ThreadKey)->first();
        $data[$i]['threadkey'] = $res->ThreadKey;
        $data[$i]['konselinama'] = $datakonseli->MahasiswaNama;
        $data[$i]['konselinim'] = $datakonseli->MahasiswaNIM;
        $data[$i]['konselips'] = $datakonseli->MahasiswaPS;
        $data[$i]['timestamp'] = $datakonseli->Timestamp;
        $data[$i]['tgl_plksn'] = $res->Started_at;
        $data[$i]['konselornama'] = $datakonselor->Nama;
        $data[$i]['masalah'] = $datasesi->Masalah;

        $i++;
      }

      $Request = json_decode(file_get_contents("php://input"),true);
      $date = [
        'startdate' => $Request['startdate'],
        'enddate' => $Request['enddate'],
      ];
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Timestamp');
      $sheet->setCellValue('B1', 'Tanggal Pelaksanaan');
      $sheet->setCellValue('C1', 'Nama Lengkap Konseli');
      $sheet->setCellValue('D1', 'NIM Konseli');
      $sheet->setCellValue('E1', 'Program Studi Konseli');
      $sheet->setCellValue('F1', 'Nama Konselor');
      $sheet->setCellValue('G1', 'Masalah yang dihadapi');
      $sheet->setCellValue('H1', 'Status Sesi');

      $r=2;
      foreach ($data as $row) {
        $sheet->setCellValue('A'.$r, $row['timestamp']);
        $sheet->setCellValue('B'.$r, $row['tgl_plksn']);
        $sheet->setCellValue('C'.$r, $row['konselinama']);
        $sheet->setCellValue('D'.$r, $row['konselinim']);
        $sheet->setCellValue('E'.$r, $row['konselips']);
        $sheet->setCellValue('F'.$r, $row['konselornama']);
        $sheet->setCellValue('G'.$r, $row['masalah']);
        $sheet->setCellValue('H'.$r, 'Selesai');
        $r++;
      };

      foreach (range('A','H') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
      };

      $sheet
        ->getStyle('A1:H1')
        ->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('FFFF00');

      $writer = new Xlsx($spreadsheet);
      $writer->save('./docs/laporan-halokonseling-'.$date['startdate'].'~'.$date['enddate'].'.xlsx');
      $data = [
        'filename' => 'laporan-halokonseling-'.$date['startdate'].'~'.$date['enddate'].'.xlsx',
        'url' => base_url('/docs/laporan-halokonseling-'.$date['startdate'].'~'.$date['enddate'].'.xlsx'),
      ];
      return json_encode($data);
    }

}
