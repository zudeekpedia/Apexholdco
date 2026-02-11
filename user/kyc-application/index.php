<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php'; 
$pagename = 'Wallet';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Apexhold">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Investment, Apexholdco" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png" />
    <link rel="icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png">

    <!-- Site Title  -->
    <title>Wallet Balances - Apexholdco</title>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/b1e2cc998d.js" crossorigin="anonymous"></script>
    
    <meta name="referrer" content="no-referrer-when-downgrade">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/css/flaticon/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/css/main.css">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/css/fontawesome.css">
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Ubuntu|Noto Sans|Source Sans Pro|Roboto|Merriweather Sans">

    <link
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
      rel="stylesheet">


    <script src="https://www.apexholdco.com/assets/vendor/jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <style>
      input[type=file] {
        display: none;
      }

      ::-webkit-file-upload-button {
        background: none;
        border: 1px solid #74d6d8;
        color: #74d6d8;
        padding: 8px;
        border-radius: 8px;
      }
    </style>
  </head>

  <body style="background: #1a1d25;">
    <!-- Activity Loader -->
    <div class="dialog activityLoader" style="background: rgba(0, 0, 0, 0.8); display: none;">
      <div class="dialogContent text-center" style="background: none; box-shadow: none;">
        <div class="lds-dual-ring lds-dual-ring-grey"></div>
      </div>
    </div>
    <!-- Activity Loader -->

    <!-- messages -->

    <!-- end messages -->

    <div class="site-container">
      <!-- mobile nav bar -->
      <?php include_once '../pages/mobile-navbar.php';?>

      <!-- Side bar mobile -->
      <!-- sidebar Mobile -->
      <?php include_once '../pages/mobile-sidebar.php';?>
      <!-- jS -->
      <script>
        function joinTrade() {
          hideSideBarSm();
          $('#joinTrade').modal('show');
        }
      </script>
      <!-- --------------- -->

      <!-- --------------- -->

      <div class="container-fluid">
        <div class="row" style="height:100%;">
          <!-- Side bar desktop -->
          <?php include_once '../pages/desktop-sidebar.php';?>

          <!-- --------------- -->

          <div class="col-lg-10 sans-pro pb-lg-5" style="position: relative; z-index: 1;">
              <!-- Header desktop -->
            <!-- ## -->
            <?php include_once '../pages/desktop-header.php'; ?>
              <div class="row px-lg-5 mt-4 sans-pro">
    <div class="col-12">
      <h5>KYC User Verification</h5>
    </div>
    <div class="col-12">
    
    
      <div class="row">
        <div class="col-md-6">
          <div class="post-box border-none mt-3 p-3">
            <p class="boldText primary-color">Features</p>
            <p class="xsmall2 xsmall">
              <i class="fa fa-check greyWhite2 xsmall2 mr-2"></i>
              Speedy transaction verification
            </p>
            <p class="xsmall2 xsmall">
              <i class="fa fa-check greyWhite2 xsmall2 mr-2"></i>
              Unlock managed support
            </p>
            <p class="xsmall2 xsmall">
              <i class="fa fa-check greyWhite2 xsmall2 mr-2"></i>
              Unlimited daily withdrawal
            </p>
            <div class="mt-3 pt-3 border-t">
                
                                  <p class="xsmall2 xsmall my-border bg-warning p-1 rounded fit-content px-2">
                    <b>Verification status:</b>
                    <span class="redText ml-1">
                      Unverified
                    </span>
                  </p>
                    
    
            </div>
          </div>
        </div>
        
        
        <div class="col-md-6">
    
            <form action="https://www.peershieldex.com/user/kyc-application" method="POST" id="accountVerificationForm" class="mt-4 post-box p-3" enctype="multipart/form-data">            
                <h6 class="white-text">Personal Details</h6>
                <p class="xsmall m-0 border-bottom pb-2">
                  Your simple personal information required for identification.
                </p>
                <p class="xsmall2 m-0 d-flex mt-3">
                  <span class="error-text">*</span>
                  <span class="grey-color-2 ml-2">
                                          <em class="fas fa-info-circle" ></em>
                      Please type carefully and fill out the form with your
                      personal details. Your can’t edit these details once you
                      submitted the form.
                                      </span>
                  <span class="grey-color-2 ml-2">
                                          <em class="fas fa-info-circle" style="color: #ffc108"></em>
                      Your kyc has been submitted and it's under review, you will be notified shortly after review is completed.
                                      </span>                    
                                      
                </p>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Full Name</small>
                          <input type="text" name="name" value="<?= $fullname?>" required readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Date of Birth</small>
                          <input type="date" name="dob"  value="" required />
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Email address</small>
                          <input type="text" name="email-address" value="<?= $email?>" readonly />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Mobile Number</small>
                          <input type="tel" name="phone" value="" required />
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Current Home Address</small>
                          <input type="text" name="address" value="" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">City</small>
                          <input type="text" name="city" value="" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">State</small>
                          <input type="text" name="state" value="" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Country</small>
                          <select name="country" id="nationality">
                            <option value="Afghanistan">Afghanistan</option>
                              <option value="Albania">Albania</option>
                              <option value="Algeria">Algeria</option>
                              <option value="American Samoa">American Samoa</option>
                              <option value="Andorra">Andorra</option>
                              <option value="Angola">Angola</option>
                              <option value="Anguilla">Anguilla</option>
                              <option value="Antartica">Antarctica</option>
                              <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                              <option value="Argentina">Argentina</option>
                              <option value="Armenia">Armenia</option>
                              <option value="Aruba">Aruba</option>
                              <option value="Australia">Australia</option>
                              <option value="Austria">Austria</option>
                              <option value="Azerbaijan">Azerbaijan</option>
                              <option value="Bahamas">Bahamas</option>
                              <option value="Bahrain">Bahrain</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Barbados">Barbados</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Belgium">Belgium</option>
                              <option value="Belize">Belize</option>
                              <option value="Benin">Benin</option>
                              <option value="Bermuda">Bermuda</option>
                              <option value="Bhutan">Bhutan</option>
                              <option value="Bolivia">Bolivia</option>
                              <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                              <option value="Botswana">Botswana</option>
                              <option value="Bouvet Island">Bouvet Island</option>
                              <option value="Brazil">Brazil</option>
                              <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                              <option value="Brunei Darussalam">Brunei Darussalam</option>
                              <option value="Bulgaria">Bulgaria</option>
                              <option value="Burkina Faso">Burkina Faso</option>
                              <option value="Burundi">Burundi</option>
                              <option value="Cambodia">Cambodia</option>
                              <option value="Cameroon">Cameroon</option>
                              <option value="Canada">Canada</option>
                              <option value="Cape Verde">Cape Verde</option>
                              <option value="Cayman Islands">Cayman Islands</option>
                              <option value="Central African Republic">Central African Republic</option>
                              <option value="Chad">Chad</option>
                              <option value="Chile">Chile</option>
                              <option value="China">China</option>
                              <option value="Christmas Island">Christmas Island</option>
                              <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                              <option value="Colombia">Colombia</option>
                              <option value="Comoros">Comoros</option>
                              <option value="Congo">Congo</option>
                              <option value="Congo">Congo, the Democratic Republic of the</option>
                              <option value="Cook Islands">Cook Islands</option>
                              <option value="Costa Rica">Costa Rica</option>
                              <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                              <option value="Croatia">Croatia (Hrvatska)</option>
                              <option value="Cuba">Cuba</option>
                              <option value="Cyprus">Cyprus</option>
                              <option value="Czech Republic">Czech Republic</option>
                              <option value="Denmark">Denmark</option>
                              <option value="Djibouti">Djibouti</option>
                              <option value="Dominica">Dominica</option>
                              <option value="Dominican Republic">Dominican Republic</option>
                              <option value="East Timor">East Timor</option>
                              <option value="Ecuador">Ecuador</option>
                              <option value="Egypt">Egypt</option>
                              <option value="El Salvador">El Salvador</option>
                              <option value="Equatorial Guinea">Equatorial Guinea</option>
                              <option value="Eritrea">Eritrea</option>
                              <option value="Estonia">Estonia</option>
                              <option value="Ethiopia">Ethiopia</option>
                              <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                              <option value="Faroe Islands">Faroe Islands</option>
                              <option value="Fiji">Fiji</option>
                              <option value="Finland">Finland</option>
                              <option value="France">France</option>
                              <option value="France Metropolitan">France, Metropolitan</option>
                              <option value="French Guiana">French Guiana</option>
                              <option value="French Polynesia">French Polynesia</option>
                              <option value="French Southern Territories">French Southern Territories</option>
                              <option value="Gabon">Gabon</option>
                              <option value="Gambia">Gambia</option>
                              <option value="Georgia">Georgia</option>
                              <option value="Germany">Germany</option>
                              <option value="Ghana">Ghana</option>
                              <option value="Gibraltar">Gibraltar</option>
                              <option value="Greece">Greece</option>
                              <option value="Greenland">Greenland</option>
                              <option value="Grenada">Grenada</option>
                              <option value="Guadeloupe">Guadeloupe</option>
                              <option value="Guam">Guam</option>
                              <option value="Guatemala">Guatemala</option>
                              <option value="Guinea">Guinea</option>
                              <option value="Guinea-Bissau">Guinea-Bissau</option>
                              <option value="Guyana">Guyana</option>
                              <option value="Haiti">Haiti</option>
                              <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                              <option value="Holy See">Holy See (Vatican City State)</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hong Kong">Hong Kong</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Iran">Iran (Islamic Republic of)</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Jamaica">Jamaica</option>
                              <option value="Japan">Japan</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kazakhstan">Kazakhstan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Kiribati">Kiribati</option>
                              <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                              <option value="Korea">Korea, Republic of</option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                              <option value="Lao">Lao People's Democratic Republic</option>
                              <option value="Latvia">Latvia</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Liberia">Liberia</option>
                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                              <option value="Liechtenstein">Liechtenstein</option>
                              <option value="Lithuania">Lithuania</option>
                              <option value="Luxembourg">Luxembourg</option>
                              <option value="Macau">Macau</option>
                              <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                              <option value="Madagascar">Madagascar</option>
                              <option value="Malawi">Malawi</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Maldives">Maldives</option>
                              <option value="Mali">Mali</option>
                              <option value="Malta">Malta</option>
                              <option value="Marshall Islands">Marshall Islands</option>
                              <option value="Martinique">Martinique</option>
                              <option value="Mauritania">Mauritania</option>
                              <option value="Mauritius">Mauritius</option>
                              <option value="Mayotte">Mayotte</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Micronesia">Micronesia, Federated States of</option>
                              <option value="Moldova">Moldova, Republic of</option>
                              <option value="Monaco">Monaco</option>
                              <option value="Mongolia">Mongolia</option>
                              <option value="Montserrat">Montserrat</option>
                              <option value="Morocco">Morocco</option>
                              <option value="Mozambique">Mozambique</option>
                              <option value="Myanmar">Myanmar</option>
                              <option value="Namibia">Namibia</option>
                              <option value="Nauru">Nauru</option>
                              <option value="Nepal">Nepal</option>
                              <option value="Netherlands">Netherlands</option>
                              <option value="Netherlands Antilles">Netherlands Antilles</option>
                              <option value="New Caledonia">New Caledonia</option>
                              <option value="New Zealand">New Zealand</option>
                              <option value="Nicaragua">Nicaragua</option>
                              <option value="Niger">Niger</option>
                              <option value="Nigeria">Nigeria</option>
                              <option value="Niue">Niue</option>
                              <option value="Norfolk Island">Norfolk Island</option>
                              <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                              <option value="Norway">Norway</option>
                              <option value="Oman">Oman</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Palau">Palau</option>
                              <option value="Panama">Panama</option>
                              <option value="Papua New Guinea">Papua New Guinea</option>
                              <option value="Paraguay">Paraguay</option>
                              <option value="Peru">Peru</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Pitcairn">Pitcairn</option>
                              <option value="Poland">Poland</option>
                              <option value="Portugal">Portugal</option>
                              <option value="Puerto Rico">Puerto Rico</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Reunion">Reunion</option>
                              <option value="Romania">Romania</option>
                              <option value="Russia">Russian Federation</option>
                              <option value="Rwanda">Rwanda</option>
                              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                              <option value="Saint LUCIA">Saint LUCIA</option>
                              <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                              <option value="Samoa">Samoa</option>
                              <option value="San Marino">San Marino</option>
                              <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="Senegal">Senegal</option>
                              <option value="Seychelles">Seychelles</option>
                              <option value="Sierra">Sierra Leone</option>
                              <option value="Singapore">Singapore</option>
                              <option value="Slovakia">Slovakia (Slovak Republic)</option>
                              <option value="Slovenia">Slovenia</option>
                              <option value="Solomon Islands">Solomon Islands</option>
                              <option value="Somalia">Somalia</option>
                              <option value="South Africa">South Africa</option>
                              <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                              <option value="Span">Spain</option>
                              <option value="SriLanka">Sri Lanka</option>
                              <option value="St. Helena">St. Helena</option>
                              <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                              <option value="Swaziland">Swaziland</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Syria">Syrian Arab Republic</option>
                              <option value="Taiwan">Taiwan, Province of China</option>
                              <option value="Tajikistan">Tajikistan</option>
                              <option value="Tanzania">Tanzania, United Republic of</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Togo">Togo</option>
                              <option value="Tokelau">Tokelau</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Turkmenistan">Turkmenistan</option>
                              <option value="Turks and Caicos">Turks and Caicos Islands</option>
                              <option value="Tuvalu">Tuvalu</option>
                              <option value="Uganda">Uganda</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States" selected>United States</option>
                              <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                              <option value="Uruguay">Uruguay</option>
                              <option value="Uzbekistan">Uzbekistan</option>
                              <option value="Vanuatu">Vanuatu</option>
                              <option value="Venezuela">Venezuela</option>
                              <option value="Vietnam">Viet Nam</option>
                              <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                              <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                              <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                              <option value="Western Sahara">Western Sahara</option>
                              <option value="Yemen">Yemen</option>
                              <option value="Yugoslavia">Yugoslavia</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>;
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper m-0 mt-4">
                          <small class="greyWhite xsmall mb-2 d-block">Zip Code</small>
                          <input type="text"  name="zip_code" value="" required />
                        </div>
                    </div>
                </div>
                
                
                <h6 class="white-text mt-3">Document Upload</h6>
                <p class="xsmall m-0 border-bottom pb-2">
                  To verify your identity, please upload any of your document
                </p>
                <p class="xsmall2 m-0 d-flex mt-3">
                  <span class="error-text">*</span>
                  <span class="grey-color-2 ml-2">
                      In order to complete, please upload any of the following personal document.
                  </span>
                </p>
                <div class="mb-3">
                  <small class="xsmall">
                    Upload Government Issued Document (
                    <span class="greyWhite">e.g Drivers License, or International Passport</span> )
                  </small>
                </div>
                
                
                
                <div class="col-12 mt-4">
                    <label for="pop" class="site-yellow pointer btn-grey p-2 px-4 rounded">
                      Choose File &nbsp; <i class="fa fa-upload"></i>
                    </label>
                    <small class="d-block xsmall2">Maximum file size : 2MB</small>
                    <input type="file" class="fixIcon4" name="kyc_file" id="pop" style="background: none;" accept="image/*" onchange="loadFile(event)">
                    <img id="output" class="hide" style="width: 80px; height: 80px;" >
                </div>
                
                <div class="post-box border-none mt-3">
                    <p class="boldText primary-color">To avoid delays when verifying account, Please make sure:</p>
                    <p class="xsmall2 xsmall">
                      <i class="fa fa-check greyWhite2 xsmall2 mr-2"></i>
                      Chosen credential are not expired.
                    </p>
                    <p class="xsmall2 xsmall">
                      <i class="fa fa-check greyWhite2 xsmall2 mr-2"></i>
                      Document is in good condition and clearly visible.
                    </p>
                    <p class="xsmall2 xsmall">
                      <i class="fa fa-check greyWhite2 xsmall2 mr-2"></i>
                      There is no light glare on the card.
                    </p>
                </div>
                
                <button class="mt-4 meri-weda" type="submit">Submit</button>
          </form>
    
        </div>
      </div>
    </div>
