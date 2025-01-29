<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- //main css -->
    <!-- <link href="assets/dist/css/style.css" rel="stylesheet"> -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
   <!-- //main js -->
   <!-- <script type="text/javascript" src="assets/dist/js/script.js"></script> -->
  <script>

$(document).ready(function() {
    $('.pay').attr('disabled', true);
    $("#search").click(function() {

        var pol_no = $("#tpolicy").val();
        if (pol_no != "") {

            var $input = $('<button type="submit" name="paynow" id="paynow" class="w-30 btn btn-lg btn-danger mt-3">Pay Now</button>');
            // var pol_no = $("#tpolicy").val();
            //var $link = 'http://116.12.80.89:8001/ThirdPartyPolicy/GetPolicy?policyNo=' + pol_no;
            var $link = 'https://online.ci.lk/pol_info.php?policyNo=' + pol_no + '&type=thp';

            //alert ($link);

            $.getJSON($link, function(result) {

                //alert("sadasd");

                if (result.policyNo != null) {
                    $('.policy').empty().val(result.policyNo);
                    $('.vehi').empty().val(result.vehicleNo);
                    $('.name').empty().val(result.customerName);
                    $('.period').empty().val(result.policyPeriod);
                    $('.pre').empty().val(result.premium);


                    if (result.premium > 0) {
                        $('.pay').empty().val(result.premium);
                        $('.pay').attr('disabled', false);
                        $('.paybtn').empty().append($input);
                    } else {
                        $('.paybtn').empty();
                        $('.pay').attr('disabled', true);
                        $('.pay').empty().val("You have no outstanding to pay!");
                    }
                } else {
                    $('.policy').empty().append("No records found!");
                }




            });

        } else {
            alert("Please enter a policy number!");
        }



    });

});

  </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

   <!-- //title -->
    <title>Digital Portal | Co-Operative Insurance Company PLC</title>
    <!-- add icon link -->
    <link rel="icon" href="assets/dist/img/logo.png"
        type="image/x-icon" />


        <style>

.required-field::after {
    content: "*";
    color: red;
    margin-left: 4px;
}

.form-floating>label.required-field::after {
    position: absolute;
    top: 4px;
}

.card-header {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    border-bottom: none;
    position: relative;
    overflow: hidden;
}

