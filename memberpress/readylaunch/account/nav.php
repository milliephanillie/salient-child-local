<?php
  $mepr_current_user = MeprUtils::get_currentuserinfo();
  $delim = MeprAppCtrl::get_param_delimiter_char($account_url);
  $logout_url   = MeprUtils::logout_url();
?>
<div class='container'>
  <!-- <nav id="mepr-account-nav" x-data="{ open: false }" class="mepr-nav" :class="open ? 'open' : ''" @toggle-menu.window="open=!open" >


  </nav> -->
  <!-- This opening div is necessary for flex to work -->
  <div id="mepr-account-content" class="mp_wrapper" style="width: 100%;">