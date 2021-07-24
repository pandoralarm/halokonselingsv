<?php

namespace App\Modules\Account\Controllers;


use App\Modules\Account\Models\DosenModel;
use App\Modules\Account\Models\EmailsModel;
use App\Modules\Account\Models\RoleModel;
use App\Modules\Account\Models\MhsModel;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\Types\Null_;

class Auth extends Controller
{

  /**
   * Constructor.
   */

  public function __construct()
  {
    // Creating new configuration object by hand
    $this->ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $this->keys = new \Config\Api();
    $this->RoleModel = new RoleModel();
    $this->DosenModel = new DosenModel();
    $this->EmailsModel = new EmailsModel();
    $this->session = \Config\Services::session();
    $this->request = \Config\Services::request();
    $this->isMob = is_numeric(strpos($this->ua, "mobile"));
  }

  public function index()
  {

    return view('errors/html/error_403');
  }

  public function post($Username = null, $Password = null)
  {
    // User data needed for POST
    $userdata = [
      'Username' => $Username,
      'Password' => $Password,
    ];

    return $this->response($userdata);
  }

  private function response($Credential)
  {
    $PathDosen = 'https://api.ipb.ac.id/v1/Authentication/LoginDosen';
    $PathMhs = 'https://api.ipb.ac.id/v1/Authentication/LoginMahasiswa';

    $ResponseDosen = $this->curl($PathDosen, $Credential);
    $ResponseMhs = $this->curl($PathMhs, $Credential);

    if ($ResponseDosen == null && $ResponseMhs == null) {
      //Create null object, then fill it with error code and mesage
      $Response = (object) null;
      $Response->Code = 404;
      $Response->Error = 'Login Gagal : 404.';
      return $Response;
    }

    //Check if both response returns an error
    if (property_exists($ResponseDosen, 'NIP')) {
      $ResponseDosen->Code = 200;
      $ResponseDosen->Status = 'Dosen';
      return $ResponseDosen;
    } elseif (property_exists($ResponseMhs, 'NIM')) {
      $ResponseMhs->Code = 200;
      $ResponseMhs->Status = 'Mahasiswa';
      return $ResponseMhs;
    } else {
      $Response = $ResponseMhs;
      $Response->Code = 401;
      $Response->Error = 'Username atau Password Salah.';
      return $Response;
    }
  }

  private function curl($Targeturl = null, $Credential = null)
  {
    // Initializes a new cURL session
    $curl = curl_init($Targeturl);

    // Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the CURLOPT_POST option to true for POST request
    curl_setopt($curl, CURLOPT_POST, true);
    // Set the request POST data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($Credential));
    // Set headers for IPB API Auth TOKEN and Content-Type header
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      $this->keys->DSITD_TOKEN,
      'Content-Type: application/json'
    ]);

    // Execute cURL request with all previous settings
    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);

    return $response = json_decode($response);
  }
}
