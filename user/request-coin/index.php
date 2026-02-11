<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php'; 
$pagename = 'Request Cryptocurrency';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Escrowtech">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Escrow, Escrowtech" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://www.escrowtech.io/assets/images/favicon.png" />
    <link rel="icon" type="image/x-icon" href="https://www.escrowtech.io/assets/images/favicon.png">

    <!-- Site Title  -->
    <title>Request Cryptocurrency - Escrowtech</title>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/b1e2cc998d.js" crossorigin="anonymous"></script>
    
    <meta name="referrer" content="no-referrer-when-downgrade">
    <link rel="stylesheet" href="https://www.escrowtech.io/assets/css/flaticon/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://www.escrowtech.io/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.escrowtech.io/assets/css/main.css">
    <link rel="stylesheet" href="https://www.escrowtech.io/assets/css/fontawesome.css">
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Ubuntu|Noto Sans|Source Sans Pro|Roboto|Merriweather Sans">

    <link
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
      rel="stylesheet">


    <script src="https://www.escrowtech.io/assets/vendor/jquery/jquery.js"></script>
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


            

  <div class="d-block d-md-none my-3">
    <i class="material-icons dark-bg2 px-2 py-1 grey-color-2"
      style="font-size: 18px !important; border-radius: 4px;" onclick="history.go(-1)">west</i>
  </div>
  <!-- --- -->
  <!-- --- -->
  
<div class="col-md-6">
    <form action="https://www.p2ptradetech.io/user/data/request-currency.php" method="POST" id="requestCurrencyForm" class="px-md-4 px-lg-5 px-mobile-0"> 
        <div class="post-box add-radius p-md-4 p-0 mt-md-5 mt-4 shadow-none bg-sm-none">
            <div class="border-bottom pb-3">
                <h5 class="anuphan-2 mb-1">Request Cryptocurrency</h5>
                <small class="grey-color d-block">
                    If your desired exchange cryptocurrency is not listed. fill the form to request coin listing on flip2swap
                </small>
            </div>
            <input type="hidden" name="url-path" value="/request-currency">
    
            <label class="xsmall mt-4 grey-color">Select Network</label>
            <div class="form-wrapper m-0">
                <input type="text" name="network" placeholder="Enter network (E.g BEP20, ERC20, TRC20)" step="any" required>
            </div>
    
            <label class="xsmall mt-4 grey-color">Contract Address</label>
            <div class="form-wrapper m-0">
                <input type="text" name="contract-address" placeholder="paste contract address" step="any" required>
            </div>
            <label class="xsmall mt-4 grey-color">Crypto Name</label>
            <div class="form-wrapper m-0">
                <input type="text" name="crypto-name" placeholder="e.g Bitcoin, Ethereum" step="any" required>
            </div>
            <label class="xsmall mt-4 grey-color">Crypto Symbol</label>
            <div class="form-wrapper m-0">
                <input type="text" name="crypto-symbol" placeholder="E.g BTC, ETH, ADA, XRP" step="any" required>
            </div>
            <div class="button-button-wrp mt-4">
                <button class="xsmall anuphan-2 fit-content px-5">Submit</button>
            </div>
        </div>
    </form>
</div>


            
            
            
            
            
            




          <div class="d-block d-lg-none text-center pb-4 mt-5 col-12">
            <p><small>
                Copyright &copy; <?= date('Y');?> Escrowtech. All rights reserved
              </small></p>
          </div>
          


        </div>
        
              </div>
    </div>


    <!-- account control panel -->
    <div class="account-control-panel-overlay" style="display: none;" onclick="closeAccountMangt()"></div>
    <div class="account-control-panel dark-bg3 my-border post-box p-0"
      style="padding: 0px; display: none; box-shadow: none; font-family: 'source sans pro';">
      <div>
        <div class="border-bottom p-3 d-flex">
          <i class="material-icons-outlined primary-color fixIcon3"
            style="font-size: 22px !important;">admin_panel_settings</i>
          <p class="xsmall2 ml-3 m-0">
            Hello, escrow
            <small class="xsmall2 d-block grey-color">escrowtech.io@gmail.com</small>
          </p>
        </div>
        
        
        <a href="https://www.peershieldex.com/user/change-password" class="mainWhite">
          <div class="a-p-inner px-3 py-2 pb-3" style="border-radius: 6px 6px 0px 0px;">
            <i class="material-icons top-4 grey-color" style="font-size: 18px;">person</i>&nbsp;&nbsp;
            <small class="xsmall">Account Settings</small>
          </div>
        </a>

        <a class="mainWhite pointer" href="https://www.peershieldex.com/user/kyc-application">
          <div class="a-p-inner px-3 py-2 pb-3">
            <i class="material-icons-outlined top-4 grey-color" style="font-size: 18px;">beenhere</i>&nbsp;&nbsp;
            <small class="xsmall">Verification</small>
          </div>
        </a>
        
        
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mainWhite pointer">
          <div class="a-p-inner px-3 py-2 pb-3" style="border-radius: 0px 0px 6px 6px;">
            <i class="material-icons-outlined top-4 grey-color" style="font-size: 18px;">key</i>&nbsp;&nbsp;
            <small class="xsmall">Sign out</small>
          </div>
        </a>
        
        <form id="logout-form" action="https://www.peershieldex.com/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="zhPdVThJvGRhEoFkx3yamBIERDw0dvUvCeItZSgz">        </form>
      </div>
    </div>
    
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
                  <input type="hidden" name="_token" value="zhPdVThJvGRhEoFkx3yamBIERDw0dvUvCeItZSgz">                <div class="form-wrapper">
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
                            <input type="hidden" name="_token" value="zhPdVThJvGRhEoFkx3yamBIERDw0dvUvCeItZSgz">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="301">FET</option>
                                                                            <option value="300">LOKA</option>
                                                                            <option value="299">MASA</option>
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
                            <input type="hidden" name="_token" value="zhPdVThJvGRhEoFkx3yamBIERDw0dvUvCeItZSgz">                            <div class="form-wrapper">
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
                                                                            <option value="<?= $token['token_id']; ?>"><?= $token['symbol']; ?></option>
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
                            
                            <p class="grey-color-2 xsmall">Note: Ensure that the address is correct and on the same network. Contact <a href="mailto:support@peershieldex.com" >support@peershieldex.com</a> on guide to pay.</label>
                            
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
    <script src="https://www.escrowtech.io/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.escrowtech.io/assets/js/main.js"></script>
    <script src="https://www.escrowtech.io/assets/js/plugin/jquery/jquery-ui.min.js"></script>
    
        
    <script src="//code.tidio.co/7s84geea66p7betplhm1pensxlordca9.js" async></script>

  </body>

</html>