<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$this->load->view('elements/profilehead');
//echo $this->db->last_query();
?>
  	
  <!-- Inner Navigation End -->
      <div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
          

		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
				
                <!-- ads box start -->
<div class="leftside">
    	<div class="benefits">
        <h3>Company Profile</h3>
        <div class="con_pro_m">
</div>

<?php

$this->load->view('elements/left-nav.php');
?>
        </div>
        
        <div class="satisfied">
        <h4>You may also like to</h4>
			<ul class="left_list2">
                  <li><a href="#">View Latest Buy Leads</a></li>
                  <li><a href="#">Add Products / Offers</a></li>
                </ul>
        </div>
    </div>
<!-- ads box end -->
                
        <div class="floatfix"></div>
      </div>
      <!-- inr left content end -->
      <div class="box_rw">
      <h2>Change Password</h2>
      <div class="cp_box clearfix">
      <input type="hidden" class="userid" id="<?php echo $userId; ?>" />
         <label for="textfield"><span>*</span>Enter Your Current Password:</label>
        <input type="password" name="oldpassword" id="oldpassword">
        <div id="emailresonse"></div>
        <div id="emailre"></div>
        <br clear="all" />
        <label for="textfield"><span>*</span>Choose a New Password:</label>
        <input type="password" name="newpassword" id="newpassword">
        <br clear="all" />
        <label for="textfield"><span>*</span>Confirm Your New Password:</label>
        <input type="password" name="newpasswordmatch" id="newpasswordmatch">
        <div id="passwordstataus"></div>
        <br clear="all" />
        <button class="button_f button-green changepassword">Change Password</button>
            </div>
      <p>&nbsp;</p>
      </div>
      <!-- inr right content start -->
      

  </div>
    
    
    
    
  