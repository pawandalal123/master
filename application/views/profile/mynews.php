<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);

$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$companyDisplayContent=$this->common->companyDataDisplayNews($condition);
$headingOptionList=$this->common->headingName(false);
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
      <h3>News
</h3>
     
      <div class="grn_box clearfix">Add News to your Online Catalog: <a href="#" class="button_f button-green fr add_product_but">Add</a></div>
      <?php 
	  if($companyDisplayContent==0)
	  {
		  ?>
		  <div class="box3 mrg_t15  clearfix"  >
          <form action="<?php echo SITE_URL; ?>user/addnews" method="post" id="form1" enctype="multipart/form-data">
              <label for="textfield">Select Company</label>
              <select  name="company_id"><option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
 }
 ?></select>
      <br clear="all">
        <label for="textfield">Media</label>
        <select name="media">
			<option value="">Select Media Type</option>
			<option value="Newspaper">Newspaper</option>
			<option value="Television">Television</option></select>
          <br clear="all">
       
          <label for="textfield">News Title</label>
          <input type="text" name="news_title" id="textfield" data-bvalidator="required">

          <br clear="all">
          <label for="textfield"> News Description<span>*</span></label>
          <textarea id="textarea1" name="description" ></textarea>
            <?php form_error('description');?>
<?php echo form_error('description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea1');
</script>
          <br clear="all">
      
                        <div class="cdfield">
                         <label for="textfield" class="mrg_t"> Add Image</label>
                        <div class="cp_imgbox mrg_r25">
                        <p align="center">Small Image </p>
                        <div class="con_pro_m">
                        <fieldset>
                        <div  id="imgstore">
                        </div>
                        </fieldset>
                        <div class="uplod_t"><a>Upload a Photo</a></div>
                        <input type="file" name="logo" id="getimage">
                        </div>
                        <p align="center" class="text_light">(Not more than 5MB)</p>
                        </div>
                        
                        
                        </div>
      <br clear="all">
      <label for="textfield"></label>
      <button type="submit" class="button_f button-blue fl mrg_t15">Add News</button>
      
      
      </form>
            </div>
            <?php
	  }
	  else
	  {
		   foreach($companyDisplayContent as $Contentdata)
		  {
		  ?>
                  <div class="manage_list1 mb clearfix bordr pd" id="hide<?php echo $Contentdata->news_id; ?>">
                  <?php
				  if($Contentdata->status=='Pending')
				  {
					  echo ' <div class="grn_box clearfix">Add News to your Online Catalog</div>';
				  }
				  elseif($Contentdata->status=='Rejected')
				  {
					  echo ' <div class="grn_box clearfix">Add News to your Online Catalog</div>';
				  }
				  ?>
                  <div class="detailslist<?php echo $Contentdata->news_id;?>">
                  <?php
				  if($Contentdata->news_logo=='')
				  {
				  }
				  else
				  {
					  ?>
                      <div class="info_img">
                      <img src="<?php echo WEBROOT_PATH_sell.''.$Contentdata->news_logo;?>"></div>
                      <?php
				  }
				  ?>
               	  
                  <div class="info_details">
                    	<h3><?php echo $Contentdata->news_title;?></h3>
                        <p>Last modified on:<?php echo date('F j, Y',strtotime($Contentdata->date))?></p>
                        <p class="txt"><?php echo $Contentdata->nesw_description;  ?></p>
                    </div>
                  <div class="info_sendto2">
                    	<ul class="sendto_list2">
                        <li class="sendto_email"><a href="#" class="editdetails" id="<?php echo $Contentdata->news_id;  ?>">Edit</a></li>
                        <li class="send_enquiry"><a href="deleteNews" <?php echo $Contentdata->news_id;  ?>>Delete</a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="box3 editbox<?php echo $Contentdata->news_id;?> clearfix" style="display:none"  >
             <form action="<?php echo SITE_URL; ?>user/updatenews" method="post" id="form1" enctype="multipart/form-data">
              <label for="textfield">select company</label>
              <select  name="company_id"><option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	 if($Contentdata->company_id==$ListCompany->company_id)
	 {
		 echo '<option value="'.$ListCompany->company_id.'" selected="slected">'.$ListCompany->company_name.'</option>';
	 }
	 else
	 {
		 echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
	 }
	
     
     
 }
 ?></select>
      <br clear="all">
     
           <label for="textfield">Media</label>
            <select name="media">
            <?php
			$newstype=array("Newspaper","Television");
			foreach($newstype as $type )
			{
				if($type==$Contentdata->Media_Type)
				{
					echo '<option value="'.$type.'" selected="selected">'.$type.'</option>';
				}
				else
				{
					echo '<option value="'.$type.'" >'.$type.'</option>';
				}
			}
		   
			
			?>
			
            </select>
          <br clear="all">
       
          
       
          <label for="textfield">News Title</label>
          <input type="text" name="title" id="textfield" value="<?php  echo $Contentdata->news_title; ?>" data-bvalidator="required">
          <br clear="all">
          <label for="textfield"> Testimonial Description<span>*</span></label>
          <textarea id="textarea2" name="description" ></textarea>
            <?php form_error('description');?>
<?php echo form_error('description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea2');
</script>
          <br clear="all">
      
                        <div class="cdfield">
                         <label for="textfield" class="mrg_t"> Add Image</label>
                        <div class="cp_imgbox mrg_r25">
                        <p align="center">Small Image </p>
                        <div class="con_pro_m">
                        <fieldset>
<div  id="imgstore"  style="background: url(<?php  if($Contentdata->news_logo!='') { echo WEBROOT_PATH_sell.''.$Contentdata->news_logo; } else
{
	echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>) center top no-repeat; background-size:100% 100%">
</div>
</fieldset>
                        <div class="uplod_t"><a>Upload a Photo</a></div>
                        <input type="file" name="logo" id="getimage">
                        </div>
                        <p align="center" class="text_light">(Not more than 5MB)</p>
                        </div>
                        
                        
                        </div>
      <br clear="all">
      <label for="textfield"></label>
      <button type="submit" class="button_f button-blue fl mrg_t15">Add Testimonial / Recommendation</button>
      
      
      </form>
            </div>
                        </div>
                        <?php
		  }
	  }
	  
	  ?>
		  <div class="box3 mrg_t15 add_product_box add_product_box_s add_product_box_h clearfix"  >
          <form action="<?php echo SITE_URL; ?>user/addnews" method="post" id="form1" enctype="multipart/form-data">
              <label for="textfield">Select Company</label>
              <select  name="company_id"><option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
 }
 ?></select>
      <br clear="all">
        <label for="textfield">Media</label>
        <select name="media">
			<option value="">Select Media Type</option>
			<option value="Newspaper">Newspaper</option>
			<option value="Television">Television</option></select>
          <br clear="all">
       
          <label for="textfield">News Title</label>
          <input type="text" name="news_title" id="textfield" data-bvalidator="required">

          <br clear="all">
          <label for="textfield"> News Description<span>*</span></label>
          <textarea id="textarea3" name="description" ></textarea>
            <?php form_error('description');?>
<?php echo form_error('description');?>

<script language="javascript1.2">
  generate_wysiwyg('textarea3');
</script>
          <br clear="all">
      
                        <div class="cdfield">
                         <label for="textfield" class="mrg_t"> Add Image</label>
                        <div class="cp_imgbox mrg_r25">
                        <p align="center">Small Image </p>
                        <div class="con_pro_m">
                        <fieldset>
                        <div  id="imgstore">
                        </div>
                        </fieldset>
                        <div class="uplod_t"><a>Upload a Photo</a></div>
                        <input type="file" name="logo" id="getimage">
                        </div>
                        <p align="center" class="text_light">(Not more than 5MB)</p>
                        </div>
                        
                        
                        </div>
      <br clear="all">
      <label for="textfield"></label>
      <button type="submit" class="button_f button-blue fl mrg_t15">Add News</button>      
      </form>
            </div>
           
            <div class="clear"></div>
          
         <div>
              
            </div>
      </div>
      <!-- inr right content end -->
      
      
     
    </div>
    
    
    
    
  