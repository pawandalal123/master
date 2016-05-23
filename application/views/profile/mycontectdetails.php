<?php 
if($this->session->userdata('UserId')=='')
{
	 redirect(SITE_URL);
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$this->session->userdata('UserId'));
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$usercompanyDetails=$this->common->usercompanyDetails($condition);
$userDetails=$this->common->userprofileDetails($this->session->userdata('UserId'));
$profilStatus=$this->common->userprofilecomplete($condition);
//echo $this->db->last_query();
//pr($userDetails);
$this->load->view('elements/profilehead');
?>
  <script>
  $(document).ready(function()
  {
	  $('#updateform').bValidator();
	  $('#updateformcompany').bValidator();  });
  </script>	
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
      
      <!-- inr right content start -->
            <div class="right_content" style="margin-top:0;">
      		<div id="inr_profile">
            	<!-- profile complete box -->
           	  <div class="grid3 mb grbg">
                   	  <div class="profile_progress pd clearfix">
							<div class="profile_comple_pic mr fl">
                            <?php
							if($userDetails->profile_image!='')
							{
								$path = WEBROOT_PATH_sell.''.$userDetails->profile_image;
							}
							else
							{
                                 $path = WEBROOT_PATH_IMAGES.''.'profile_thumb.png';
							}
							?>
                            <img src="<?php echo $path;?>"></div>
                            <div class="completion_box fl">
                           	  <h3 class="mb">Profile Completeness</h3>
									<div id="progress_bar" class="ui-progress-bar ui-container transition">
<div class="ui-progress" style="width: <?php echo $profilStatus;?>%;">
<span class="ui-label" style="display: none;">Completed</span>
</div>
</div>                            </div>
                            <span class="fr perchantage"><?php echo $profilStatus;?>% <br><a href="javascript:;" class="clickshow">Edit Profile</a></span>
                </div>
                <div class="box_border profile_info pd mrg_t15 clearfix profileshow">
                <form id="updateform" action="" method="post" enctype="multipart/form-data">
           <div class="hide show">
                    <br clear="all">
                <div class="buy_requirement">
				<div class="buy_top">
                <div class="cdfield"><div class="con_pro_m">
<fieldset>
<div  class="imgstore" id="imgstore1"  style="background-image: url(<?php  if($userDetails->profile_image!='') { echo WEBROOT_PATH_sell.''.$userDetails->profile_image; } else
{
	echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>); background-size:100% 100%">
</div>
</fieldset>
<div class="uplod_t"><a>Upload a Photo</a></div>
  <input type="file" name="UPDATELOGO" class="getimage" id="getimageID1" onchange="readURLChangeImage(this)">

</div></div>
               	  <div class="cdfield">
                    	<label><i>*</i>Contact Person</label>
                        <select tabindex="1" id="salute" name="salute" gtbfieldid="9" class="wdt">
	                <option value="Mr.">Mr. </option>
					<option value="Ms.">Ms. </option>
					<option value="Mrs.">Mrs. </option>
					<option value="Dr.">Dr. </option>
                      </select>
                     <input id="profle_name" name="profle_name" value="<?php echo $userDetails->profile_name;?>" tabindex="1" class="wdt6" type="text" data-bvalidator="alpha,required"  />
                    </div>
               	  <div class="cdfield">
               	    <label><i>*</i>Address</label>
                    <textarea class="wdt2" name="userAddress" data-bvalidator="required"><?php echo $userDetails->permanent_address;?></textarea>
                  </div>
                    
                  <div class="cdfield">
                    	<label> Telephone</label>
                    
                        <input id="code" name="code" tabindex="1" class="wdt3 fld_bg" type="text" placeholder="Code" />
                         <input id="Telephone" name="Telephone" tabindex="1" class="wdt6" type="text" />
                    </div>
                  <div class="cdfield">
               	    <label>Mobile/Cell Phone</label>
                    <input name="" tabindex="1" value="" class="wdt3 fld_bg" type="text" />
                        <input id="mobile_no" name="mobile_no" value="<?php echo $userDetails->mobile_no;?>" tabindex="1" class="wdt6" type="text" data-bvalidator="number,required"  />
                  </div>
                  
                  <div class="cdfield">
               	    <label>Primary E-mail</label>
                    <?php echo $this->session->userdata('email');?>
                  </div>
                 <div class="submit_btn clearfix">      
                  <input name="updateuser" type="submit"  class="btn btn-blue"  value="SAVE">           
	            <div class="e_box btn"><a href="javascript:;" class="closeprofile">
            <img src="<?php echo WEBROOT_PATH_IMAGES; ?>trash-icon.gif"> Discard </a></div>
            
                         
                </div>
            </div>
        </div>
        </div>
            </form>
          </div>
                        <!-- profile info start -->
