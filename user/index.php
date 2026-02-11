<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php'; 
$pagename = 'Dashboard';
?>
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
    <title>Dashboard - Apexholdco</title>

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
      <?php include_once 'pages/mobile-navbar.php';?>

      <!-- Side bar mobile -->
      <!-- sidebar Mobile -->
      <?php include_once 'pages/mobile-sidebar.php';?>

      <!-- jS -->
      <script>
        function joinTrade() {
          hideSideBarSm();
          $('#joinTrade').modal('show');
        }
      </script>
      <!-- --------------- -->

      <!-- --------------- -->
      
      <!-- Side bar desktop -->
      <div class="container-fluid">
        <div class="row" style="height:100%;">
          <!-- Side bar desktop -->
          <?php include_once 'pages/desktop-sidebar.php';?>

          <!-- --------------- -->

          <div class="col-lg-10 sans-pro pb-lg-5" style="position: relative; z-index: 1;">
            <!-- Header desktop -->
            <!-- ## -->
            <?php include_once 'pages/desktop-header.php'; ?>
          
<div class="px-lg-5 row mt-4">
  <div class="col-md-4 d-block d-sm-none">
    <div class="post-box p-0">
      <div class="p-3 row">
        <div class="col-12">
          <small class="grey-color-2">Est. Total Assets(Invested)</small>
        </div>
        <div class="col-8 position-relative">
            <div class="d-flex dark-bg2 py-2 px-3  mt-2 add-radius pointer" onclick="toggleContextMenu('.w-ctx-menu')">
                <p class="m-0 flex-fill">
                    <b class="user-wallet-balance uw-bal"><?= $totalinvested;?></b>
                    <span class="user-wallet-token uw-tkn white-text">USD</span>
                </p>
                <!--<i class="fa fa-angle-down top-4 grey-color-2 bold-text"></i>-->
            </div>
            
            <?php
            
            /*
            <div class="context-menu dark-bg2 p-3 my-border w-ctx-menu">
                <?php
            $tokens = getAllTokens();
            
            if (!empty($tokens)) :
                foreach ($tokens as $token) :
                    //Get user total token balance by token id and token nam
                    $token_bal = getTokenBalance($token['token_id'],$token['name'],$uID);
                    $token_bal = number_format((float)$token_bal, 4, '.', '');
            ?>
                <div class="d-flex pointer cs-list-item px-2" onclick="setWalletBalance('<?= $token['symbol'];?>', '<?= $token_bal; ?>')">
                    <p class="m-0 py-2 xsmall flex-fill">
                        <img src="<?= 'https://www.apexholdco.com/admin-control/admin/data/' . $token['logo'];?>" onerror="this.src='https://www.peershieldex.com/assets/images/token.png'" alt="<?= $token['name'];?>" style="width: 18px; height: 18px;" class="mr-3 rounded-circle">
                        <span class="bold-text top-2 white-text"><?= $token['symbol'];?></span>
                    </p>
                    <p class="m-0 py-2 xsmall bold-text top-2"><?= $token_bal; ?></p>
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
            */
             ?>

        </div>
        <div class="col-4 text-right mt-2">
          <a href="https://www.apexholdco.com/user/wallets">
            <i class="material-icons dark-bg2 grey-color-2 p-2 top-3"
              style="font-size: 19px !important; border-radius: 50%;">arrow_forward</i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 px-1 d-block d-md-none my-4">
    <div class="d-flex text-center">
      <!--<div class="flex-fill"
         <a href="https://www.apexholdco.com/user/create-trade">
          <i class="material-icons d-block primary-color dark-bg mx-auto p-2 fit-content add-radius"
           style="font-size: 18px !important;">swap_horiz</i>
         <small class="xsmall2 top-3">New Trade</small>
         </a>
       </div>-->
      <div class="flex-fill">
        <a href="https://www.apexholdco.com/user/deposit">
          <i class="material-icons d-block grey-color-2 dark-bg mx-auto p-2 fit-content add-radius"
            style="font-size: 18px !important;">play_for_work</i>
          <small class="xsmall2 top-3">Deposit</small>
        </a>
      </div>
      <div class="flex-fill">
        <a href="https://www.apexholdco.com/user/invest">
          <i class="material-icons d-block grey-color-2 dark-bg mx-auto p-2 fit-content add-radius"
            style="font-size: 18px !important;">leaderboard</i>
          <small class="xsmall2 top-3">Invest</small>
        </a>
      </div>
      <!--<div class="flex-fill">
       <!-- <a href="#" data-toggle="modal" data-target="#joinTrade">
         <!-- <i class="material-icons d-block grey-color-2 dark-bg mx-auto p-2 fit-content add-radius"
         <!--   style="font-size: 18px !important;">leaderboard</i>
         <!-- <small class="xsmall2 top-3">Invest</small>
       <!-- </a>
      <!--</div>-->
      <div class="flex-fill">
        <a href="#" data-target="#withdrawal-modal" data-toggle="modal">
          <i class="material-icons d-block grey-color-2 dark-bg mx-auto p-2 fit-content add-radius"
            style="font-size: 18px !important;">north_east</i>
          <small class="xsmall2 top-3">Withdraw</small>
        </a>
      </div>
      <div class="flex-fill">
        <a href="#">
          <i class="material-icons d-block grey-color-2 dark-bg mx-auto p-2 fit-content add-radius"
            style="font-size: 18px !important;">receipt_long</i>
          <small class="xsmall2 top-3">Transactions</small>
        </a>
      </div>
    </div>
  </div>

  <!-- desktop cont. -->
  <div class="col-md-6 d-none d-md-block">
    <div class="post-box d-flex">
      <div class="top-5">
        <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
          style="width: 35px; height: 35px; transform: rotate(20deg);">
      </div>
      <div class="ml-3 flex-fill">
        <small class="xsmall2 greyWhite mb-2">Available Balance</small>

        <p class="roboto m-0 bold-text">
          <b>$<?= $availableBalance; ?></b>
          <small class="xsmall2 grey-color">0.0000 BTC</small>
        </p>

      </div>
    </div>
  </div>
  <div class="col-md-6 d-none d-md-block">
    <div class="post-box dark-bg2 d-flex">
      <div class="top-5">
        <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
          style="width: 35px; height: 35px; transform: rotate(0deg);">
      </div>
      <div class="ml-3 flex-fill">
        <small class="xsmall2 greyWhite mb-2">Earning Balance</small>

        <p class="roboto m-0 bold-text">
          <b>$<?= $totalearned; ?></b>
          <small class="xsmall2 grey-color">0.00000 BTC</small>
        </p>

      </div>
    </div>
  </div>