.header-pattern {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.1;
    background-image: linear-gradient(45deg, #ffffff 25%, transparent 25%),
        linear-gradient(-45deg, #ffffff 25%, transparent 25%),
        linear-gradient(45deg, transparent 75%, #ffffff 75%),
        linear-gradient(-45deg, transparent 75%, #ffffff 75%);
    background-size: 20px 20px;
    background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
}

.company-logo {
    background: white;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header-content {
    position: relative;
    z-index: 1;
}

.header-badge {
    background: rgba(255, 255, 255, 0.1);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    margin-top: 8px;
    display: inline-block;
}

.bg {
    background-image: url('../third_party/assets/dist/img/payment_5.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}

.header-icon {
    font-size: 1.2rem;
    margin-right: 8px;
    vertical-align: middle;
}

.page-title {
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
    font-family: "Times New Roman", Times, serif;
}

.shadow-main {
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}


        </style>
</head>
<body class="bg shadow-lg">
    <div class="container py-4">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-9 shadow-main">
                    <div class="card shadow-main border-primary p-2 mb-2 bg-white rounded">
                        <div class="card-header shadow-main text-white p-6 mb-4  bg-white rounded">
                            <div class="header-pattern"></div>
                            <div class="header-content">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="company-logo me-3 rounded shadow-main">
                                        <img src="assets/dist/img/logo.png" width="40">
                                    </div>
                                    <div>
                                        <h4 class="page-title mb-0">
                                            <i class="fas fa-clock header-icon"></i>
                                            Third Party Insurance Policy Renewal
                                        </h4>
                                        <div class="header-badge">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Official Insurance Portal
                                        </div>

                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <small>
                                        <i class="fas fa-building me-2"></i>
                                        Co-operative Insurance Company PLC
                                    </small>
                                    <small class="header-badge">
                                        <i class="fas fa-clock me-1"></i>
                                        Quick Renewal Process
                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- Rest of the form content remains the same -->
                        <div class="card-body p-2 shadow-main p-3 mb-5 bg-white rounded">
                            <div class="mb-3">
                                <small class="text-danger">* Required fields</small>
                            </div>
                            <form name="thirdparty" method="post" action="confirm_payment.php" class="needs-validation" novalidate>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="tpolicy" id="tpolicy" class="form-control shadow-sm" class="form-control" placeholder="Third party policy number" oninput="this.value = this.value.toUpperCase()" required>
                                            <!-- PYB209000020 -->
                                            <label for="policyNumber" class="required-field">Third Party Policy No</label>
                                            <div class="invalid-feedback">Please enter policy number</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <button class="btn btn-primary px-2" type="button" name="search" id="search" value="Search">
                                            <i class="fas fa-search me-2"></i>Search
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control vehi" id="txtVehicleNumber" name="txtVehicleNumber" disabled placeholder="Enter vehicle number" required>
                                            <label for="vehicleNumber" class="required-field">Vehicle No</label>
                                            <div class="invalid-feedback">Please enter vehicle number</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control name" id="txtCustName" name="txtCustName" disabled placeholder="Enter customer name" required>
                                            <label for="customerName" class="required-field">Customer Name</label>
                                            <div class="invalid-feedback">Please enter customer name</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control period" id="txtCoverPeriod" name="txtCoverPeriod" disabled placeholder="Enter cover period" required>
                                            <label for="coverPeriod" class="required-field">Cover Period</label>
                                            <div class="invalid-feedback">Please enter cover period</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control pre" id="txtOutstandingPre" name="txtOutstandingPre" disabled placeholder="Enter premium" required>
                                            <label for="premium" class="required-field">Outstanding Premium</label>
                                            <div class="invalid-feedback">Please enter outstanding premium</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control pay" id="txtPaymentAmount" name="txtPaymentAmount" disabled placeholder="Enter payment amount" required>
                                            <label for="paymentAmount" class="required-field">Payment Amount</label>
                                            <div class="invalid-feedback">Please enter payment amount</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control shadow-sm" id="txtMobile" name="txtMobile" placeholder="Enter mobile number" pattern="[0-9]{10}" required>
                                            <label for="mobileNo" class="required-field">Mobile No</label>
                                            <div class="invalid-feedback">Please enter valid mobile number</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="chkTerms" name="chkTerms" value="tc" required>
                                            <label class="form-check-label required-field" for="terms">
                                               <strong> I have Read & Agreed to the <a href="#" class="text-primary">Terms & Conditions</a>
                                            </label></strong>
                                            <div class="invalid-feedback">You must agree to the terms and conditions</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="payment-methods">
                                                <img src="assets/dist/img/visa.png" class="img-fluid" width="80px" alt="Visa" class="me-2">
                                                <img src="assets/dist/img/unionpay.jpg" class="img-fluid" width="60px" alt="unionpay" class="me-2">
                                            </div>
                                            <div class="paybtn mb-5 mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center mt-9 text-muted">
                            <small>
                                <img class="mb-9" src="assets/dist/img/logo.png" alt="" width="24">
                                Co-operative Insurance House” No.74/5, Grandpass Road, Colombo 14.<br>
                                Tel: <a href="tel:0112557009" class="text-decoration-none">0112 557009</a> | <a href="tel:0112 2472796" class="text-decoration-none">0112 2472796</a> |
                                Email: <a href="mailto:info@coopinsu.com" class="text-decoration-none">info@coopinsu.com</a> | <a href="mailto:medical.unit@coopinsu.com" class="text-decoration-none">medical.unit@coopinsu.com</a> |
                                Web: <a href="https://www.ci.lk/" class="text-decoration-none">www.ci.lk</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <!-- //formValidation js -->
   <!-- <script type="text/javascript" src="assets/dist/js/formValidation.js"></script> -->
<script>
   
   // Enable Bootstrap form validation
(function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
</body>

</html>