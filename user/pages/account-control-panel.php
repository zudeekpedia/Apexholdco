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
            <i class="material-icons top-4 grey-color" style="font-size: 18px;"></i>&nbsp;&nbsp;
            <small class="xsmall">Account Settings</small>
          </div>
        </a>

        <a class="mainWhite pointer" href="https://www.apexholdco.com/user/kyc-application">
          <div class="a-p-inner px-3 py-2 pb-3">
            <i class="material-icons-outlined top-4 grey-color" style="font-size: 18px;">beenhere</i>&nbsp;&nbsp;
            <small class="xsmall">Verification</small>
          </div>
        </a>
        
        
        <a href="logout/" class="mainWhite pointer">
          <div class="a-p-inner px-3 py-2 pb-3" style="border-radius: 0px 0px 6px 6px;">
            <i class="material-icons-outlined top-4 grey-color" style="font-size: 18px;">key</i>&nbsp;&nbsp;
            <small class="xsmall">Sign out</small>
          </div>
        </a>
        
        <form id="logout-form" action="https://www.apexholdco.com/user/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="kf7O8H8FT9rsEA7E0G86CYV6GBqdmitLrgFt0nLN">        </form>
      </div>
    </div>