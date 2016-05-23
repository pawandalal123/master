<?php
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$this->load->view('elements/profilehead');
$condition = array('user_id' => $userId);
$userCategory = $this->common->userRegisterCategory($condition);
$userStates = $this->common->userRegisterstate($condition);
$checkCredits = $this->common->CheckuserCredits($condition);
?>
<script type="text/javascript">
$(document).ready(function(){  
	 $(window).scroll(function(){
		//	alert('pawan');
		 /* window on scroll run the function using jquery and ajax */
		var WindowHeight = $(window).height(); /* get the window height */
		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */
			$("#loader").html("<img src='http://localhost/php/indiabiz/assets/img/loading_icon.gif' alt='loading'/>"); /* displa the loading content */
			var LastDiv = $(".buy_lead1:last"); /* get the last div of the dynamic content using ":last" */
			var LastId  = $(".buy_lead1:last").attr("id");
			var searchonCt='<?php echo $userCategory->data;?>';
			var searchonSt='<?php echo $userCategory->datasub;?>'; /* get the id of the last div */
			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */
			$.post(SITE_URL+'commonfunc/BuyleadOnloadeuser',{'LastId':LastId,'searchonCt':searchonCt,'searchonSt':searchonSt},function(data,status)
		     {
				 $("#loader").html("");
					if(data)
					{
						
						LastDiv.after(data);
					}
			
		     });
				  return false;
		}
		return false;
	});
	 $(window).scroll(function(){
		//	alert('pawan');
		 /* window on scroll run the function using jquery and ajax */
		var WindowHeight = $(window).height(); /* get the window height */
		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */
			$("#loader").html("<img src='http://localhost/php/indiabiz/assets/img/loading_icon.gif' alt='loading'/>"); /* displa the loading content */
			var LastDiv = $(".buy_lead2:last"); /* get the last div of the dynamic content using ":last" */
			var LastId  = $(".buy_lead2:last").attr("id");
			var searchonCt='<?php echo $userCategory->data;?>';
			var searchonSt='<?php echo $userCategory->datasub;?>';
			var state='<?php echo $userStates->state;?>';
			 /* get the id of the last div */
			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */
			$.post(SITE_URL+'commonfunc/BuyleadOnloadeuserContry',{'LastId':LastId,'searchonCt':searchonCt,'searchonSt':searchonSt,'state':state},function(data,status)
		     {
				 $("#loader").html("");
					if(data)
					{
						
						LastDiv.after(data);
					}
			
		     });
				  return false;
		}
		return false;
	});
});
</script>
<div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
		<!-- inr left content start -->
        <?php
		$this->load->view('elements/leftlead');
		?>
      <!-- inr left content end -->
      <!-- inr right content start -->
      <div class="right_content" style="margin-top:0;">
      	<div id="inr_profile">       
              <div class="seller_tool_box">
              <!-- lead offer box start -->
              	<div class="lead_offerbox">
                	<div class="credit_box">
                    <?php
					if($checkCredits->remaining <50)
					{
						echo '<h3>Your Credits Balance is very low<br>';
					}
					else
					{
						echo '<h3>Your Credits Balance<br>';
					}
					?>
                       
						<span>Available Credits: <?php echo $checkCredits->remaining;?></span>
					</h3>
                    </div>
                    <div class="buy_lead_search">
                    <h3>Get 600 Credits in just 5000 Rs/- <span><a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="send_sms">Buy Now!</a></span></h3>
                    	<div class="search_lead_form">
                        <input type="text" class="input_text searchbuyleads" name="textfield" id="textfield"  placeholder="Search Latest Buy Leads" />
                       <!-- <input type="submit" class="input_submit" name="button" id="button" value="Search" />-->
                        </div>
                    </div>
                </div>
              <!-- lead offer box end -->
             <!-- inbox start -->
             <div class="lead-box">
             <!-- lead search box -->
