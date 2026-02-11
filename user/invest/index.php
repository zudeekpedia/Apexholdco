<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php'; 
$pagename = 'Deposit';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Apexholdco">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Apex Investment, Apexholdco" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png" />
    <link rel="icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png">

    <!-- Site Title  -->
    <title>Invest - Apexholdco</title>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/b1e2cc998d.js" crossorigin="anonymous"></script>
    
    <meta name="referrer" content="no-referrer-when-downgrade">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/css/flaticon/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/css/main.css">
    <link rel="stylesheet" href="https://www.apexholdco.com/assets/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">
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
      <?php 
// Check if 'error' exists in the URL
if (isset($_GET['transaction_id'])) {
    // Check if 'transaction_id' exists before assigning it
    $transaction_id = $_GET['transaction_id'] ?? 'default_id';
}
?>
      
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

<!-- --- -->
<!-- --- -->
<div class="d-block d-md-none mt-3">
<i class="material-icons dark-bg2 px-2 py-1 grey-color-2"
  style="font-size: 18px !important; border-radius: 4px;" onclick="history.go(-1)">west</i>
</div>
<!-- --- -->
<!-- --- -->

<div class="px-lg-5 mt-4">
    <div class="post-box p-0 pb-4">
      <div class="d-flex border-bottom p-3">
        <p class="m-0 roboto xsmall-sm bold-text">Invest Your Funds</p>
        
      </div>
      <?php
        if(isset($transaction_id)){
            echo "<p class='card m-2 bg-success p-2 roboto xsmall-sm bold-text'>You have successfully invested and your transaction ID is $transaction_id</p>";
        }
        ?>
    
      <form action="https://www.apexholdco.com/user/data/invest.php" method="POST" id="depositForm">
          <input type="hidden" name="_token" value="ldWaDtAo7e3eh2WPTyMCb0QTVlnNe0gnF5eZIhqy">        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="mt-3 timeline-wrapper p-3">
              <div class="d-flex">
                <small class="sans-pro py-1 px-2 xsmall2 fit-content primary-color dark-bg2"
                  style="border-radius: 4px;">1</small>
                <p class="m-0 ml-4 xsmall">
                  Select Investment Plan
                </p>
              </div>
              <div class="timeline-body">
                <div class="p-3 dark-input add-radius d-flex" style="cursor: pointer;" data-toggle="modal" data-target="#selectTokenToFund">
                  <p class="ft m-0 bold-text" id="tokenShort">Select</p>
                  <p class="ft-n m-0 ml-3 top-2 flex-fill xsmall grey-color" id="tokenName">Plans</p>
    
                  <!-- -- -->
                  <input type="hidden" name="plan_id" id="tokenId" value=""  required>
                  <!-- -- -->
    
                  <i class="material-icons moreWhite">
                    keyboard_arrow_down
                  </i>
                </div>
              </div>
            </div>
            <!-- -- -->
            <div class="timeline-wrapper px-3 pb-3">
              <div class="d-flex">
                <small class="sans-pro py-1 px-2 xsmall2 fit-content primary-color dark-bg2"
                  style="border-radius: 4px;">2</small>
                <p class="m-0 ml-4 xsmall top-3">Enter Amount</p>
              </div>
              <div class="timeline-body">
                <div class="form-wrapper m-0 mt-2">
                  <input type="number" name="amount" id="fundAmount" class="dark-input" style="font-weight: bold; border: none !important;" placeholder="0.00" step="any" required>
                  <small class="xsmall2 fa-err-txt error-text" style="display: none;">
                    Please enter a valid amount
                  </small>
                </div>
              </div>
            </div>
            <!-- -- -->
            <div class="timeline-wrapper px-3 pb-3">
              <div class="d-flex">
                <small class="sans-pro py-1 px-2 xsmall2 fit-content primary-color dark-bg2"
                  style="border-radius: 4px;">3</small>
                <p class="m-0 ml-4 xsmall top-3">Generate Deposit Address</p>
              </div>
              <div class="timeline-body border-none">
                <div class="d-flex">
                  <i class="material-icons p-1 primary-color top-3 add-radius" style="font-size: 14px !important; height: fit-content; background: #3c341f;">info</i>
                  <small class="ml-2 xsmall2 grey-color-2">
                    Only deposit to addresses generated on our server. Do not pay to third party addresses to avoid loss of fund.
                  </small>
                </div>
                
                <button class="mt-4 py-2 xsmall fit-content px-4" type="submit">
                  Make Investment Now
                </button>
              </div>
            </div>
            
            
          <p class="px-2 xsmall grey-color-2">
            Cryptocurrency not listed? <a href="https://www.apexholdco.com/user/request-coin">Request currency listing</a>
          </p>
          </div>
          <div class="col-lg-3">
            <div class="border-top pt-4 p-3">
              <div class="d-flex">
                <div class="top-5">
                  <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
                    style="width: 35px; height: 35px; transform: rotate(20deg);">
                </div>
                <div class="ml-3 flex-fill">
                  <small class="xsmall2 greyWhite mb-2">Total Earnings</small>
                  <p class="roboto xsmall2 m-0 boldText grey-color-2">Investment Earning balance (Est.)</p>
                </div>
                
                                <p class="m-0 bold-text" id="tokenBal">0 BTC</p>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>

            
            
            
            
            
            



          <div class="d-block d-lg-none text-center pb-4 mt-5 col-12">
            <p><small>
                Copyright &copy; <?= date('Y');?> Apexholdco. All rights reserved
              </small></p>
          </div>
          


        </div>
        

