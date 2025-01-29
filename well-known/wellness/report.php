<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Digital Portal |  Co-Operative Insurance Company PLC</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .card-header{
        font-weight: 600;
        font-size:16px;
      }

    </style>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
  </head>
  <body>
<!-- <div class="DivSai"></div> -->
    
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check" viewBox="0 0 16 16">
          <title>Check</title>
          <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
      </svg>

        <div class="container py-3">
          <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
              <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="assets/dist/img/logo.png" width="40"  class="me-2" viewBox="0 0 118 94" role="img">
                <!-- <span class="fs-4">WELLNESS PLUS – CRITICAL ILLNESS INSURANCE PROPOSAL FORM</span> -->
                
                <span class="fs-4"><strong>CO-OPERATIVE INSURANCE COMPANY PLC</strong></span>
              </a>
            </div>
          </header>

  <main>
  <form name="wellness" method="post" action="confirm_payment.php">
  <!-- <form name="wellness" method="post" action="testdb.php"> -->

  <figure class="text-center">
  <blockquote class="blockquote">
    <p>WELLNESS PLUS</p>
  </blockquote>
  <figcaption class="blockquote-footer">
  Report
  </figcaption>
</figure>

  
<?php
include('dbconn.php');
include('report_controller.php');


$reportx = new report_controller;
?>
          

<div class="row">
  <div class="col-12">

    <!-- <div class="card mb-4">
      <div class="card-header bg-primary-subtle text-black">
            Personal Information
      </div>
      <div class="card-body px-5"> -->

      <table class="table table-light table-hover">
      <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Order ID</th>
        <th scope="col">Transaction ID</th>
        <th scope="col">Payer Authentication Transaction ID</th>
        <th scope="col">message</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Full Name</th>
        <th scope="col">NIC</th>
        <th scope="col">Amount</th>
    
        </tr>
    </thead>

    <?php
       $datax = $reportx->getAllData();
       echo ("<pre>");
       print_r($datax);

      while($row = mysqli_fetch_array($datax)){
       
    ?>

    <tr>
        <td scope="col"><?=$row['wp_id']?></td>
        <td scope="col"><?=$row['wp_order_id']?></td>
        <td scope="col"><?=$row['transaction_id']?></td>
        <td scope="col"><?=$row['payer_authentication_transaction_id']?></td>
        <td scope="col"><?=$row['message']?></td>
        <td scope="col"><?=$row['wp_payment_status']?></td>
        <td scope="col"><?=$row['wp_title']. " " .$row['wp_full_name']?></td>
        <td scope="col"><?=$row['wp_nic_pass']?></td>
        <td scope="col"><?=$row['wp_cover']?></td>
    </tr>

      <?php } ?>
    

      </table>

      

      <!-- </div>  -->
    <!-- </div> end card -->
  


     </form>
  </main>

<footer class="pt-4 my-md-5 pt-md-5 border-top">
  <div class="row">
    <div class="col-12 col-md">
      <img class="mb-2" src="assets/dist/img/logo.png" alt="" width="24">
      <strong>CO-OPERATIVE INSURANCE COMPANY PLC</strong>
      <small class="d-block mb-3 text-muted">“Co-operative Insurance House” No.74/5, Grandpass Road, Colombo 14. <br> Tel : <a href="tel:0112 557300-9" class="link-info">0112 557300-9 </a> |  <a href="tel:0112 2472796" class="link-info">0112 2472796</a> 	
        Email : <a href="mailto:info@coopinsu.com" class="link-info">info@coopinsu.com </a> | <a href="mailto:medical.unit@coopinsu.com" class="link-info">medical.unit@coopinsu.com</a>  <a href="www.ci.lk" class="link-primary">www.ci.lk</a> </small> 
    </div>
  </div>
</footer>
</div>


    
  </body>
</html>
