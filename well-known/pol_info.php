<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

if(isset($_GET["policyNo"]) && ($_GET["type"])){

        $data = '{"username": "cooperative","password": "Coop@1234"}';

    if(trim($_GET["type"])=="thp"){

            $th_polno = trim($_GET["policyNo"]);
            $url = "http://124.43.209.65:8001/ThirdPartyPolicy/GetPolicy?policyNo=".$th_polno;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

           // $data = '{"username": "cooperative","password": "Coop@1234"}';

            $resp = curl_exec($curl);
            curl_close($curl);

            $response = json_decode($resp, true);

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
    }

    if(trim($_GET["type"])=="gen"){
            $gen_polno = trim($_GET["policyNo"]);
            $url = "http://124.43.209.65:8001/PolicyStatus/GeneralPolicy?policyNo=".$gen_polno;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            

            $resp = curl_exec($curl);
            curl_close($curl);

            $response = json_decode($resp, true);

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);

    }

}

?>