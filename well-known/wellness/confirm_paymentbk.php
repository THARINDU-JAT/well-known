<?php
$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);

 if(isset($_POST["paynow"])){

    // $tpolicy = trim($_POST["tpolicy"]);
    $tpolicy = "WEL";
    $PaymentAmount = trim($_POST["cover_limit"]);

   // $mobile = trim($_POST["txtMobile"]);



   //echo "The time is " . date("h:i:sa");

    $orderID = ($tpolicy."x".date("hisa"));

    include 'CYBSPEB.php';

    $ipg =new CYBSPEB();
    echo $ipg->getDefaultForm($orderID,$PaymentAmount);


    

}



?>