<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php'; 
$pagename = 'Transactions';
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
    <title>Transactions - Apexholdco</title>

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


    <script src="https://www.p2ptradetech.io/assets/vendor/jquery/jquery.js"></script>
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


  <div class="row px-0 px-md-4">
    <div class="col-12 col-md-8">
        
        
        
          <div class="mt-4 panel panelOne">

        <div class="mb-3">
          <small class="greyWhite">
            Tap Order to open
          </small>
        </div>
        
        <?php
        //get transactions by id
        $transactions = getUserTransactions($uID);
        $transactions = array_reverse($transactions);
        if (!empty($transactions)) : 
            foreach ($transactions as $transaction) : 
        ?>
        <a href="https://www.apexholdco.com/user/transaction-details/<?= $transaction['transaction_id'];?>">
          <div class="post-box mb-3 pointer px-3" style="border: none;">
            <div class="row">
              <div class="col-12 border-bottom pb-2">
                <?php
                if($transaction['status'] === 'pending'){
                    echo '<p class="xsmall2 m-0">
                    Status: 
                                        <span class="badge badge-warning">Pending Approval</span>
                                    </p>';
                }elseif($transaction['status'] === 'completed'){
                    echo '<p class="xsmall2 m-0">
                    Status: 
                                        <span class="badge badge-warning">Successful Deposit Approval</span>
                                    </p>';
                }
                ?>
                
              </div>
              <div class="col-2">
                <small class="xsmall2 bold-text grey-color">Ref</small>
                <p class="m-0 xsmall2"><?= htmlspecialchars($transaction['transaction_id']); ?></p>
              </div>
              <div class="col-2">
                <small class="xsmall2 bold-text grey-color">Date</small>
                <p class="m-0 xsmall2"><?= date('d/m/Y, h:i A',htmlspecialchars($transaction['created_at'])); ?></p>
              </div>
              <div class="col-2">
                <small class="xsmall2 bold-text grey-color">Amount</small>
                <p class="m-0 xsmall2 bold-text"><?= htmlspecialchars($transaction['amount']) . ' ' . htmlspecialchars($transaction['currency']); ?></p>
              </div>
              <div class="col-2">
                <small class="xsmall2 bold-text grey-color">Type</small>
                <?php
                if($transaction['transaction_type'] === 'deposit'){
                    echo '<p class="m-0 bold-text">
                                        <span class="badge badge-outline badge-success">Credit</span>
                                    </p>';
                }elseif($transaction['transaction_time'] === 'withdrawal'){
                    echo '<p class="m-0 bold-text">
                                        <span class="badge badge-outline badge-danger">Depit</span>
                                    </p>';
                }
                ?>
              </div>
              <div class="col-2">
                <small class="xsmall2 bold-text grey-color">Status</small>
                <?php
                if($transaction['status'] === 'completed'){
                    echo '<p class="m-0 bold-text">
                                        <span class="badge badge-outline badge-success">successful</span>
                                    </p>';
                }elseif($transaction['status'] === 'pending'){
                    echo '<p class="m-0 bold-text">
                                        <span class="badge badge-outline badge-warning">pending</span>
                                    </p>';
                }
                ?>
              </div>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
        <?php else : ?>
                <div  class=' m-3 mt-3'>
                    <p class="text-center" style="color:grey"><?= $fullname; ?> No Transactions recorded yet! <a href='../deposit/' class='badge badge-outline badge-primary'>Deposit</a>.</p>
                </div>
        <?php endif; ?>
      </div>
        
    </div>
  </div>


    
            
            
            
            
            
            



          <div class="d-block d-lg-none text-center pb-4 mt-5 col-12">
            <p><small>
                Copyright &copy; <?= date('Y');?> P2PTradetech. All rights reserved
              </small></p>
          </div>
          


        </div>
        
              </div>
    </div>


    <!-- account control panel -->
    <?php require_once '../pages/account-control-panel.php';?>
    
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
                  <input type="hidden" name="_token" value="dMWrDXyDqR8XnQszF8DtYOy3zo7bij91mqRlER7E">                <div class="form-wrapper">
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
                            <input type="hidden" name="_token" value="dMWrDXyDqR8XnQszF8DtYOy3zo7bij91mqRlER7E">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="301">FET</option>
                                                                            <option value="300">LOKA</option>
                                                                            <option value="299">MASA</option>
                                                                            <option value="298">WAN</option>
                                                                            <option value="297">GSWIFT</option>
                                                                            <option value="296">WLD</option>
                                                                            <option value="295">ZKJ</option>
                                                                            <option value="294">ARC</option>
                                                                            <option value="293">GFI</option>
                                                                            <option value="292">NMR</option>
                                                                            <option value="291">TON</option>
                                                                            <option value="290">NEOX</option>
                                                                            <option value="289">HDRO</option>
                                                                            <option value="288">ACX</option>
                                                                            <option value="287">HEX.</option>
                                                                            <option value="286">HEX</option>
                                                                            <option value="285">POND</option>
                                                                            <option value="284">RARE</option>
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
                            <input type="hidden" name="_token" value="dMWrDXyDqR8XnQszF8DtYOy3zo7bij91mqRlER7E">                            <div class="form-wrapper">
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
    <script src="https://www.p2ptradetech.io/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.p2ptradetech.io/assets/js/main.js"></script>
    <script src="https://www.p2ptradetech.io/assets/js/plugin/jquery/jquery-ui.min.js"></script>
    
        
    <script src="//code.tidio.co/7s84geea66p7betplhm1pensxlordca9.js" async></script>

  </body>

</html>