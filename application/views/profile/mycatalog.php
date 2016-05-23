<?php
$condition=array("company_id"=>$comnayID);
$conditionContent=array("tbl_company_details.company_id"=>$comnayID,"feature_for"=>"profile");
$companyDetails = $this->common->companyDetails($condition);
$companyhomedata=$this->common->companyHomeContent($condition);
 $stateData= $this->common->LocationList('state');
 $companyDisplayContent=$this->common->companyDataDisplayContent($conditionContent);
 $CategoryListData= $this->common->CategoryList();
//?>
<div class="catalog_box clearfix">
<div class="catalog_top">
<!--<div class="breadcrumbs">
            <a href="#">All Categories</a>
            <span class="fa-angle-right fa"></span>
            <a href="#"> Electronics & Computers </a>
            <span class="fa-angle-right fa"></span>
            <a href="#"> Cameras & Accessories </a>
        </div>-->
        


<?php

$this->load->view('elements/ctaloghead.php');
?>


<div class="catalog_content clearfix">
<?php

$this->load->view('elements/leftbar.php');

?>

<!-- catalog right start -->
<div class="catalog_right">
<div class="pd">
<?php 
if($companyhomedata->key_description!='')
{
?>

<h3 class="inrheading">Key Description</h3>
<p><?php echo $companyhomedata->key_description?></p>
<?php 
} 
if($companyhomedata->home_content!='')
{
?>

<h3 class="inrheading">Profile</h3>
<p><?php echo $companyhomedata->home_content?></p>
<?php 
} ?>
<!-- Contact Details Start -->
<?php
if($companyDisplayContent==0)
{
	
}
else
{
	

?>
<div class="next_prev_carousel clearfix">
<div class="next_prev">
    <span class="prev">prev</span>
    <span class="next">next</span>
</div>
    	<ul class="box_carousel">
        <?php
foreach($companyDisplayContent as $companyContent)
	{
		?>
        <li>
        	<div class="box1">
            	<h3 class="inrheading"><?php echo $companyContent->feature_for;?></h3>
                <?php
				if($companyContent->display_image!='')
				{
					?>
					<img src="<?php echo WEBROOT_PATH_sell.''.$companyContent->display_image;?>" class="pro_img mr">
                    <?php
				}
				?>
                
<p><?php echo $companyContent->feature_description;?></p>
                
            </div>
        </li>
		<?php } ?>
    </ul>


</div>
<?php
}
?>
	<div class="catalog_contact_box">
    	<h3 class="inrheading">Contact Us</h3>
        <div class="bx1 clearfix">
        	<div class="bx1_left">Company name</div>
            <div class="bx1_right"><?php echo $companyName?></div>
        </div>
        
        <div class="bx1 clearfix">
        	<div class="bx1_left">Contact Person</div>
            <div class="bx1_right">Mr. <?php echo $companyDetails->contect_person?></div>
        </div>
        
        <div class="bx1 clearfix">
        	<div class="bx1_left">Mobile / Cell Phone</div>
            <div class="bx1_right">+(91)-<?php echo $companyDetails->mobile_no?></div>
        </div>
        
        <div class="bx1 clearfix">
        	<div class="bx1_left">Address</div>
            <div class="bx1_right"><?php echo $companyDetails->address?></div>
        </div>

    </div>
<!-- Contact Details End -->


<!-- -->
<div class="looking_form">
            	<div class="looking_form_top">
                <h3>Looking for Suppliers?<br> </
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
                                <select class="subcategory" name="subcategory">
                <option selected>Select Sub Category</option>
                     </select>
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
<!-- -->


</div>
</div>
<!-- catalog right end -->


</div>

        
</div>





</div>