</div>
  <div class="px-lg-5 row mt-4">
    <div class="col-md-3 d-none d-md-block">
        <div class="post-box dark-bg2 d-flex">
      <div class="top-5">
        <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
          style="width: 35px; height: 35px; transform: rotate(0deg);">
      </div>
      <div class="ml-3 flex-fill">
        <small class="xsmall2 greyWhite mb-2">Total Deposits</small>

        <p class="roboto m-0 bold-text">
          <b>$<?= $totaldeposited; ?></b>
        </p>

      </div>
    </div>
    </div>
    <div class="col-md-3 d-none d-md-block">
    <div class="post-box dark-bg2 d-flex">
      <div class="top-5">
        <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
          style="width: 35px; height: 35px; transform: rotate(0deg);">
      </div>
      <div class="ml-3 flex-fill">
        <small class="xsmall2 greyWhite mb-2">Total Withdrawals</small>

        <p class="roboto m-0 bold-text">
          <b>$<?= $totalwithdrawn; ?></b>
        </p>

      </div>
    </div>
  </div>
  <div class="col-md-3 d-none d-md-block">
    <div class="post-box dark-bg2 d-flex">
      <div class="top-5">
        <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
          style="width: 35px; height: 35px; transform: rotate(0deg);">
      </div>
      <div class="ml-3 flex-fill">
        <small class="xsmall2 greyWhite mb-2">Last Deposit</small>

        <p class="roboto m-0 bold-text">
          <b>$<?= $lastdeposit; ?></b>
          <small class="xsmall2 grey-color">Trades</small>
        </p>

      </div>
    </div>
  </div>
  <div class="col-md-3 d-none d-md-block">
    <div class="post-box dark-bg2 d-flex">
      <div class="top-5">
        <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
          style="width: 35px; height: 35px; transform: rotate(0deg);">
      </div>
      <div class="ml-3 flex-fill">
        <small class="xsmall2 greyWhite mb-2">Last Withdrawal</small>

        <p class="roboto m-0 bold-text">
          <b>$<?= (!empty($lastwithdrawal) && $lastwithdrawal > 0) ? number_format($lastwithdrawal, 2) : 'N/A'; ?></b>
        </p>

      </div>
    </div>
  </div>
