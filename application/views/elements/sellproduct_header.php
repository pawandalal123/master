 <?php
  $selCategorySubCategory = $this->common->sellCategorySubCategoryList();
  
  ?>
  <script>
     auto_ready();
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
            <li class="buy"><a href="<?php echo SITE_URL;?>buylead/buyleadlist">Buy</a>
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
          
           
               <li><a href="<?php echo SITE_URL;?>register">Add Business</a></li>
              
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
				 
				 foreach ($selCategorySubCategory as $selCategorySubCategory){
					 $catgoryId=$selCategorySubCategory['categoryId'];
					 $catgoryName=$selCategorySubCategory['CategoryName'];
					 ?>
					 
	 <li class="maincat"><a href="<?php echo SITE_URL;?>productsell/allsubcategory/<?php  echo str_replace(' ','-',$selCategorySubCategory['CategoryName']).'/'.$selCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $selCategorySubCategory['CategoryName'];?></a>
		<div class="cataloglistexpand electronics">
        <h2><a href="<?php echo SITE_URL;?>add/<?php  echo str_replace(' ','-',$selCategorySubCategory['CategoryName']).'/'.$selCategorySubCategory['categoryId'];
					?>" ><?php  echo  $selCategorySubCategory['CategoryName'];?></a></h2>
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
						unset($selCategorySubCategory['categoryId']);
						unset($selCategorySubCategory['CategoryName']);
						unset($selCategorySubCategory['Logo']);
						
					   foreach($selCategorySubCategory as $subCategory){  ?> 
                         <li><a href="<?php echo SITE_URL;?>addsubcat/<?php  echo str_replace(' ','-',$catgoryName).'/'.str_replace(' ','-',$subCategory->category_name).'/'.$catgoryId.'/'.$subCategory->id;?>" class="gm-tc-nm maintainHover"><?php  echo $subCategory->category_name;?></a>  </li>
                        <?php 
						if($i  > 15){
							?>
									<a href="<?php echo SITE_URL;?>productsell/allsubcategory/<?php  echo str_replace(' ','-',$catgoryName).'/'.$catgoryId;?>">More</a>
                                    <?php
									break;
								}
						if($i%2 == 0){
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
                <a href="<?php echo SITE_URL;?>category/categotyListing">More</a>
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