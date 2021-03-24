<?php
  include_once('request.php');

  $id = 286377;
  // kvstore API url
  $url = 'https://api.ipb.ac.id/v1/nilai/Akademik/IndeksPrestasiMahasiswa?mahasiswaId='.$id;

  // Collection object
  $Credential = [
    'mahasiswaID' => 286377,
  ];

  // Initializes a new cURL session
  $curl = curl_init($url);

  // Set the CURLOPT_RETURNTRANSFER option to true
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // Set the CURLOPT_POST option to true for POST request
  curl_setopt($curl, CURLOPT_HTTPGET, true);
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

  foreach ($response as $ip) {
    echo 'Semester : '.$ip->SemesterMahasiswa;
    echo '<br />';
    echo 'SKS Semester : '.$ip->SksSemester;
    echo '<br />';
    echo 'SKS Kumulatif : '.$ip->SksKumulatif;
    echo '<br />';
    echo 'IP Semester : '.$ip->IP;
    echo '<br />';
    echo 'IP Kumulatif : '.$ip->IPK;
    echo '<br />';
    echo 'Kelanjutan Studi : '.$ip->KelanjutanStudi;
    echo '<br />';
    echo '<br />';
  }


?>