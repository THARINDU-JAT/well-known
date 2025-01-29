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

    </style>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
 $(document).ready(function(){
  $('.pay').attr('disabled', true);
  $("#search").click(function(){

    var $input = $('<button type="submit" name="paynow" id="paynow" class="w-30 btn btn-lg btn-danger mt-3">Pay Now</button>');
    var pol_no = $("#tpolicy").val();
    var $link = 'http://116.12.80.89:8001/ThirdPartyPolicy/GetPolicy?policyNo=' + pol_no;


    $.getJSON($link, function(result){

      if(result.policyNo !=null){ 
        $('.policy').empty().val(result.policyNo);
        $('.vehi').empty().val(result.vehicleNo);
        $('.name').empty().val(result.customerName);
        $('.period').empty().val(result.policyPeriod);
        $('.pre').empty().val(result.premium);
       
        
        if(result.premium > 0){
          $('.pay').empty().val(result.premium);
          $('.pay').attr('disabled', false);
          $('.paybtn').empty().append($input);
        }else{
          $('.paybtn').empty();
          $('.pay').attr('disabled', true);
          $('.pay').empty().val("You have no outstanding to pay!");
        }
      }else{
        $('.policy').empty().append("No records found!");
      }
  

    

    });
  });
  
});
</script>

    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
  </head>
  <body>
<div class="DivSai"></div>
    
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

  <figure class="text-center">
  <blockquote class="blockquote">
    <p>THIRD PARTY </p>
  </blockquote>
  <figcaption class="blockquote-footer">
  INSURANCE POLICY RENEWAL
  </figcaption>
</figure>


  <main>
    <div class="row row-cols-1 row-cols-md-1 mb-3 mt-5 text-center">
      
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 bg-primary-subtle text-black">
           <i>Renew your policy</i>
          </div>

          <div class="card-body">
            <form name="thirdparty" method="post" action="confirm_payment.php">

            <div class="row">
              <div class="col-4"><p class="font-weight-bold"> Third Party Policy Number </p></div>
              <div class="col-5"><input type="text" name="tpolicy" id="tpolicy" class="form-control" placeholder="Third party policy number" value="PYB109000047"> </div>
              <div class="col-2"><input type="button" name="search" id="search" class="form-control btn btn-primary" value="Search"> </div>
            </div>
            <!-- <div class="row mt-3">
              <div class="col-6"></div>
              <div class="col-6"><input type="button" name="search" id="search" class="form-control btn btn-primary" value="Search"> </div>
            </div> -->
            
            
            <!-- <ul class="list-unstyled mt-3 mb-4"> -->

              <!-- <div class="row mt-2">
                <div class="col-4">Policy Number</div>
                <div class="col-5">
                  <input type="text" class="form-control policy" id="txtPolicyNumber" name="txtPolicyNumber" disabled>
                </div>
              </div> -->

              <div class="row mt-2">
                <div class="col-4">Vehicle Number</div>
                <div class="col-5">
                  <input type="text" class="form-control vehi" id="txtVehicleNumber" name="txtVehicleNumber" disabled>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-4">Customer Name</div>
                <div class="col-5">
                  <input type="text" class="form-control name" id="txtCustName" name="txtCustName" disabled>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-4">Cover Period</div>
                <div class="col-5">
                  <input type="text" class="form-control period" id="txtCoverPeriod" name="txtCoverPeriod" disabled>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-4">Outstanding Premium</div>
                <div class="col-5">
                  <input type="text" class="form-control pre" id="txtOutstandingPre" name="txtOutstandingPre" disabled>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-4">Payment Amount</div>
                <div class="col-5">
                  <input type="text" class="form-control pay" id="txtPaymentAmount" name="txtPaymentAmount" disabled>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-4">Mobile No</div>
                <div class="col-5">
                  <input type="tel" class="form-control" id="txtMobile" name="txtMobile" placeholder="07xxxxxxxx" required>
                </div>
              </div>


              <div class="row mt-2 ">
                <div class="col">
                  <label><input required type="checkbox" id="chkTerms" name="chkTerms" value="tc"><strong> I have read &amp; agreed to the<a href="#"> terms &amp; conditions.</a></strong></label>						
              </div>
              </div>

        
            <div class="paybtn mb-5 mt-2"></div>
         
            <div class="row mt-2">
              <div class="col"><img src="assets/dist/img/unionpay.jpg" class="img-fluid" width="60px"><img src="assets/dist/img/visa.png" class="img-fluid"></div> 
              <!-- <div class="col-3"></div>    -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

   
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