<!-- jS -->
<script>
    $(function(){
        $('#searchCoinList').on('keyup', (e)=>{
            var value = $(e.target).val().toLowerCase();
            $('.tokens').each(function () {
                $(this).addClass('hide')
                if ($(this).text().toLowerCase().indexOf(value) > -1){$(this).removeClass('hide')}
            })
        })
    })
    function setFundToken(name, short, id, bal) {
        $('#tokenId').val(id)
        $('#tokenName').html(name);

        $('#tokenShort').html(short)
        $('#tokenBal').html(`${bal} ${short}`)
        $('#selectTokenToFund').modal('hide');
        $('#searchCoinList').val('');
        $('.tokens').removeClass('hide')
    }
</script>

      </div>
    </div>
    <div class="modal fade" id="selectTokenToFund" tabindex="-1" aria-labelledby="selectTokenToFundLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content mx-4" style="background: none;">
            <div class="modal-body dark-bg3 p-0 add-radius pb-4">
                <div class="sans-pro">
                    <div class="d-flex border-bottom p-3 py-4">
                        <input type="text" id="searchCoinList" class="form-control dark-input" placeholder="Search by Coin/Token" style="color: #fff; border: none !important; background: transparent; border-radius: 30px;">
                        <p data-dismiss="modal" class="pointer xsmall primary-color m-0 ml-4 bold-text mt-2">Cancel</p>
                    </div>
                    <div class="mt-4">
                        <p class="meri-weda xsmall grey-color-2 mb-4 px-4">Investment Plans List</p>
                        <div style="height: 350px; overflow: auto;" class="style-scrollbar px-2">
                            <?php
                            $plans = getAllPlans();
                            
                            
                            if (!empty($plans)) :
                                $counter = 1;
                                foreach ($plans as $plan) :
                            ?>
                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setFundToken('<?= '$' . htmlspecialchars($plan['min_deposit']) . ' - $' . htmlspecialchars($plan['max_deposit']) ; ?>', '<?= htmlspecialchars($plan['name']); ?>', '<?= htmlspecialchars($plan['id']); ?>', <?= htmlspecialchars($plan['id']); ?>)">
                                <p class="m-0 bold-text ml-3"><?= htmlspecialchars($plan['name']); ?></p>
                                <p class="m-0 grey-color ml-4 xsmall top-2" style="text-transform: capitalize;"><?= '$' . htmlspecialchars($plan['min_deposit']) . ' - ' .   '$' . htmlspecialchars($plan['max_deposit']); ?></p>
                                <p class="m-0 ml-4 xsmall bold-text top-2" style="text-transform: capitalize;"><?= round(htmlspecialchars($plan['roi_percent'])) .   '% ROI'; ?></p>
                            </div>
                            <?php
                            endforeach;
                            else :
                            ?>
                            <div>
                                <p>No Investment Plan Available</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
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
            Hello, <?= $fullname?>
            <small class="xsmall2 d-block grey-color"><?= $email?></small>
          </p>
        </div>
        
        
        <a href="https://www.apexholdco.com/user/change-password" class="mainWhite">
          <div class="a-p-inner px-3 py-2 pb-3" style="border-radius: 6px 6px 0px 0px;">
            <i class="material-icons top-4 grey-color" style="font-size: 18px;">person</i>&nbsp;&nbsp;
            <small class="xsmall">Account Settings</small>
          </div>
        </a>

        <a class="mainWhite pointer" href="https://www.apexholdco.com/user/kyc-application">
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
        
        <form id="logout-form" action="https://www.apexholdco.com/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="ldWaDtAo7e3eh2WPTyMCb0QTVlnNe0gnF5eZIhqy">        </form>
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
              <form action="https://www.apexholdco.com/user/join-room" class="px-2" method="POST">
                  <input type="hidden" name="_token" value="ldWaDtAo7e3eh2WPTyMCb0QTVlnNe0gnF5eZIhqy">                <div class="form-wrapper">
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
                        <form method="POST" action="https://www.apexholdco.com/user/fund-account">
                            <input type="hidden" name="_token" value="ldWaDtAo7e3eh2WPTyMCb0QTVlnNe0gnF5eZIhqy">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="1">AXS</option>
                                                                            <option value="200">APT</option>
                                                                            <option value="206">SUPER</option>
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
                        <form method="POST" action="https://www.apexholdco.com/user/withdrawal-request">
                            <input type="hidden" name="_token" value="ldWaDtAo7e3eh2WPTyMCb0QTVlnNe0gnF5eZIhqy">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <?php
                            $tokens = getAllPlans();
                            
                            
                            if (!empty($tokens)) :
                                $counter = 1;
                                foreach ($tokens as $token) :
                                    //Get user total token balance by token id and token nam
                                    $token_bal = getPlanInvestment($token['id'],$token['name'],$uID);
                                    $token_bal = number_format((float)$token_bal, 2, '.', '');
                                    
                            ?>
                                                                            <option value="<?= $token['id']?>"><?= $token['name']; ?></option>
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