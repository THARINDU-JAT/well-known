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


<script>
 $(document).ready(function(){

  // OPT1
  $("#radioopt1-a").click(function(){
        	var radioValue = $("input[name='radioopt1']:checked").val();
            if(radioValue == "yes"){
              $("#opt1").attr('disabled', true);
            }else{
              $("#opt1").removeAttr("disabled");
            }
        });

    $("#radioopt1-b").click(function(){
      var radioValue = $("input[name='radioopt1']:checked").val();
        if(radioValue=="no"){
          $("#opt1").removeAttr("disabled");
        }else{
          $("#opt1").attr('disabled', true);
        }
    });

     // OPT2
  $("#radioopt2a").click(function(){
        	var radioValue = $("input[name='radioopt2']:checked").val();
            if(radioValue == "no"){
              $("#opt2").attr('disabled', true);
            }else{
              $("#opt2").removeAttr("disabled");
            }
        });

    $("#radioopt2b").click(function(){
      var radioValue = $("input[name='radioopt2']:checked").val();
        if(radioValue=="yes"){
          $("#opt2").removeAttr("disabled");
        }else{
          $("#opt2").attr('disabled', true);
        }
    });

         // OPT3
  $("#radioopt3a").click(function(){
        	var radioValue = $("input[name='radioopt3']:checked").val();
            if(radioValue == "no"){
              $("#opt3").attr('disabled', true);
            }else{
              $("#opt3").removeAttr("disabled");
            }
        });

    $("#radioopt3b").click(function(){
      var radioValue = $("input[name='radioopt3']:checked").val();
        if(radioValue=="yes"){
          $("#opt3").removeAttr("disabled");
        }else{
          $("#opt3").attr('disabled', true);
        }
    });

      // OPT4
  $("#radioopt4a").click(function(){
        	var radioValue = $("input[name='radioopt4']:checked").val();
            if(radioValue == "no"){
              $("#opt4").attr('disabled', true);
            }else{
              $("#opt4").removeAttr("disabled");
            }
        });

    $("#radioopt4b").click(function(){
      var radioValue = $("input[name='radioopt4']:checked").val();
        if(radioValue=="yes"){
          $("#opt4").removeAttr("disabled");
        }else{
          $("#opt4").attr('disabled', true);
        }
    });

  // OPT5
  $("#radioopt5a").click(function(){
        	var radioValue = $("input[name='radioopt5']:checked").val();
            if(radioValue == "no"){
              $("#opt5").attr('disabled', true);
            }else{
              $("#opt5").removeAttr("disabled");
            }
        });

    $("#radioopt5b").click(function(){
      var radioValue = $("input[name='radioopt5']:checked").val();
        if(radioValue=="yes"){
          $("#opt5").removeAttr("disabled");
        }else{
          $("#opt5").attr('disabled', true);
        }
    });

    
  // OPT6
  $("#radioopt6a").click(function(){
        	var radioValue = $("input[name='radioopt6']:checked").val();
            if(radioValue == "no"){
              $("#opt6").attr('disabled', true);
            }else{
              $("#opt6").removeAttr("disabled");
            }
        });

    $("#radioopt6b").click(function(){
      var radioValue = $("input[name='radioopt6']:checked").val();
        if(radioValue=="yes"){
          $("#opt6").removeAttr("disabled");
        }else{
          $("#opt6").attr('disabled', true);
        }
    });

      // OPT7
  $("#radioopt7a").click(function(){
        	var radioValue = $("input[name='radioopt7']:checked").val();
            if(radioValue == "no"){
              $("#opt7").attr('disabled', true);
            }else{
              $("#opt7").removeAttr("disabled");
            }
        });

    $("#radioopt7b").click(function(){
      var radioValue = $("input[name='radioopt7']:checked").val();
        if(radioValue=="yes"){
          $("#opt7").removeAttr("disabled");
        }else{
          $("#opt7").attr('disabled', true);
        }
    });

          // OPT8
  $("#radioopt8a").click(function(){
        	var radioValue = $("input[name='radioopt8']:checked").val();
            if(radioValue == "no"){
              $("#opt8").attr('disabled', true);
            }else{
              $("#opt8").removeAttr("disabled");
            }
        });

    $("#radioopt8b").click(function(){
      var radioValue = $("input[name='radioopt8']:checked").val();
        if(radioValue=="yes"){
          $("#opt8").removeAttr("disabled");
        }else{
          $("#opt8").attr('disabled', true);
        }
    });


    // OPT9
  $("#radioopt9a").click(function(){
        	var radioValue = $("input[name='radioopt9']:checked").val();
            if(radioValue == "no"){
              $("#opt9").attr('disabled', true);
            }else{
              $("#opt9").removeAttr("disabled");
            }
        });

    $("#radioopt9b").click(function(){
      var radioValue = $("input[name='radioopt9']:checked").val();
        if(radioValue=="yes"){
          $("#opt9").removeAttr("disabled");
        }else{
          $("#opt9").attr('disabled', true);
        }
    });


       // OPT10
  $("#radioopt10a").click(function(){
        	var radioValue = $("input[name='radioopt10']:checked").val();
            if(radioValue == "no"){
              $("#opt10").attr('disabled', true);
            }else{
              $("#opt10").removeAttr("disabled");
            }
        });

    $("#radioopt10b").click(function(){
      var radioValue = $("input[name='radioopt10']:checked").val();
        if(radioValue=="yes"){
          $("#opt10").removeAttr("disabled");
        }else{
          $("#opt10").attr('disabled', true);
        }
    });

          // OPT11
  $("#radioopt11a").click(function(){
        	var radioValue = $("input[name='radioopt11']:checked").val();
            if(radioValue == "no"){
              $("#opt11").attr('disabled', true);
            }else{
              $("#opt14").removeAttr("disabled");
            }
        });

    $("#radioopt11b").click(function(){
      var radioValue = $("input[name='radioopt11']:checked").val();
        if(radioValue=="yes"){
          $("#opt11").removeAttr("disabled");
        }else{
          $("#opt11").attr('disabled', true);
        }
    });

 

 });
 
