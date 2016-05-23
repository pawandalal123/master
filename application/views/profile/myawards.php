<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$conditionContent=array("user_id"=>$userId,"feature_for"=>"profile");
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$companyDisplayContent=$this->common->companyDataDisplayContent($conditionContent);
$headingOptionList=$this->common->headingName(false);
$this->load->view('elements/profilehead');
//echo $this->db->last_query();
?>
  <!-- Inner Navigation End -->
         <div class="main_container clearfix">
        <div class="centralContent">
    <!--<div class="hk-breadcrumb-cntnr mrgn-bt-10">
            <span>
               <a href="#">Home</a>
            </span>
        <span>&raquo;</span>
        <span class="fnt-bold">Account</span>
        </div>-->
            <div class="floatfix"></div>
        </div>
        
        

		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
        
                <!-- ads box start -->
<div class="leftside">
    	<div class="benefits">
        <h3>Company Profile</h3>
        <div class="con_pro_m">
</div>

<?php
$this->load->view('elements/left-nav.php');
?>
        </div>
        
        <div class="satisfied">
        <h4>You may also like to</h4>
			<ul class="left_list2">
                  <li><a href="#">View Latest Buy Leads</a></li>
                  <li><a href="#">Add Products / Offers</a></li>
                </ul>
        </div>
    </div>
<!-- ads box end -->
                
        <div class="floatfix"></div>
      </div>
      <!-- inr left content end -->
      
      <!-- inr right content start -->
      <div class="right_content"  style="margin-top:0px;">
      <h3>Awards & Memberships
</h3>
     
      <div class="grn_box clearfix">Add Awards & Memberships to your Online Catalog: <a href="#" class="button_f button-green fr add_product_but">Add</a></div>
      <?php 
	  if($companyDisplayContent==0)
	  {
	  ?>
      		<div class="box3 <?php /*?>mrg_t15 add_product_box add_product_box_s add_product_box_h<?php */?> clearfix"  >
            <form name="form1" method="post" action="<?php echo SITE_URL?>user/ctalogFeatures" enctype="multipart/form-data">
            	<div class="profile_pic"><div class="con_pro_m">
<fieldset>
<div  class="imgstore" id="imgstore2" style="background-size:100% 100%;">
</div>
</fieldset>

<div class="uplod_t"><a>Upload a Photo</a></div>
  <input type="file" name="logo" class="getimage" id="getimageID2" onchange="readURLChangeImage(this)">
</div></div>

                <div class="about_form">
          <fieldset class="mrgn-b-20">
          <input type="hidden" name="feature_for" value="feature_for"/>
            <label class="fnt-bold fnt-sz10" for="loginName">Company Name</label>
           
            <select name="company_id"  class="a_f rf" style="width:276px" id="select1" >
 <option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
 }
 ?>
 
        </select>
            
             <label class="fnt-bold fnt-sz10" for="loginName"> Heading</label>
            <select name="heading" class="a_f rf" style="width:276px" id="select1">
            <option value="" selected="selected">Select Heading</option>
            <?php 
			foreach($headingOptionList as  $headingList)
			{
				echo '<option value="'.$headingList->heading_id.'">'.$headingList->heading_name.'</option>';
			}
			?>
            </select>
            
          </fieldset>
      
                </div>
                 <div class="clear"></div>
                    <label class="fnt-bold fnt-sz10">Product Description</label>
            <textarea id="textarea2" name="description" ></textarea>
