<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$usercompanyDetails=$this->common->usercompanyDetails($condition);
$requirmentfrequencyData=$this->common->requirmentfrequency();
$companyDisplayContent=$this->common->leadListingdata($condition,false);
$currencyListData=$this->common->currencyList();
$unitsaData=$this->common->requirmentunits();
$this->load->view('elements/profilehead');
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
      <div class="right_content2" style="margin-top:0;">
     
     <ul class="tabs">
    <li><a href="#tab1">Business Details</a></li>
    <li><a href="#tab2">Statutory Details</a></li>
    <li><a href="#tab3">Products We Buy</a></li>
    <li><a href="<?php echo SITE_URL?>user/useraccount/manegeProducts">Products We Sell</a></li>
  </ul>
  <div class="tabContainer">
    <div id="tab1" class="tabContent">              

                          <form id="form1" method="post" action="<?php echo SITE_URL?>user/companybussinessUpdate" enctype="multipart/form-data">
                          <div class="cdfield">
                    	  <label>Company Name</label>
               	          <input type="hidden" class="type" id="Bussiness_Contect"/>
                          <select name="section" class="wdt2 companycahnge" tabindex="1">
		                  <option value="">Choose One</option>
						<?php
                        foreach($UsercompnayList as $ListCompany)
                        {
                        echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
                        }
                        ?>
                         </select>
                       </div>
                       <div class="mybussiness">
                       </div>
                       </form>
                       </div>    
    <div id="tab2" class="tabContent">
     <form id="form1" method="post" action="<?php echo SITE_URL?>user/companyregistrationUpdate" enctype="multipart/form-data">
    <div class="cdfield">
                    	  <label>Company Name</label>
               	          <input type="hidden" class="RegistrationDetailstype" id="RegistrationDetails"/>
                          <select name="section" class="wdt2 RegistrationDetails" tabindex="1">
		                  <option value="">Choose One</option>
						<?php
                        foreach($UsercompnayList as $ListCompany)
                        {
                        echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
                        }
                        ?>
                         </select>
                         
                          <div class="RegistrationDetailsShow">
                       </div>
                     
                       </div>
                         </form>

    </div>
    <!-- / END #tab2 -->
    
    <div id="tab3" class="tabContent">
    <div class="box2 clearfix">
      <h2 class="fl">Add Product / Service you Buy.</h2>
      <div class="button2 fr"><a href="#" class="add_product_but">Add Product / Service</a></div>
      </div>
      <?php
	  if($companyDisplayContent==0)
	  {
		  ?>
          <div class="box_bp3 mrg_t15  add_product_box_s add_product_box_h clearfix">
      <div class="close_b"><a href="#" class="add_product_close">Close [x]</a></div>
              <form name="form1" method="post" action="">
      <div class="panel_l">
         <input type="hidden" name="company_id" value="3" />
         <label for="textfield">Requirment</label>
          <input type="hidden" name="subcat" id="subcat"/>
          <input type="hidden" name="catid" id="catid"/>
          <textarea name="description" id="productservicecxz" cols="3" rows="8" class=""></textarea>
         
          <span>Please enter the Requirment In Detailse.</span>
          <label for="textfield">Product / Service you Buy</label>
          <input type="text" name="productservice" id="productservice" class="inpt_w1" autocomplete="off">

           <label for="textfield">Approx order value</label>
          <input type="text" name="ordervalue" id="ordervalue" class="inpt_w2" data-bvalidator="required">
         <select name="currency" >
         <option value="">--Select Currency--</option> 
           <?php foreach($currencyListData as $currencyListData)
	   {
		   echo '<option value="'.$currencyListData->currency_code.'">'.$currencyListData->currency_name.'</option>x';
	   }?>
           <option value="Other">Other</option>
           </select>
<span>Please enter the Approx Order Value here.</span>
      </div>
      <div class="panel_r">
      <label for="textfield">Company Name</label>
       <select name="prdbuy_new_req" class="inpt_w3">
       <option value="">Select Company</option>
       <?php
                        foreach($UsercompnayList as $ListCompany)
                        {
                        echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
                        }
                        ?>
           </select>
      <label for="textfield">Required Quantity</label>
          <input type="text" name="Quantity" id="Quantity" class="inpt_w2" data-bvalidator="required">
          <select name="Units" value="Units">
          <option value="">--Select Unit--</option> 
          <?php
		  
		  foreach($unitsaData as $unitsaDataDisplay)
		  {
			  echo '<option value="'.$unitsaDataDisplay->unit_name.'">'.$unitsaDataDisplay->unit_name.'</option>';
		  }
		  ?>
          </select>
      <span>Please enter the Required Quantity here.</span>
       <label for="textfield">Requirement Frequency</label>
       <select name="RequirementFrequency" class="inpt_w3">
       <option value="">Select Requirement</option>
       <?php foreach($requirmentfrequencyData as $requirmentfreData)
	   {
		   echo '<option value="'.$requirmentfreData->requir_id.'">'.$requirmentfreData->require_name.'</option>x';
	   }?>
           </select>
          
<span>Please select the Requirement Frequency here.</span>
      </div>
      <div class="clear"></div>
      
      <div class="fl">
      <label for="textfield">Preferred supplier location</label>
      <input name="radio" type="radio" value="local"> Local 
      <input name="radio" type="radio" value="india" class="mrg_l35"> Anywhere in India
      <input name="radio" type="radio" value="outside" class="mrg_l35"> Any specific Location
      </div>
      <div class="fr">
      <input type="submit" name="SAVELead" class="btn btn-blue but_m"/></div>
      </form>
      </div>
		   
      <?php
	  }
	  else
	  {
		  foreach($companyDisplayContent as $companyDisplayContentData)
		  {
		  ?>
          <div class="pw_detail manage_list1 clearfix detailslist<?php echo $companyDisplayContentData->lead_id;?>">
    <h2><?php    $condition=array('cat_id'=>$companyDisplayContentData->category);
				 $condition1=array('sub_cat_id'=>$companyDisplayContentData->subcategory);
				 $CategoryName=$this->common->CategoryName($condition);
				 $SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);
				  echo $CategoryName->category.'('.$SubCategoryNameDisplay->subcategory.')';?></h2>
    <ul class="list_cdatail2 clearfix">
    <li>Product / Service you Buy </li><li><label for="textfield"><?php echo $companyDisplayContentData->product_name	?></label></li>
    <li>Required Quantity</li><li><label for="textfield"><?php if($companyDisplayContentData->quantity=='') { echo 'Not Specify'; } else { echo $companyDisplayContentData->quantity;}?></label></li>
    <li>Approx order value</li><li><label for="textfield"><?php if($companyDisplayContentData->cost_estimated=='') { echo 'Not Specify'; } else { echo $companyDisplayContentData->cost_estimated;}?></label></li>
    <li>Requirement Frequency</li><li><label for="textfield"><?php if($companyDisplayContentData->requirment_frequency==0) { echo 'Not Specify'; } else { echo $companyDisplayContentData->requirment_frequency;}?></label></li>
    <li>Preferred supplier location </li><li><label for="textfield"><?php if($companyDisplayContentData->location_prefeer==0) { echo 'Not Specify'; } else { echo $companyDisplayContentData->location_prefeer;}?></label></li>
    </ul>
    <div class="fr clearfix"><button class="button_f button-dark-blue editdetails" id="<?php echo $companyDisplayContentData->lead_id;?>">Edit</button> <button class="button_f button-red bussinessDelete"  id="<?php echo $companyDisplayContentData->lead_id;?>">Delete</button>
</div>    
    </div>
          <div class="box_bp3 editbox<?php echo $companyDisplayContentData->lead_id;?> clearfix" style="display:none"  >
          <form name="form1" method="post" action="">
      <div class="panel_l">
         <input type="hidden" name="company_id" value="3" />
         <label for="textfield">Requirment</label>
          <input type="hidden" name="subcat" id="subcat"/>
          <input type="hidden" name="catid" id="catid"/>
          <input type="hidden" name="lead_id" value="<?php echo $companyDisplayContentData->lead_id;?>"/>
          <textarea name="description" id="dfgdgdsfgdsf" cols="3" rows="8" class=""><?php echo $companyDisplayContentData->requirment;?></textarea>
          <?php echo form_error('description');?>
         <span>Please enter the Requirment In Detailse.</span>
          <label for="textfield">Product / Service you Buy</label>
          <?php echo $companyDisplayContentData->product_name;?>
           <label for="textfield">Approx order value</label>
           <?php
		   $cost=explode('-',$companyDisplayContentData->cost_estimated); 
		    ?>
          <input type="text" name="ordervalue" id="ordervalue" class="inpt_w2" value="<?php echo $cost[0];?>" data-bvalidator="required">
         <select name="currency" >
         <option value="">--Select Currency--</option> 
           <?php foreach($currencyListData as $currencyListData)
	   {
		   if($currencyListData->currency_code==$cost[1])
		   {
			   echo '<option value="'.$currencyListData->currency_code.'" selected="selected">'.$currencyListData->currency_name.'</option>x';
		   }
		   else
		   {
		   echo '<option value="'.$currencyListData->currency_code.'">'.$currencyListData->currency_name.'</option>x';
		   }
	   }?>
           <option value="Other">Other</option>
           </select>
<span>Please enter the Approx Order Value here.</span>
      </div>
      <div class="panel_r">
      <label for="textfield">Company Name</label>
       <select name="company_id" class="inpt_w3">
       <option value="">Select Company</option>
       <?php
                        foreach($UsercompnayList as $ListCompany)
                        {
							if($ListCompany->company_id==$companyDisplayContentData->company_id)
							{
								echo '<option   value="'.$ListCompany->company_id.'" selected="selected">'.$ListCompany->company_name.'</option>';
							}
							else
							{
                                echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
							}
                        }
						 $units=explode('-',$companyDisplayContentData->quantity);
                        ?>
           </select>
          <label for="textfield">Required Quantity</label>
          <input type="text" name="Quantity" id="Quantity" class="inpt_w2" value="<?php echo $units[0];?>" data-bvalidator="required">
          <select name="Units" value="Units">
          <?php
		  foreach($unitsaData as $unitsaDataDisplay)
		  {
			 // $units=explode('-',$companyDisplayContentData->quantity);
			  if($units[1]==$unitsaDataDisplay->unit_name)
			  {
				  echo '<option value="'.$unitsaDataDisplay->unit_name.'" selected="selected">'.$unitsaDataDisplay->unit_name.'</option>';
			  }
			  else
			  {
				  echo '<option value="'.$unitsaDataDisplay->unit_name.'">'.$unitsaDataDisplay->unit_name.'</option>';
			  }
			  
		  }
		  ?> </select>
       <span>Please enter the Required Quantity here.</span>
       <label for="textfield">Requirement Frequency</label>
       <select name="RequirementFrequency" class="inpt_w3">
       <option value="">Select Requirement</option>
       <?php foreach($requirmentfrequencyData as $requirmentfreData)
	   {
		   if($requirmentfreData->requir_id==$companyDisplayContent->requirment_frequency)
		   {
			   echo '<option value="'.$requirmentfreData->requir_id.'" selected="selected">'.$requirmentfreData->require_name.'</option>';
		   }
		   else
		   {
			   echo '<option value="'.$requirmentfreData->requir_id.'">'.$requirmentfreData->require_name.'</option>';
		   }
			 
		   
	   }?>
           </select>
          <span>Please select the Requirement Frequency here.</span>
      </div>
      <div class="clear"></div>
      
      <div class="fl">
      <label for="textfield">Preferred supplier location</label>
      <input name="radio" type="radio" value="local"> Local 
      <input name="radio" type="radio" value="india" class="mrg_l35"> Anywhere in India
      <input name="radio" type="radio" value="outside" class="mrg_l35"> Any specific Location
      </div>
      <div class="fr">
      <input type="submit" name="submitLeadUpdate" value="submit" class="btn btn-blue but_m"/>
      <input name="discard" value="Discard" class="btn btn-blue but_m hideupdate" id="<?php echo $companyDisplayContentData->lead_id;?>" type="button"></div>
      </form>
          </div>
          <?php
	  }
	  }
	  ?>
      
      <div class="box_bp3 mrg_t15 add_product_box add_product_box_s add_product_box_h clearfix">
      <div class="close_b"><a href="#" class="add_product_close">Close [x]</a></div>
              <form name="form1" method="post" action="<?php echo SITE_URL?>user/addservice">
      <div class="panel_l">
         <input type="hidden" name="company_id" value="3" />
         <label for="textfield">Requirment</label>
          <input type="hidden" name="subcat" id="subcat"/>
          <input type="hidden" name="catid" id="catid"/>
          <textarea name="description" id="productservicecxz" cols="3" rows="8" class=""></textarea>
         
          <span>Please enter the Requirment In Detailse.</span>
          <label for="textfield">Product / Service you Buy</label>
          <input type="text" name="productservice" id="productservice" class="inpt_w1" autocomplete="off">

           <label for="textfield">Approx order value</label>
          <input type="text" name="ordervalue" id="ordervalue" class="inpt_w2" data-bvalidator="required">
         <select name="currency" >
         <option value="">--Select Currency--</option> 
           <?php foreach($currencyListData as $currencyListData)
	   {
		   echo '<option value="'.$currencyListData->currency_code.'">'.$currencyListData->currency_name.'</option>x';
	   }?>
           <option value="Other">Other</option>
           </select>
