<?php 
$LeadData=$this->common->allLeadData(false,5);
$stateData= $this->common->LocationList('state');
 $CategoryListData= $this->common->CategoryList();
?>
<script type="text/javascript">
$(document).ready(function(){  
	 $(window).scroll(function(){
		//	alert('pawan');
		 /* window on scroll run the function using jquery and ajax */
		var WindowHeight = $(window).height(); /* get the window height */
		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */
			$("#loader").html("<img src='http://localhost/php/indiabiz/assets/img/loading_icon.gif' alt='loading'/>"); /* displa the loading content */
			var LastDiv = $(".ltest_buy_lead:last"); /* get the last div of the dynamic content using ":last" */
			var LastId  = $(".ltest_buy_lead:last").attr("id");
			 /* get the id of the last div */
			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */
			
			$.post(SITE_URL+'commonfunc/LeadDataOnloade',{'LastId':LastId},function(data,status)
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
    <div class="benefits">
        <h3>Benefits for Buyers</h3>
<ul>
<li class="save_time"><strong>Save Time</strong><br>
in search of Suppliers
</li>

<li class="response"><strong>Responses</strong><br>
directly from Verified suppliers
</li>

<li class="compare"><strong>Compare &amp; Evaluate</strong><br>
the quotes
</li>
</ul>
        </div>
    <div class="left_arrowbox">
        <h3>Submit Your "<strong>Buy Requirement</strong>" in a Minute</h3>
        <form id="form1"  action="<?php echo SITE_URL?>adduser/AddLeadEnquiry" method="post">
        <textarea name="product_description" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc" data-bvalidator="required"></textarea>
        <input id="name" name="name" placeholder="Name" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>
        <input  name="email" placeholder="Email"  class="signUpInputNew" type="text" data-bvalidator="email,required" />
        <input id="mobile" name="mobile" placeholder="Phone" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
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
        <div class="detail_top">
                <div class="ttl-cntnr">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name">Verified And Update Leads</h1>
                    <span class="icn icn-sqre"></span>
                </div>
            </div>
        
          <?php
			if($LeadData==0)
			{
				echo '<p class="error-cty bo">Sorry, your search for <span style="font-weight: bold;color: #C30000;">'.$category.'</span> did not match any product.</p>';
			}
			else
			{
				foreach($LeadData as $CategoryData)
				{
			  $stateNameData=$this->common->stateDisplayName($CategoryData->state);
			?>
        
<div class="ltest_buy_lead clearfix" id="<?php echo $CategoryData->lead_id;?>">
          <h3><a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo str_replace(' ','-',$CategoryData->product_name).'/'.$CategoryData->lead_id;?>"><?php echo $CategoryData->product_name;?></a> <span class="verified_img2">Verified & Updated</span></h3>
			<div class="list_txt fl"><p><?php echo substr($CategoryData->requirment,0,150);?> <a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo str_replace(' ','-',$CategoryData->product_name).'/'.$CategoryData->lead_id;?>">more...</a></p>
<p>Quantity Needed <?php echo $CategoryData->quantity; ?></p>

<div class="updated">
<p class="fl"><img src="<?php echo WEBROOT_PATH_IMAGES?>location.png" class="fl"><strong>Location:</strong><?php echo $stateNameData->state;?></p>
<p class="fr">Updated: <?php echo date("F j, Y",strtotime($CategoryData->date));?></p>
</div>

</div>

</div>
  <?php 
	} }
  ?>
  
          	<div class="looking_form">
            	<div class="looking_form_top">
                <h3>Looking for  Suppliers?<br>
				<span class="small_txt">Receive response from genuine & pre-verified suppliers only</span></h3>
                </div>
                 <form id="form1"  action="<?php echo SITE_URL;?>buylead/AddbyRequirment" method="post">
                <div class="contact_detal_form clearfix">
                	<div class="contact_detal_form_left">
                    <input id="company_name" name="productname" placeholder="Enter products you want to buy" tabindex="1" class="signUpInputNew" type="text"   data-bvalidator="required"/>
                      <?php echo form_error('productname');?>
                   
                    <textarea name="requirment" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc"></textarea>
                    <div class="select select2">
                                <select  class="statelist" name="state">
                                   <?php foreach($stateData as  $state)
				{
					echo ' <option value='.$state->state.'>'.$state->state.'</option>';
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
                              <option value="">--Select Unit--</option> 
                               <option value="Tons">Tons</option>
                               <option value="Pieces">Pieces</option>
                               <option value="Units">Units</option>
                               <option value="Kilogram">Kilogram</option> 
                                </select>
                            </div>
                    </div>
                </div>
                 <input name="submit" value="Send Enquiry" class="btn btn-blue response_btn" type="submit" />
                 </form>
            </div>
           
          <!-- looking form end -->
        <!-- detail page end -->
        </div>
    
    </div>
  </div>