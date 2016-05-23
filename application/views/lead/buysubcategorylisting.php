<?php
  $SubCategoryType= $SubCategoryType;
  $category=str_replace('-',' ',$SubCategoryType);
  $categoryId= $CategoryId;
  $SubcategoryId= $SubCategoryId;
  $data= $this->common->categorySubCategory(0,$categoryId,15);
  $SubCategoryData= $this->common->SubCategoryLeadData(0,$categoryId,$SubcategoryId);
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

    <?php  foreach($data as $subCategory){  ?> 
    <li id="rpsLink" >
    <a title="RewardPointTxnStatement" href="<?php echo SITE_URL;?>buylead/subcategory/<?php  echo str_replace(' ','-',$subCategory->subcategory).'/'.$categoryId.'/'.$subCategory->sub_cat_id;?>"><?php  echo $subCategory->subcategory;?></a>
        <span>&raquo;</span>
    </li>
    <?php } ?>
    <li><a href="<?php echo SITE_URL;?>buylead/allindex/<?php  echo $category;?>"> View More</a></li>
  </ul>
</fieldset>
  <fieldset>
  </fieldset>
        <div class="floatfix"></div>
      </div>

      <div class="right_content">
      
        <!-- detail page start -->
        <?php
        if($SubCategoryData==0)
			{
				echo '<p class="error-cty bo">Sorry, your search for <span style="font-weight: bold;color: #C30000;">'.$category.'</span> did not match any product.</p>';
			}
			else
			{
				foreach($SubCategoryData as $SubCategoryData)
				{
					?>
         
          <div class="supply_list1 clearfix">
          <h3 class="heading2"><?php echo $SubCategoryData->product_name;?><br>
		<span>Buy Lead Details:</span>
        <div class="forward"><span class="fl date">Updated: 20 Mar, 2014</span><a href="#" title="Forward to Friends" class="send_to_email" id="1/2"><img src="<?php echo WEBROOT_PATH_IMAGES?>forward.png" class="fr"></a></div>
</h3>
			<div class="list_txt fl"><p><?php echo substr($SubCategoryData->requirment,0,150);?>....</p>
            <p>Quantity: <?php echo $SubCategoryData->quantity; ?></p>
            
</div>
            
            <a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo $SubCategoryData->product_name.'/'.$SubCategoryData->lead_id;?>" class="view_btn">View Contact Details</a>
           
                     </div>
                     <?php
				}
			}
					 ?>
          
       
          
          <!-- looking form start -->
          	<div class="looking_form">
            	<div class="looking_form_top">
                <h3>Looking for <span>"<?php echo $category;?>"</span> Suppliers?<br>
				<span class="small_txt">Receive response from genuine & pre-verified suppliers only</span></h3>
                </div>
                
                <div class="contact_detal_form clearfix">
                	<div class="contact_detal_form_left">
                    <input id="company_name" name="company_name" placeholder="Enter products you want to buy" tabindex="1" class="signUpInputNew" type="text" />
                   
                    <textarea name="product_description" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc"></textarea>
        
       
        <input id="company_name" name="company_name" placeholder="Estimated Quantity" tabindex="1" class="signUpInputNew" type="text" />
        <div class="select">
            <select name="select" id="select">
            <option>List Item 1</option>
            <option>List Item 2</option>
            <option>List Item 3</option>
            <option>List Item 4</option>
            </select>
        </div>
                    
                    </div>
                    
                   <div class="contact_detal_form_right">
                   <h3>Enter Your Contact Details</h3>
                   <input id="company_name" name="company_name" placeholder="Email-ID" tabindex="1" class="signUpInputNew fl" type="text" />
                   <input id="company_name" name="company_name" placeholder="Full Name" tabindex="1" class="signUpInputNew fl" type="text" />
                   
                   <input id="company_name" name="company_name" placeholder="Company Name" tabindex="1" class="signUpInputNew fl" type="text" />
                   <input id="company_name" name="company_name" placeholder="Website" tabindex="1" class="signUpInputNew fl" type="text" />
                   
                   <input id="company_name" name="company_name" placeholder="Country" tabindex="1" class="signUpInputNew fl" type="text" />
                   <input id="company_name" name="company_name" placeholder="City" tabindex="1" class="signUpInputNew fl" type="text" />
                   
                   <input id="company_name" name="company_name" placeholder="Mobile / Cell Phone" tabindex="1" class="signUpInputNew big fl" type="text" />
                    </div>
                    
                    
                </div>
                
                 <input name="submit" value="Send Enquiry" class="btn btn-blue response_btn" type="submit" />
                
            </div>
          <!-- looking form end -->
        <!-- detail page end -->
        </div>
      <!-- inr right content end -->
    </div>
