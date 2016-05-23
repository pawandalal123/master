<?php
 $category=$CategoryType;
 $catId=$CategoryId;
 $data= $this->common->categorySubCategory(false,$catId,15);
 $CategoryData= $this->common->LeadcategoryListingdata(false,$catId,15);
 $stateData= $this->common->LocationList('state');
 $CategoryListData= $this->common->CategoryList();
?>
  <!-- Inner Navigation -->
           <div class="main_container clearfix">
            <div class="centralContent">
            <div class="floatfix"></div>
        </div>
		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
<fieldset>
 <ul class="accnt-nav-box leftnavbox">
<a href="#" class="category_heading">Related Products</a>

    <?php 
	foreach($data as $subCategory){  ?> 
    <li id="rpsLink" >
    <a title="RewardPointTxnStatement" href="<?php echo SITE_URL;?>buylead/subcategory/<?php  echo $subCategory->subcategory.'/'.$catId.'/'.$subCategory->sub_cat_id;?>"><?php  echo $subCategory->subcategory;?></a>
        <span>&raquo;</span>
    </li>
    <?php } ?>
    <li><a href="<?php echo SITE_URL;?>buylead/allindex/<?php  echo $category.'/'.$catId;?>"> View More</a></li>
  </ul>
</fieldset>
  <fieldset>
  </fieldset>
        <div class="floatfix">
        </div>
        </div>

 
        <!-- detail page start -->
           
                     
          <div class="right_content">
        <!-- detail page start -->
        <div class="detail_top">
                <div class="ttl-cntnr">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name"><?php echo $category;?></h1>
                    <span class="icn icn-sqre"></span>
                </div>
            </div>
        
          <?php
			if($CategoryData==0)
			{
				echo '<p class="error-cty bo">Sorry, your search for <span style="font-weight: bold;color: #C30000;">'.$category.'</span> did not match any product.</p>';
			}
			else
			{
				foreach($CategoryData as $CategoryData)
				{
					
			?>
        
<div class="ltest_buy_lead clearfix">
          <h3><a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo $CategoryData->product_name.'/'.$CategoryData->lead_id;?>"><?php echo $CategoryData->product_name;?></a> <span class="verified_img2">Verified & Updated</span></h3>
			<div class="list_txt fl"><p><?php echo substr($CategoryData->requirment,0,150);?> <a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo $CategoryData->product_name.'/'.$CategoryData->lead_id;?>">more...</a></p>
<p>Quantity Needed <?php echo $CategoryData->quantity; ?></p>

<div class="updated">
<p class="fl"><img src="<?php echo WEBROOT_PATH_IMAGES?>location.png" class="fl"><strong>Location:</strong> India</p>
<p class="fr">Updated: <?php echo date("F j, Y",strtotime($CategoryData->date));?></p>
</div>

</div>

</div>
  <?php 
				} }
  ?>
  
   
 
            
        <!-- detail page end -->
     
       
          
          <!-- looking form start -->
          	<div class="looking_form">
            	<div class="looking_form_top">
                <h3>Looking for <span>"<?php echo $category;?>"</span> Suppliers?<br> </
				<span class="small_txt">Receive response from genuine & pre-verified suppliers only</span></h3>
                </div>
                 <form id="form1"  action="<?php echo SITE_URL;?>adduser/AddbyRequirment" method="post">
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
                 <input name="submit" value="Send Enquiry" class="btn btn-blue response_btn" type="submit" />
                 </form>
            </div>
          <!-- looking form end -->
        <!-- detail page end -->
        </div>
      <!-- inr right content end -->
    </div>