</div>


<script>
    function loadFile(event) {
        // $('.fu-err-txt').hide()
        var output = document.querySelector('#output');
        var fileSize = event.target.files[0].size / 1024 / 1024; // in MB
        if (fileSize > 2){
            event.target.value = ''
            output.src = ''; output.classList.add('d-none');
            alert('File too large. Maximum size allowed : 2MB');
        }
        else{
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function (){
                URL.revokeObjectURL(output.src);
            }
            output.classList.remove('d-none');
        }
    };
</script>

                <div class="d-block d-lg-none text-center pb-4 mt-5 col-12">
                  <p><small>
                    Copyright &copy; <?= date('Y');?> Apexholdco. All rights reserved
                    </small></p>
                </div>
            </div>
        </div>
       </div>
    <!-- account control panel -->
    <?php include_once '../pages/account-control-panel.php';?>
    
    <!-- Join trade -->
    <div class="modal fade" id="joinTrade" tabindex="-1" aria-labelledby="joinTrade" aria-hidden="true"
      data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content mx-4 sans-pro" style="background: none;">
          <div class="modal-body p-0 dark-bg3 add-radius">
            <div class="d-flex p-3 border-bottom">
              <p class="m-0 bold-text flex-fill">Join Exchange room</p>
              <i class="material-icons grey-color pointer top-3" style="font-size: 18px !important;"
                data-dismiss="modal">close</i>
            </div>
            <div class="p-3">
              <p class="xsmall grey-color-2">
                Provide the exchange ID to join a trade
              </p>
              <form action="https://www.p2ptradetech.io/user/join-room" class="px-2" method="POST">
                  <input type="hidden" name="_token" value="f0HAVyfuqHtQ28T86WOvY6DznFtFFAiQfmKgv6Cs">                <div class="form-wrapper">
                  <input type="text" name="txn" class="dark-input" style="border: none !important;" placeholder=" " value="" required>
                  <label>Enter exchange ID</label>
                </div>
                <div class="my-4 align-center">
                  <button class="xsmall" type="submit">Join trade</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="withdrawal-modal" tabindex="-1" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content mx-4 sans-pro" style="background: none;">
                <div class="modal-body p-0 dark-bg3 add-radius">
                    <div class="d-flex p-3 border-bottom">
                      <p class="m-0 bold-text flex-fill">Request Withdrawal</p>
                      <i class="material-icons grey-color pointer top-3" style="font-size: 18px !important;"
                        data-dismiss="modal">close</i>
                    </div>
                    
                    <div class="p-3">
                        <form method="POST" action="https://www.apexholdco.com/user/withdrawal-request">
                            <input type="hidden" name="_token" value="kf7O8H8FT9rsEA7E0G86CYV6GBqdmitLrgFt0nLN">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="1">AXS</option>
                                                                            <option value="198">GARI</option>
                                                                    </select>
                                <label>Select withdrawal method</label>
                            </div>
                            
                            <div class="form-wrapper">
                                <input type="text" class="dark-input" style="border: none !important;" placeholder=" " name="amount" required value="" />
                                <label>Enter Amount</label>
                            </div>
                            <div class="form-wrapper">
                                <input type="text" class="dark-input" style="border: none !important;" placeholder=" " name="address" required value="" />
                                <label>Destination Address</label>
                            </div> 
                            
                            <p class="grey-color-2 xsmall">Note: Ensure that the address is correct and on the same network. Contact <a href="mailto:support@apexholdco.com" >support@apexholdco.com</a> on guide to pay.</label>
                            
                            <div class="my-4 align-center">
                              <button class="xsmall" type="submit">Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal Centered -->
    <div class="modal fade" id="crypto-fund-modal" tabindex="-1" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content mx-4 sans-pro" style="background: none;">
                <div class="modal-body p-0 dark-bg3 add-radius">
                    <div class="d-flex p-3 border-bottom">
                      <p class="m-0 bold-text flex-fill">Deposit Fund</p>
                      <i class="material-icons grey-color pointer top-3" style="font-size: 18px !important;"
                        data-dismiss="modal">close</i>
                    </div>
                    <div class="p-3">
                        <form method="POST" action="https://www.apexholdco.com/user/fund-account">
                            <input type="hidden" name="_token" value="f0HAVyfuqHtQ28T86WOvY6DznFtFFAiQfmKgv6Cs">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="1">AXS</option>
                                                                            <option value="200">APT</option>
                                                                            <option value="206">SUPER</option>
                                                                    </select>
                                <label>Select withdrawal method</label>
                            </div>
                            
                            <div class="form-wrapper">
                                <input type="text" class="dark-input" style="border: none !important;" placeholder=" " name="amount" required value="" />
                                <label>Enter Amount</label>
                            </div>
                            <div class="form-wrapper">
                                <input type="text" class="dark-input" style="border: none !important;" placeholder=" " name="address" required value="" />
                                <label>Destination Address</label>
                            </div> 
                            
                            <p class="grey-color-2 xsmall">Note: Ensure that the address is correct and on the same network. Contact <a href="mailto:support@apexholdcom.com" >support@apexholdco.com</a> on guide to pay.</label>
                            
                            <div class="my-4 align-center">
                              <button class="xsmall" type="submit">Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
      // account management modal
      const accountMangt = (e) => {
        $('.account-control-panel-overlay').fadeIn(150)
        $('.account-control-panel').show('drop', { direction: 'up' }, 200)
        // $(e).attr('onclick', 'closeAccountMangt(this)')
      }
      const closeAccountMangt = (e) => {
        $('.account-control-panel-overlay').fadeOut(150)
        $('.account-control-panel').hide('drop', { direction: 'up' }, 200)
        $(e).attr('onclick', 'accountMangt(this)')
        $('.accountMangtBtn').each(function () {
          $(this).attr('onclick', 'accountMangt(this)')
        })
      }
      
        function showToastError(msg){
            iziToast.error({
                title: 'Error',
                message: msg,
                position: 'topRight',
            });
        }
        
        function showToastSuccess(msg){
            iziToast.success({
                title: 'Success',
                message: msg,
                position: 'topRight',
            });
        }
        
                
                                    
        
    </script>

    <!-- jS -->
    <script src="https://www.apexholdco.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.apexholdco.com/assets/js/main.js"></script>
    <script src="https://www.apexholdco.com/assets/js/plugin/jquery/jquery-ui.min.js"></script>
    
        
    <script src="//code.tidio.co/7s84geea66p7betplhm1pensxlordca9.js" async></script>

  </body>

</html>