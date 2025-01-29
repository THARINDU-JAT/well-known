<?php
session_start();

// Check for duplicate transaction
if(isset($_SESSION["TID"]) && isset($_REQUEST["transaction_id"]) && $_SESSION["TID"] == $_REQUEST["transaction_id"]){
    // Handle duplicate transaction
    exit("Duplicate transaction detected");
} else {
    // Set TID in session if transaction_id is present
    if(isset($_REQUEST["transaction_id"])) {
        $_SESSION["TID"] = $_REQUEST["transaction_id"];
    }

    include ('security.php');
    include("dbconn.php");
    include('wellness_controller.php');
    include 'sendsms.php';

    $db = new DatabaseConnection;

    // Safely get reference number
    $selector = isset($_REQUEST["req_reference_number"]) ? substr($_REQUEST["req_reference_number"], 0, 1) : '';

    $wplan = new wellness_controller;

    if($selector == "W"){
        $sms_text = "Thank you for joining WELLNESS PLUS.You will receive your policy document in due course.";

        $updData = [
            'wp_order_id' => mysqli_real_escape_string($db->conn, $_REQUEST["req_reference_number"] ?? ''),
            'transaction_id' => mysqli_real_escape_string($db->conn, $_REQUEST["transaction_id"] ?? ''),
            'payer_authentication_transaction_id' => mysqli_real_escape_string($db->conn, $_REQUEST["payer_authentication_transaction_id"] ?? ''),
            'auth_code' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_code"] ?? ''),
            'message' => mysqli_real_escape_string($db->conn, $_REQUEST["message"] ?? ''),
            'req_transaction_uuid' => mysqli_real_escape_string($db->conn, $_REQUEST["req_transaction_uuid"] ?? ''),
            'auth_reconciliation_reference_number' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_reconciliation_reference_number"] ?? ''),
            'wp_payment_status' => mysqli_real_escape_string($db->conn, $_REQUEST["decision"] ?? ''),
        ];

        $result = $wplan->update_pay_status($updData);

        if(isset($_REQUEST["decision"]) && $_REQUEST["decision"] == "ACCEPT"){
            $wmobile_no = $wplan->getTGMobile(trim($_REQUEST["req_reference_number"] ?? ''));
            $policy_no = $wplan->getTGPolicyNo(trim($_REQUEST["req_reference_number"] ?? ''));
            $auth_amount = $_REQUEST["auth_amount"] ?? '';
            $seqNo = $wplan->getTGSeqNo(trim($_REQUEST["req_reference_number"] ?? ''));
            

    // Debug logging
    error_log("SMS Sending Variables: Mobile=$wmobile_no, Policy=$policy_no, Amount=$auth_amount");

            if($wmobile_no && $policy_no && $auth_amount) {
        $sms = new sendsms();
        $message = $sms->formatPaymentMessage($auth_amount, $policy_no);
        $result = $sms->send($wmobile_no, $message, $policy_no);
        
        // Debug logging
        error_log("SMS Send Result: " . print_r($result, true));
    } else {
        error_log("Missing required SMS data: " . 
                 "Mobile=" . ($wmobile_no ? 'Yes' : 'No') . ", " .
                 "Policy=" . ($policy_no ? 'Yes' : 'No') . ", " .
                 "Amount=" . ($auth_amount ? 'Yes' : 'No'));
    }
        }
    }

    if($selector == "T"){
        $sms_text = "Thank you for your payment for Policy Renewal. Co-operative Insurance PLC";

        $updData = [
            'op_order_id' => mysqli_real_escape_string($db->conn, $_REQUEST["req_reference_number"] ?? ''),
            'transaction_id' => mysqli_real_escape_string($db->conn, $_REQUEST["transaction_id"] ?? ''),
            'payer_authentication_transaction_id' => mysqli_real_escape_string($db->conn, $_REQUEST["payer_authentication_transaction_id"] ?? ''),
            'auth_code' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_code"] ?? ''),
            'message' => mysqli_real_escape_string($db->conn, $_REQUEST["message"] ?? ''),
            'req_transaction_uuid' => mysqli_real_escape_string($db->conn, $_REQUEST["req_transaction_uuid"] ?? ''),
            'auth_reconciliation_reference_number' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_reconciliation_reference_number"] ?? ''),
            'op_payment_status' => mysqli_real_escape_string($db->conn, $_REQUEST["decision"] ?? ''),
            'auth_amount' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_amount"] ?? ''),
        ];

        $result = $wplan->update_tgpolicy_status($updData);
        
        if(isset($_REQUEST["decision"]) && $_REQUEST["decision"] == "ACCEPT"){
            $wmobile_no = $wplan->getTGMobile(trim($_REQUEST["req_reference_number"] ?? ''));
            $policy_no = $wplan->getTGPolicyNo(trim($_REQUEST["req_reference_number"] ?? ''));
            $auth_amount = $_REQUEST["auth_amount"] ?? '';
            $seqNo = $wplan->getTGSeqNo(trim($_REQUEST["req_reference_number"] ?? ''));
            

    // Debug logging
    error_log("SMS Sending Variables: Mobile=$wmobile_no, Policy=$policy_no, Amount=$auth_amount");

            if($wmobile_no && $policy_no && $auth_amount) {
        $sms = new sendsms();
        $message = $sms->formatPaymentMessage($auth_amount, $policy_no);
        $result = $sms->send($wmobile_no, $message, $policy_no);
        
        // Debug logging
        error_log("SMS Send Result: " . print_r($result, true));
    } else {
        error_log("Missing required SMS data: " . 
                 "Mobile=" . ($wmobile_no ? 'Yes' : 'No') . ", " .
                 "Policy=" . ($policy_no ? 'Yes' : 'No') . ", " .
                 "Amount=" . ($auth_amount ? 'Yes' : 'No'));
    }
            
           // $auth_amount = $_REQUEST["auth_amount"] ?? '';
            
            // if($policy_no && $auth_amount && $seqNo) {
            //     $url_log = "http://34.87.118.90:8082/online-general/pay?policyNo=".$policy_no."&amount=".$auth_amount."&orderId=".$seqNo;
            //     $curl = curl_init($url_log);
            //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //     $response = curl_exec($curl);
            //     curl_close($curl);
            // }
        }
    }

    if($selector == "G"){
        $sms_text = "Thank you for your payment. Co-operative Insurance PLC";

        $updData = [
            'op_order_id' => mysqli_real_escape_string($db->conn, $_REQUEST["req_reference_number"] ?? ''),
            'transaction_id' => mysqli_real_escape_string($db->conn, $_REQUEST["transaction_id"] ?? ''),
            'payer_authentication_transaction_id' => mysqli_real_escape_string($db->conn, $_REQUEST["payer_authentication_transaction_id"] ?? ''),
            'auth_code' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_code"] ?? ''),
            'message' => mysqli_real_escape_string($db->conn, $_REQUEST["message"] ?? ''),
            'req_transaction_uuid' => mysqli_real_escape_string($db->conn, $_REQUEST["req_transaction_uuid"] ?? ''),
            'auth_reconciliation_reference_number' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_reconciliation_reference_number"] ?? ''),
            'op_payment_status' => mysqli_real_escape_string($db->conn, $_REQUEST["decision"] ?? ''),
            'auth_amount' => mysqli_real_escape_string($db->conn, $_REQUEST["auth_amount"] ?? ''),
        ];

        $result = $wplan->update_tgpolicy_status($updData);
        
        if(isset($_REQUEST["decision"]) && $_REQUEST["decision"] == "ACCEPT"){
            $wmobile_no = $wplan->getTGMobile(trim($_REQUEST["req_reference_number"] ?? ''));
            $policy_no = $wplan->getTGPolicyNo(trim($_REQUEST["req_reference_number"] ?? ''));
            $auth_amount = $_REQUEST["auth_amount"] ?? '';
            $seqNo = $wplan->getTGSeqNo(trim($_REQUEST["req_reference_number"] ?? ''));
            

    // Debug logging
    error_log("SMS Sending Variables: Mobile=$wmobile_no, Policy=$policy_no, Amount=$auth_amount");

            if($wmobile_no && $policy_no && $auth_amount) {
        $sms = new sendsms();
        $message = $sms->formatPaymentMessage($auth_amount, $policy_no);
        $result = $sms->send($wmobile_no, $message, $policy_no);
        
        // Debug logging
        error_log("SMS Send Result: " . print_r($result, true));
    } else {
        error_log("Missing required SMS data: " . 
                 "Mobile=" . ($wmobile_no ? 'Yes' : 'No') . ", " .
                 "Policy=" . ($policy_no ? 'Yes' : 'No') . ", " .
                 "Amount=" . ($auth_amount ? 'Yes' : 'No'));
    }
            
            // $auth_amount = $_REQUEST["auth_amount"] ?? '';
            
            // if($policy_no && $auth_amount && $seqNo) {
            //     $url_log = "http://34.87.118.90:8082/online-general/pay?policyNo=".$policy_no."&amount=".$auth_amount."&orderId=".$seqNo;
            //     $curl = curl_init($url_log);
            //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //     $response = curl_exec($curl);
            //     curl_close($curl);
            // }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Digital Portal | Co-Operative Insurance Company PLC</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --success-color: #28a745;
            --error-color: #dc3545;
        }

        .gradient-background {
            background: linear-gradient(135deg, #f6f9fc 0%, #eef2f7 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header-container {
          
            backdrop-filter: blur(10px);
           
            padding: 1rem 0;
            margin-bottom: 2rem;
            opacity: 0;
            transform: translateY(-20px);
            animation: slideDown 0.6s ease-out forwards;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-image {
            width: 40px;
            height: 40px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .logo-container:hover .logo-image {
            transform: scale(1.1);
        }

        .result-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem 2rem;
            margin: 2rem auto;
            max-width: 600px;
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.6s ease-out 0.3s forwards;
        }

        .status-icon {
            width: 120px;
            height: 120px;
            border-radius: 60px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: scale(0);
            animation: scaleIn 0.5s ease-out 0.6s forwards;
        }

        .status-icon.success {
            background: #d4edda;
            color: var(--success-color);
        }

        .status-icon.error {
            background: #f8d7da;
            color: var(--error-color);
        }

        .status-icon i {
            font-size: 4rem;
        }

        .result-message {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeIn 0.5s ease-out 0.9s forwards;
        }

        .action-button {
            margin-top: 2rem;
            padding: 0.8rem 2rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(10px);
            animation: fadeIn 0.5s ease-out 1.2s forwards;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .footer {
            margin-top: auto;
           
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding: 2rem 0;
            opacity: 0;
            animation: fadeIn 0.6s ease-out 1.5s forwards;
        }

        .contact-info {
            margin-top: 1rem;
        }

        .contact-info a {
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-info a:hover {
            color: var(--primary-color) !important;
        }

        @keyframes slideDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            to {
                transform: scale(1);
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="gradient-background">
    <div class="DivSai"></div>
    
    <div class="container">
        <!-- Header -->
        <header class="header-container">
            <div class="logo-container">
                <img src="general/assets/dist/img/logo.png" class="logo-image" alt="Logo">
                <span class="fs-4"><strong>CO-OPERATIVE INSURANCE COMPANY PLC</strong></span>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <?php if(isset($_REQUEST["decision"]) && $_REQUEST["decision"] == "ACCEPT"){ ?> 
                <div class="result-card text-center">
                    <div class="status-icon success">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="result-message">
                        <h2 class="mb-4">Thank You!</h2>
                        <p class="lead text-muted mb-4">Your payment was processed successfully.</p>
                        <a href="https://www.ci.lk" class="btn btn-primary btn-lg action-button">
                            Return to Home Page
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="result-card text-center">
                    <div class="status-icon error">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div class="result-message">
                        <h2 class="mb-4">Payment Failed</h2>
                        <p class="lead text-muted mb-4">We were unable to process your payment.</p>
                        <a href="https://www.ci.lk" class="btn btn-primary btn-lg action-button">
                            Try Again
                        </a>
                    </div>
                </div>
            <?php } ?>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md text-center">
                        <img src="general/assets/dist/img/logo.png" alt="" width="24" class="mb-2">
                        <strong>CO-OPERATIVE INSURANCE COMPANY PLC</strong>
                        <div class="contact-info text-muted">
                            "Co-operative Insurance House" No.74/5, Grandpass Road, Colombo 14.<br>
                            Tel: <a href="tel:0112 557300-9" class="link-info">0112 557300-9</a> | 
                            <a href="tel:0112 2472796" class="link-info">0112 2472796</a><br>
                            Email: <a href="mailto:info@coopinsu.com" class="link-info">info@coopinsu.com</a> | 
                            <a href="mailto:medical.unit@coopinsu.com" class="link-info">medical.unit@coopinsu.com</a><br>
                            <a href="https://www.ci.lk" class="link-primary">www.ci.lk</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
</body>
</html>