</div>
<!-- Will not show on smaller  devices -->
<div class="px-lg-5 mt-2 d-none d-md-block">
  <div class="row">
    <div class="col-6">
      <small class="grey-color-2 d-block mb-3">YOUR TRADES</small>
      <div class="post-box p-0 pb-3">
        <?php
        //get transactions by id
        $trade = UserRecentTrade($uID);
        if (!empty($trade)) : 
            foreach ($trade as $trad) : 
        ?>
        <a href="https://www.apexholdco.com/user/view-room/ssUBYL">
          <div class="post-box mb-3 pointer px-3" style="border: none;">
            <div class="row">
              <div class="col-12 border-bottom pb-2">
                <p class="xsmall2 m-0">
                    Status: 
                                        <span class="badge badge-warning">Processing</span>
                                    </p>
              </div>
              <div class="col-4">
                <small class="xsmall2 bold-text grey-color">Room ID</small>
                <p class="m-0 xsmall2"><?= $trad['room_id']?></p>
              </div>
              <div class="col-4">
                <small class="xsmall2 bold-text grey-color">Date</small>
                <p class="m-0 xsmall2">31/10/2024, 12:00 PM</p>
              </div>
              <div class="col-4">
                <small class="xsmall2 bold-text grey-color">Your Role</small>
                <p class="m-0 bold-text">
                                            seller
                                    </p>
              </div>
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Send</small>
                <p class="m-0 xsmall2 bold-text">200.00 0X0</p>
              </div>
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Receive</small>
                <p class="m-0 xsmall2 bold-text">8.00 ACA</p>
              </div>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
        <?php else : ?>
                <div  class=' m-3 mt-3'>
                    <p class="text-center" style="color:grey">No P2P Trades made yet! <a href='create-trade/' class='badge badge-outline badge-danger'>Create Trade</a>.</p>
                </div>
        <?php endif; ?>
      </div>
    </div>
    <!--  -->
    <div class="col-6">
      <small class="grey-color-2 d-block mb-3">RECENT TRANSACTIONS</small>
      <div class="post-box p-4">
          
          
                <!--<a href="https://www.apexholdco.com/user/transaction-details/TXNO7JV1VVH">-->
        <?php
        //get transactions by id
        $transaction = UserRecentTransaction($uID);
        if (!empty($transaction)) : 
            foreach ($transaction as $transactio) : 
        ?>
        <a href="#">
          <div class="post-box mb-3 pointer px-3" style="border: none;">
            <div class="row">
              <div class="col-12 border-bottom pb-2">
                <p class="xsmall2 m-0">
                    Status: 
                                        <span class="badge badge-warning">Processing</span>
                                    </p>
              </div>
              <div class="col-3">
                <small class="xsmall2 bold-text grey-color">Ref</small>
                <p class="m-0 xsmall2"><?= $transactio['transaction_id']; ?></p>
              </div>
              <div class="col-3">
                <small class="xsmall2 bold-text grey-color">Date</small>
                <p class="m-0 xsmall2"><?= date('d/m/Y, h:i A',htmlspecialchars($transactio['created_at'])) ?></p>
              </div>
              <div class="col-3">
                <small class="xsmall2 bold-text grey-color">Value</small>
                <p class="m-0 xsmall2 bold-text"><?= $transactio['amount'] . $transactio['currency']; ?></p>
              </div>
              <div class="col-3">
                <small class="xsmall2 bold-text grey-color">Type</small>
                <p class="m-0 bold-text">
                                        <span class="badge badge-outline badge-primary"><?= $transactio['direction']; ?></span>
                                    </p>
              </div>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
        <?php else : ?>
                <div  class=' m-3 mt-3'>
                    <p class="text-center" style="color:grey"><?= $fullname; ?> No Transactions recorded yet! <a href='deposit/' class='badge badge-outline badge-primary'>Deposit</a>.</p>
                </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Will not show on large  devices -->
