<?php
///require "../vendor/autoload.php";


 if($_REQUEST['selectedPlace']!=""){
       $curl_handle = curl_init();
  	$apiKey = "38fc655abf7849f4851712c42ac411e2"; // Replace with your API key
    $apiUrl = "https://api.opencagedata.com/geocode/v1/json?q=" . $_REQUEST['selectedPlace'] . "&key=" . $apiKey;
	curl_setopt($curl_handle, CURLOPT_URL, $apiUrl);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	$curl_data = curl_exec($curl_handle);
	curl_close($curl_handle);
	$response_data = json_decode($curl_data);
       echo json_encode($response_data->results);
      }  

 ?>