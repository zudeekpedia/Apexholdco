<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php'; 
$pagename = 'Create Trade';?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Apexholdco">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Apexholdco, Apexholdco" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png" />
    <link rel="icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png">

    <!-- Site Title  -->
    <title>Create Trade - Apexholdco</title>

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
            <?php include_once '../pages/desktop-header.php';?>








            

  <div class="d-block d-md-none mt-3">
    <i class="material-icons dark-bg2 px-2 py-1 grey-color-2"
      style="font-size: 18px !important; border-radius: 4px;" onclick="history.go(-1)">west</i>
  </div>
  <!-- --- -->
  <!-- --- -->
  
<div class="text-center mb-3 mt-4 roboto">
    <img src="https://www.apexholdco.com/assets/images/icon-convert.svg" alt="" style="width: 40px; height: 40px;">
    <span style="font-size: 20px;" class="top-2 bold-text">Start Trade</span>
    <small class="xsmall grey-color-2 d-block mt-2">
        Exchange crypto securely with our custom-developed P2P Trading system.
    </small>
</div>



<form action="https://www.apexholdco.com/user/data/create-trade.php" method="POST" id="createEscrowForm">
    <div class="post-form mt-4 mx-auto p-4 dark-bg shadow-none">
         <?php if (isset($_GET['errormessage'])): ?>
                        <?php if ($_GET['errormessage']): ?>
                        <p class="bg-danger p-2 card text-white text-center"><?= $_GET['errormessage'] . "<a style='text-decoration:underline; color:grey' href='../deposit'>Deposit</a>";?></p>
                        <?php elseif ($_GET['errormessage'] == 'email' || $_GET['errormessage'] == 'pass'): ?>
                        <p class="bg-warning p-2 card text-white text-center">Incorrect email or password</p>
                        <?php elseif ($_GET['errormessage'] == 'noaccount'): ?>
                        <p class="bg-warning p-2 card text-white text-center">No data for this account</p>
                        <?php else: ?>
                        <p class=""></p>
                        <?php endif; ?>
                        <?php endif; ?>   
        <div class="row">
            <div class="my-2 col-12">
                <div class="dark-bg3 p-2" style="border-radius: 8px; cursor: pointer; border-color: #121F27;">
                    <label class="xsmall2 px-2 grey-color-2 bold-text">You Send</label>
                    <div class="row">
                        <div class="col-6" data-toggle="modal" data-target="#selectTokenToSend">
                            <div class="dark-bg2" style="border-radius: 8px;">
                                <div class="d-flex px-2">
                                    <img src="https://www.peershieldex.com/uploads/coins/170615429523355.png" alt="" style="width: 20px; height: 20px;" id="token1Image" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="mt-2 top-1 ts1-img">
                                    <input type="text" name="sender_token" id="token1Name" value="0X0" class="form-control white-text" style="border: none; font-weight: bold; background: transparent;" readonly>
                                    <i class="material-icons grey-color mt-2">
                                        keyboard_arrow_down
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 border-r">
                            <input type="number" name="buyer_amount" class="form-control white-text text-right" id="ttsValue" style="font-size: 18px; border: none; font-weight: bold; background: transparent;" placeholder="0.00" step="any" required>
                            <input type="hidden" name="currency_1" id="token1Id" value="86">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- demacate -->
        <div class="my-2 fit-content p-2 dark-bg add-radius mx-auto">
            <img src="https://www.apexholdco.com/assets/images/swapy.png" alt="" style="width: 20px; height: 20px;">
        </div>
        <!-- -------- -->
    
        <!-- ################################# -->
    
        <div class="row">
            <div class="col-12">
                <div class="dark-bg3 p-2" style="border-radius: 8px; cursor: pointer;">
                   
                    <label class="xsmall2 px-2 grey-color-2 bold-text">You Receive</label>
                    <div class="row">
                        <div class="col-6" data-toggle="modal" data-target="#selectTokenToRecieve">
                            <div class="dark-bg2" style="border-radius: 8px;">
    
                                <div class="d-flex px-2">
                                    <img src="https://www.peershieldex.com/uploads/coins/170615429523355.png" alt="" id="token2Image" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="mt-2 top-1 ts2-img">
    
                                    <input type="text" name="receiver_token" id="token2Name" value="0X0" class="form-control white-text" style="border: none; font-weight: bold; background: transparent;" readonly>
                                    <i class="material-icons grey-color mt-2">
                                        keyboard_arrow_down
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 border-r">
                            <input type="number" name="seller_amount" id="ttrValue" class="form-control white-text text-right" style="font-size: 18px; border: none; font-weight: bold; background: transparent;" placeholder="0.00" step="any" required>
                            <input type="hidden" name="currency_2" id="token2Id" value="86">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12 mb-2">
                <small class="grey-color-2">
                    <b>Select role type</b>
                </small>
                <input type="hidden" name="user_role" id="traderRole" class="form-control" value="seller">
            </div>
    
            <div class="col-8">
                <div class="my-border p-1" style="border-radius: 4px;">
                    <div class="row">
                        <div class="col-6">
                            <div class="polygon-btn r-btn pointer" onclick="setRole(this, 'seller')">Seller</div>
                        </div>
                        <div class="col-6">
                            <div class="polygon-btn r-btn pointed-left polygon-btn-blank pointer" onclick="setRole(this, 'buyer')">Buyer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="row align-items-end">
            <!--<small class="grey-color-2">-->
            <!--    <b>Partner's Email</b>-->
            <!--</small>-->
            <div class="col-6">
                <div class="form-wrapper">
                    <input type="email" class="dark-input" style="border: none !important;" placeholder=" " name="seller_email" value="" required />
                    <label>Seller's Email</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-wrapper">
                    <input type="email" class="dark-input" style="border: none !important;" placeholder=" " name="buyer_email" value="" required />
                    <label>Buyer's Email</label>
                </div>
            </div>
        </div>
    </div>
        
        
    
    
    <div class="post-form mx-auto p-4 mt-4 dark-bg shadow-none" style="border-radius: 8px;">
    
        <div class="row align-items-end">
            <div class="col-12">
                <small class="grey-color-2">
                    <b>Who pays trade fee?</b>
                </small>
                <div class="form-wrapper">
                    <select class="dark-input" style="border: none !important;" placeholder=" " name="fee_split" required>
                            <option value="equal" >Split</option>
                            <option value="seller" >Seller</option>
                            <option value="buyer" >Buyer</option>
                    </select>
                    <!--<label>Select Your Role</label>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5 class="moreWhite reduceH5">
                    <small class="grey-color-2 xsmall">Exchange fee</small><br>
                    <b>2%</b>
                </h5>
            </div>
        </div>
    </div>
        
    
        <!-- ## -->
    <div class="post-form mt-4  mx-auto">
        <button class="Btn2" type="submit">
            Start Trade
        </button>
    </div>
