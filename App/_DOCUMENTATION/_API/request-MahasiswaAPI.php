<?php
  // kvstore API url
  $url = 'https://api.ipb.ac.id/v1/Authentication/LoginMahasiswa';


  // Collection object
  $Credential = [
    'Username' => 'alan_ipb',
    'Password' => 'bucimo123',
  ];

  // Initializes a new cURL session
  $curl = curl_init($url);

  // Set the CURLOPT_RETURNTRANSFER option to true
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // Set the CURLOPT_POST option to true for POST request
  curl_setopt($curl, CURLOPT_POST, true);
  // Set the request data as JSON using json_encode function
  curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($Credential));
  // Set custom headers for RapidAPI Auth and Content-Type header
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-IPBAPI-TOKEN: Bearer ab452fc6-4874-367e-8680-c2d2461939c4',
    'Content-Type: application/json'
  ]);

  // Execute cURL request with all previous settings
  $response = curl_exec($curl);
  // Close cURL session
  curl_close($curl);

  $response = json_decode($response);

  $response->Code = 200;
  
  echo 'CODE : '.$response->Code.'<br />';
  echo 'USERNAME : '.$response->Username.'<br />';
  echo 'IDMHS : '.$response->MahasiswaId.'<br />';
  echo 'NAMA : '.$response->Nama.'<br />';
  echo 'NIM : '.$response->NIM.'<br />';
  echo 'NIM : '.$response->KodeStrata.'<br />';
  echo 'Kode Prodi : '.$response->KodeMayor.'<br />';
  echo 'PRODI : '.$response->Mayor.'<br /><br /><br />';
  //echo 'TOKEN : '.$response->Token.'<br />';

?>