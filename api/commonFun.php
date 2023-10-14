<?php 
function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     // 'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);

   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
function getCountryData(){

	$get_data = callAPI('GET','http://localhost/GAZETTEER/api/countryList/', false); 
	$response = json_decode($get_data, true);
	//print_r($response);
	return ($response['response_data']);
	//print_r($response->response_data);
}

function getWeatherData($location){
    $get_data = callAPI('GET','http://api.openweathermap.org/data/2.5/weather?q='.$location.'&APPID=c9a90ff4fba57b0aea106922863cf618', false); 
	$response = json_decode($get_data, true);
	return ($response);

}

function currencyList(){
	 $json = file_get_contents("https://api.frankfurter.app/currencies");
	 return json_decode($json);
}
function convertCurrency($postD){
  
   $get_data = callAPI('GET','https://api.frankfurter.app/latest?amount='.$postD['amount'].'&from='.$postD['currency1'].'&to='.$postD['currency2'], false); 
   $response = json_decode($get_data, true);
   return ($response);

}
function getWikiLinks($data){
   $endPoint = "https://en.wikipedia.org/w/api.php";
   $params = [
       "action" => "query",
       "format" => "json",
       "titles" => $data['title'],
       "prop" => "links"
   ];

   $url = $endPoint . "?" . http_build_query( $params );
   $get_data = callAPI('POST',$url,$params); 
   $response = json_decode($get_data);
  // print_r($response);

$arrayLinks=array();
foreach( $result["query"]["pages"] as $k => $v ) {
    foreach($v["links"] as $k => $v ) {
        echo( $v["title"] . "\n" );
       
        array_push($arrayLinks, array("link"=>$v["links"],"title"=>$v["title"]));
    }
}
//print_r($arrayLinks);
return json_encode($arrayLinks);
}
//uncomment to test
//echo convertCurrency(10, 'USD', 'PHP');

function getCountryInfo($data){
  $get_data = callAPI('GET',"https://restcountries.com/v2/name/".$data['name'],array()); 
   $response = json_decode($get_data);
  //print_r($response);
$newData=$response[count($response)-1];
return ($newData);
//return $de_response;
}



?>
