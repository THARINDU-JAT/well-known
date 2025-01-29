<?php

class sendsms{

    public function send($mobile,$order_id,$message ){

        $url = "https://e-sms.dialog.lk/api/v1/login";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $data = '{"username": "cooperative","password": "Coop@1234"}';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $resp = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($resp, true);
        $m_token="";

        foreach ($response as $key => $value) {
            if($key=="token"){
                $m_token =  $value;
            }
        }

        // Token Generated

        $url2 = "https://e-sms.dialog.lk/api/v1/sms";
        $authorization = "Authorization: Bearer ". $m_token;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url2);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $message = '"'.$message.'"';

        $data2 = '{"sourceAddress":"CICL","message":'.$message.',"transaction_id":"'.$order_id.'", "payment_method":"0", "msisdn":[{"mobile" : "'.$mobile.'"}],"push_notification_url" : "na"}';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
        $resp2 = curl_exec($curl);
        curl_close($curl);
       // echo $resp2 . "<br><hr>";


    }


}



?>