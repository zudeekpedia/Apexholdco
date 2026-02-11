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
    <meta name="keywords" content="P2P Trading, Apexholdco" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png" />
    <link rel="icon" type="image/x-icon" href="https://www.apexholdco.com/assets/images/favicon.png">

    <!-- Site Title  -->
    <title>Payment - Appexholdco</title>

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

<!-- --- -->
<!-- --- -->
<div class="d-block d-md-none mt-3">
<i class="material-icons dark-bg2 px-2 py-1 grey-color-2"
  style="font-size: 18px !important; border-radius: 4px;" onclick="history.go(-1)">west</i>
</div>
<!-- --- -->
<!-- --- -->
<?php
$transaction_id = $_GET['transaction_id'];

//get transactions by id
$transactions = getTransactionsByID($transaction_id,$uID);
$transactions = $transactions[0];

//get coins details
$coin = getCoinNameById($transactions['token_id']);
$coin = $coin[0];
?>
<div class="mb-5 mt-4 roboto">
    <img src="https://www.apexholdco.com/assets/images/icon-convert.svg" alt="" style="width: 40px; height: 40px;">
    <span style="font-size: 20px;" class="top-2 bold-text">Confirm Deposit</span>
    <small class="xsmall grey-color-2 d-block mt-2">
        Please upload a screenshot of the transaction receipt OR give the transaction hash as evidence that the payment was successful.
    </small>
</div>
  
<div class="col-md-5 post-box">

    <h5 class="mb-3 white-text">Transaction ID: #<?= $transactions['transaction_id'];?></h5>

    <div class="form">
      <form action="https://www.apexholdco.com/user/data/save-proof.php" method="post" class="form" enctype="multipart/form-data"
        
          <div class="p-lg-4">
            <div class="form-wrapper mt-2">
              <input type="text" name="comment" value="" class="dark-input" placeholder=" " style="border: none;">
              <input type="hidden" name="transactionid" value="<?= $transactions['transaction_id'];?>" class="dark-input" placeholder=" " style="border: none;">
              <label>Paste TxnHash</label>
            </div>

            <div class="form-group">
              <label class="dark-b text-center pointer xsmall w-100 py-2 px-4" for="pop" style="border-radius: 4px; background: #1a1d25;">
                <i class="material-icons-outlined primary-color top-2"
                  style="font-size: 18px !important;">file_upload</i>
                Upload a proof of payment
              </label>
              <input type="file" id="pop" accept="image/*" value="" name="image" oninput="loadFile(event)" required>
              <small class="xsmall d-block grey-color">Maximum file size : 2MB</small>
              <small class="error-text fu-err-txt" style="display: none;"></small>
            </div>
            <img class="d-none" id="output" style="width: 120px; height: 120px;">
          </div>
          
            <div class="row p-4 border-top">
                <div class="col-6">
                    <button class="py-2 bold-text xsmall">Submit</button>
                </div>
            </div>
      </form>
      
    </div>
    
</div>
    
 <script>
    // preview image
    function loadFile(event) {
        // $('.fu-err-txt').hide()
        var output = document.querySelector('#output');
        var fileSize = event.target.files[0].size / 1024 / 1024; // in MB
        if (fileSize > 2){
            event.target.value = ''
            output.src = ''; output.classList.add('d-none');
            $('.fu-err-txt').html('File too large. Maximum size allowed : 2MB'); $('.fu-err-txt').show()
            setTimeout(()=>{$('.fu-err-txt').show()}, 3000)
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
                        <p class="meri-weda xsmall grey-color-2 mb-4 px-4">Coin/Token List</p>
                        <div style="height: 350px; overflow: auto;" class="style-scrollbar px-2">
                            <?php
                            $tokens = getAllTokens();
                            
                            
                            if (!empty($tokens)) :
                                $counter = 1;
                                foreach ($tokens as $token) :
                                    //Get user total token balance by token id and token nam
                                    $token_bal = getTokenBalance($token['token_id'],$token['name'],$uID);
                                    $token_bal = number_format((float)$token_bal, 4, '.', '');
                            ?>
                            <div class="d-flex tokens pointer cs-list-item p-3" onclick="setFundToken('<?= htmlspecialchars($token['name']); ?>', '<?= htmlspecialchars($token['symbol']); ?>', '<?= htmlspecialchars($token['token_id']); ?>', <?= htmlspecialchars($token_bal); ?>)">
                                <img src="<?= 'https://www.apexholdco.com/admin-control/admin/data/' . htmlspecialchars($token['logo']); ?>" alt="<?= htmlspecialchars($token['symbol']); ?>" style="width: 20px; height: 20px;" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" class="top-2 rounded-circle">
                                <p class="m-0 bold-text ml-3"><?= htmlspecialchars($token['symbol']); ?></p>
                                <p class="m-0 grey-color ml-4 xsmall top-2" style="text-transform: capitalize;"><?= htmlspecialchars($token['name']); ?></p>
                            </div>
                            <?php
                            endforeach;
                            else :
                            ?>
                            <div>
                                <p>No Coin Available</p>
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
            Hello, Lord Zud Eek
            <small class="xsmall2 d-block grey-color">lordzudeek5@gmail.com</small>
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
              <form action="https://www.peershieldex.com/user/join-room" class="px-2" method="POST">
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
                        <form method="POST" action="https://www.peershieldex.com/user/fund-account">
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
                        <form method="POST" action="https://www.peershieldex.com/user/withdrawal-request">
                            <input type="hidden" name="_token" value="ldWaDtAo7e3eh2WPTyMCb0QTVlnNe0gnF5eZIhqy">                            <div class="form-wrapper">
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
    <script src="https://www.apexholdco.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.apexholdco.com/assets/js/main.js"></script>
    <script src="https://www.apexholdco.com/assets/js/plugin/jquery/jquery-ui.min.js"></script>
    
        
    <script src="//code.tidio.co/7s84geea66p7betplhm1pensxlordca9.js" async></script>

  </body>

</html>