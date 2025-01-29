<?php
$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);

 if(isset($_POST["paynow"])){

    $tpolicy = trim($_POST["tpolicy"]);
    $PaymentAmount = trim($_POST["txtPaymentAmount"]);
    $Mobile = trim($_POST["txtMobile"]);

    $orderID = ("T".$tpolicy."".date("hisa"));

    include('../dbconn.php');
    include('../wellness_controller.php');

    $db = new DatabaseConnection;

    $inputData = [
        'op_order_id'   => mysqli_real_escape_string($db->conn,$orderID),
        'op_pol_type'   => mysqli_real_escape_string($db->conn,"THP"),
        'op_mobile_no'  => mysqli_real_escape_string($db->conn,$Mobile),
        'op_pol_no'     => mysqli_real_escape_string($db->conn,$tpolicy)
    ];
    
   // echo "<pre>";
    //print_r($inputData);

    $wplan = new wellness_controller;
    
    $result = $wplan->create_tgpolicy($inputData);  
    
    if($result){
        
       // echo   "Policy pending payment record saved...!"; 
        include '../CYBSPEB.php';
        $ipg =new CYBSPEB();
        echo $ipg->getDefaultForm($orderID,$PaymentAmount);
    }
    else{
        echo    "Not Inserted..! Please contact IT Support";  
        
    }


    


    

}



?>