 <?php $userCategorySubCategory = $this->common->userCategorySubCategoryList();?>
 <script>
     auto_ready();
	 	 // DOM Ready
	  </script>
      <style type="text/css">
	   .hide_n {
	display: none;
}
	   </style>
 <div id="header">
    <div class="container">
      <!-- top right menu start -->
         <div class="text-right header-info">
         <ul class="group" id="example-one">
         
              <?php  if($this->session->userdata('email')!='')
		  {
			  ?>
                <li class="current_page_item"><a href="<?php echo SITE_URL; ?>user/useraccount/contactProfile"><?php echo $this->session->userdata('email');?></a></li>
              <?php
		  }
		  else
		  {
			  ?>
                <li class="current_page_item"><a href="<?php echo SITE_URL;?>login">Sign In</a></li>
              <?php
		  }
			  ?>
            <li class="buy"><a href="<?php echo SITE_URL;?>buyleadlist">Buy</a>
				<ul class="hdr-drop-down gl pad hide_n fnt-sz10">
              <a href="<?php echo SITE_URL;?>requirment"><li>Post your Buy Requirement</li></a>
              <a href="#"><li>Manage Sell Offer Alerts</li></a>
              <a href="<?php echo SITE_URL;?>buyleadlist"><li>Search Buy Leads</li></a>
            </ul>
            </li>
            <li class="buy"><a href="<?php echo SITE_URL;?>adds">Sell</a>
            	<ul class="hdr-drop-down gl pad hide_n fnt-sz10">
              <a href="<?php echo SITE_URL;?>post-ads"><li>Sell Product Free</li></a>
             <!-- <a href="#"><li>Manage Sell Offer Alerts</li></a>-->
              <a href="<?php echo SITE_URL;?>all-results"><li>Search Product</li></a>
            </ul>
            </li>
            <?php  if($this->session->userdata('email')!='')
		  {
			  ?>
           
            <ul class="hdr-drop-down gl pad hide_n fnt-sz10">
              <a href="<?php echo SITE_URL;?>user/profile"><li>My Home</li></a>
              <a href="<?php echo SITE_URL;?>userlogin/logout"><li>Log Out</li></a>
             
            </ul></li>
            <?php }  
			  ?>
               <li><a href="<?php echo SITE_URL;?>/register">Add Business</a></li>
          
			 
            <li><a href="<?php echo SITE_URL;?>enquiry">Enquiries</a></li>
          </ul>
	    	
        
    </div>
      <!-- top right menu end -->
      <div class="row">
        <div class="span4 text-left"> <a href="<?php echo SITE_URL;?>"><img class="logo" src="<?php echo WEBROOT_PATH_IMAGES;?>logo.png" alt="IndiaBizSaath"/></a> </div>
        <div class="span8">
          <div id="search" class="hk-search-bar">
            <form name="searchForm" action="" onsubmit="return CheckDataSearch(document.searchForm);" method="get" id="hdr_frm" autocomplete="off">

         <div class="select inrselect">
            <select name="select" id="selectpropduct">
                <option value="Products">Products</option>
                <option value="BuyLeads">Buy Leads</option>
                <option value="Suppliers">Sell Product</option>
                
            </select>
            </div>
             <input name="ss"  class="hk-search-box input_w1 pdleft" placeholder="Enter product / service to search" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
          
            <input type="hidden" name="variant"   id="variant-id" value=""/>
             <input type="hidden" name="inputhidden"   id="variant-id" value=""/>
            <input type="submit" value="SEARCH" class="icn icn-search fl input_w2" id="btnSearch"  />
              </form>
            
          </div>
        </div>
        
        <!-- post requirement button start -->
        <div class="span2 sign-in-box">
          <div class="post-button"><a href="<?php echo SITE_URL;?>requirment">Post Buying Requirement</a></div>
        </div>
        <!-- post requirement button end -->
      </div>
      <div class="row">
        <div class="span4">
         <div class="flyout-menu verticle">
            <div id="dropDownButton" class="menu-hdr">
              <div class="hdr-title font-caps">Categories</div>
              <div class="icn-dwn-cs2"></div>
            </div>
            <div id="dropDownbox1" class="dropDownboxHomePage">
              <div class="brdr-t-blu-strip"></div>
              <!-- category navigation start -->
              <nav class="dropdownsubcat">
	<ul>
	<li class="homecatalog">
	 <ul class="cataloglist  displaycataloglist">
     <?php
				 foreach ($userCategorySubCategory as $userCategorySubCategory){
					 ?>
	 <li class="maincat"><a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $userCategorySubCategory['CategoryName'];?></a>
		<div class="cataloglistexpand electronics">
        <h2><a href="<?php echo SITE_URL;?>product/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];
					?>" class=""><strong><?php  echo  $userCategorySubCategory['CategoryName'];?></strong></a></h2>
			<div class="flt subcatwrapper col4bg">
               <!--<div class="nav_add">
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                </div>-->
				<div class="col">
                    		<ul>
                             <?php
					  	$i = 1;
						$CategoryName = $userCategorySubCategory['CategoryName'];
						$categoryId = $userCategorySubCategory['categoryId'];
						$CategoryNameUrl=$userCategorySubCategory['CategoryNameUrl'];
						unset($userCategorySubCategory['CategoryName']);
						unset($userCategorySubCategory['categoryId']);
						unset($userCategorySubCategory['CategoryNameUrl']);
						unset($userCategorySubCategory['CategoryLogo']);
						
					   	foreach($userCategorySubCategory as $subCategory){ 
					  
					    ?> 
                         <li><a href="<?php echo SITE_URL;?>subcategory/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.str_replace(' ','-',$subCategory->subcat_url).'/'.$categoryId.'/'.$subCategory->sub_cat_id;?>" class="gm-tc-nm maintainHover"><?php  echo ucwords($subCategory->subcategory);?></a> </li>
                        <?php 
						if($i  > 59){
							?>
									<a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>">More</a>
                                    <?php
									break;
								}
						if($i%10 == 0){
								echo '</ul></div><div class="col">
					
							<ul>';
							}
								
						 ?>
                        <?php $i++;  } ?>
								
								
							</ul>
				</div>
				
				
      			<div style="clear:both;"></div>
		</div></div>
	</li>
	
	<?php }	 ?>
                <a href="<?php echo SITE_URL;?>catlist">More</a>
</ul>
<span class="showtransparentdiv"> </span>
			
            </li>
          </ul>
</nav>
              <!-- category navigation end -->
            </div>
          </div>
        </div>
      </div>
      <div id="logo" class="span7 alpha"> </div>
    </div>
  </div>