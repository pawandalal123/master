<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$UsersellEnquiryList=$this->common->userenquiryData($condition,false);
$leadListingData=$this->common->leadListingdata($condition,false);
$productList=$this->common->userProductListingdata($condition,false);
$profilStatus=$this->common->userprofilecomplete($condition);
//echo $this->db->last_query();
$this->load->view('elements/profilehead');
?>
  	
  <!-- Inner Navigation End -->
      <div class="main_container clearfix">
        <div class="centralContent">
    <!--<div class="hk-breadcrumb-cntnr mrgn-bt-10">
            <span>
               <a href="#">Home</a>
            </span>
        <span>&raquo;</span>
        <span class="fnt-bold">Account</span>
    </div>-->
            <div class="floatfix"></div>
        </div>
        
        

		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
        
                <!-- ads box start -->
<div class="left_ads_box">
	<div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img  alt="add banner"src="<?php echo WEBROOT_PATH_IMAGES; ?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img alt="add banner" src="<?php echo WEBROOT_PATH_IMAGES; ?>ad3.jpg"></a></div>
</div>
<!-- ads box end -->

        <div class="floatfix"></div>
      </div>
      <!-- inr left content end -->
      <!-- inr right content start -->
      <div class="right_content"  style="margin-top:0px;">
      		<div id="inr_profile">
            	<!-- profile complete box -->
                	<div class="grid3 mb grbg">
                   	  <div class="profile_progress pd clearfix">
							<div class="profile_comple_pic mr fl"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>profile_thumb.png"></div>
                            <div class="completion_box fl">
                           	  <h3 class="mb">Profile Completeness</h3>
									<div id="progress_bar" class="ui-progress-bar ui-container transition">