<?php echo form_error('description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea2');
</script>
                 <div class="clear"></div>
                <input name="login" value="Add Product" class="btn btn-blue" type="submit" />
                </form>
            </div>
            <?php
	  }
	  else
	  {
		  foreach($companyDisplayContent as $Contentdata)
		  {
		  ?>
                  <div class="manage_list1 mb clearfix bordr pd" id="hidefeature<?php echo $Contentdata->feature_id;?>">
                  <div class="detailslist<?php echo $Contentdata->feature_id;?>">
                  <?php
				  if($Contentdata->display_image=='')
				  {
				  }
				  else
				  {
					  ?>
                      <div class="info_img"><img src="<?php echo WEBROOT_PATH_sell.''.$Contentdata->display_image;?>"></div>
                      <?php
				  }
				  ?>
               	  
                  <div class="info_details">
                    	<h3>shoes</h3>
                        <p>Last modified on:<?php echo date('F j, Y',strtotime($Contentdata->date))?></p>
                        <p class="txt"><?php echo $Contentdata->feature_description;  ?></p>
                    </div>
                  <div class="info_sendto2">
                    	<ul class="sendto_list2">
                        <li class="sendto_email"><a href="javascript:;" class="editdetails" id="<?php echo $Contentdata->feature_id;  ?>">Edit</a></li>
                        <li class="send_enquiry"><a href="javascript:;" class="deletefeature" id="<?php echo $Contentdata->feature_id;?>">Delete</a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="box3 editbox<?php echo $Contentdata->feature_id;?> clearfix" style="display:none"  >
          <form name="form1" method="post" action="<?php echo SITE_URL?>user/ctalogFeaturesupdate" enctype="multipart/form-data">
            	<div class="profile_pic"><div class="con_pro_m">
<fieldset>
<div  class="imgstore" id="imgstore<?php echo $Contentdata->feature_id;?>"  style="background: url(<?php  if($Contentdata->display_image!='') { echo WEBROOT_PATH_sell.''.$Contentdata->display_image; } else
{
	echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>) center top no-repeat; background-size:100% 100%">
</div>
</fieldset>

<div class="uplod_t"><a>Upload a Photo</a></div>
  <input type="file" name="logo" class="getimage" id="getimageID<?php echo $Contentdata->feature_id;?>" onchange="readURLChangeImage(this)">
</div></div>

                <div class="about_form">
          <fieldset class="mrgn-b-20">
          
            <label class="fnt-bold fnt-sz10" for="loginName">Company Name</label>
           
            <select name="company_id"  class="a_f rf" style="width:276px" id="select1" >
 <option value="" >[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	if($Contentdata->company_id==$ListCompany->company_id)
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
            
             <label class="fnt-bold fnt-sz10" for="loginName"> Heading</label>
            <select name="heading" class="a_f rf" style="width:276px" id="select1">
            <option value="" selected="selected">Select Heading</option>
        <?php 
			foreach($headingOptionList as  $headingList)
			{
				echo '<option value="'.$headingList->heading_id.'">'.$headingList->heading_name.'</option>';
			}
			?>
            </select>
            
          </fieldset>
      
                </div>
                 <div class="clear"></div>
                    <label class="fnt-bold fnt-sz10">Product Description</label>
             <textarea id="textarea<?php echo $Contentdata->feature_id?>" name="description" ><?php echo $Contentdata->feature_description; ?></textarea>
<?php echo form_error('description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea<?php echo $Contentdata->feature_id?>');
</script>
                 <div class="clear"></div>
                <input name="login" value="Update Product" class="btn btn-blue" type="submit" />
                <input name="login" value="Discard" class="btn btn-blue hideupdate" id="<?php echo $Contentdata->feature_id;?>" type="button" />
                </form>
            </div>
                        </div>
                        <?php
		  }
	  }
						?>
		  <div class="box3 mrg_t15 add_product_box add_product_box_s add_product_box_h clearfix"  >
          <form name="form1" method="post" action="<?php echo SITE_URL?>user/ctalogFeatures" enctype="multipart/form-data">
            	<div class="profile_pic"><div class="con_pro_m">
<fieldset>
<div  class="imgstore" id="imgstore3" style="background-size:100% 100%">
</div>
</fieldset>

<div class="uplod_t"><a>Upload a Photo</a></div>
  <input type="file" name="logo" class="getimage" id="getimageID3" onchange="readURLChangeImage(this)">
</div></div>

                <div class="about_form">
          <fieldset class="mrgn-b-20">
          <input type="hidden" name="feature_for" value="profile"/>
            <label class="fnt-bold fnt-sz10" for="loginName">Company Name</label>
           
            <select name="company_id"  class="a_f rf" style="width:276px" id="select1" >
 <option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
 }
 ?>
 
        </select>
            
             <label class="fnt-bold fnt-sz10" for="loginName"> Heading</label>
            <select name="heading" class="a_f rf" style="width:276px" id="select1">
            <option value="" selected="selected">Select Heading</option>
           <?php 
			foreach($headingOptionList as  $headingList)
			{
				echo '<option value="'.$headingList->heading_id.'">'.$headingList->heading_name.'</option>';
			}
			?>
            </select>
            
          </fieldset>
      
                </div>
                 <div class="clear"></div>
                    <label class="fnt-bold fnt-sz10">Product Description</label>
            <textarea id="textarea2" name="description" ></textarea>
<?php echo form_error('description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea2');
</script>
                 <div class="clear"></div>
                <input name="login" value="Add Product" class="btn btn-blue" type="submit" />
                </form>
            </div>
           
            <div class="clear"></div>
          
         <div>
              
            </div>
      </div>
      <!-- inr right content end -->
      
      
     
    </div>
    
    
    
    
  