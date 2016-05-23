<div class="header">
<div class="warp clearfix">
<div class="logo"><a href="<?php echo SITE_URL;?>"><img src="<?php echo WEBROOT_PATH_IMAGES;?>logo.png" width="192" height="60" alt="Indiabiztrade Logo" /></a></div>

<div id='topmenu'>
<ul>
<?php  if($this->session->userdata('email')!='')
		  {
			  ?>
                <li><a href="<?php echo SITE_URL; ?>user/useraccount/contactProfile" title="<?php echo $this->session->userdata('email');?>">Welcome</a></li>
                 
              <?php
		  }
		  else
		  {
			  ?>
                <li><a href="<?php echo SITE_URL;?>login">Join Free</a></li>
              <?php
		  }
			  ?>

<li class='active has-sub'><a href="<?php echo SITE_URL;?>buyleadlist">Buy</a>
<ul>
         <li class='has-sub'><a href='<?php echo SITE_URL;?>requirment'><span>Post your Buy Requirement</span></a></li>
         <li class='has-sub'><a href='<?php echo SITE_URL;?>buyleadlist'><span>Search Buy Leads</span></a></li>
  
      </ul></li>
<li class='has-sub'><a href="<?php echo SITE_URL;?>adds">Sell</a>
<ul>
         <li class='has-sub'><a href='<?php echo SITE_URL;?>post-ads'><span>Post Free Add</span></a></li>
         <li class='has-sub'><a href='<?php echo SITE_URL;?>all-results'><span>Search classified</span></a></li>
  
      </ul></li>

               <li><a href="<?php echo SITE_URL;?>register" title="List Your Company">Add Business</a></li>
              
          
             
            <li><a href="<?php echo SITE_URL;?>enquiry">Enquiries</a></li>
            <li><a href="<?php echo SITE_URL;?>post-ads"><img src="<?php echo WEBROOT_PATH_IMAGES;?>postfreeads.png" alt="postfreeadd" style="margin-top:-13px;"/></a></li>
</ul>
</div>
</div>
</div>

<div class="banner">
<div class="warp clearfix">
<div class="text_box">
<h2>Find Sellers for over<br />
3.5 Crore Products</h2>
<h3>Genuine sellers, quick response and better information</h3>
</div>
<div class="clear"></div>

<div class="search_box clearfix">
<form name="searchForm" action="" onsubmit="return CheckDataSearch(document.searchForm);" method="get" id="hdr_frm" autocomplete="off" class="clearfix">

             
                 <select name="select" id="selectpropduct" class="custom-select" style="display:block !important">
                 <option value="Products">Products</option>
                 <option value="BuyLeads">Buy Leads</option>
                 <option value="Suppliers">Sell Product</option>
                 </select>
             <input name="ss"  class="hk-search-box inp_f" placeholder="Enter product / service to search" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
          
            <input type="hidden" name="variant"   id="variant-id" value="Products"/>
            <input type="submit" value="SEARCH" class="but_f" id="btnSearch"  />
              </form>

</div>
</div>
</div>

<div class="tab_box">
<div class="warp clearfix wrapper_middle_box">
 <h1>Indiabiztrade</h1>

	<p>Now Post Free advertisements on Indiabiztrade to boost your business today! List your enterprise in our business directory to get the wide business platform in online domain. We provide comprehensive categorization for unique business sectors that let you get to your specific customers quickly. </p>
    <p>Find B2B Marketing leads to buy and sell quality goods and services. We provide premium services to facilitate International Trade and export business. Buyers may create individual profiles and sent inquiries to seller enterprises according to their requirements.</p>
    <p>We offer verified services and wide options while uploading product information. Search manufacturing companies as well as exporters with our one stop solution for online business.</p>
</div>
<div class="warp clearfix">
<div class="tab_panel">
<ul class="tabs">
    <li><a href="#tab1">For Buying</a></li>
    <li><a href="#tab2">For Supplying</a></li>
  </ul>
  <div class="tabContainer">
    <div id="tab1" class="tabContent">
      <ul class="tab_list clearfix">
      <li><a href="<?php echo SITE_URL?>requirment"><img src="<?php echo WEBROOT_PATH_IMAGES;?>sendbuy.png" width="32" height="24" alt="requirment" /><b>Send your Buy Requirement</b><br />
Receive responses from pre-verified and qualified suppliers.</a></li>
      <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>search.png" width="34" height="24" alt="Buy Requirment"/><b>Search for a product</b><br />
Send enquiries directly to the suppliers of your choice.</a></li>
      <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>subscribe.png" width="34" height="24" alt="Send Enquiry" /><b>Subscribe to Trade Alerts</b><br />
Get updates on relevant products and sell offers directly in your email.</a></li>
      </ul>
    </div>
    <!-- / END #tab1 -->
    <div id="tab2" class="tabContent">
      <ul class="tab_list clearfix">
      <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>catalog.png" width="34" height="24" alt="create catalog" /><b>Create your catalog for FREE!</b><br />
Advertise your products to buyers worldwide.</a></li>
      <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>alert.png" width="32" height="24" alt="Product Alert" /><b>Get Buy Leads Alerts FREE!</b><br />
