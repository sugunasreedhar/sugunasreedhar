<?php 
ini_set("display_errors", "1");
  require 'commonFun.php';

header("Content-Type:application/json");

$routeString=explode('/', $_SERVER['REQUEST_URI']);
//print_r($routeString);
switch ($routeString[2]) {
    
    case 'weatherData':
  
        response(200,"Record Found",getWeatherData($_POST['location']));             
        break;
      case 'currencyList':

       // $_POST['location']='Laksar,haridwar';
        response(200,"Record Found",currencyList());             
        break;   
       case 'currencyConvert':

       // $_POST['location']='Laksar,haridwar';
        response(200,"Record Found",convertCurrency($_POST));             
        break;

        case 'wikiLinks':
            response(200,"Record Found",getWikiLinks($_POST));   
         break;
       case'countryInfo':
     
       // print_r(($_REQUEST));
        response(200,"Record Found",getCountryInfo($_POST)); 
        break; 

        default:
            // code...
            response(400,"Invalid Request",NULL);
            break;
        }
             

function response($response_code,$response_desc,$response_data){
    $response['response_code'] = $response_code;
    $response['response_desc'] = $response_desc;
    $response['response_data'] = $response_data;
    
    $json_response = json_encode($response);
    echo $json_response;
}


?>  