</script>

    
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

  <figure class="text-center">
  <blockquote class="blockquote">
    <p>WELLNESS PLUS</p>
  </blockquote>
  <figcaption class="blockquote-footer">
  CRITICAL ILLNESS INSURANCE PROPOSAL FORM
  </figcaption>
</figure>

    
          

<div class="row">
  <div class="col-12">

    <div class="card mb-4">
      <div class="card-header bg-primary-subtle text-black">
            Personal Information
      </div>
      <div class="card-body px-5">

          <div class = "row mb-2">
              <div class="col-4">Title</div>
              <div class="col-8">
                  <select name="title" id="title" class="form-control" required >
                      <option value="" selected disabled>Please select</option>
                      <option value="Mr">Mr.</option>
                      <option value="Mr">Mrs.</option>
                      <option value="Mr">Miss.</option>
                  </select>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Name in full</div>
              <div class="col-8">
                <input type="text" mame="name" id="name" class="form-control" placeholder="Full Name" required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Address</div>
              <div class="col-8">
                <textarea name="address" id="address" class="form-control" placeholder="Address" rows=6 required></textarea>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">NIC/Passport No</div>
              <div class="col-8">
                <input type="text" mame="nic" id="nic" class="form-control" placeholder="NIC/Passport Number" required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Date of Birth</div>
              <div class="col-8">
                <input type="date" mame="dob" id="dob" class="form-control" placeholder="Date of Birth" required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Mobile Contact</div>
              <div class="col-8">
                <input type="tel" mame="txtMobile" id="txtMobile" class="form-control" placeholder="Mobile Number" required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Residence Contact </div>
              <div class="col-8">
                <input type="tel" mame="fixedcon" id="fixedcon" class="form-control" placeholder="Residence Contact No " required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Gender</div>
              <div class="col-8">
                  <select name="gender" id="gender" class="form-control" required>
                      <option value="" selected disabled>Please select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Occupation</div>
              <div class="col-8">
                <input type="text" mame="occupation" id="occupation" class="form-control" placeholder="Occupation/ Position held" required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Name & Address of Employer</div>
              <div class="col-8">
                <textarea name="empaddress" id="empaddress" class="form-control" placeholder="Name & Address of the Employe" rows=5 required></textarea>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Email Address</div>
              <div class="col-8">
                <input type="email" mame="emailadr" id="emailadr" class="form-control" placeholder="name@domain.com" required>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Marital Status</div>
              <div class="col-8">
                  <select name="mr_status" id="mr_status" class="form-control" required>
                      <option value="" selected disabled>Please select</option>
                      <option value="Male">Single</option>
                      <option value="Female">Married</option>
                  </select>
              </div>
          </div>

          <div class = "row mb-2">
              <div class="col-4">Cover Limit</div>
              <div class="col-8">
                  <select name="cover_limit" id="cover_limit" class="form-control">
                      <option value="" selected disabled>Please select</option>
                      <option value="6600">500,000 LKR | Premium 6600 LKR</option>
                      <option value="12500">1,000,000 LKR | Premium 12500 LKR</option>
                      <option value="18500">1,500,000 LKR | Premium 18500 LKR</option>
                      <option value="24500">2,000,000 LKR | Premium 24500 LKR </option>
                  </select>
              </div>
          </div>

            <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  
  <!-- </div> -->

  <div class="row">

  <div class="col-12">
      <div class="card">
      <div class="card-header bg-primary-subtle text-black">
      Other Information
      </div>
      <div class="card-body px-5">

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2 ">
              <div class="col-6">1. (a) Are you in good health?</div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt1" id="radioopt1-a" value="yes">
                <label class="form-check-label" for="radioopt1-a"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt1" id="radioopt1-b" value="no" checked>
                <label class="form-check-label" for="radioopt1-b"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt1" id="opt1" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (b) Have you any defect or infirmity? <br>If so, give details</div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt2" id="radioopt2a" value="yes" checked>
                <label class="form-check-label" for="radioopt2a"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt2" id="radioopt2b" value="no">
                <label class="form-check-label" for="radioopt2b"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt2" id="opt2" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (c) Have you undergone any surgical operation or being advised to do so? <br>Please give details and dates? </div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt3" id="radioopt3a" value="yes" checked>
                <label class="form-check-label" for="radioopt3"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt3" id="radioopt3b" value="no">
                <label class="form-check-label" for="radioopt3"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt3" id="opt3" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (d) have you ever suffered from spitting or vomiting of blood, any chest or lung or bone or joint illness,
                 rheumatic fever, heart or brain disease, hernia, tuberculosis rheumatism, varicose veins, insanity, cancer, paralysis, asthma, 
                 a fit of any kind, diabetes, appendicitis, any disease of the Kidneys, stomach or intestines, 
                 or from any nervous or mental disease or fever 4 week duration.<br>
              If so, please give particulars and dates.
              </div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt4" id="radioopt4a" value="yes" checked>
                <label class="form-check-label" for="radioopt4"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt4" id="radioopt4b" value="no">
                <label class="form-check-label" for="radioopt4"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt4" id="opt4" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (e) Have you been vaccinated any inoculated recently? <br>If so, please state in respect of what diseases and dates.</div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt5" id="radioopt5a" value="yes" checked>
                <label class="form-check-label" for="radioopt5"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt5" id="radioopt5b" value="no">
                <label class="form-check-label" for="radioopt5"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt5" id="opt5" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (f) Have you been exposed to any contagious or infectious disease during the last six weeks?</div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt6" id="radioopt6a" value="yes" checked>
                <label class="form-check-label" for="radioopt6"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt6" id="radioopt6b" value="no">
                <label class="form-check-label" for="radioopt6"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt6" id="opt6" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (g) Is there anything hazardous or unhealthy connection with your occupation, or habits of life which render you especially liable to injury or sickness or general ill health?</div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt7" id="radioopt7a" value="yes" checked>
                <label class="form-check-label" for="radioopt7"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt7" id="radioopt7b" value="no">
                <label class="form-check-label" for="radioopt7"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt7" id="opt7" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">1. (h) What illness, disease and injuries have you suffered from and when? <br> Is treatment still being received? </div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt8" id="radioopt8a" value="yes" checked>
                <label class="form-check-label" for="radioopt8"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt8" id="radioopt8b" value="no">
                <label class="form-check-label" for="radioopt8"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt8" id="opt8" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">2. (a) Give names and addresses of doctors from whom you have taken treatment within the last 3 years. <br>
              (b) Give the name and address of your family Doctor.
          </div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt9" id="radioopt9a" value="yes" checked>
                <label class="form-check-label" for="radioopt9"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt9" id="radioopt9b" value="no">
                <label class="form-check-label" for="radioopt9"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt9" id="opt9" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">3. Has any Office or insurer, for you, in respect of life, accident, sickness or hospital expense insurance:
                <br> (a) Postponed or declined a proposal
                <br> (b) Accepted on special terms
                <br> (c) Canceled or decline or to renew a policy
                <br> (d) Required special terms to grant renewal, 
                <br> if the answers to any of these questions “YES” please give below details 
          </div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt10" id="radioopt10a" value="yes" checked>
                <label class="form-check-label" for="radioopt10"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt10" id="radioopt10b" value="no">
                <label class="form-check-label" for="radioopt10"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt10" id="opt10" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-6">3. e). Have you ever made a claim under any accident, sickness or medical expenses policy? <br> If so, please give details. </div>
              <div class="col-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt11" id="radioopt11a" value="yes" checked>
                <label class="form-check-label" for="radioopt11"> Yes </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="radioopt11" id="radioopt11b" value="no">
                <label class="form-check-label" for="radioopt11"> No </label>
                </div>
              </div>
              <div class="col-5">
              <textarea name="opt11" id="opt11" class="form-control" placeholder="Please enter the reason..."></textarea>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
              <div class="col-12">
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <input required class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                  </div>
                  <!-- <input type="text" class="form-control" aria-label="Text input with checkbox" disabled value="I hereby declare that the above answers are true and complete and have withheld no information whatever material to this proposal. I agree that this proposal and declaration and the truth and completeness of the answers herein shall be the basis of contract between me and the Co-operative insurance Company PLC. If the answers now given by me cease to be true and / or incomplete. I undertake to give immediate written notification to the Company. I further agree to accept the usual from of Policy issued by the company subject to the terms and conditions therein contained. "> -->
                  <textarea class="form-control" rows=7 aria-label="Text input with checkbox">I hereby declare that the above answers are true and complete and have withheld no information whatever material to this proposal. I agree that this proposal and declaration and the truth and completeness of the answers herein shall be the basis of contract between me and the Co-operative insurance Company PLC. If the answers now given by me cease to be true and / or incomplete. I undertake to give immediate written notification to the Company. I further agree to accept the usual from of Policy issued by the company subject to the terms and conditions therein contained. </textarea>
                </div>
              </div>
          </div>

          <div class = "row mb-2 bg-dark-subtle">&nbsp;</div>

          <div class = "row mb-2">
          <div class="col-8"> &nbsp;</div>
            <div class="col-4">        
              <input type="button" class="btn btn-primary" value="Cancel">
              <input type="submit" name="paynow" id="paynow" class="btn btn-primary" value="Proceed to Payment">
            </div>
          </div>
          

          
                  
          



         

         


        
     

      <!-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
        Default checkbox
        </label>
      </div> -->


      <!--  -->
      </div>
      </div>
  </div>
</div>
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