<div class="mt-1 d-lg-none">
  <small class="bold-text roboto mb-3 d-block grey-color-2">Activity</small>
  <div class="row">
    <div class="col-6 mb-4">
      <div class="post-box dark-bg2 d-flex">
        <div class="top-5">
          <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
            style="width: 35px; height: 35px; transform: rotate(20deg);">
        </div>
        <div class="ml-3 flex-fill">
          <small class="xsmall2 greyWhite mb-2">Available Balance</small>

          <p class="roboto m-0 boldText">
            <b>$ <?= $availableBalance; ?></b>
          </p>
          <small class="xsmall2 grey-color">0.0000 BTC</small>

        </div>
      </div>
    </div>
    <div class="col-6 mb-4">
      <div class="post-box dark-bg2 d-flex">
        <div class="top-5">
          <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
            style="width: 35px; height: 35px; transform: rotate(0deg);">
        </div>
        <div class="ml-3 flex-fill">
          <small class="xsmall2 greyWhite mb-2">Earning Balance</small>

          <p class="roboto m-0 boldText">
            <b>$<?= $totalearned; ?></b>
          </p>
          <small class="xsmall2 grey-color">0.0000 BTC</small>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6 mb-4">
      <div class="post-box dark-bg2 d-flex">
        <div class="top-5">
          <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
            style="width: 35px; height: 35px; transform: rotate(20deg);">
        </div>
        <div class="ml-3 flex-fill">
          <small class="xsmall2 greyWhite mb-2">Total Deposits</small>

          <p class="roboto m-0 boldText">
            <b>$<?= $totaldeposited; ?></b>
          </p>

        </div>
      </div>
    </div>
    <div class="col-6 mb-4">
      <div class="post-box dark-bg2 d-flex">
        <div class="top-5">
          <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
            style="width: 35px; height: 35px; transform: rotate(0deg);">
        </div>
        <div class="ml-3 flex-fill">
          <small class="xsmall2 greyWhite mb-2">Total Withdrawals</small>

          <p class="roboto m-0 boldText">
            <b>$<?= $totalwithdrawn; ?></b>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="post-box dark-bg2 d-flex">
        <div class="top-5">
          <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
            style="width: 35px; height: 35px; transform: rotate(20deg);">
        </div>
        <div class="ml-3 flex-fill">
          <small class="xsmall2 greyWhite mb-2">Last Deposit</small>

          <p class="roboto m-0 boldText">
            <b>$<?= $lastdeposit; ?></b>
          </p>

        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="post-box dark-bg2 d-flex">
        <div class="top-5">
          <img src="https://www.apexholdco.com/assets/images/ctrd.png" alt=""
            style="width: 35px; height: 35px; transform: rotate(0deg);">
        </div>
        <div class="ml-3 flex-fill">
          <small class="xsmall2 greyWhite mb-2">Last Withdrawal</small>

          <p class="roboto m-0 boldText">
            <b>$<?= (!empty($lastwithdrawal) && $lastwithdrawal > 0) ? number_format($lastwithdrawal, 2) : 'N/A'; ?></b>
          </p>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Will not show on smaller  devices -->
<div class="col-12 mt-5 d-none d-md-block">
  <small class="grey-color-2 d-block mb-3">SYSTEM-WIDE DEPOSITS (ADMIN VIEW)</small>
  <div class="post-box p-4">
      <?php $i = 1;?>
    <?php if (!empty($all_deposits)): ?>
        <?php foreach ($all_deposits as $trx): ?>
            <div class="post-box mb-3 px-3 py-2" style="border-left: 4px solid #f0ad4e;">
              <div class="row align-items-center">
                
                <div class="col-md-1">
                  <small class="xsmall2 bold-text grey-color">No</small>
                  <p class="m-0 xsmall2"><?php  echo $i++; ?></p>
                </div>
                
                <div class="col-md-1">
                  <small class="xsmall2 bold-text grey-color">User ID</small>
                  <p class="m-0 xsmall2">#<?php echo $trx['user_id']; ?></p>
                </div>

                <div class="col-md-2">
                  <small class="xsmall2 bold-text grey-color">Reference</small>
                  <p class="m-0 xsmall2"><?php echo $trx['transaction_id']; ?></p>
                </div>

                <div class="col-md-2">
                  <small class="xsmall2 bold-text grey-color">Amount</small>
                  <p class="m-0 xsmall2 bold-text text-success">
                    +<?php echo '$' . number_format($trx['amount'], 2); ?>
                  </p>
                </div>

                <div class="col-md-2">
                  <small class="xsmall2 bold-text grey-color">Date/Time</small>
                  <p class="m-0 xsmall2"><?php echo date('M d, Y - h:i A', $trx['created_at']); ?></p>
                </div>
                
               
                
                <div class="col-md-2 text-right">
                  <span class="badge <?php echo ($trx['status'] == 'completed') ? 'badge-success' : 'badge-warning'; ?>">
                    <?php echo ucfirst($trx['status']); ?>
                  </span>
                </div>
                
                 <div class="col-md-2">
                  <p class="m-0 xsmall2"><a href="../edit-deposit/<?php echo $trx['transaction_id'];?>" class='btn btn-pill btn-primary text-white'>Edit</a></p>
                </div>
                
                

              </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center grey-color p-5">The system has no deposit records yet.</p>
    <?php endif; ?>
    
  </div>
