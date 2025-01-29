<?php
$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);

 if(isset($_POST["paynow"])){

    // $tpolicy = trim($_POST["tpolicy"]);
    $tpolicy = "W";
    $PaymentAmount = trim($_POST["cover_limit"]);
   // $mobile = trim($_POST["txtMobile"]);
   //echo "The time is " . date("h:i:sa");
    $orderID = ($tpolicy."x".date("hisa"));

    // order id end

    // Save Record Start

include('dbconn.php');
include('wellness_controller.php');

$db = new DatabaseConnection;

// if(isset($_POST['paynow'])) {

    $inputData = [
        'wp_order_id' => mysqli_real_escape_string($db->conn,$orderID),
        'wp_title' => mysqli_real_escape_string($db->conn,$_POST['title']),
        'wp_full_name' => mysqli_real_escape_string($db->conn,$_POST['name']),
        'wp_address' => mysqli_real_escape_string($db->conn,$_POST['address']),
        'wp_nic_pass' => mysqli_real_escape_string($db->conn,$_POST['nic']),
        'wp_dob' => mysqli_real_escape_string($db->conn,$_POST['dob']),
        'wp_mobile_no' => mysqli_real_escape_string($db->conn,$_POST['txtMobile']),
        'wp_land_no' => mysqli_real_escape_string($db->conn,$_POST['fixedcon']),
        'wp_gender' => mysqli_real_escape_string($db->conn,$_POST['gender']),
        'wp_occup' => mysqli_real_escape_string($db->conn,$_POST['occupation']),
        'wp_emp_name_address' => mysqli_real_escape_string($db->conn,$_POST['empaddress']),
        'wp_email_address' => mysqli_real_escape_string($db->conn,$_POST['emailadr']),
        'wp_marital_status' => mysqli_real_escape_string($db->conn,$_POST['mr_status']),
        'wp_cover' => mysqli_real_escape_string($db->conn,$_POST['cover_limit']),
        'wpq_1a' => mysqli_real_escape_string($db->conn,$_POST['radioopt1']),
        'wpq_1a_comment' => mysqli_real_escape_string($db->conn,$_POST['opt1'] ?? ''),
        'wpq_1b' => mysqli_real_escape_string($db->conn,$_POST['radioopt2']),
        'wpq_1b_comment' => mysqli_real_escape_string($db->conn,$_POST['opt2'] ?? ''),
        'wpq_1c' => mysqli_real_escape_string($db->conn,$_POST['radioopt3']),
        'wpq_1c_comment' => mysqli_real_escape_string($db->conn,$_POST['opt3'] ?? ''),
        'wpq_1d' => mysqli_real_escape_string($db->conn,$_POST['radioopt4']),
        'wpq_1d_comment' => mysqli_real_escape_string($db->conn,$_POST['opt4'] ?? ''),
        'wpq_1e' => mysqli_real_escape_string($db->conn,$_POST['radioopt5']),
        'wpq_1e_comment' => mysqli_real_escape_string($db->conn,$_POST['opt5'] ?? ''),
        'wpq_1f' => mysqli_real_escape_string($db->conn,$_POST['radioopt6']),
        'wpq_1f_comment' => mysqli_real_escape_string($db->conn,$_POST['opt6'] ?? ''),
        'wpq_1g' => mysqli_real_escape_string($db->conn,$_POST['radioopt7']),
        'wpq_1g_comment' => mysqli_real_escape_string($db->conn,$_POST['opt7'] ?? ''),
        'wpq_1h' => mysqli_real_escape_string($db->conn,$_POST['radioopt8']),
        'wpq_1h_comment' => mysqli_real_escape_string($db->conn,$_POST['opt8'] ?? ''),
        'wpq_2ab' => mysqli_real_escape_string($db->conn,$_POST['radioopt9']),
        'wpq_2ab_comment' => mysqli_real_escape_string($db->conn,$_POST['opt9'] ?? ''),
        'wpq_3abcd' => mysqli_real_escape_string($db->conn,$_POST['radioopt10']),
        'wpq_3abcd_comment' => mysqli_real_escape_string($db->conn,$_POST['opt10'] ?? ''),
        'wpq_3e' => mysqli_real_escape_string($db->conn,$_POST['radioopt11']),
        'wpq_3e_comment' => mysqli_real_escape_string($db->conn,$_POST['opt11'] ?? ''),
        'wp_agree' => mysqli_real_escape_string($db->conn,$_POST['agree']),
        
    ];
    $wplan = new wellness_controller;
    $result = $wplan->create($inputData);    
    if($result){echo   $_SESSION['message'] = "Plan Created Successfully"; }
    else{echo   $_SESSION['message'] = "Not Inserted";  }


//}

    // End Save Record

    // Send SMS

  //  include 'sendsms.php';

  //  $m_no = trim($_POST['txtMobile']);
//    $sms_text = "Thank you for joining WELLNESS PLUS.You will receive your policy document in due course.";
  //  $sms_order_id = $wplan->getSMSid();

 //   $sms =new sendsms();
 //   $sms->send($m_no,$sms_order_id,$sms_text);



    include 'CYBSPEB.php';
    $ipg =new CYBSPEB();
    echo $ipg->getDefaultForm($orderID,$PaymentAmount);


    

}



?>