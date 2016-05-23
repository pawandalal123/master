<?php 
$productID= $ProductId;
$productName= $ProductName;
$DetailsDta= $this->common->ViewProductDetails($productName,$productID);
$catcondition=array("cat_id"=>$DetailsDta->category);
$condition=array("sub_cat_id"=>$DetailsDta->sub_category);
$SubcatName=$this->common->userSubCategoryName($condition);
$catNameDisplay=$this->common->CategoryName($catcondition);
$nextCondition="product_id >'".$DetailsDta->product_id."' and category='".$DetailsDta->category."' and sub_category='".$DetailsDta->sub_category."' order by product_id asc";
$priviousCondition="product_id <'".$DetailsDta->product_id."' and category='".$DetailsDta->category."' and sub_category='".$DetailsDta->sub_category."' order by product_id desc";
$checkNextListStatus=$this->common->CheckNextListing($nextCondition,1);
$checkPriListStatus=$this->common->checkpriviousListStatus($priviousCondition,1);
//print_r( $DetailsDta);
?>
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
        <!-- detail page start -->
       <div class="breadcrumbs" style="width:auto;">
            <span class="fa-angle-right fa"></span>
            <a href="<?php echo SITE_URL.'category/index'.'/'.str_replace(' ','-',$catNameDisplay->alternate_category).'/'.$catNameDisplay->cat_id;?>"> <?php echo $catNameDisplay->category;?></a>
            <span class="fa-angle-right fa">>></span>
            <a href="<?php echo  SITE_URL.'category/index'.'/'.str_replace(' ','-',$catNameDisplay->alternate_category).'/'.str_replace(' ','-',$SubcatName->subcategory).'/'.$catNameDisplay->cat_id.'/'.$DetailsDta->sub_category;?>"><?php echo $SubcatName->subcategory;?></a>
        </div>
        <div class="detail_box">
        	<div class="detail_top">
                <div class="ttl-cntnr clearfix">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name"><?php echo $productName;?></h1>
                       
                    <span class="icn icn-sqre"></span>
                    <?php
					if($checkPriListStatus==0)
					{
						?>
						 <a href="#" class="control_prevview">Previous</a>
                         <?php
					}
					else
					{
						?>
                        <a href="<?php echo SITE_URL.'detail'.str_replace(' ','-',$checkPriListStatus->bussiness_nature).'/'.$checkPriListStatus->product_id;?>"class="control_prevview">Previous</a>
                        <?php
					}
					
					if($checkNextListStatus==0)
					{
						?>
						<a href="javascript:;" class="control_nextview">Next</a>
                         <?php
					}
					else
					{
						?>
                        <a href="<?php echo SITE_URL.'detail/'.str_replace(' ','-',$checkNextListStatus->bussiness_nature).'/'.$checkNextListStatus->product_id;?>"class="control_nextview">Next</a>
                        <?php
					}
					?>
                    
                </div>
            </div>
            
            <div class="detail_bottom mrgn-bt-20 clearfix">
            <?php
			if($DetailsDta->product_image!='')
			{
				$path=WEBROOT_PATH_sell.''.$DetailsDta->product_image;
			}
			else
			{
				$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif"';
			}
			?>
            	<div class="detail_gallery"><img src="<?php echo $path;?>"></div>
                
                <div class="contact_detail">
                    <div class="user_form">
                    	<div class="ttl-cntnr">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name">Send Enquiry</h1>
                        
                    <span class="icn icn-sqre"></span>
                    </div>
                 <form id="form1" action="<?php echo SITE_URL?>adduser/AddproductEnquiry" method="post">
            <input id="name" name="name" placeholder="Name" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
            <?php echo form_error('name');?>
            <input id="email_id" name="email" placeholder="Email" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="email,required" />
            <input id="mobile" name="mobile" placeholder="Phone" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="number,required"  />
            <textarea name="product_description" id="textarea" cols="45" placeholder="Message"  rows="5" class="product_desc" data-bvalidator="required" ></textarea>
            
             <input id="product_id" name="product_id"  type="hidden" value="<?php echo $productID;?>" />
             <input id="product_name" name="product_name"  type="hidden" value="<?php echo $productName;?>" />
            <input name="submit" value="Send Enquiry" class="btn btn-blue" type="submit" />
            </form>
                    </div>
                </div>
            </div>
            
            
            <div class="user_add clearfix">
            		<div class="user_add_left">	
                    	<p class="contact_person"><strong>Name</strong> :- <span><?php echo $DetailsDta->contect_person;?></span></p>
                        <p class="contact_address"><strong>Address</strong> :- <span><?php echo $DetailsDta->address;?></span></p>
                        <p class="contact_no"><strong>Contact no</strong> :- <span><?php echo $DetailsDta->mobile_no;?></span></p>
                     </div>
                     
                     <div class="user_add_right">	
                    	<p class="contact_person"><strong>Email</strong> :- <span><?php echo $DetailsDta->email_id;?></span></p>
                        <p class="contact_address"><strong>Bussiness Nature </strong> :- <span><?php echo $DetailsDta->bussiness_nature;?></span></p>
                        <p class="contact_no"><strong>Website</strong> :- <span><a href="<?php echo $DetailsDta->wesite;?>" target="_blank"><?php echo $DetailsDta->wesite;?></a></span></p>
                     </div>
                     
                    <img class="verified" src="<?php echo WEBROOT_PATH_IMAGES;?>trustseal_icon.png">
                    </div>
            
            <div class="detail_tab clearfix">
            	<h3 class="detail_heading">Ad Details</h3>
                <div class="ad_detail_box">
                <p><strong>Low-fat, High-carb Mix</strong></p>
                <p><?php echo $DetailsDta->discription;?></p></div>
            </div>
            <div class="detail_tab clearfix">
            	<h3 class="detail_heading">Location</h3>
                <div class="ad_detail_box">
                <?php
				$addressdata=$DetailsDta->address.','.$DetailsDta->state.','.$DetailsDta->city;
				$myaddress = urlencode($addressdata);
//here is the google api url

$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$myaddress&sensor=false";

//get the content from the api using file_get_contents
$getmap = file_get_contents($url); 
//the result is in json format. To decode it use json_decode
  $googlemap = json_decode($getmap);
//get the latitute, longitude from the json result by doing a for loop
   
		 $formattedaddress = $googlemap->formatted_address;
	 ?>
                <iframe class="map" width="650" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $myaddress;?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo urlencode($formattedaddress);?>&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></div>
                
            </div>
        
        
        </div>
        <!-- detail page end -->
        </div>
    
    </div>
  </div>