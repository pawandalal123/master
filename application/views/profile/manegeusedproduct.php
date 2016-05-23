<?php 
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
						$getProductImagesList = $this->common->getProductImag(array('product_id'=>$productList->product_id),1);
						
				?>
                      <!-- product box 1 end -->
                     <!-- product box 1 -->
                <div class="manage_list1 mb clearfix bordr pd">
                 <div class="box detailslist<?php echo $productList->product_id;?>">
                 <?php
				 if($getProductImagesList->images_name == '')
				 {
					 ?>
					 <div class="alert clearfix pd">
                    <a href="javascript:;" class="btn1 fr editdetails"  id="<?php echo $productList->product_id; ?>">Add Photo Now</a></div>
                    <div class="info_img"><img src="http://www.indiabiztrade.com/assets/img/nophoto2.gif"></div>
		
                 <?php
					}
					else
					{
                    ?>
                    <div class="info_img"><img src="<?php echo WEBROOT_PATH_sell.$getProductImagesList->images_name; ?>"></div>

                     <?php
					}
				 ?>
                       <div class="info_details">
                    	<h3><?php echo $productList->title;?></h3>
                        <p>Listed In: <?php 
						$condition = array('id' => $productList->category);
					    $categoryNmae = $this->common->sellcategoryName($condition,false); 
					    $conditionSub = array('id' => $productList->subcategory);
					    $subcategoryNmae = $this->common->sellsubcategoryName($conditionSub,false); 
			            echo $categoryNmae.'-'.$subcategoryNmae;?></p>
                        <p class="txt"><?php echo $productList->product_description;?></p>
                        <p>Address: <?php echo $productList->address;?></p>
                    </div>
                    
                  <div class="info_sendto2">
                    	<ul class="sendto_list2">
                        <li class="sendto_email"><a  class="editdetails" id="<?php echo $productList->product_id; ?>">Edit</a></li>
                        <li class="send_enquiry"><a href="javascript:;" class="DeleteUsedProduct" id="<?php echo $productList->product_id; ?>"  >Delete</a></li>
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
<div  class="imgstore" id="imgstore<?php echo $productList->product_id;?>"  style="background: url(<?php  if($productList->image_name!='') { echo WEBROOT_PATH_sell.''.$productList->image_name; } else
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
                        <input type="hidden" name="product_id" value="2">
                        <label class="fnt-bold fnt-sz10" for="loginName">Product Name</label>
            <input id="product_name" name="product_name" tabindex="10" class="signUpInputNew" type="text" value="<?php echo $productList->title?>">
                        </div>
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Contect Person </label>
                             <input id="product_name" name="product_name" tabindex="10" class="signUpInputNew" type="text" value="<?php echo $productList->contect_person?>">
                       </div>
                       
                       
                       <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">Category</label>
           <div class="select">
            <select class="categorylistsellmanage" name="categorylistsellmanage">
                <option selected="">Select  Category</option>
                <?php foreach($sellcategory as  $sellcategory)
				{
					if($productList->category==$sellcategory->id)
					{
						echo '<option value='.$sellcategory->id.' selected="selected">'.$sellcategory->buy_category_name.'</option>';
					}
					else
					{
					echo '<option value='.$sellcategory->id.'>'.$sellcategory->buy_category_name.'</option>';
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
              <option value="<?php echo $productList->subcategory;?>"><?php echo $subcategoryNmae;?></option>                     
              </select>
                        </div>
                       </div>
                       
                       <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">price</label>
 <input id="website" name="website" tabindex="10" class="signUpInputNew" type="text" value="<?php echo $productList->price?>">                        </div>
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">State </label>
                            <div class="select">
                        <select  class="statelistsell" name="state" data-bvalidator="required">
                                   <?php foreach($stateData as  $state)
				{
					if($state->state_id==$productList->state_id)
					{
						echo ' <option value='.$state->state_id.' selected="selected">'.$state->state.'</option>';
					}
					else
					{
					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';
					}
				}
				?>
                </select>
                </div>
                       </div>
                       
                       
                       <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">City</label>
                 <div class="select">
                  <select class="districList" name="districList">
                   <?php
                   echo '<option value='.$productList->district.' selected="selected">'.$productList->district.'</option>';
				   ?>
                     </select>
                        </div>                        </div>
                        
                   <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Subcatgory</label>
                            <div class="select">
             
        
              <select class="CityList" name="CityList">
                   <?php
                   echo '<option value='.$productList->city.' selected="selected">'.$productList->city.'</option>';
				   ?>
                                        
              </select>
                        </div>
                       </div>
                       <?php
					   if($productList->category=='18')
					   {
						   ?>
						   <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">Position</label>
                 <div class="select">
                  <select class="districList" name="districList">
                   <?php
				   $sellertype=array("part","full");
				   foreach($sellertype as $selleroptions)
				   {
					   if($selleroptions=='part')
					   {
						   $SellerName='Part Time';
					   }
					   else
					   {
						   $SellerName='Full Time';
					   }
					   if($productList->position==$selleroptions)
					   {
						   echo '<option value='.$selleroptions.' >'.$SellerName.'</option>';
					   }
					   else
					   {
						   
					        echo '<option value='.$selleroptions.' >'.$SellerName.'</option>';
					   }
				   }
                  
				   ?>
                     </select>
                        </div>                        </div>
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Brand Type</label>
                            <div class="select">
                           <select class="districList" name="districList">
                  <?PHP
                  $brand_name = $this->db->where('subcategory',$productList->subcategory)
												 ->group_by('brand_id')
												 ->get('sellbrands')								
												 ->result();
								foreach($brand_name as $brand_nameList)
								{
									echo '<option value="'.$brand_nameList->brand_id.'">'.$brand_nameList->brand_name.'</option>';
								}
								?>
                     </select>
                        </div>
                       </div>
                        <?php
					   }
					   elseif($productList->category=='19')
					   {
					   }
					   else
					   {
						   ?>
						    <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">Seller Type</label>
                 <div class="select">
                  <select class="districList" name="districList">
                   <?php
				   $sellertype=array("1","2");
				   foreach($sellertype as $selleroptions)
				   {
					   if($selleroptions==1)
					   {
						   $SellerName='Individual';
					   }
					   else
					   {
						   $SellerName='Professional';
					   }
					   if($productList->sellertype==$selleroptions)
					   {
						   echo '<option value='.$selleroptions.' >'.$SellerName.'</option>';
					   }
					   else
					   {
					        echo '<option value='.$selleroptions.' >'.$SellerName.'</option>';
					   }
				   }
				   ?>
                     </select>
                        </div>                        
                        </div>
                        
                   <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Brand Type</label>
                            <div class="select">
              <select class="brandId" name="brandId">
                   <?php
                   $brandName=$this->common->sellcategoryBrandname($productList->brand_id);
                   echo '<option value='.$brandName->brand_id.' selected="selected">'.$brandName->brand_name.'</option>';
				   ?>
              </select>
                        </div>
                       </div>
                       <?php
					   }
					   
					   ?>
                    </div>
                    </div>
                    
                    <!-- edit product bottom -->
                    	<div class="edit_product_bottom">
                        <label class="fnt-bold fnt-sz10" for="loginName">Product Description</label>
            			<textarea name="product_description" id="textarea" cols="45" rows="5" class="product_desc" placeholder="<?php echo $productList->product_description?>"></textarea>
                        <?php echo form_error('product_description');?>
                        <button type="submit" name="updateproduct" class="next btn btn-blue">Submit &raquo;</button>
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
  