<span>Please enter the Approx Order Value here.</span>
      </div>
      <div class="panel_r">
      <label for="textfield">Company Name</label>
       <select name="prdbuy_new_req" class="inpt_w3">
       <option value="">Select Company</option>
       <?php
                        foreach($UsercompnayList as $ListCompany)
                        {
                        echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
                        }
                        ?>
           </select>
      <label for="textfield">Required Quantity</label>
          <input type="text" name="Quantity" id="Quantity" class="inpt_w2" data-bvalidator="required">
          <select name="Units" value="Units">
          <option value="">--Select Unit--</option> 
          <?php
		  
		  foreach($unitsaData as $unitsaDataDisplay)
		  {
			  echo '<option value="'.$unitsaDataDisplay->unit_name.'">'.$unitsaDataDisplay->unit_name.'</option>';
		  }
		  ?>
          </select>
      <span>Please enter the Required Quantity here.</span>
       <label for="textfield">Requirement Frequency</label>
       <select name="RequirementFrequency" class="inpt_w3">
       <option value="">Select Requirement</option>
       <?php foreach($requirmentfrequencyData as $requirmentfreData)
	   {
		   echo '<option value="'.$requirmentfreData->requir_id.'">'.$requirmentfreData->require_name.'</option>x';
	   }?>
           </select>
          
<span>Please select the Requirement Frequency here.</span>
      </div>
      <div class="clear"></div>
      
      <div class="fl">
      <label for="textfield">Preferred supplier location</label>
      <input name="radio" type="radio" value="local"> Local 
      <input name="radio" type="radio" value="india" class="mrg_l35"> Anywhere in India
      <input name="radio" type="radio" value="outside" class="mrg_l35"> Any specific Location
      </div>
      <div class="fr">
      <input type="submit" name="SAVE" class="btn btn-blue but_m"/></div>
      </form>
      </div>
      
      <br>
      <br clear="all">
    </div>
    <!-- / END #tab3 -->
    
    <div id="tab4" class="tabContent">
      <h2>Four</h2>
    </div>
    <!-- / END #tab4 -->
     </div>

    </div>

  </div>