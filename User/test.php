<?php

    $curl =curl_init();
    $response ="";

    curl_setopt_array($curl, array(
      CURLOPT_URL =>"https://www.multiplayergameserver.com/xmlapi7/xmlapi.php?site_id=889&password=R6Kz2x7yT1&nocompress=true&action=get_games&search=bubble
&limit=0, 10",
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

    $url="";

    ///curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_TIMEOUT,10);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)');

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //disable ssl check

    $response = curl_exec($curl);

    //var_dump($response,curl_error($curl));
    $xml_str = $response;
    $xml=simplexml_load_string($xml_str);
    
   $gameName;

     $arr =range(0,10);

  foreach($arr as $key=>$value)
  {
      unset($arr[$key + 1]);
      
      $gameName ='game_'.$value;

     echo $xml->games-> $gameName->id;
     echo "<br>";
     echo $xml->games-> $gameName->name;
     echo "<br>";
    
  }
 
 

?>