<div class="profile_info pd arrowlistmenu">
<?php
if($usercompanyDetails==0)
{
	echo "Not List Any Company yet";
}
else
{
	foreach($usercompanyDetails as $usercompanyDetails)
	{
?>
    <div class="menuheader expandable">Details Of <?php echo $usercompanyDetails->company_name;?></div>
        <div class="categoryitems acd_cont_b">
        <div class="check_box">
        
        <form class="hide2 lshow">
        <div class="e_box"><a href="javascript:;" class="show2">Edit</a></div><br>

        <div class="cg_logo"><img src="<?php  if($usercompanyDetails->copmnay_logo!='') { echo WEBROOT_PATH_sell.''.$usercompanyDetails->copmnay_logo; } else
{
	echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>"></div>
        
              <ul class="list_cdatail clearfix">
                 <li>CEO Name</li><li><label for="textfield"><?php echo $usercompanyDetails->profile_name; ?></label></li>
                <li>Contact Person</li> <li><label for="textfield"><?php echo $usercompanyDetails->contect_person; ?></label></li>
                <li>Designation / Job Title</li><li><label for="textfield"><?php echo $usercompanyDetails->Designation; ?></label></li>
                <li>Company Name</li><li><label for="textfield"><?php echo $usercompanyDetails->company_name; ?></label></li>
                <li>Address</li><li><label for="textfield"><?php echo $usercompanyDetails->address; ?></label></li>
                <li>City, State, ZIP Code</li><li><label for="textfield"><?php echo $usercompanyDetails->distric.','.$usercompanyDetails->city.','.$usercompanyDetails->state,','.$usercompanyDetails->pincode; ?></label></li>
                <li>Telephone No:</li><li><label for="textfield"><?php echo $usercompanyDetails->phone_no; ?></label></li>
                <li>Telephone1 No:</li><li><label for="textfield"><?php echo $usercompanyDetails->phone_no1; ?></label></li>
                <li>Mobile No:</li><li><label for="textfield"><?php echo $usercompanyDetails->mobile_no; ?></label></li>
                <li>Mobile Another No:</li><li><label for="textfield"><?php echo $usercompanyDetails->mobile_no1; ?></label></li>
                <li>Alternative Email:</li><li><label for="textfield"><?php echo $usercompanyDetails->alternative_email_id1; ?></label></li>
                
                <li>Fax No:</li><li><label for="textfield"><?php echo $usercompanyDetails->fax_no; ?></label></li>
                </ul>
              </form>
              
             
              <div class="buy_requirement hform lhide showform">
              <form id="updateformcompany" name="form1" method="post" action="<?php echo SITE_URL?>user/updateContectDetails" enctype="multipart/form-data">
              
              <div class="con_pro_m">
<fieldset>
<div class="imgstore"  id="imgstore2"  style="background: url(<?php  if($usercompanyDetails->copmnay_logo!='') { echo WEBROOT_PATH_sell.''.$usercompanyDetails->copmnay_logo; } else
{
	echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>) center top no-repeat ; background-size:100% 100%">
</div>
</fieldset>
<div class="uplod_t"><a>Upload a Photo</a></div>
  <input type="file" name="UPDATELOGO" class="getimage" id="getimageID2" onchange="readURLChangeImage(this)">

</div>
                   
			    	<div class="buy_top">
                 	<div class="cdfield">
                    <label><i>*</i> Contact Person</label>
                    <?php $Contectname=explode(' ',$usercompanyDetails->contect_person);
					      $ceoname=explode(' ',$usercompanyDetails->profile_name);
						  $fax_no=explode('-',$usercompanyDetails->fax_no);
					
					?>
                    <select tabindex="1" id="salute" name="salute" gtbfieldid="9" class="wdt">
	                <option value="Mr." selected="selected">Mr. </option>
					<option value="Ms.">Ms. </option>
					<option value="Mrs.">Mrs. </option>
					<option value="Dr.">Dr. </option>
                    </select>
                        <input id="contectfirst" name="contectfirst" tabindex="1" class="wdt1" type="text" value="<?php echo $Contectname[0];?>" data-bvalidator="required" />
                        <input id="contectlast" name="contectlast" tabindex="1" class="wdt1" type="text" value="<?php echo $Contectname[1];?>" />
                    </div>
                    
                    <div class="cdfield">
                    	<label>Designation / Job Title</label>
                      <input id="Designation" name="Designation" value="<?php echo $usercompanyDetails->Designation;?>" tabindex="1" class="wdt2" type="text" />
                    </div>
                    
                    <div class="cdfield">
                    	<label>CEO Name</label>
                      <select tabindex="1" id="salute" name="salute" gtbfieldid="9" class="wdt">
	                <option value="Mr.">Mr. </option>
					<option value="Ms.">Ms. </option>
					<option value="Mrs.">Mrs. </option>
					<option value="Dr.">Dr. </option>
                    </select>
                      <input id="CEO" name="CEOfirstname" tabindex="1" class="wdt1" type="text" value="<?php  echo $ceoname[0]?>" />
                      <input id="CEO" name="CEOlastname" tabindex="1" class="wdt1" type="text" value="<?php  echo $ceoname[1]?>"/>
                    </div>
                    
                    <div class="cdfield">
                    	<label><i>*</i>Company Name</label>
                      <input id="company_name" name="company_name" value="<?php echo $usercompanyDetails->company_name;?>" tabindex="1" class="wdt2" type="text" data-bvalidator="required" /><span class="hint">This hint for Select Option.<span class="hint-pointer">&nbsp;</span></span>
                    </div>
                    
                  <div class="cdfield">
               	    <label><i>*</i>Address</label>
                    <input  type="text" name="address"  class="wdt2" value="<?php echo $usercompanyDetails->address;?>" data-bvalidator="required"/>
                    <span class="hint">This hint for Select Option.<span class="hint-pointer">&nbsp;</span></span>
                    </div>
                    
                  <div class="cdfield2 clearfix">
                    <div class="field_ct">
                    <label><i>*</i> City</label>
                    <input name="city" class="suggestionupdateCity"  type="text" value="<?php echo $usercompanyDetails->distric;?>" id="city" data-bvalidator="required"/>
                    <span class="hint">This hint for Select Option.<span class="hint-pointer">&nbsp;</span></span>
                    </div>
                    <div class="field_ct">
                    <label>State</label>
                    <input name="state"  class="suggestionupdatestate" type="text" id="state" value="<?php echo $usercompanyDetails->state;?>" autocomplete="off" data-bvalidator="required"><span class="hint">This hint for Select Option.<span class="hint-pointer">&nbsp;</span></span>
                    </div>
                    <div class="field_ct">
                    <label>Postal / ZIP Code</label>
                    <input name="pincode" class="suggestionupdatepincode" type="text" id="pincode" value="<?php echo $usercompanyDetails->pincode;?>" autocomplete="off">
                    </div>
                    </div>
                    
                    <div class="cdfield">
                    	<label><i>*</i> Country</label>
                      <input id="country" name="country" tabindex="1" class="wdt2 fld_bg" type="text" value="<?php echo $usercompanyDetails->country;?>" />
                    </div>
                    
                    <div class="cdfield">
                    	<label> Telephone 1</label>
                      <input name="Telephonecodecountry" tabindex="1" value="+91" class="wdt3 fld_bg" type="text" />
                      <input id="Telephonecode" name="Telephonecode" tabindex="1" class="wdt4" type="text" />
                      <input id="Telephone" name="Telephone" tabindex="1" class="wdt5" type="text" />
                    </div>
                    
                    <div class="cdfield">
                    	<label>Telephone 2</label>
                       <input name="Telephoneanothercodecountry" tabindex="1" value="+91" class="wdt3 fld_bg" type="text" />
                      <input id="Telephoneanothercode" name="Telephoneanothercode" tabindex="1" class="wdt4" type="text" />
                      <input id="Telephone" name="Telephoneanother" tabindex="1" class="wdt5" type="text" />
                    </div>
                  
                    <div class="cdfield">
                    	<label><i>*</i> Mobile/Cell Phone 1</label>
                     
                        <input id="Mobile" name="Mobile" tabindex="1" class="wdt6" type="text" value="<?php echo $usercompanyDetails->mobile_no;?>" data-bvalidator="number,required" />
                  </div>
                    
                    <div class="cdfield">
                    	<label>Mobile/Cell Phone 2</label>
                        
                        <input id="Mobile" name="Mobileanother" tabindex="1" class="wdt6" type="text"  value="<?php echo $usercompanyDetails->mobile_no1;?>" />
                  </div>
                      
                      <div class="cdfield">
                    	<label>Fax</label>
                        <input name="countryfaxcocde" tabindex="1" value="<?php if($fax_no[0!=''])
						{
							echo $fax_no[0];
						}
						else
						{
							echo '+91';
						}?>" class="wdt3 fld_bg" type="text" />
                        <input id="Faxcode" name="Faxcode" tabindex="1" class="wdt4" type="text" value="<?php echo $fax_no[1];?>" />
                         <input id="Faxno" name="Faxno" tabindex="1" class="wdt5" type="text" value="<?php echo $fax_no[2];?>" />
                    </div>
                    
                    
                    
                    <div class="cdfield">
                    	<label><i>*</i> Primary E-mail</label>
                     <span><?php echo $usercompanyDetails->email_id;?></span>
                    </div>
                 
                    <div class="cdfield">
                    	<label>Alternate E-mail </label>
                      <input id="AlternateEmail" name="AlternateEmail" value="<?php echo $usercompanyDetails->alternative_email_id1;?>" tabindex="1" class="wdt2" type="text" />
                    </div>
                    
                    <div class="cdfield">
                    	<label>Your Catalog</label>
                        <input id="ctalog" name="ctalog" value="<?php echo SITE_URL;?>user/mycatalog/home/<?php echo $usercompanyDetails->company_name.'/'.$usercompanyDetails->company_id;?>" tabindex="1" class="wdt2 fld_bg" type="text" />
                    </div>
                    
                    <div class="cdfield">
                    	<label>Alternate Website</label>
                        <input id="AlternateWebsite" name="AlternateWebsite" value="<?php echo $usercompanyDetails->website;?>" tabindex="1" class="wdt2" type="text" />                    </div>
                                        
                <!-- contact details end -->
                <div class="submit_btn clearfix">  
                 <input type="hidden" value="<?php  echo $usercompanyDetails->company_id;?>" name="company_id" /> 
                         
                 <input type="submit"  class="btn btn-blue"  value="SAVE">  
                
                 <div class="e_box btn"><a href="javascript:;" class="formsave">
            <img src="<?php echo WEBROOT_PATH_IMAGES; ?>trash-icon.gif"> Discard </a></div>               
                </div>
            
         
            </div>
               </form>
        </div>
       
        </div>
</div>
<?php } } ?>


                        
                        
                </div>
               
           	  <div class="grid2 mt fl">
                    	<h3 class="pd bb h3bg">My Alerts & Newsletters<span class="alert_img"></span></h3>
                        
                <div class="alert_title bb pd clearfix">
                        	<div class="fl title1">Alert</div>
                            <div class="fl title2">Enable/Disable</div>
                            <div class="fr title3">Setting</div>
                </div>
                        <div class="alert_box">
                        	<ul class="alert_list">
<li class="clearfix">
<p class="fl tender_alert"><a href="#">Tender Alerts</a></p>
<p class="fl"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>enable.png"></a></p> 
<p class="fr"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>setting.png"></a></p>
</li>

<li class="clearfix">
<p class="fl buy_alert"><a href="#">Buy Leads Alert</a></p>
<p class="fl"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>enable.png"></a></p>
<p class="fr"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>setting.png"></a></p>
</li>

<li class="clearfix">
<p class="fl sms_alert"><a href="#">Enquiry Alert on SMS</a></p>
<p class="fl"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>enable.png"></a></p>
<p class="fr"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>setting.png"></a></p>
</li>

<li class="clearfix">
<p class="fl newsletter_alert"><a href="#">Newsletter Subscription</a></p>
<p class="fl"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>enable.png"></a></p>
<p class="fr"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>setting.png"></a></p>
</li>
</ul>
                  </div>                    
              </div>
                <!-- my alert and newsletter -->
                
                
                <!-- toll free details -->
                <div class="grid2 fr mt">
               	  <div class="toll_free pd">
                    <h3>Call Toll-Free:</h3>
                    <p><strong>XXXX-200-4444</strong> for any kind of assistance or mail us at <a href="mailto:customercare@indiabizsaath.com">customercare@indiabizsaath.com</a></p>
                  </div>
                </div>
                <!-- toll free details end -->
                
                
            </div>   
            
           
            
                    
      </div>
      <!-- inr right content end -->
      
      
     
    </div>

  </div>