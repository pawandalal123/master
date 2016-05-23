<?php
$userCategorySubCategory = $this->common->popularCategorySubCategoryList();
$LeadsData= $this->common->BuyleadList();
$sliderImages=$this->common->SliderdisplayImages();
$usedProductList=$this->common->popularusedProducts(false,false);
//pr($sliderImages);
 ?>

<script>
jQuery(document).ready(function ($) {
	//alert('pawan');
    setInterval(function () {
        moveRight();
    }, 5000);

 var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	$('#slider').css({ width: slideWidth, height: slideHeight });
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    $('#slider ul li:last-child').prependTo('#slider ul');
    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 500, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 500, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };
	 $('a.control_prev').click(function () {
        moveLeft();
    });
    $('a.control_next').click(function () {
        moveRight();
    });	
});    

</script>
<div class="mainContainer">
    <div class="topBanner clearfix container">
      <div class="span4 alpha"></div>
      <div class="span12">
        <div class="bnr-700-cnt">
          <!-- main slider start -->
          <div id="slider">
 <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev"><<</a>
  <ul>
 
   <?php foreach($sliderImages as $sliderImages)
				{?>
          <li>
          <img src="<?php echo WEBROOT_PATH_IMAGES.''.$sliderImages->image_name; ?>" alt="Lions"/>
          </li>
    
          <?php } ?>
         
  </ul>  
</div>
          <!-- main slider end -->

          <!-- Slider Bottom Box Start -->
          	<div class="slider_bottom_box">
            	<!-- for buying supply tab box -->
                	<div class="buy_supply">
                    	<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="1">For Buying</li>
    <li class="TabbedPanelsTab" tabindex="2">For Supplying</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
    <div class="box1 clearfix">	       
       <img src="<?php echo WEBROOT_PATH_IMAGES; ?>sendbuy.png" class="fl">
       <p class="fl" style="width:280px; margin-left:10px;"> <a href="<?php echo SITE_URL; ?>buylead/Requirment">Send your Buy Requirement</a><br>
	 Receive responses from pre-verified and qualified suppliers.</p>
     </div>
        
        
    <div class="box1 clearfix">	       
       <img src="<?php echo WEBROOT_PATH_IMAGES; ?>search.png" class="fl">
       <p class="fl" style="width:280px; margin-left:10px;"> <a href="#">Search for a product</a><br>
	 Send enquiries directly to the suppliers of your choice.</p>
        </div>
       
        
    <div class="box1 clearfix">
       <img src="<?php echo WEBROOT_PATH_IMAGES; ?>subscribe.png" class="fl">
       <p class="fl" style="width:280px; margin-left:10px;"> <a href="#">Subscribe to Trade Alerts</a><br>
	 Get updates on relevant products and sell offers directly in your email.</p>
     </div>
        
    </div>
    
    <div class="TabbedPanelsContent">
    <div class="box1 clearfix">	       
       <img src="<?php echo WEBROOT_PATH_IMAGES; ?>catalog.png" class="fl">
       <p class="fl" style="width:280px; margin-left:10px;"> <a href="#">Create your catalog for FREE!</a><br>
	 Advertise your products to buyers worldwide.</p>
     </div>
        
        
    <div class="box1 clearfix">	       
       <img src="<?php echo WEBROOT_PATH_IMAGES; ?>alert.png" class="fl">
       <p class="fl" style="width:280px; margin-left:10px;"> <a href="#">Get Buy Leads Alerts FREE!</a><br>
	 Get updates on relevant buyers requirement.</p>
        </div>
       
        
    <div class="box1 clearfix">
       <img src="<?php echo WEBROOT_PATH_IMAGES; ?>subscribe.png" class="fl">
       <p class="fl" style="width:280px; margin-left:10px;"> <a href="#">Become a Premium Member</a><br>
	 Make this the first step that you take in doing business online.</p>
     </div>
    </div>
  </div>
  
  
