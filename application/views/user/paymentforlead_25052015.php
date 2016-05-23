<?php
$paymentData=$this->common->packageDetailsLead();
$LeadAccess=$this->common->leadpackageData();
//pr($paymentData);
?>
<div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
                <!-- ads box start -->
<div class="leftside">
<div class="benefits">
        <h3>Benefits for Buyers</h3>
<ul>
<li class="save_time"><strong>Save Time</strong><br>
in search of Suppliers
</li>
<li class="response"><strong>Responses</strong><br>
directly from Verified suppliers
</li>

<li class="compare"><strong>Compare & Evaluate</strong><br>
the quotes
</li>
</ul>
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
      <div class="right_content">
      	<div class="package_box clearfix bno">
        		<div id="pricing-table">
                <?php 
				$i=1;
				foreach($paymentData as $paymentDataList)
				{
					$LeadAccessPlan=round($paymentDataList->plan_credits/$LeadAccess->lead_amonut,0);
					?>
					
                        <div class="plan" id="most-popular">
        <h3><?php echo $paymentDataList->plan_name;?> Package<span><b><?php echo $paymentDataList->plan_credits;?></b><p>Credits</p></span></h3>
        <ul>
            <li>You can purchase <b><?php echo $LeadAccessPlan;?> Leads</b>.</li>
            <li class="amount<?php echo $paymentDataList->package_lead_id;?>" id="<?php echo $paymentDataList->plan_amount?>"><?php echo $paymentDataList->plan_amount?> Rs/-</li>
        </ul> 
        <form id="pawan" action="http://www.gurgaonsaath.com/products.php" target="_blank" method="post">
        </form>
        <a class="signup paynow" id="<?php echo $paymentDataList->package_lead_id;?>">Pay Now</a>
       </div>
                       
    <?php 
					$i++;}
	?>
    
</div>
<div class="clear"></div>
<p><span class="redtxt">Note:</span> 12.36% Service Tax will be added extra </p>
<div class="secure_pay">
<div class="fl"><strong>Secure Payment Gateway</strong></div>
<img src="<?PHP echo WEBROOT_PATH_IMAGES; ?>secure-pay.png">
</div>
        </div>
</div>
  </div>