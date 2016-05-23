<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$companyDisplayContent=$this->common->companyDataDisplayTetmonial($condition);
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
      <h3>About Us
</h3>
     
      <div class="grn_box clearfix">Add About Us to your Online Catalog: <a href="#" class="button_f button-green fr add_product_but">Add</a></div>
      <?php 
	  if($companyDisplayContent==0)
	  {
		  ?>
		  <div class="box3 mrg_t15  clearfix"  >
          <form action="<?php echo SITE_URL; ?>user/addtest" method="post" id="form1" enctype="multipart/form-data">
              <label for="textfield">Testimonial Given by</label>
              <select  name="company_id"><option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
 }
 ?></select>
      <br clear="all">
        <label for="textfield">Testimonial Given by</label>
        <input type="text" name="test_given_by" id="textfield" data-bvalidator="required">
          <br clear="all">
       
          <label for="textfield">Sender Email</label>
          <input type="text" name="email_sender" id="textfield" data-bvalidator="required">
     
          <label for="textfield">Address</label>
          <input type="text" name="Address" id="textfield" data-bvalidator="required">
          <br clear="all">
       
          <label for="textfield">Testimonial Title</label>
          <input type="text" name="title" id="textfield" data-bvalidator="required">
          <br clear="all">
          <label for="textfield"> Testimonial Description<span>*</span></label>
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
      <button type="submit" class="button_f button-blue fl mrg_t15">Add Testimonial / Recommendation</button>
      
      
      </form>
            </div>
            <?php
	  }
	  else
	  {
		   foreach($companyDisplayContent as $Contentdata)
		  {
		  ?>
                  <div class="manage_list1 mb clearfix bordr pd" id="hide<?php echo $Contentdata->testo_id;  ?>">
                  <div class="detailslist<?php echo $Contentdata->testo_id;?>">
                  <?php
				  if($Contentdata->display_image=='')
				  {
				  }
				  else
				  {
					  ?>
                      <div class="info_img"><img src="<?php echo WEBROOT_PATH_sell.''.$Contentdata->image;?>"></div>
                      <?php
				  }
				  ?>
               	  
                  <div class="info_details">
                    	<h3><?php echo $Contentdata->title;?></h3>
                        <p>Last modified on:<?php echo date('F j, Y',strtotime($Contentdata->date))?></p>
                        <p class="txt"><?php echo $Contentdata->description;  ?></p>
                    </div>
                  <div class="info_sendto2">
                    	<ul class="sendto_list2">
                        <li class="sendto_email"><a href="javascript:;" class="editdetails" id="<?php echo $Contentdata->testo_id;  ?>">Edit</a></li>
                        <li class="send_enquiry"><a href="javascript:;" class="testdelete" id="<?php echo $Contentdata->testo_id; ?>">Delete</a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="box3 editbox<?php echo $Contentdata->testo_id;?> clearfix" style="display:none"  >
           <form action="<?php echo SITE_URL; ?>user/updatetest" method="post" id="form1" enctype="multipart/form-data">
              <label for="textfield">Testimonial Given by</label>
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
        <label for="textfield">Testimonial Given by</label>
        <input type="text" name="test_given_by" id="textfield" value="<?php  echo $Contentdata->test_given_by; ?>" data-bvalidator="required">
          <br clear="all">
       
          <label for="textfield">Sender Email</label>
          <input type="text" name="email_sender" id="textfield" value="<?php  echo $Contentdata->sender_email; ?>" data-bvalidator="required">
     
          <label for="textfield">Address</label>
          <input type="text" name="Address" id="textfield" value="<?php  echo $Contentdata->address;?>" data-bvalidator="required">
          <br clear="all">
       
          <label for="textfield">Testimonial Title</label>
          <input type="text" name="title" id="textfield" value="<?php  echo $Contentdata->title; ?>" data-bvalidator="required">
          <br clear="all">
          <label for="textfield"> Testimonial Description<span>*</span></label>
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
<div  id="imgstore"  style="background: url(<?php  if($Contentdata->image!='') { echo WEBROOT_PATH_sell.''.$Contentdata->image; } else
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
          <form action="<?php echo SITE_URL; ?>user/addtest" method="post" id="form1" enctype="multipart/form-data">
              <label for="textfield">Testimonial Given by</label>
              <select  name="company_id"><option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
	
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
     
 }
 ?></select>
      <br clear="all">
        <label for="textfield">Testimonial Given by</label>
        <input type="text" name="test_given_by" id="textfield" data-bvalidator="required">
          <br clear="all">
       
          <label for="textfield">Sender Email</label>
          <input type="text" name="email_sender" id="textfield" data-bvalidator="required">
     
          <label for="textfield">Address</label>
          <input type="text" name="Address" id="textfield" data-bvalidator="required">
          <br clear="all">
       
          <label for="textfield">Testimonial Title</label>
          <input type="text" name="title" id="textfield" data-bvalidator="required">
          <br clear="all">
          <label for="textfield"> Testimonial Description<span>*</span></label>
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
      <button type="submit" class="button_f button-blue fl mrg_t15">Add Testimonial / Recommendation</button>
      
      
      </form>
            </div>
           
            <div class="clear"></div>
          
         <div>
              
            </div>
      </div>
      <!-- inr right content end -->
      
      
     
    </div>
    
    
    
    
  