<div class="ui-progress" style="width: <?php echo $profilStatus;?>%;">
<span class="ui-label" style="display: none;">Completed</span>
</div>
</div>
                            </div>
                            <span class="fr perchantage"><?php echo $profilStatus;?>% <br></span>
                        </div>
                        <!-- profile info start -->
                        	<div class="profile_info pd">
                            	<ul>
                                <li>Mr.<?php echo $this->session->userdata('DisplayName');?></li>
                                <li><?php echo $this->session->userdata('DisplayAddress');?></li>
                                </ul>
                            </div>
                    </div>
            	<div id="inr_box_map">
                	<h3>My Buyer Location Preference is not set</h3>
                    <p><a href="#" class="btn1">Set Now</a></p>
                </div>
                <div id="inr_box2">
                	<h3>Get your primary contact information verified</h3>
                    <p>Gain your buyers trust & receive more business enquiries</p>
                    <div class="email_mobile">
                    	<ul>
                        <li class="clearfix">Email:
                         <?php echo $this->session->userdata('email');
						 if($this->session->userdata('emailstatus')=='Verify')
						 {
							 echo '<span class="email_verify">Verified</span>';
						 }
						 else
						 {
							 echo '<span class="not_verify verifyEmail" id="'.$this->session->userdata('UserId').'">Verified Now</span>';
						 }
						?>
                         </li>
                        <li class="clearfix">Mobile: +91 <?php echo $this->session->userdata('mobile');
						if($this->session->userdata('mobilestatus')=='Verify')
						 {
							 echo '<span class="email_verify">Verified</span>';
						 }
						 else
						 {
							 echo '<span class="not_verify verifyMobile" id="'.$this->session->userdata('UserId').'">Verified Now</span>';
						 }
						 ?>
                        </span></li>
                        </ul>
                    </div>
                </div>
                
                <div class="clear"></div>
                 <?php if($UserCatalogList==0)
			  {
			  }
			  else
			  {
				  ?>
                	<div class="url_box bordr clearfix">
                    <?php foreach($UserCatalogList as $UserCatalogListData)
					{ ?>
                    	<div class="catalog_url bb clearfix">
                    	<p class="fl">Your FREE! Business Catalog for <?php echo $UserCatalogListData->company_name;?><br>
							<a href="<?php echo  SITE_URL.'user/mycatalog/home'.'/'.str_replace(' ','-',$UserCatalogListData->company_name).'/'.$UserCatalogListData->company_id?>" class="url"><?php echo  SITE_URL.'user/mycatalog/home'.'/'.str_replace(' ','-',$UserCatalogListData->company_name).'/'.$UserCatalogListData->company_id?></a>
						</p>
                        <p class="fr"><a href="<?php echo  SITE_URL.'user/mycatalog/home'.'/'.str_replace(' ','-',$UserCatalogListData->company_name).'/'.$UserCatalogListData->company_id?>" class="btn1">View</a></p>
                        </div>
                        <?php
					}  }?>
                        
              </div>
              <?php if($UsersellCatalogList==0)
			  {
			  }
			  else
			  {
				  ?>
              <div class="url_box bordr clearfix">
                    <?php foreach($UsersellCatalogList as $UsersellCatalogListData)
					{ ?>
                    	<div class="catalog_url bb clearfix">
                    	<p class="fl">Your FREE! Sell Product for <?php echo $UsersellCatalogListData->company_name;?><br>
							<a href="<?PHP echo SITE_URL;?>productsell/productdetail/<?php echo str_replace(' ','-',$UsersellCatalogListData->title).'/'.$UsersellCatalogListData->product_id;?>" class="url"><?php echo  SITE_URL.'productsell/productdetail'.'/'.str_replace(' ','-',$UsersellCatalogListData->title).'/'.$UsersellCatalogListData->product_id;?></a>
						</p>
                        <p class="fr"><a href="<?PHP echo SITE_URL;?>productsell/productdetail/<?php echo str_replace(' ','-',$UsersellCatalogListData->title).'/'.$UsersellCatalogListData->product_id;?>" class="btn1">View </a></p>
                        </div>
                        <?php
					} } ?>
                        
              </div>
                <!-- url box end -->
                
                <div class="clear"></div>
                
                <!-- my enquiry box -->
                	<div class="grid2 mt fl">
                    	<h3 class="pd bb h3bg">My Enquiries<span class="fr">(4)</span></h3>
                        <!--<div class="no_enquiry">No new enquiry found.</div>-->
                      <?php
					  if($UsersellEnquiryList==0)
					  {
						   echo '<div class="no_enquiry">No new leads found.</div>';
					  }
					  else
					  {
					   foreach($UsersellEnquiryList as $UsersellEnquiryList)
					  {?>
                       <div class="enquiry1 pd bb clearfix">
                        	<div class="profile_img bordr mr"><?php echo substr($UsersellEnquiryList->name,0,1);?></div>
                            <div class="enquiry_detail mr">
                            	<p class="profile_name"><a href="#"><?php echo $UsersellEnquiryList->name;?></a></p>
                           	  <p class="profile_desc"><a href="#"><?php echo $UsersellEnquiryList->message;?></a></p>
                            </div>
                            <a href="#" class="fr reply">Reply</a>
                      </div>
                      <?php } }?>
                      
                      <a href="<?php echo SITE_URL;?>user/useraccount/inbox" class="pd show_all">Show all enquiries</a>
                        
                    </div>
                <!-- my enquiry box end -->
                
                <!-- latest buy lead -->
                	<div class="grid2 mt fr">
                    	<h3 class="pd bb h3bg">Latest Buy Leads (<?php $condition=array('company_details.user_id'=>$userId); 
						echo $this->common->ViewLeadProductDetailsCount($condition);?>)</h3>
                        <?php if($leadListingData==0)
						{
							echo '<div class="no_enquiry">No new leads found.</div>';
						}
						else
						{
							foreach($leadListingData as $leadListingData)
							{
							?>
                             <div class="enquiry1 pd bb clearfix">
                        	
                            <div class="enquiry_detail mr">
                            	<p class="profile_name"><a href="#"><?php echo $leadListingData->product_name;?></a></p>
                           	  <p class="profile_desc"><a href="#"><?php echo substr($leadListingData->requirment,0,50);?></a></p>
                            </div></div>
                            <?php
						}}
						?>
                    </div>
                <!-- latest buy lead end -->
                <!-- my products offer -->
           	  <div class="grid1 mt fl clearfix">
                    	<h3 class="pd bb h3bg">My Products / Offers (4) <span class="fr"><a href="<?php echo SITE_URL;?>user/useraccount/addnewproduct" class="btn3">Add Product / Offers</a></span></h3>
                        <?php 
						if($productList==0)
						{
						}
						else
						{
							foreach($productList as $productListData )
							{
						?>
                        <div class="product_list pd clearfix">
                        	<div class="product_img fl bordr mr">
                            <?php if($productListData->product_image!='')
							{
								?>
                                <img src="<?php echo WEBROOT_PATH_sell.''.$productListData->product_image;?>">
                                <?php 
							}
							else
							{
								?>
                                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>nophoto.jpg">
                                <?php 
							}
							?>
                            </div>
                            <div class="product_descr">
                            	<h3><?php echo $productListData->company_name ?> | <?php echo substr($productListData->	bussiness_nature,0,25)?></h3>
                                <p><?php echo substr($productListData->discription,050)?></p>
                                	<ul class="ul_list">
                                    
                                     <?php if($productListData->product_image=='')
							{
                               echo  '<li><a href="#">Add Photo</a></li>';
							}
							else
							{
								echo '<li><a href="#">'.$productListData->state.'|'.$productListData->city.'</a></li>';
							}
							?>
                                    <li><a href="#">Add Description</a></li>
                                    </ul>
                            </div>
                        
                        </div>
                        <?php } } ?>
</div>
                <!-- my product offer -->
                
                <!-- my alert and newsletter -->
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
                    <p><strong>1800-200-4444</strong> for any kind of assistance or mail us at <a href="mailto:customercare@indiabizsaath.com">customercare@indiabizsaath.com</a></p>
                    </div>
                </div>
                <!-- toll free details end -->
                
                
            </div>           
      </div>
      <!-- inr right content end -->
      
      
     
    </div>
    
    
    
    
  