</div>
                    </div>
                    
                <!-- for buying supply tab box end -->
                
                <!-- latest buy lead start -->
                    <div class="latest_buy_lead">
                    <div class="buy_lead_top"><h3>Latest Buy Leads</h3></div> 
                    <div class="buy_lead_scroll">
                    <div class="demo1 demof">
                     <ul>
                        <?php foreach($LeadsData as  $LeadList)
                        {?>
                        <li><div class="lead1">
                      <a href="<?php echo SITE_URL;?>buylead/viewdetails/<?php echo str_replace(' ','-',$LeadList->product_name).'/'.$LeadList->lead_id ?>"><h3>                      <?php echo $LeadList->product_name;?></h3></a>
                        <p class="fl">Verified & Updated<br>
                        Quantity :<?php  echo $LeadList->quantity;?></p>
                        <p class="fr"><?php echo $LeadList->state.','.$LeadList->city;?></p>
                      </div>
                      <img class="verified" src="<?php echo WEBROOT_PATH_IMAGES; ?>trustseal_icon.png">
                      </li>
                      <?php } ?>
                    </ul>
                    </div>
                    </div>                   
                    </div>
                    <div class="image_subbox">
	<div class="image_subbox_left"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>images_1.jpg" width="215" height="97"></div>
    <div class="image_subbox_middle"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>images_2.jpg" width="196" height="97"></div>
    <div class="image_subbox_right"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>images_1.jpg" width="215" height="97"></div>
 </div>
                <!-- latest buy lead end -->
            </div>
          <!-- Slider Bottom Box End -->
        </div>
      </div>
    </div>
  </div>
  <div class="container clearfix topBanner">
    <div>
      <!--Popular Category Start -->
      <div class="clearfix mrgn-b-25">
        <div class="ttl-cntnr mrgn-b-10"> <span class="icn icn-sqre"></span>
          <h2>Popular Categories</h2>
          <span class="icn icn-sqre"></span> </div>
        <div id="flexiCarousel-0" class="clearfix nbs-400">
          
          <?php  
		  
		  
		  foreach ($userCategorySubCategory as $userCategorySubCategory){
			  $categoryName = $userCategorySubCategory['CategoryName'];
			  $categoryId = $userCategorySubCategory['categoryId'];
			  $image = $userCategorySubCategory['CategoryLogo'];
			  $CategoryNameUrl=$userCategorySubCategory['CategoryNameUrl'];
			  ?>
          <div class="varnt-cont">
            <div class="img-box img-box-180">
            <a href="#" class=""><img src="<?php echo WEBROOT_PATH_IMAGES.$userCategorySubCategory['CategoryLogo'];?>" alt="" style=" width:140px; height:140px;"/></a> </div>
            <div class="varnt-detail"> <a href="<?php echo SITE_URL;?>category/index/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>"><span class="varnt-title"><?php echo $categoryName?></span></a>
           <?php  
		     	unset($userCategorySubCategory['CategoryName']);
				unset($userCategorySubCategory['categoryId']);
				unset($userCategorySubCategory['CategoryLogo']);
				unset($userCategorySubCategory['CategoryNameUrl']);
				
		    foreach($userCategorySubCategory as $subCategory){
					
			   ?>
              <p><span>&raquo;</span><a href="<?php echo SITE_URL;?>category/subcategory/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.str_replace(' ','-',$subCategory->subcategory).'/'. $categoryId.'/'.$subCategory->sub_cat_id;?>"><?php  echo substr($subCategory->subcategory,0,30);?></a></p>
             <?php } ?>
              <a href="<?php echo SITE_URL;?>category/allindex/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>" class="More2">More</a> </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <!-- Popular Category End -->
      <!-- Popular Item Start -->
      <div class="clearfix mrgn-b-25">
        <div class="ttl-cntnr mrgn-b-10"> <span class="icn icn-sqre"></span>
          <h2>Popular Items</h2>
          <span class="icn icn-sqre"></span> </div>
        <div id="flexiselDemo1" class="clearfix nbs-400">
        <?php foreach($usedProductList as  $usedProductList)
		{ ?>
          <div class="varnt-cont">
            <div class="img-box img-box-180"> <a href="<?php echo SITE_URL;?>productsell/productdetail/<?php echo str_replace(' ','-',$usedProductList->title).'/'.$usedProductList->product_id?>" class=""><img src="<?php echo WEBROOT_PATH_sell.''.$usedProductList->image_name;?>" alt=""/></a> </div>
            <div class="mrgn-t-10 tcenter"> <a href="<?php echo SITE_URL;?>productsell/productdetail/<?php echo str_replace(' ','-',$usedProductList->title).'/'.$usedProductList->product_id?>"> <span class="varnt-title"><?php echo $usedProductList->title;?></span> </a> </div>
          </div>
          <?php } ?>
          
        </div>
      </div>
      <!-- Popular Item End -->
    </div>
  </div>
  