Get updates on relevant buyers requirement.</a></li>
      <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>subscribe.png" width="34" height="24" alt="subscribe" /><b>Become a Premium Member</b><br />
Make this the first step that you take in doing business online.</a></li>
      </ul>
    </div>
    <!-- / END #tab2 -->
  </div>
</div>

<div class="list_up">
<h4>Latest Buy Leads</h4>
<div class="panel-body">
<ul class="tscroller">
 <?php foreach($LeadsData as  $LeadList)
                        {?>
<li><b><?php echo $LeadList->product_name;?>,</b><br />
 <?php echo substr($LeadList->requirment,0,30);?>...<a href="<?php echo SITE_URL;?>buylead/viewdetails/<?php echo str_replace(' ','-',$LeadList->product_name).'/'.$LeadList->lead_id ?>">Verified</a>
</li>
 <?php 
} ?>
</ul>
</div>
<div class="panel-footer"> </div>
</div>

</div>
</div>
                         
<div id="" class="item_warp_pdg">
 <h1>Explore Our Product Categories</h1>
<div class="warp clearfix">
                <?php  
		  foreach ($userCategorySubCategory as $userCategorySubCategoryData){
			  $categoryName = $userCategorySubCategoryData['CategoryName'];
			  $categoryId = $userCategorySubCategoryData['categoryId'];
			  $image = $userCategorySubCategoryData['CategoryLogo'];
			  $CategoryNameUrl= $userCategorySubCategoryData['CategoryNameUrl'];
			  ?>
<div class="item">
                <img src="<?php echo WEBROOT_PATH_IMAGES.$userCategorySubCategoryData['CategoryLogo'];?>" alt="<?php echo $userCategorySubCategoryData['CategoryNameUrl'];?>" width="900" height="720">
<div class="item-overlay">
		  <div class="sale-tag"><span><?php echo $categoryName;?></span></div>
					</div>
					<div class="item-content">
						<div class="item-top-content">
							<div class="item-top-content-inner">
								<div class="item-product">
									<div class="item-top-title">
                                    <?php  
		     	unset($userCategorySubCategoryData['CategoryName']);
				unset($userCategorySubCategoryData['categoryId']);
				unset($userCategorySubCategoryData['CategoryLogo']);
				unset($userCategorySubCategoryData['CategoryNameUrl']);
		        foreach($userCategorySubCategoryData as $subCategory)
			     {
				?>
                        <h2><a href="<?php echo SITE_URL;?>subcategory/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.str_replace(' ','-',trim($subCategory->subcat_url)).'/'. $categoryId.'/'.$subCategory->sub_cat_id;?>"><?php  echo ucwords(substr($subCategory->subcategory,0,30));?>..</a></h2>
                      <?php
			       }
					  ?>
										<!--<p class="subdescription">
											Low skateshoes - Grey
										</p>-->
									</div>
								</div>
								
						  </div>	
						</div>
						<div class="item-add-content">
						
								<div class="section">
									<a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>" class="btn buy expand">
View All</a>
								</div>
						
						</div>
					</div>
				</div>

<?php
		  }
?>
</div>
</div>
                         

<div id="" class="item_warp_pdg">
<h1>Used Product Categories</h1>
<div class="warp clearfix">
                <?php  
				$usedProductList=$this->common->sellCategorySubCategoryList(false,false);
		 foreach ($usedProductList as $selCategorySubCategory){
					 $catgoryIdsell=$selCategorySubCategory['categoryId'];
					 $catgoryNamesell=$selCategorySubCategory['CategoryName'];
					 ?>
			  
<div class="item">
                <img src="<?php echo WEBROOT_PATH_IMAGES.''.$selCategorySubCategory['Logo1'];?>" width="900" height="720" alt="<?php echo $selCategorySubCategory['CategoryName'];?>">
<div class="item-overlay">
		  <div class="sale-tag"><span><?php  echo $catgoryNamesell;?></span></div>
					</div>
					<div class="item-content">
						<div class="item-top-content">
							<div class="item-top-content-inner">
								<div class="item-product">
									<div class="item-top-title">
                                    <?php  
		     	 unset($selCategorySubCategory['categoryId']);
				 unset($selCategorySubCategory['CategoryName']);
				  unset($selCategorySubCategory['Logo1']);
				 foreach($selCategorySubCategory as $subCategory){
				?>
                        <h2><a href="<?php echo SITE_URL;?>addsubcat/<?php  echo str_replace(' ','-',$catgoryNamesell).'/'.str_replace(' ','-',$subCategory->category_name).'/'.$catgoryIdsell.'/'.$subCategory->id;?>" class="gm-tc-nm maintainHover"><?php  echo ucwords($subCategory->category_name);?></a></h2>
                      <?php
			       }
					  ?>
										<!--<p class="subdescription">
											Low skateshoes - Grey
										</p>-->
									</div>
								</div>
						  </div>	
						</div>
						<div class="item-add-content">
						
								<div class="section">
									<a href="<?php echo SITE_URL;?>productsell/allsubcategory/<?php  echo str_replace(' ','-',$catgoryNamesell).'/'.$catgoryIdsell;?>" class="btn buy expand">
View All</a>
								</div>
						
						</div>
					</div>
				</div>

<?php
		  }
?>
</div>
</div>