<!-- lead search box end -->
<!-- tab start -->
<div class="example-5">
    <ul style="padding:0 10px 0 10px;">
    <li><a href="#1">All<span>(3)</span></a></li>
    <li><a href="#2">My State<span>(0)</span></a></li>
    <li><a href="#3">My Local Area<span>(0)</span></a></li>
    </ul>
			<div name="#1">
           		<div class="buy_lead_tab pd">
                <?php
				if($userCategory=='')
				{
					echo "Not Listed Any Projects....";
				}
				else
				{
			     $where="buy_leads.category in ('".$userCategory->data."') or subcategory in ('".$userCategory->datasub."')";
                 $LeadData=$this->common->allLeadData($where,1);
				if($LeadData==0)
				{
					echo "There is no lead meet your requirment";
				}
				else
				{
				foreach($LeadData as $leadDataDisplay)
				{ 
				 $condition=array('cat_id'=>$leadDataDisplay->category);
				 $condition1=array('sub_cat_id'=>$leadDataDisplay->subcategory);
				 $CategoryName=$this->common->CategoryName($condition);
				 $SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);
				 
				
				?>
                    <div class="buy_lead1 pd clearfix" id="<?php echo $leadDataDisplay->lead_id;?>">
                   	<div class="buy_lead_left">
                        	<h3><?php echo $SubCategoryNameDisplay->subcategory;?></h3>
                            <p><strong>Listed In: <?php echo $CategoryName->category;?></strong><br>
                            <strong>Quantity: <?php echo $leadDataDisplay->quantity;?></strong><br>
                            <?php echo $leadDataDisplay->product_name;?>
</p>
<p><strong>Additional Information Provided by Buyer</strong><br>
<?php  echo $leadDataDisplay->requirment; ?>
</p>
                         </div>
                        <div class="buy_lead_divider"><img src="<?php echo  WEBROOT_PATH_IMAGES;?>divider-shadow.png"></div>
                        <div class="buy_lead_right">
                        <img src="<?php echo  WEBROOT_PATH_IMAGES;?>verified-sticker.png" class="verified_strip">
<ul class="liststyle fs12">
                        <li class="calender"><?php echo date("F j, Y",strtotime($leadDataDisplay->date));?></li>
                            <li class="in_flag"><?php echo $leadDataDisplay->state.','.$leadDataDisplay->distric.','.$leadDataDisplay->city;?></li>
                            </ul>
                            
                            <ul class="liststyle fs12">
                            <li>Mobile : +(91)-93xxxxxxxx</li>
                            <li>Email : xxxxxxxx@xxxxxxxx.xxx</li>
                            </ul>
                            
                            <h2><span>Price:</span> 20 Credits Only</h2>
                            <?php
							
							if($checkCredits->remaining >=20)
		                	{
			                ?>
                            
                            <a href="#" class="buy_lead_btn contectseller" id="<?php  echo $leadDataDisplay->lead_id;?>"><p>Contact Buyer Now</p>
							<p><span>Buy this Lead</span></p></a>
                            <?php
							}
							else
							{
								?>
								 <a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="buy_lead_btn" id="<?php  echo $leadDataDisplay->lead_id;?>">                             <p>Contact Buyer Now</p>
							<p><span>Buy this Lead</span></p></a>
                            <?php
							}
							
		
							?>
                        </div>
                        
                        
                        
                        
                  </div>
                  <?php }  } }?>
                  
                  
                </div>
            </div>
            			<div name="#2">
            <div class="buy_lead_tab pd">
                <?php
				if($userCategory==0)
				{
					echo "Not Listed Any Projects....";
				}
				else
				{
			     $where="buy_leads.category in ('".$userCategory->data."') or subcategory in ('".$userCategory->datasub."')";
                 $LeadData=$this->common->allLeadData($where,1);
				if($LeadData==0)
				{
					echo "There is no lead meet your requirment";
				}
				else
				{
				foreach($LeadData as $leadDataDisplay)
				{ 
				 $condition=array('cat_id'=>$leadDataDisplay->category);
				 $condition1=array('sub_cat_id'=>$leadDataDisplay->subcategory);
				 $CategoryName=$this->common->CategoryName($condition);
				 $SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);
				 
				
				?>
                    <div class="buy_lead2 pd clearfix" id="<?php echo $leadDataDisplay->lead_id;?>">
                   	<div class="buy_lead_left">
                        	<h3><?php echo $SubCategoryNameDisplay->subcategory;?></h3>
                            <p><strong>Listed In: <?php echo $CategoryName->category;?></strong><br>
                            <strong>Quantity: <?php echo $leadDataDisplay->quantity;?></strong><br>
                            <?php echo $leadDataDisplay->product_name;?>
</p>
<p><strong>Additional Information Provided by Buyer</strong><br>
<?php  echo $leadDataDisplay->requirment; ?>
</p>
                         </div>
                        <div class="buy_lead_divider"><img src="<?php echo  WEBROOT_PATH_IMAGES;?>divider-shadow.png"></div>
                        <div class="buy_lead_right">
                        <img src="<?php echo  WEBROOT_PATH_IMAGES;?>verified-sticker.png" class="verified_strip">
<ul class="liststyle fs12">
                        <li class="calender"><?php echo date("F j, Y",strtotime($leadDataDisplay->date));?></li>
                            <li class="in_flag"><?php echo $leadDataDisplay->state.','.$leadDataDisplay->distric.','.$leadDataDisplay->city;?></li>
                            </ul>
                            
                            <ul class="liststyle fs12">
                            <li>Mobile : +(91)-93xxxxxxxx</li>
                            <li>Email : xxxxxxxx@xxxxxxxx.xxx</li>
                            </ul>
                            
                            <h2><span>Price:</span> 20 Credits Only</h2>
                            <?php
							
							if($checkCredits->remaining>=20)
		                	{
			                ?>
                            
                            <a href="#" class="buy_lead_btn contectseller" id="<?php  echo $leadDataDisplay->lead_id;?>"><p>Contact Buyer Now</p>
							<p><span>Buy this Lead</span></p></a>
                            <?php
							}
							else
							{
								?>
								 <a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="buy_lead_btn" id="<?php  echo $leadDataDisplay->lead_id;?>">                             <p>Contact Buyer Now</p>
							<p><span>Buy this Lead</span></p></a>
                            <?php
							}
							
		
							?>
                        </div>
                        
                        
                        
                        
                  </div>
                  <?php }  } }?>
                  
                  
                </div>
            </div>
            <div name="#3">
            Tab 3
            </div>
            
            <div name="#4">
            Tab 4
            </div>
            
            
			
</div>
<!-- tab end here -->

             </div>
             <!-- inbox end -->
             
              
              </div>
        </div>
      <!-- inr right content end -->
      
      
     
    </div>

  </div>