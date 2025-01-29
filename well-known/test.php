<?php
$url = "https://e-sms.dialog.lk/api/v1/login";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = '{"username": "cooperative","password": "Coop@1234"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

//echo $resp . "<br><hr>";

 $response = json_decode($resp, true);

$m_token="";

foreach ($response as $key => $value) {
  //  echo "The value of key '$key' <br>";
    if($key=="token"){
        $m_token =  $value;
    }
}

echo  "Token is " .  $m_token;

?>

<?php
$url2 = "https://e-sms.dialog.lk/api/v1/sms";

$authorization = "Authorization: Bearer ". $m_token;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url2);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', $authorization));
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$message = '"Dear Sir/Madam, Your A/C (********) has been credited by 1000000000.00. Thank you. Test :)"';

$data2 = '{"sourceAddress":"CICL","message":'.$message.',"transaction_id":"1201", "payment_method":"0", "msisdn":[{"mobile" : "0765462237"}],"push_notification_url" : "ffff"}';
  

curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);

$resp2 = curl_exec($curl);
curl_close($curl);

echo $resp2 . "<br><hr>";

 //$response = json_decode($resp2, true);

// foreach ($response as $key => $value) {
//   //  echo "The value of key '$key' <br>";
//     if($key=="token"){
//         $m_token =  $value;
//     }
// }

//echo  "Token is " .  $m_token;

?>