</div>
<div class="d-block d-md-none mt-4 px-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <small class="text-secondary font-weight-bold">DEPOSIT LOGS</small>
        <input type="text" id="mobileSearch" class="form-control form-control-sm w-50" placeholder="Search...">
    </div>

    <div class="dark-bg bg-dark rounded shadow-sm overflow-hidden">
        <table class="table table-sm mb-0" id="mobileTable" style="table-layout: fixed; width: 100%;">
            <thead class="bg-light">
                <tr class="small text-muted text-uppercase">
                    <th style="width: 10%;" class="py-2 pl-3">#</th>
                    <th style="width: 45%;" class="py-2">Reference</th>
                    <th style="width: 15%;" class="py-2 text-left">Status</th>
                    <th style="width: 30%;" class="py-2 text-right pr-3">Details</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php $i = 1; ?>
                <?php if (!empty($alltransactions)): ?>
                    <?php foreach ($alltransactions as $trx): ?>
                    <tr class="border-bottom" style="background: #fff;">
                        <td class="py-3 pl-3 align-middle"><?php echo $i++; ?></td>
                        
                        <td class="py-2 align-middle">
                            <div class="text-truncate font-weight-bold text-dark" style="max-width: 120px;">
                                <?php echo $trx['transaction_id']; ?>
                            </div>
                            <div class="text-muted extra-small" style="font-size: 0.7rem;">
                                <?php echo date('d M, Y H:iA', $trx['created_at']); ?>
                            </div>
                        </td>
                        <td class="py-2 align-middle">
                            <span class="badge <?php echo ($trx['status'] == 'completed' ? 'badge-success' : 'badge-warning'); ?>" style="font-size: 0.65rem;">
                                <?php echo strtoupper($trx['status']); ?>
                            </span>
                        </td>

                        <td class="py-2 text-right pr-3 align-middle">
                            <div class="font-weight-bold  text-success">
                                +<?php echo number_format($trx['amount'], 2); ?>
                            </div>
                            <div class="font-weight-bold text-muted extra-small">
                                <?php echo $trx['transaction_type']; ?>
                            </div>
                            
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3" class="text-center py-4 text-muted">No deposits found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Will not show on large  devices 
<div class="col-12 d-block d-lg-none dark-bg pb-3" style="border-radius: 8px;">
    <div class="mt-3 pt-3 row">
      <div class="col-12">
        <div class="d-flex">
          <p class="m-0 grey-color-2 xsmall bold-text flex-fill">Your Trades</p>
          <a href="https://www.apexholdco.com/user/view-rooms" class="dark-bg2 xsmall2 py-1 px-2 grey-color-2"
            style="border-radius: 4px;">
            See all
            <i class="fa fa-caret-right ml-2 grey-color-2"></i>
          </a>
        </div>
      </div>
      <!-- --- -
      <div class="col-12 mt-2"
          php
        //get transactions by id
        //$trade = UserRecentTrade($uID);
        //if (!empty($trade)) : 
            //foreach ($trade as $trad) : 
        
        <a href="https://www.apexholdco.com/user/view-room/<?= $trad['room_id'];?>">
          <div class="post-box mb-3 pointer px-3" style="border: none;">
            <div class="row">
              <div class="col-12 border-bottom pb-2">
                <p class="xsmall2 m-0">
                    Status: 
                    <span class="badge badge-warning">Processing</span>
                </p>
              </div>
              <div class="col-4">
                <small class="xsmall2 bold-text grey-color">Room ID</small>
                <p class="m-0 xsmall2">ssUBYL</p>
              </div>
              <div class="col-4">
                <small class="xsmall2 bold-text grey-color">Date</small>
                <p class="m-0 xsmall2">31/10/2024, 12:00 PM</p>
              </div>
              <div class="col-4">
                <small class="xsmall2 bold-text grey-color">Your Role</small>
                <p class="m-0 bold-text">
                                            seller
                                    </p>
              </div>
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Send</small>
                <p class="m-0 xsmall2 bold-text">200.00 0X0</p>
              </div><div class="col-6">
                <small class="xsmall2 bold-text grey-color">Receive</small>
                <p class="m-0 xsmall2 bold-text">8.00 ACA</p>
              </div>
            </div>
          </div>
        </a>
        php endforeach; ?>
        php else : ?>
                <div  class=' m-3 mt-3'>
                    <p class="text-center" style="color:grey">No P2P Trades made yet! <a href='create-trade/' class='badge badge-outline badge-danger'>Create Trade</a>.</p>
                </div>
        php endif; ?>


      </div>
      <!-- -- -->
    </div>
