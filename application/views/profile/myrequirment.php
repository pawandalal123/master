<?php 
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
        <h3>Buyer Tools</h3>
<ul class="left_list">
<!--<li class="hed_list"><b>Seller Tools</b></li>-->
<li><a href="#">Post a Buy Requirement</a></li>
<li><a href="#">Manage Buy Requirements</a></li>
<li><a href="#">Manage Sell Offers Alerts</a></li>
<li><a href="#">Search Products & Suppliers</a></li>
</ul>
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
      <div class="right_content" style="margin:0;">
      	<div id="inr_profile">       
              <div class="seller_tool_box pd">
              <h3 class="mb">Manage Buy Requirements</h3>
         
               <!-- product box 1 -->
                <div class="manage_list1 mb clearfix bordr pd">
<h3>Looking for Suppliers?</h3>
<p>Save time & money. Get quotes instantly from trusted suppliers</p>

<a href="#" class="step_btn">
<div class="step_box clearfix">
<div class="step1 mt">Complete Simple Form</div>
<div class="step_img"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>breadcrumbs-divider.png"></div>

<div class="step1 mt">Qualified Suppliers Respond</div>
<div class="step_img"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>breadcrumbs-divider.png"></div>

<div class="step1 mt">Choose Best Supplier & Purchase</div>
</div>
</a>

<div class="post-button centr"><a href="<?php  echo SITE_URL;?>buylead/Requirment">Post your Buy Requirement Now!</a></div>

              </div>
              <!-- product box 1 end -->
              
 
             
       
              <!--<div class="noresult">No Result to Display </div>-->
              
              </div>
        </div>
      <!-- inr right content end -->
      
      
     
    </div>

  </div>
    
    
    
    
  