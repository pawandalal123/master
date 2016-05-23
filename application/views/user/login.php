    <div class="logoBoxContainer">
      <div class="logoBox fl">
        <a title="IndiaBizSaath" class="fl" href="<?php echo SITE_URL;?>"><img src="<?php echo WEBROOT_PATH_IMAGES;?>logo.png" alt="IndiaBizSaath"/></a>
      </div>
      <div class="login_toplink_box">
      
        | &nbsp;
        
        <a href="<?php echo SITE_URL;?>register" >List Your Company</a>
        | &nbsp;
        
        <a href="<?php echo SITE_URL;?>enquiry">Enquiries</a>
      </div>
    </div>
        <div class="main_container">
  <div class="form_box">
    <div class="or_box">
      <span class="or_box_inr">or</span>
    </div>
    
    <!-- Login form start -->
    <div class="login_box">
      <div id="loginDiv">
        <h1 class="hd2">Login To Your Account</h1>
      <?php
	  if($err_msg)
	  {
		  echo '<div class="alert alert-error fade in">
            <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
            <strong>'.$err_msg.'</strong> </div>';
	  }
	  ?>
        <form id="form1" name="signin" action="" method="post">
          <fieldset class="mrgn-b-20">
            <label class="fnt-bold fnt-sz10" for="loginName">Email ID</label>
            <input id="loginName" name="email" tabindex="10" class="signUpInputNew" type="text"  data-bvalidator="email,required" />
           <?php echo form_error('email');?>
            <label class="fnt-bold fnt-sz10">Password</label>
            <input name="password" tabindex="20" class="signUpInputNew" type="password"  data-bvalidator="required" />
             <?php echo form_error('password');?>
            <div name="forgot-link-cntnr" class="mrgn-b-20 forgot_box">
              <a id="forgotPasswordLink" href="<?php echo SITE_URL;?>category/forgetPass">forgot password ?</a>
            </div>
            <div>
              <input name="userlogin" value="Sign In" class="btn btn-blue" type="submit" />
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <!-- Login form end -->
    <!-- Signup form start -->
    <div class="signup_box">
      <div id="signUpDiv">
       <h1 class="hd2">Register With Us</h1>
        <?php
	  if($succ_msg)
	  {
		  echo '<div class="alert alert-success fade in">
            <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
            <strong>'.$succ_msg.'</strong> </div>';
	  }
	  ?>
        <form id="enquiryform" name="signin" action="" method="post">
          <fieldset class="mrgn-b-20">
           <label class="fnt-bold fnt-sz10" for="loginName">Name</label>
            <input id="loginName" name="username" tabindex="10" class="signUpInputNew" type="text"  data-bvalidator="required" />
           <?php echo form_error('username');?>
            <label class="fnt-bold fnt-sz10" for="loginName">Email ID</label>
            <input id="loginName" name="useremail" tabindex="10" class="signUpInputNew" type="text"  data-bvalidator="email,required" />
           <?php echo form_error('useremail');?>
            <label class="fnt-bold fnt-sz10">Mobile</label>
            <input name="usermobile" tabindex="20" class="signUpInputNew" type="text"  data-bvalidator="required" />
             <?php echo form_error('usermobile');?>
             <label class="fnt-bold fnt-sz10">Address</label>
            <input name="address" tabindex="20" class="signUpInputNew" type="text"  data-bvalidator="required" />
             <?php echo form_error('address');?>
           
            <div>
              <input name="registerwithus" value="Register" class="btn btn-blue" type="submit" />
            </div>
          </fieldset>
        </form>
        
      </div>
    </div>
    <!-- Signup form end -->
  </div>
      <div class="floatfix"></div>
    </div>
     <div class="clearfix"></div>
    <div class="footer">
      <img class="disp-inln authimg" src="<?php echo WEBROOT_PATH_IMAGES;?>auth.gif" alt="authenticity"/>
      <div class="disp-inln txt-lft authtxt">
        <span class="fnt-bolder show fnt-caps ">authenticity </span>
        <span class="fnt-bolder show fnt-caps "> guaranteed</span>
      </div>
      <span class="disp-inln divid">|</span>
      <span class="fnt-bolder satisfa  disp-inln">100% </span>
      <div class="disp-inln lh1">
        <span class="fnt-bolder show fnt-caps txt-lft">secure </span>
        <span class="fnt-bolder show fnt-caps txt-lft">payments</span>
      </div>
    </div>

