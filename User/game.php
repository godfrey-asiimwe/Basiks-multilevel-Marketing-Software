
<html>
<head><title>Your Domain Playgame</title></head>
<body>
<?php

$site_id="889";
$password="R6Kz2x7yT1";
$nick="goddy";
$msisdn=uniqid();
$player_password="password";
$email="agtumusiime@gmail.com";
$date_of_birth="1980-06-19";
$skillpod_player_id="123321";

$curl = curl_init();
$response = "";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.multiplayergameserver.com/xmlapi7/xmlapi.php?site_id=889&password=R6Kz2x7yT1&nocompress=true&action=register_player&nick=goddy&msisdn=123456789&player_password=password&email=agtumusiime@gmail.com&gender=M&date_of_birth=1980-06-19",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Cookie: PHPSESSID=3grtbm62n0mt1kouqb50a73f21"
  ),
));

curl_setopt($curl,CURLOPT_TIMEOUT,10);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)');

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //disable ssl check

$response = curl_exec($curl);

//var_dump($response,curl_error($curl));
$xml_str = $response;
$xml=simplexml_load_string($xml_str);
//var_dump($xml);
echo "error:<br>".$xml->result;
echo "error Message:<br>".$xml->error_message;

?>
</body></html>