<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

if(isset($_GET["policyNo"])){
$th_polno = trim($_GET["policyNo"]);
$url = "http://124.43.209.65:8001/ThirdPartyPolicy/GetPolicy?policyNo=".$th_polno;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = '{"username": "cooperative","password": "Coop@1234"}';

//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

//echo $resp . "<br><hr>";

 $response = json_decode($resp, true);

 header('Content-Type: application/json; charset=utf-8');
 echo json_encode($response);

//echo "<pre>";
// print_r($response);

// $m_token="";

// foreach ($response as $key => $value) {
//   //  echo "The value of key '$key' <br>";
//     if($key=="token"){
//         $m_token =  $value;
//     }
// }

//echo  "Token is " .  $m_token;
}

?>