
<script type="text/javascript">
$(document).ready(function(){  
	 $(window).scroll(function(){
		//	alert('pawan');
		 /* window on scroll run the function using jquery and ajax */
		var WindowHeight = $(window).height(); /* get the window height */
		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */
			var loadURL = SITE_URL+'assets/img/loading_icon.gif';
			$("#loader").html("<img src="+loadURL+" alt='loading'/>"); /* displa the loading content */
			var LastDiv = $(".ltest_buy_lead:last"); /* get the last div of the dynamic content using ":last" */
			var LastId  = $(".ltest_buy_lead:last").attr("id");
			var searchon='<?php echo $serchfeaild;?>'; /* get the id of the last div */
			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */
			
			$.post(SITE_URL+'commonfunc/serchleadproductOnloade',{'LastId':LastId,'searchon':searchon},function(data,status)
		     {
				 $("#loader").html("");
					if(data)
					{
						
						LastDiv.after(data);
					}
			
		     });
				  return false;
		}
		return false;
	});
});
</script>
<div class="mainContainer">
    <div class="topBanner clearfix container">
    
    <!-- left sidebar start -->
    <div class="leftside">
    <div class="left_arrowbox">
        <h3>Submit Your "<strong>Buy Requirement</strong>" in a Minute</h3>
        <form id="form1"  action="<?php echo SITE_URL?>adduser/AddLeadEnquiry" method="post">
        <textarea name="product_description" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc" data-bvalidator="required"></textarea>
        
        <input id="name" name="name" placeholder="Name" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="alpha,required"/>
        <input  name="email" placeholder="Email"  class="signUpInputNew" type="text" data-bvalidator="email,required" />
        <input id="mobile" name="mobile" placeholder="Phone" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="number,required" />
        <input name="submit" value="Send Enquiry" class="btn btn-blue" type="submit" />
        </form>
        
        </div>
        <div class="left_ads_box">
	<div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>

