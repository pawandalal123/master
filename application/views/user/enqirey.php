<?php
 $stateData= $this->common->selectAllState('state');
 $CategoryListData= $this->common->CategoryList();?>
<div class="mainContainer">
    <div class="topBanner clearfix container">
    
    <!-- left sidebar start -->
    <div class="leftside">
    <fieldset>
  <div class="left_ads_box">
	<div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>
</div>
</fieldset>
    </div>
    <!-- left sidebar end -->
        <div class="right_content">
        <!-- Buy Requirement page start -->
        	<div class="buy_requirement">
            <!--<div class="ttl-cntnr">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name">Tell us your Buy Requirement </h1>
                    <span class="icn icn-sqre"></span>
                </div>-->
               
                <form id="form1" method="post" action=""/>
                <h3 class="border2">Tell us your Buy Requirement</h3>
                <li> <?php
				if($succ_msg)
				{
					echo $succ_msg;
				}
				?></li>
     				<div class="buy_top">
                	<div class="field1">
                    	<label>Compnay Name</label>
                        <input id="company_name" name="companyname" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
                    </div>
                    
                    <div class="field1">
                    	<label>Requirement in detail</label>
                        <textarea name="requirment" id="requirment" cols="45" rows="5" class="product_desc" data-bvalidator="required"></textarea>
                    </div>
                 
                </div>
                
                <!-- contact details -->
                <div class="buying_contact">
                 <h3 class="border2">Your Contact Details</h3>
                <div class="field1">
                    	<label>Email</label>
                        <input  name="email" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="email,required" />
                        <div id="emailresonse" style="display:none;"></div>
                         <div id="emailre" style="display:none;"></div>
                    </div>
                    
                 <div class="field1">
                    	<label>Contact Person</label>
                        <input id="contect_person" name="contect_person" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
                    </div>
                    
                    <div class="field1">
                    	<label>Website</label>
                        <input id="website" name="website" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="url,required"/>
                    </div>
                    
                    <div class="field1">
                    	<label>State</label>
                        <div class="select select2">
                                <select  class="statelist" name="state">
                                   <?php foreach($stateData as  $state)
				{
					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';
				}
				?>
                                </select>
                            </div>
                            
                            <div class="select select3">
                                <select class="districList" name="districList">
                <option selected>Select District</option>
                </select>
                            </div>
                    </div>
                    
                    <div class="field1">
                    	<label>Mobile</label>
                        <input id="mobile" name="mobile" tabindex="1" class="signUpInputNew" type="text" />
                    </div>
                 
                 </div>
                <!-- contact details end -->
                <div class="submit_btn">
                <input name="submitEnquiry" value="Get Instant Quotes" class="btn btn-blue" type="submit" /></div>
                
                         </form>
            </div>
        <!-- Buy Requirement page end -->
        </div>
    
    </div>
  </div>