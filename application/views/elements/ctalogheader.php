 <script>
     auto_ready();
	  </script>
 <div id="header">
    <div class="container">
      <!-- top right menu start -->
      <div class="text-right header-info">
        <div class="disp-inln fnt-sz9">
          <ul>
          <?php  if($this->session->userdata('email')!='')
		  {
			  ?>
                <li><a href=""><?php echo $this->session->userdata('email');?></a></li>
              <?php
		  }
		  else
		  {
			  ?>
                <li><a href="<?php echo SITE_URL;?>category/Login">Sign In</a></li>
              <?php
		  }
			  ?>
          
            <li class="buy"><a href="<?php echo SITE_URL;?>buylead/buyleadlist">Buy</a>
				<ul class="hdr-drop-down gl pad hide fnt-sz10">
              <a href="<?php echo SITE_URL;?>buylead/Requirment"><li>Post your Buy Requirement</li></a>
              <a href="#"><li>Manage Sell Offer Alerts</li></a>
              <a href="<?php echo SITE_URL;?>buylead/buyListing"><li>Search Produvr Leads</li></a>
            </ul>
            </li>
            <li class="buy"><a href="<?php echo SITE_URL;?>adds">Sell</a>
            	<ul class="hdr-drop-down gl pad hide fnt-sz10">
              <a href="<?php echo SITE_URL;?>post-ads"><li>Sell Product Free</li></a>
             <!-- <a href="#"><li>Manage Sell Offer Alerts</li></a>-->
              <a href="<?php echo SITE_URL;?>all-results"><li>Search Product</li></a>
            </ul>
            </li>
          </ul>
        </div>
        <div class="disp-inln fnt-sz9">
          <ul>
          
             <?php  if($this->session->userdata('email')!='')
		  {
			  ?>
               <li><a href="<?php echo SITE_URL;?>/category/register">List Your Another Company</a></li>
              <?php
		  }
		  else
		  {
			  ?>
               <li><a href="<?php echo SITE_URL;?>/category/register">List Your Company</a></li>
              <?php
		  }
			  ?>
            <li><a href="<?php echo SITE_URL;?>user/enquiry">Enquiries</a></li>
          </ul>
        </div>
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
          <div class="post-button"><a href="<?php echo SITE_URL;?>buylead/Requirment">Post Buying Requirement</a></div>
        </div>
        <!-- post requirement button end -->
      </div>
      
      <div id="logo" class="span7 alpha"> </div>
    </div>
  </div>