</div>

<div class="col-12 d-block d-lg-none dark-bg mt-1 py-4 mt-3" style="border-radius: 8px;">
    <div class="d-flex">
      <p class="m-0 flex-fill">
        <small class="roboto px-3 py-1 xsmall2 fit-content dark-bg2" style="border-radius: 4px;">
          Recent Transactions
          <i class="material-icons top-4 ml-4 primary-color" style="font-size: 16px !important;">autorenew</i>
        </small>
      </p>
      <a href="https://www.apexholdco.com/user/transactions">
          <small class="roboto px-3 py-1 xsmall2 fit-content primary-color"
            style="border-radius: 4px; background: #3c341f;">
            See all
          </small>
      </a>
    </div>
    <!-- --- -->
    <div class="col-12">
        <?php
        //get transactions by id
        $transaction = UserRecentTransaction($uID);
        if (!empty($transaction)) : 
            foreach ($transaction as $transactio) : 
        ?>
        <a href="https://www.apexholdco.com/user/transaction-details/TXNO7JV1VVH">
          <div class="post-box mb-3 pointer" style="border: none;">
            <div class="row">
              <div class="col-12 border-bottom pb-2">
                <p class="xsmall2 m-0">
                    Status: 
                                        <span class="badge badge-warning">Processing</span>
                                    </p>
              </div>
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Ref</small>
                <p class="m-0 xsmall2"><?= $transactio['transaction_id']; ?></p>
              </div>
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Date</small>
                <p class="m-0 xsmall2"><?= date('d/m/Y, h:i A',htmlspecialchars($transactio['created_at'])) ?></p>
              </div>
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Value</small>
                <p class="m-0 xsmall2 bold-text"><?= $transactio['amount'] . $transactio['currency'] ; ?></p>
              </div> 
              <div class="col-6">
                <small class="xsmall2 bold-text grey-color">Type</small>
                <p class="m-0 bold-text">
                                        <span class="badge badge-outline badge-primary"><?= $transactio['direction']; ?></span>
                                    </p>
              </div>
            </div>
          </div>
        </a>
        
        <?php endforeach; ?>
        <?php else : ?>
                <div  class=' m-3 mt-3'>
                    <p class="text-center" style="color:grey"><?= $fullname; ?> No Transactions recorded yet! <a href='deposit/' class='badge badge-outline badge-primary'>Deposit</a>.</p>
                </div>
        <?php endif; ?>
    </div>
    <!-- -- -->
</div>
            

<script>
function marketDrawerOpen() {
  $('#marketDrawer').show('slide', { direction: 'down' }, 500)
}
function marketDrawerClose() {
  $('#marketDrawer').hide('slide', { direction: 'down' }, 500)
}

function setWalletBalance(tokenSymbol, balance) {
  $('.uw-bal').html(balance);
  $('.uw-tkn').html(tokenSymbol);
  toggleContextMenu('.w-ctx-menu')
}
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
    <?php include_once 'pages/account-control-panel.php';?>
    
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
                  <input type="hidden" name="_token" value="kf7O8H8FT9rsEA7E0G86CYV6GBqdmitLrgFt0nLN">                <div class="form-wrapper">
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
                            <input type="hidden" name="_token" value="kf7O8H8FT9rsEA7E0G86CYV6GBqdmitLrgFt0nLN">                            <div class="form-wrapper">
                                <select class="dark-input" style="border: none !important;" placeholder=" " name="currency_id">
                                                                            <option value="1">AXS</option>
                                                                            <option value="198">GARI</option>
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
                            <input type="hidden" name="_token" value="kf7O8H8FT9rsEA7E0G86CYV6GBqdmitLrgFt0nLN">                            <div class="form-wrapper">
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