<?php
$condition=array("company_id"=>$comnayID);
$companyDetails = $this->common->companyDetails($condition);
$conditionContent=array("tbl_company_details.company_id"=>$comnayID,"feature_for"=>"profile");
$companyDisplayContent=$this->common->companyDataDisplayContent($conditionContent);
$stateNameData=$this->common->stateDisplayName($companyDetails->state);
$cityNameData=$this->common->cityDisplayName($companyDetails->city);
?>
<div class="company_name pd clearfix">
<div class="company_logo"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>nophoto.jpg"></div>
<div class="company_hd fl ml">
<h3><?php echo $companyName?></h3>
<p><?php echo $cityNameData->city.',',$stateNameData->state?></p>
</div>

<div class="member_since">
<p class="verified_icon">Verified Member Since: 2014</p>
<p>Products Listed<span class="fr">[4]</span></p>
<p>Mobile No:<span class="fr">+(91)-<?php echo $companyDetails->mobile_no?> <a href="#" class="send_sms">Send SMS</a></span></p>
</div>
<img class="fr right_ribbon" src="<?php echo WEBROOT_PATH_IMAGES; ?>right_ribbon.png">
</div>

<div class="catalog_nav">
<div id="cssmenu2">
<ul>
<?php
if($headtype=='home')
{
	?>
    <li class="active"><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?php echo $companyName.'/'.$comnayID?>"><span>Home</span></a></li>
    <?php
}
else
{
	?>
    <li><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?php echo $companyName.'/'.$comnayID?>"><span>Home</span></a></li>
    <?php
}
if($headtype=='about')
{
	
	?>
    <li class="active"><a href="<?php echo SITE_URL;?>user/mycatalog/about/<?php echo $companyName.'/'.$comnayID?>"><span>About Us</span></a></li>
    <?php
}
else
{
	if($companyDisplayContent==0)
	{
		?>
        <li><a href="javascript:;"><span>About Us</span></a></li>
        <?php
	}
	else
	{
		?>
		<li><a href="<?php echo SITE_URL;?>user/mycatalog/about/<?php echo $companyName.'/'.$comnayID?>"><span>About Us</span></a></li>
        <?php
	}
	?>
    
    <?php
}
if($headtype=='product')
{
	?>
    <li class="active"><a href="<?php echo SITE_URL;?>user/mycatalog/product/<?php echo $companyName.'/'.$comnayID?>"><span>Products & Services</span></a></li>
    <?php
}
else
{
	?>
    <li ><a href="<?php echo SITE_URL;?>user/mycatalog/product/<?php echo $companyName.'/'.$comnayID?>"><span>Products & Services</span></a></li>
    <?php
}
if($headtype=='contect')
{
	?>
    <li class="active"><a href="<?php echo SITE_URL;?>user/mycatalog/contect/<?php echo $companyName.'/'.$comnayID?>"><span>Contact Us</span></a></li>
    
    <?php
}
else
{
	?>
    <li><a href="<?php echo SITE_URL;?>user/mycatalog/contect/<?php echo $companyName.'/'.$comnayID?>"><span>Contact Us</span></a></li>
    <?php
}
if($headtype=='enquiry')
{
	?>
    <li class="last"><a href="<?php echo SITE_URL;?>user/mycatalog/enquiry/<?php echo $companyName.'/'.$comnayID?>"><span>Send Enquiry</span></a></li>
    
    <?php
}
else
{
	?>
    <li><a href="<?php echo SITE_URL;?>user/mycatalog/enquiry/<?php echo $companyName.'/'.$comnayID?>"><span>Send Enquiry</span></a></li>
    <?php
}
?>
   
   
   
   
   
</ul>
</div>
</div>