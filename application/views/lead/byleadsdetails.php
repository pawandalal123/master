<?php 
 $productID= $ProductId;
 $productName= $ProductName;

 
// $DetailsDta->state.','.$DetailsDta->state.','.$DetailsDta->city
 //pr( $this->session->userdata('UserId'));
?>
<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <div class="leftside">
    <div class="left_arrowbox">
    
    <div class="tel_email_box">
    <?php 
	if($this->session->userdata('UserId')!='')
	{
		$condition=array("user_id"=>$this->session->userdata('UserId'));
		$checkCredits=$this->common->CheckuserCredits($condition);
		?>
    <div class="lgnDtl k7 mb3">
          <div class="f5 bdd">Welcome Mr.<?php echo $this->session->userdata('DisplayName');?></div>
          <span class="alrt">
          <?php
		  if($checkCredits->remaining<15)
		  {
			  ?>
               <span class="awa sbg"></span>You do not have any credit in your account!<br>
          <span class="c13 bo pl3" name="prcrdt" id="prcrdt">
          <a href=""  style="color: rgb(51, 51, 51);" onmouseover="this.style.color='#0B4BC4'" onmouseout="this.style.color='#333'">Purchase      Credits now</a>
          </span>
              <?php
		  }
		  else
		  {
			  
			echo '<span class="awa sbg"></span>You  have '.$checkCredits->remaining.' credit in your account!<br>';
           
		  }
		  ?>
         
          </span></div>
          <?php 
	}
		  ?>
       <p class="date_bg"><?php echo date("F j, Y",strtotime($DetailsDta->date));?><span>(Today)</span></p>
       <p class="country"><?php echo $stateNameData->state;?></p>
       
       <div class="tel_email">
       Telephone: +(1)-(XXX)-44xxxxx<br>
		Email: xxxxxx@xxxxxxx.xxx
    	<div class="view_contact1">
        <?php 
		if($this->session->userdata('UserId')!='')
		{
			if($checkCredits->remaining>=15)
			{
			?>
            <a href="#" class="view_btn2 contectseller" id="<?php echo $DetailsDta->lead_id;?>">View Contact Details</a>
            <?php
		}
		else
		{
			?>
			<a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="view_btn2" id="<?php echo $DetailsDta->lead_id;?>">Buy Credits</a>
            <?php
		}
		}
		else
		{
			?>
            <a href="#" class="View-Lead-Details view_btn2">View Contact Details</a>
            <?php
		}
			?>
        </div>
       </div>
       </div>
       
        </div>
        
        
<!-- ads box start -->
  <?php
  $this->load->view('elements/left-add-box');
  ?>
<!-- ads box end -->

    </div>
    <!-- left sidebar end -->
        <div class="right_content">
        <!-- detail page start -->
          <div class="supply_list1 clearfix">
          <h3 class="heading2">
		  <?php echo $DetailsDta->product_name;?>
          <br>
		<span>Buy Lead Details:
		<?php echo $SubCategoryNameDisplay->subcategory.'('.$CategoryName->category.')';?>
        </span>
        <div class="forward"><span class="fl date">Updated: <?php echo date("F j, Y",strtotime($DetailsDta->date));?></span></div>
</h3>
          			<div class="list_txt fl">
                    <p><?php echo $DetailsDta->requirment;?></p>
                    <p>Quantity:<?php echo $DetailsDta->quantity;?></p>
                    <p>Location:<?php echo $stateNameData->state.','.$districtNameData->district.','.$cityNameData->city;?></p>
                 
</div>
<?php
		if($this->session->userdata('UserId')!='')
		{
			$condition=array("user_id"=>$this->session->userdata('UserId'));
			$checkCredits=$this->common->CheckuserCredits($condition);
			if($checkCredits->remaining>=15)
			{
			?>
            <a href="#" class="view_btn2 contectseller" id="<?php echo $DetailsDta->lead_id;?>">View Contact Details</a>
            <?php
		}
		else
		{
			?>
            <a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="view_btn2" id="<?php echo $DetailsDta->lead_id;?>">Buy Credits</a>
            <?php
		}
		}
		else
		{
			?>
            <a href="#" class="View-Lead-Details view_btn">View Contact Details</a>
            <?php
		}
			?>
             </div>
           <div class="view_other_buy_leads clearfix">
           <h3 class="other_leads_hd">View Other Buy Leads In <?php echo $CategoryName->category;?></h3>
           <?php 
		   $where="lead_id !='".$productID."' and category='".$DetailsDta->category."'";
           $LeadDataAll=$this->common->allLeadData($where,5);
		   if($LeadDataAll==0)
		   {
			   echo "No Lead in this category..";
			   
		   }
			   else
			   {
				   foreach($LeadDataAll as $similarLeadData)
				   {

		   ?>
           <div class="other_leads_list clearfix"> 
           <div class="list_heading fl"><h3 class="fl"><a href="#"><?PHP echo $similarLeadData->product_name?></a><span class="verified_img"><img src="<?PHP echo WEBROOT_PATH_IMAGES; ?>verified_post.png"></span></h3></div>
                <div class="forward"><span class="fl date">Updated: <?php echo date("F j, Y",strtotime($similarLeadData->date));?></span><a href="#" title="Forward to Friends"><img src="<?PHP echo WEBROOT_PATH_IMAGES; ?>forward.png" class="fr"></a></div>
			<div class="list_txt fl"><?php echo $similarLeadData->requirment;?><a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo str_replace(' ','-',$similarLeadData->product_name).'/'.$similarLeadData->lead_id;?>">more...</a></div>
                <div class="list_contact fl clearfix">
                	<p class="fl location"><img src="<?PHP echo WEBROOT_PATH_IMAGES; ?>location.png" class="fl">Location:<?php echo $similarLeadData->state.','.$similarLeadData->distric.','.$similarLeadData->city?></p>
                    <p class="fr contact_btn">
                    <a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo str_replace(' ','-',$similarLeadData->product_name).'/'.$similarLeadData->lead_id;?>">View Details</a></p>
                </div>
                </div>
              <?php 
			   }}
			   ?>
            
            </div>
          <!-- other buy leads end -->
          <!-- looking form start -->
          	<div class="looking_form">
            	<div class="looking_form_top">
                <h3>Looking for  Suppliers?<br>
				<span class="small_txt">Receive response from genuine & pre-verified suppliers only</span></h3>
                </div>
                 <form id="form1"  action="" method="post">
                <div class="contact_detal_form clearfix">
                	<div class="contact_detal_form_left">
                    <input id="company_name" name="productname" placeholder="Enter products you want to buy" tabindex="1" class="signUpInputNew" type="text"   data-bvalidator="required"/>
                      <?php echo form_error('productname');?>
                   
                    <textarea name="requirment" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc"></textarea>
                    <div class="select select2">
                                <select  class="statelist" name="state">
                                <option value="">Select State</option>
                                   <?php foreach($stateData as $state)
				{
					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';
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
                               <option value="">--Select Unit--</option> 
                               <option value="Tons">Tons</option>
                               <option value="Pieces">Pieces</option>
                               <option value="Units">Units</option>
                               <option value="Kilogram">Kilogram</option> 
                                </select>
                            </div>
                    </div>
                </div>
                 <input name="submitenquiry" value="Send Enquiry" class="btn btn-blue response_btn" type="submit" />
                 </form>
            </div>
          <!-- looking form end -->
          <!-- detail page end -->
        </div>
     
    </div>
  </div>