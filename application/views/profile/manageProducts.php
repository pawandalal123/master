<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$DataListing= $this->common->userProductListingdata($condition);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$CategoryListData= $this->common->CategoryList();
$this->load->view('elements/profilehead');
//echo $this->db->last_query();
?>
  <!-- Inner Navigation End -->
      <div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
          

		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
				
                <!-- ads box start -->
<?php
$this->load->view('elements/sellertool-left');
?>
<!-- ads box end -->
        <div class="floatfix"></div>
      </div>
      <!-- inr left content end -->
      
      <!-- inr right content start -->
      <div class="right_content" style="margin:0;">
      	<div id="inr_profile">       
              <div class="seller_tool_box pd">
              <h3 class="mb">Manage Products / Offers</h3>
             
                <?php
				if($DataListing==0)
				{
					?>
                    <div class="manage_list1 mb clearfix bordr pd">
                   	<div class="alert clearfix pd">
                    <p class="fl"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>alert_img.png"></p>
                    <p class="fl note">This product will have low ranking in IndiaBizSaath Search. Feature like Push to Top / Hot Mark are not available.</p>
                    <a href="#" class="btn1 fr">Add Photo Now</a></div>    		
               	  <div class="info_img"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>nophoto.jpg"></div>
                        </div>
                    <?php
					
				}
				else
				{
					foreach($DataListing as  $productList)
					{
				?>
              <!-- product box 1 end -->
              
             <!-- product box 1 -->
                <div class="manage_list1 mb clearfix bordr pd">
                 <div class="box detailslist<?php echo $productList->product_id;?>">
                 <?php
				 if($productList->product_image=='')
				 {
					 ?>
					 <div class="alert clearfix pd">
                    <p class="fl"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>alert_img.png"></p>
                    <p class="fl note">This product will have low ranking in IndiaBizSaath Search. Feature like Push to Top / Hot Mark are not available.</p>
                    <a href="javascript:;"  class="btn1 fr editdetails" id="<?php echo $productList->product_id; ?>">Add Photo Now</a></div>
                    <div class="info_img"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>nophoto.jpg"></div>
		
                 <?php
					}
					else
					{
						
                    ?>
                    <div class="info_img"><img src="<?php echo WEBROOT_PATH_sell.$productList->product_image; ?>"></div>

                     <?php
					}
				 ?>
                 
                   	    		
               	  
                    
                  <div class="info_details">
                    	<h3><?php echo $productList->bussiness_nature;?></h3>
                        <p>Listed In: <?php $condition=array("sub_cat_id"=>$productList->sub_category);
			                  $SubcatName=$this->common->userSubCategoryName($condition);
			                 echo $SubcatName->subcategory;?></p>
                        <p class="txt"><?php echo $productList->discription;?></p>
                        <p>wesite: <?php echo $productList->wesite;?></p>
                    </div>
                    
                  <div class="info_sendto2">
                    	<ul class="sendto_list2">
                        <li class="sendto_email"><a  href="javascript:;" class="editdetails" id="<?php echo $productList->product_id; ?>">Edit</a></li>
                        <li class="send_enquiry"><a href="javascript:;" id="<?php echo $productList->product_id; ?>" class="deleteproduct">Delete</a></li>
                        </ul>
                    </div>
              </div>
              <div class="items editbox<?php echo $productList->product_id;?> clearfix" style="display:none">
      <!-- page1 -->
      <div class="page">
      <form method="post" action="" enctype="multipart/form-data">
    <div class="edit_product_tab clearfix">
                	<div class="edit_product_tab_top clearfix">
                	<div class="edit_product_img mr">
                   <div class="con_pro_m">
<fieldset>
<div  class="imgstore" rel="<?php echo $productList->product_id;?>" id="imgstore<?php echo $productList->product_id;?>"  style="background: url(<?php  if($productList->product_image!='') { echo WEBROOT_PATH_sell.''.$productList->product_image; } else
{
	echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>) center top no-repeat; background-size:100% 100%">
</div>
</fieldset>
<div class="uplod_t"><a>Upload a Photo</a></div>
 <input type="file" name="logo" class="getimage" id="getimageID<?php echo $productList->product_id;?>" onchange="readURLChangeImage(this)">
</div></div>
                    <div class="edit_product_form">
                    	<div class="field_left mr">
                        <input type="hidden" name="product_id" value="<?php echo $productList->product_id; ?>" />
                        <label class="fnt-bold fnt-sz10" for="loginName">Product Name</label>
            <input id="product_name" name="product_name" tabindex="10" class="signUpInputNew" type="text" value="<?php echo $productList->bussiness_nature;?>" />
                        </div>
                        
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Select Your Company </label>
                            <div class="select">
             <select name="company_id">
                                <option selected>Select Company</option>
                                <?php
 foreach($UsercompnayList as $ListCompany)
 {
	 if($productList->company_id==$ListCompany->company_id)
	 {
		  echo '<option value="'.$ListCompany->company_id.'" selected="selected">'.$ListCompany->company_name.'</option>';
	 }
	 else
	 {
		  echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
	 }
	
    
     
 }
 ?>
                                </select>
                        </div>
                       </div>
                       
                       
                       <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">Category</label>
           <div class="select">
            <select class="categorylist" name="categorylist">
                <option selected>Select  Category</option>
                 <?php foreach($CategoryListData as  $CategoryList)
				{
					 if($productList->category==$CategoryList->cat_id)
					 {
						 echo ' <option value='.$CategoryList->cat_id.' selected="selected">'.$CategoryList->category.'</option>';
					 }
					 else
					  {
						  echo ' <option value='.$CategoryList->cat_id.'>'.$CategoryList->category.'</option>';
					  }
				}
				?>
                              </select>
                        </div>
                        </div>
                        
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Subcatgory</label>
                            <div class="select">
             <select class="subcategory" name="subcategory">
             <?php
			  $condition=array("sub_cat_id"=>$productList->sub_category);
			  $SubcatName=$this->common->userSubCategoryName($condition);
               echo ' <option value='.$productList->sub_category.'>'.$SubcatName->subcategory.'</option>';
			   ?>
                     </select>
                        </div>
                       </div>
                       
                       <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">wesite</label>
          
 <input id="website" name="website" tabindex="10" class="signUpInputNew" type="text" value="<?php echo $productList->website;?>" />                        </div>
                                           
                    </div>
                    </div>
                    
                    <!-- edit product bottom -->
                    	<div class="edit_product_bottom">
                        <label class="fnt-bold fnt-sz10" for="loginName">Product Description</label>
            			<textarea id="textarea<?php echo $productList->product_id;?>" name="product_description" ><?php echo $productList->discription;?></textarea>
<?php echo form_error('product_description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea<?php echo $productList->product_id;?>');
</script>
                        <button type="submit" class="next btn btn-blue" name="submit" value="Submit">Submit &raquo;</button>
                        </div>
                    <!-- edit product bottom end -->
                    
                
                </div>
                </form>
      </div>


      


    </div>
              
                        </div>
                        
                        <?php
					}
				}
						?>
              <!-- product box 1 end -->
              <!--<div class="noresult">No Result to Display </div>-->
              </div>
        </div>
      <!-- inr right content end -->
    </div>
  </div>