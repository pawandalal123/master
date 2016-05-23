      <!-- top right menu start -->
      <script>
     auto_ready();
	  </script>
      <style type="text/css">
	   .hide_n {
	display: none;
}
	   </style>
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
               <li><a href="<?php echo SITE_URL;?>register">Add Business</a></li>
              
            <li><a href="<?php echo SITE_URL;?>register">Enquiries</a></li>
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
