<?php
$condition=array("company_id"=>$comnayID);
$companyDetails = $this->common->companyDetails($condition);
$companyhomedata=$this->common->companyHomeContent($condition);
?>
<div class="company_logo"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>nophoto.jpg"></div>
<div class="company_hd fl ml">
<h3><?php echo $companyName?></h3>
<p>Delhi</p>
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
   <li class="active"><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?php echo $companyName.'/'.$comnayID?>"><span>Home</span></a></li>
   <li><a href="<?php echo SITE_URL;?>user/mycatalog/about/<?php echo $companyName.'/'.$comnayID?>"><span>About Us</span></a></li>
   <li><a href="<?php echo SITE_URL;?>user/mycatalog/product/<?php echo $companyName.'/'.$comnayID?>"><span>Products & Services</span></a></li>
   <li><a href="<?php echo SITE_URL;?>user/mycatalog/contect/<?php echo $companyName.'/'.$comnayID?>"><span>Contact Us</span></a></li>
   <li class="last"><a href="<?php echo SITE_URL;?>user/mycatalog/enquiry/<?php echo $companyName.'/'.$comnayID?>"><span>Send Enquiry</span></a></li>
</ul>
</div>
</div>