<?php
$condition=array("company_id"=>$comnayID);
$conditionAnother=array("tbl_company_details.company_id"=>$comnayID);
$companyDetails = $this->common->companyDetails($condition);
$companyhomedata=$this->common->companyHomeContent($condition);
$DataListing= $this->common->userProductListingdata($conditionAnother);
?>
<div class="catalog_box clearfix">

<div class="catalog_top">

        
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
<h3 class="inrheading">Product & Services</h3>
<?php 
if($DataListing==0)
{
}
else
{
	foreach($DataListing as  $productList)
	{
		
?>
<div class="catalog_product">
<h3 class="mb"><?php echo $productList->bussiness_nature;?> <span class="update_date fr">Updated:<?php echo date("F j, Y",strtotime($productList->join_date));?></span></h3>
<div class="catalog_product_img fl mr"><?php 
if($productList->product_image=='')
{
	?>
    <img src="<?php echo WEBROOT_PATH_IMAGES; ?>catalog_product.jpg">
    <?php
}
else
{
	?>
   <img src="<?php echo WEBROOT_PATH_sell.''.$productList->product_image;?>">
    <?php
}
?></div>
<div class="catalog_product_desc fl">
<p><?php echo $productList->discription;?></p>

<div class="post-button"><a href="#" class="fr">Send Enquiry</a></div>
</div>


<div class="overlay_box">
<h3 class="mb"><?php echo $productList->bussiness_nature;?> <span class="update_date fr">Updated: <?php echo date("F j, Y",strtotime($productList->join_date));?></span></h3>
<div class="overlay_content pdl pdr">
<div class="catalog_product_img fl mr"><?php 
if($productList->product_image=='')
{
	?>
    <img src="<?php echo WEBROOT_PATH_IMAGES; ?>catalog_product.jpg">
    <?php
}
else
{
	?>
   <img src="<?php echo WEBROOT_PATH_sell.''.$productList->product_image;?>">
    <?php
}
?></div>
<div class="catalog_product_desc fl">
<p><?php echo $productList->discription;?></p>

<div class="post-button"><a href="#" class="send_to_email fr" id="<?PHP echo $productList->product_id;?>/1" >Send Enquiry</a></div>
</div>
</div>
</div>


</div>
<!-- product 1 -->

<?php
}
}
?>
<!-- Product 1 end -->

</div>
</div>
<!-- catalog right end -->


</div>

</div>
</div>