</div>
    </div>
    <!-- left sidebar end -->
    
      
        <div class="right_content">
        <!-- detail page start -->
        
        	<div class="supply_top_links clearfix">
            <ul class="clearfix">
            <li class="active"><a href="">Buy Leads</a></li>
            <li><a href="<?php echo SITE_URL ?>productsearch/<?php echo $searchOn;?>">Suppliers</a></li>
            <li class="last"><a href="<?php echo SITE_URL ?>requirment">Post Buy Requiremtnts</a></li>
            </ul>
            </div>
            
            <?php
			if($SearchLeadProductDetails==0)
			{
				?>
                <p class="error-cty bo clearfix">Sorry, your search for <span style="font-weight: bold;color: #C30000;"><?PHP echo $serchfeaild;?></span> did not match any product.</p>
                <table border="0" cellpadding="0" cellspacing="0" align="left" width="663px"><tbody><tr><td valign="TOP" width="480"><div class="sug"><b style="font-size: 13px; padding-bottom: 5px; color: rgb(28, 28, 28);  display:block;">Suggestions:</b><ul><li>Check spellings of your search words </li><li>Try a different set of search words </li><li>Search only one product or service at a time </li><li>Do not use very long search phrase </li><li>Use two or three words for best search results </li><li>Do not use special characters in your search </li><li>Do not use search words that are very specific (e.g., 20x25 mm tone tiles) </li></ul> </div><div id="autosuggest1" style="width: 145px; display: none; cursor: pointer;z-index:100;"><ul><li><!-- Suggestion --></li></ul></div></td></tr></tbody></table>
                <?php
			}
			else
			{
				foreach($SearchLeadProductDetails as $SearchLeadProductDetails)
				{
			
			?>
          <div class="ltest_buy_lead clearfix" id="<?php echo $SearchLeadProductDetails->lead_id;?>">
          <h3><a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo $SearchLeadProductDetails->product_name.'/'.$SearchLeadProductDetails->lead_id;?>"><?php echo $SearchLeadProductDetails->product_name;?></a> <span class="verified_img2">Verified & Updated</span></h3>
			<div class="list_txt fl"><p><?php echo substr($SearchLeadProductDetails->requirment,0,150);?> <a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo $SearchLeadProductDetails->product_name.'/'.$SearchLeadProductDetails->lead_id;?>">more...</a></p>
<p>Quantity Needed <?php echo $SearchLeadProductDetails->quantity; ?></p>

<div class="updated">
<p class="fl"><img src="<?php echo WEBROOT_PATH_IMAGES?>location.png" class="fl"><strong>Location:</strong> India</p>
<p class="fr">Updated: <?php echo date("F j, Y",strtotime($SearchLeadProductDetails->date));?></p>
</div>

</div>

</div>
          <?php }  }?>
          

          
          <div class="clearfix"></div>
          
               <div class="looking_form">
            	<div class="looking_form_top">
                <h3>Looking for Suppliers?<br> </
				<span class="small_txt">Receive response from genuine & pre-verified suppliers only</span></h3>
                </div>
                 <form id="enquiryform"  action="<?php echo SITE_URL;?>adduser/AddbyRequirment" method="post">
                <div class="contact_detal_form clearfix">
                	<div class="contact_detal_form_left">
                    <input id="company_name" name="productname" placeholder="Enter products you want to buy" tabindex="1" class="signUpInputNew" type="text"   data-bvalidator="required"/>
                      <?php echo form_error('productname');?>
                   
                    <textarea name="requirment" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc"></textarea>
                    <div class="select select2">
                                <select  class="statelist" name="state">
                                   <?php foreach($stateData as  $state)
				{
					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';
				}
				?>
                                </select>
                            </div>
        
       <div class="select">
                         <select class="categorylist" name="categorylist">
                <option selected>Select  Category</option>
                 <?php foreach($CategoryListData as  $CategoryList)
				{
					echo ' <option value='.$CategoryList->cat_id.'>'.$CategoryList->category.'</option>';
				}
				?>
                              </select>
                              </div>
        <input id="Quantity" name="Quantity" placeholder="Estimated Quantity" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required" />
        
                    
                    </div>
                    
                   <div class="contact_detal_form_right">
                   <h3>Enter Your Contact Details</h3>
                   <input id="email" name="email" placeholder="Email-ID" tabindex="1" class="signUpInputNew fl" type="text"  data-bvalidator="email,required" />
                   <?php echo form_error('email');?>
                        <div id="emailresonse" style="display:none;"></div>
                         <div id="emailre" style="display:none;"></div>                  
                          <input id="contect_person" name="contect_person" placeholder="Full Name" tabindex="1" class="signUpInputNew fl" type="text" />
                   <input id="mobile" name="mobile" placeholder="Mobile / Cell Phone" tabindex="1" class="signUpInputNew big fl" type="text"  data-bvalidator="number,required" />
                   <?php echo form_error('mobile');?>
                   <input id="company_name" name="company_name" placeholder="Company Name" tabindex="1" class="signUpInputNew big fl" type="text"  data-bvalidator="required" />
                   
                    
                   <div class="select select3">
                                <select class="districList" name="districList">
                <option selected>Select District</option>
                </select>
                            </div>
                   
                  <div class="select">
                                <div class="select">
                                <select class="subcategory" name="subcategory">
                <option selected>Select Sub Category</option>
                     </select>
                            </div>
                            </div>
                            <div class="select">
                                <select name="quantity">
                               <?php 
							   for($i=1;$i<=1000; $i++)
							   {
								   
								   ?>
                                   <option><?php echo $i;?></option>
                                   <?php 
							   }?>
                                </select>
                            </div>
                    </div>
                </div>
                 <input name="submitlead" value="Send Enquiry" class="btn btn-blue response_btn" type="submit" />
                 </form>
            </div>
 
            
        <!-- detail page end -->
        </div>
        
        
    