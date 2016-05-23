<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$CategoryListData= $this->common->CategoryList();
$this->load->view('elements/profilehead');
//echo $this->db->last_query();
?>
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
      <div class="right_content" style="margin-top:0;">
      	<div id="inr_profile">       
              <div class="seller_tool_box pd">
              <h3 class="mb">Manage Products / Offers</h3>
              <!-- manage product tab start -->
<!-- edit product tab -->
<form action="<?php echo SITE_URL;?>user/addproduct" method="post">
  <div id="wizard" class="clearfix">
    <ul id="status">
      <li class="active">Adit Product</li>
      <li>Additional Details</li>
    </ul>

    <div class="items clearfix">
      <!-- page1 -->
      <div class="page">
<div class="edit_product_tab clearfix">
                	<div class="edit_product_tab_top clearfix">
                	<div class="edit_product_img mr">
                    
                   <div class="con_pro_m">
<fieldset>
<div class="imgstore"  id="imgstore1" style="background-size:100% 100%;">
</div>
</fieldset>

<div class="uplod_t"><a>Upload a Photo</a></div>
  <input type="file" name="logo" class="getimage" id="getimageID1" onchange="readURLChangeImage(this)">
</div></div>
                    <div class="edit_product_form">
                    	<div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">Product Name</label>
            <input id="product_name" name="product_name" tabindex="10" class="signUpInputNew" type="text" />
                        </div>
                        
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Select Your Company </label>
                            <div class="select">
             <select name="company_id">
                                <option selected>Select Company</option>
                                <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
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
					echo ' <option value='.$CategoryList->cat_id.'>'.$CategoryList->category.'</option>';
				}
				?>
                              </select>
                        </div>
                        </div>
                        
                        <div class="field_left">
                        	<label class="fnt-bold fnt-sz10" for="loginName">Subcatgory</label>
                            <div class="select">
             <select class="subcategory" name="subcategory">
                <option selected>Select Sub Category</option>
                     </select>
                        </div>
                       </div>
                       
                       <div class="field_left mr">
                        <label class="fnt-bold fnt-sz10" for="loginName">wesite</label>
                   <input id="website" name="website" tabindex="10" class="signUpInputNew" type="text" />                        </div>
                    </div>
                    </div>
                    
                    <!-- edit product bottom -->
                    	<div class="edit_product_bottom">
                        <label class="fnt-bold fnt-sz10" for="loginName">Product Description</label>
            			<textarea id="textarea2" name="product_description" ></textarea>
<?php echo form_error('product_description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea2');
</script>
                        
                        <button type="submit" class="next btn btn-blue">Submit &raquo;</button>
                        </div>
                    <!-- edit product bottom end -->                
                </div>
      </div>
    </div><!--items-->
  </div><!--wizard-->
</form>
                    <!-- edit product tab end -->
              <!-- manage product tab end -->
              

       
              <!--<div class="noresult">No Result to Display </div>-->
              
              </div>
        </div>
      <!-- inr right content end -->
      
      
     
    </div>
      <!-- inr right content end -->
      
      
     
    </div>
    
    
    
    
  