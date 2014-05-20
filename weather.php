<?php


function my_file_get_contents( $site_url ){
  $ch = curl_init();
  $timeout = 10;
  curl_setopt ($ch, CURLOPT_URL, $site_url);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $file_contents = curl_exec($ch);
  curl_close($ch);
  return $file_contents;
}

function get_client_ip() {
     $ipaddress = '';
     if(getenv('REMOTE_ADDR'))
         $ipaddress = getenv('REMOTE_ADDR');
     else if (getenv('HTTP_CLIENT_IP'))
         $ipaddress = getenv('HTTP_CLIENT_IP');
     else if(getenv('HTTP_X_FORWARDED_FOR'))
         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
     else if(getenv('HTTP_X_FORWARDED'))
         $ipaddress = getenv('HTTP_X_FORWARDED');
     else if(getenv('HTTP_FORWARDED_FOR'))
         $ipaddress = getenv('HTTP_FORWARDED_FOR');
     else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
     else
         $ipaddress = 'UNKNOWN';
     return $ipaddress; 
}

$ip = get_client_ip(); // the IP address to query

//test ip
//$ip = "180.76.6.19";

$query = @unserialize(my_file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  //get Coords
  $lat = $query['lat'];
  $lon = $query['lon'];
  $city = $query['city'];

  $url = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}";
  //$url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&APPID=test";

    $djson = my_file_get_contents($url);
  echo $djson;

} else {
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Brazil";
    $djson = my_file_get_contents($url);
  echo $djson;
}
?>