</form>


            
            
            
            
            
            



          <div class="d-block d-lg-none text-center pb-4 mt-5 col-12">
            <p><small>
                Copyright &copy; <?= date('Y');?> Apexholdco. All rights reserved
              </small></p>
          </div>
          


        </div>
        
        


<!-- Modals -->
<!-- Token container -->
<div class="modal fade" id="selectTokenToSend" tabindex="-1" aria-labelledby="selectTokenToSend" aria-hidden="true" data-keyboard="false" data-backdrop="none">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content mx-4" style="background: none;">
            <div class="modal-body p-0 pb-4 dark-bg3" style="overflow-x: hidden;">
                <div id="tokenSelectContainer">

                    <div class="sans-pro">
                        <div class="d-flex border-bottom p-3 dark-bg3">
                            <input type="text" id="searchCoinList" class="form-control dark-input"
                                   placeholder="Search by Coin/Token"
                                   style="color: #fff; border: none !important; background: transparent; border-radius: 30px;">
                            <p data-dismiss="modal"
                               class="pointer xsmall primary-color m-0 ml-4 bold-text mt-2">Cancel</p>
                        </div>

                        <p class="meri-weda xsmall grey-color-2 mt-4 px-4">Coin/Token List</p>

                        <div style="height: 350px; overflow-y: auto;" class="px-4 style-scrollbar">
                            
                                                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setExchangeToken1(this, '0X0', '86')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615429523355.png" alt="0x0 Ai" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">0X0</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">0x0 Ai</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setExchangeToken1(this, 'AAVE', '266')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1722446000aave1720519913836.png" alt="Aave" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AAVE</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aave</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setExchangeToken1(this, 'ACA', '238')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1720018654acala network1636358113522.png" alt="Acala" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ACA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Acala</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setExchangeToken1(this, 'ACS', '146')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708532255access_protocol1670852790959.png" alt="Access Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ACS</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Access Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setExchangeToken1(this, 'ACX', '288')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/172603994360x60.across_protocol1668170687266.png" alt="Across Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ACX</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Across Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setExchangeToken1(this, 'ZTX', '159')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1710092453ztx1697447616622.png" alt="ZTX" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ZTX</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">ZTX</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                        
                        </div>
                    </div>





                    <script>
                        function setExchangeToken1(e, token, id) {
                            $('.tokenSelectIndicator').each(function () {
                                $(this).removeClass('primary-color fa-check-circle')
                                $(this).addClass('grey-color fa-circle-o')
                            })
                            indicator = $(e).find('i')[0]
                            $(indicator).removeClass('grey-color fa-circle-o')
                            $(indicator).addClass('fa-check-circle primary-color')
                            $('#token1Id').val(id)
                            $('#token1Name').val(token);

                            // set Image
                            tImage = $(e).find('img')[0];
                            $('#token1Image').attr('src', tImage.src)
                        }
                        //
                        $(function () {
                            $('#searchCoinList').on('keyup', (e) => {
                                var value = $(e.target).val().toLowerCase();
                                $('.tokens').each(function () {
                                    $(this).addClass('hide')
                                    if ($(this).text().toLowerCase().indexOf(value) > -1) { $(this).removeClass('hide') }
                                })
                            })
                        })
                    </script>
                </div>
                <div class="mt-4 px-4 align-center border-top pt-3">
                    <button class="bold-text xsmall" data-dismiss="modal">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="selectTokenToRecieve" tabindex="-1" aria-labelledby="selectTokenToRecieve" aria-hidden="true" data-keyboard="false" data-backdrop="none">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content mx-4" style="background: none;">
            <div class="modal-body p-0 pb-4 dark-bg3" style="overflow-x: hidden;">
                <div id="tokenSelectContainer">
                    <div class="sans-pro">
                        <div class="d-flex border-bottom p-3 dark-bg3">
                            <input type="text" id="searchCoinList2" class="form-control dark-input"
                                   placeholder="Search by Coin/Token"
                                   style="color: #fff; border: none !important; background: transparent; border-radius: 30px;">
                            <p data-dismiss="modal"
                               class="pointer xsmall primary-color m-0 ml-4 bold-text mt-2">Cancel</p>
                        </div>

                        <p class="meri-weda xsmall grey-color-2 mt-4 px-4">Coin/Token List</p>

                        <div style="height: 350px; overflow-y: auto;" class="px-4 style-scrollbar">
                            
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, '0X0', '86')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615429523355.png" alt="0x0 Ai" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">0X0</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">0x0 Ai</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AAVE', '266')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1722446000aave1720519913836.png" alt="Aave" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AAVE</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aave</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ACA', '238')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1720018654acala network1636358113522.png" alt="Acala" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ACA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Acala</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ACS', '146')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708532255access_protocol1670852790959.png" alt="Access Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ACS</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Access Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ACX', '288')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/172603994360x60.across_protocol1668170687266.png" alt="Across Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ACX</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Across Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ATH', '227')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1719493054aethir1690447748120.png" alt="Aethir" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ATH</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aethir</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AEVO', '268')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1722845251aevo1682004994667.png" alt="Aevo" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AEVO</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aevo</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AMB', '276')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1724526541air_dao1667475788052.png" alt="AirDAO" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AMB</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">AirDAO</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AIT', '153')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1710000349ait_protocol1701111967924.png" alt="AIT Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AIT</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">AIT Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AKT', '44')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17058038667431.png" alt="Akash Network" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AKT</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Akash Network</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AZERO', '75')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615196211976.png" alt="Aleph Zero" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AZERO</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aleph Zero</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ALGO', '152')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708989879algorand1539001835369.png" alt="Algorand" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ALGO</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Algorand</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'NXRA', '88')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615458023825.png" alt="AllianceBlock Nexera" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">NXRA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">AllianceBlock Nexera</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ALPACA', '107')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708712049alpaca finance1630576073699.png" alt="Alpaca Finance" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ALPACA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Alpaca Finance</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ANALOS', '154')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1709061549analo_s1703145020900.png" alt="analoS" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ANALOS</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">analoS</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ANKR', '257')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1721542816ankr network1603390548710.png" alt="Ankr Network" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ANKR</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Ankr Network</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ANYONE', '187')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17227604931713499054ator_protocol1692348868673.png" alt="ANyONe Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ANYONE</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">ANyONe Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'APRS', '253')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1721209067apeiron1652197519430.png" alt="Apeiron" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">APRS</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Apeiron</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'APX', '174')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1711971021apollo_x1698844395689.png" alt="ApolloX" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">APX</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">ApolloX</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'APT', '200')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1715155786aptos1652797629854.png" alt="Aptos" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">APT</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aptos</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ANT', '188')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1713499197aragon1707904786012.png" alt="Aragon" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ANT</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Aragon</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ARB', '156')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1709230293arbitrum1696871846920.png" alt="Arbitrum" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ARB</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Arbitrum</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ARC', '294')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/172858160460x60.arc1724081692876.png" alt="Arc" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ARC</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Arc</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ARKM', '85')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615404327565.png" alt="Arkham" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ARKM</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Arkham</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ALI', '255')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1721499697alethea artificial liquid intelligence token1644912918929.png" alt="Artificial Liquid Intelligence" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ALI</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Artificial Liquid Intelligence</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'FET', '301')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/173038589860x60.artificial_superintelligence_alliance1719840655318.png" alt="Artificial Superintelligence Alliance" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">FET</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Artificial Superintelligence Alliance</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ATR', '179')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1712428423artrade1695227826274.png" alt="Artrade" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ATR</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Artrade</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AR', '176')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1712341308arweave1603906160150.png" alt="Arweave" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AR</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Arweave</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ASTR', '36')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1705800886astar.png" alt="Astar" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ASTR</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Astar</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ATM', '201')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1715529191atletico de madrid fan token1609326810767.png" alt="Atletico Madrid Fan Token" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ATM</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Atletico Madrid Fan Token</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'OLAS', '177')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1712354007autonolas1698077282311.png" alt="Autonolas" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">OLAS</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Autonolas</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AVAX', '9')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1705794264avalanche-avax-logo.png" alt="Avalanche" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AVAX</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Avalanche</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'XAVA', '64')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1707787695avalaunch1621519038262.png" alt="Avalaunch" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">XAVA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Avalaunch</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AXL', '70')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615105217799.png" alt="Axelar" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AXL</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Axelar</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'AXS', '1')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17061505696783.png" alt="Axie Infinity" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">AXS</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Axie Infinity</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BAKE', '81')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708352930bakeryswap1600938595108.png" alt="Bakery" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BAKE</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bakery</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BOND', '105')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17061571997440.png" alt="BarnBridge" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BOND</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">BarnBridge</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BZR', '235')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1719874228bazaars1690549770742.png" alt="Bazaars" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BZR</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bazaars</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BEAM', '125')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170644789528298.png" alt="Beam" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BEAM</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Beam</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BIGTIME', '77')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170615247128230(1).png" alt="Big Time" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BIGTIME</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Big Time</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BSW', '128')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1706630830biswap1678970997883.png" alt="Biswap" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BSW</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Biswap</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BTC', '5')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1705793473bitcoin-btc-logo.png" alt="Bitcoin" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BTC</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bitcoin</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BCH', '14')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1705795599bitcoin-cash-bch-logo.png" alt="Bitcoin Cash" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BCH</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bitcoin Cash</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BGB', '127')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/170644984911092.png" alt="Bitget Token" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BGB</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bitget Token</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'TAO', '141')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708250026bittensor1670850707129.png" alt="Bittensor" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">TAO</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bittensor</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BTT', '185')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1713180895bit_torrent_new1694938774752.png" alt="BitTorrent" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BTT</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">BitTorrent</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BLAST', '254')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1721388355blast1719473292032.png" alt="Blast" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BLAST</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Blast</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BLOB', '140')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708170856PurpleBlob.png" alt="Blob" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BLOB</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Blob</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BLUR', '210')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1716535571blur1668152400608.png" alt="Blur" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BLUR</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Blur</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BNB', '7')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17077876711839.png" alt="BNB" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BNB</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">BNB</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BONE', '26')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1705797315bone-shibaswap-bone-logo.png" alt="Bone ShibaSwap" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BONE</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bone ShibaSwap</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'FIDA', '111')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17061581907978.png" alt="Bonfida" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">FIDA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bonfida</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BONK', '42')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1708352640bonk1672306100278.png" alt="Bonk" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BONK</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Bonk</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BOOM', '275')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/172431963131682.png" alt="BOOM" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BOOM</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">BOOM</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BOSON', '104')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/17061571108827.png" alt="Boson Protocol" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BOSON</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Boson Protocol</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BB', '202')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1715641480bounce_bit1709137221002.png" alt="BounceBit" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BB</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">BounceBit</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'BRETT', '242')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1720737042based_brett1710148869308.png" alt="Brett" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">BRETT</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Brett</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            <div class="d-flex tokens2 pointer cs-list-item p-3" onclick="setExchangeToken2(this, 'ADA', '23')">
                                                                        <img src="https://www.peershieldex.com/uploads/coins/1705796816cardano-ada-logo.png" alt="Cardano" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2">
                                                                        <p class="m-0 bold-text ml-3">ADA</p>
                                    <p class="m-0 grey-color ml-4 xsmall top-2 flex-fill" style="text-transform: capitalize;">Cardano</p>
                                    <i class="fa fa-circle-o fixIcon tokenSelectIndicator grey-color" style="font-size: 18px;"></i>
                                </div>
                                                            
                        </div>
                    </div>



                    <script>
                        function setExchangeToken2(e, token, id) {
                            $('.tokenSelectIndicator').each(function () {
                                $(this).removeClass('primary-color fa-check-circle')
                                $(this).addClass('grey-color fa-circle-o')
                            })
                            indicator = $(e).find('i')[0]
                            $(indicator).removeClass('grey-color fa-circle-o')
                            $(indicator).addClass('fa-check-circle primary-color')
                            $('#token2Id').val(id)
                            $('#token2Name').val(token);
                            // set Image
                            tImage = $(e).find('img')[0];
                            $('#token2Image').attr('src', tImage.src)
                        }
                        //
                        $(function () {
                            $('#searchCoinList2').on('keyup', (e) => {
                                var value = $(e.target).val().toLowerCase();
                                $('.tokens2').each(function () {
                                    $(this).addClass('hide')
                                    if ($(this).text().toLowerCase().indexOf(value) > -1) { $(this).removeClass('hide') }
                                })
                            })
                        })
                    </script>
                </div>
                <div class="mt-4 px-4 align-center border-top pt-3">
                    <button class="bold-text xsmall" data-dismiss="modal">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
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
              <form action="https://www.peershieldex.com/user/join-room" class="px-2" method="POST">
                  <input type="hidden" name="_token" value="8K7YSJeRddchPZKmalvZUqigkTNpB3MGqgQOmigj">                <div class="form-wrapper">
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
                        <form method="POST" action="https://www.peershieldex.com/user/fund-account">
                            <input type="hidden" name="_token" value="8K7YSJeRddchPZKmalvZUqigkTNpB3MGqgQOmigj">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="86">0X0</option>
                                                                            <option value="266">AAVE</option>
                                                                            <option value="238">ACA</option>
                                                                            <option value="146">ACS</option>
                                                                            <option value="288">ACX</option>
                                                                            <option value="227">ATH</option>
                                                                    </select>
                                <label>Select currency</label>
                            </div>
                            <div class="form-wrapper">
                                <input type="text" class="dark-input" style="border: none !important;" placeholder=" " name="amount" required />
                                <label>Enter Currency Amount</label>
                            </div>
                            
                            <p>
                                <a href="#">Request Currency</a>
                            </p>
                            
                            <div class="my-4 align-center">
                              <button class="xsmall" type="submit">Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->
    <!-- Modal Centered -->
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
                        <form method="POST" action="https://www.peershieldex.com/user/withdrawal-request">
                            <input type="hidden" name="_token" value="8K7YSJeRddchPZKmalvZUqigkTNpB3MGqgQOmigj">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <?php
                            $tokens = getAllTokens();
                            
                            
                            if (!empty($tokens)) :
                                $counter = 1;
                                foreach ($tokens as $token) :
                                    //Get user total token balance by token id and token nam
                                    $token_bal = getTokenBalance($token['token_id'],$token['name'],$uID);
                                    $token_bal = number_format((float)$token_bal, 4, '.', '');
                                    
                            ?>
                                                                            <option value="<?= $token['token_id']?>"><?= $token['symbol']; ?></option>
                                                                            <?php
                            endforeach;
                            else :
                            ?>
                            <div>
                                <p>No Coin Available</p>
                            </div>
                            <?php endif; ?>
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
                            
                            <p class="grey-color-2 xsmall">Note: Ensure that the address is correct and on the same network. Contact <a href="mailto:support@p2ptradetech.io" >support@p2ptradetech.io</a> on guide to pay.</label>
                            
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