<?php
$condition=array("company_id"=>$comnayID);
$companyDetails = $this->common->companyDetails($condition);
?>
<div class="catalog_box clearfix">

<div class="catalog_top">

<?php
$this->load->view('elements/ctaloghead.php');
?>
<div class="catalog_content clearfix">
<div class="catalog_left_link">
<div class="benefits">
     <ul>
     	<li class="contact_email">
        <p>Email</p>
        <a title="Click to send us an email" href="<?php echo $companyDetails->email_id?>"><?php echo $companyDetails->email_id?></a>
        </li>
        
        <li class="contact_mobile">
        <p>Mobile</p>
        <a title="Click to call us" href="">+91 <?php echo $companyDetails->mobile_no?></a>
        </li>
        
        <li class="contact_mobile">
        <p>Website</p>
        <a title="Click to send us an email" href="<?php echo $companyDetails->website?>"><?php echo $companyDetails->website?></a>
        </li>
        
        <li class="contact__address">
        <p><strong>Contact Details</strong></p>
<p>
<?php echo $companyDetails->contect_person?><br>
<?php echo $companyDetails->address?>
<br /><?php echo $companyDetails->state.','.$companyDetails->distric.','.$companyDetails->city?>
</p>        </li>
     </ul>

</div>
</div>

<!-- catalog right start -->
<div class="catalog_right">
<div class="pd">
<h3 class="inrheading">Contact us</h3>
<p>We are here to answer any questions you may have about our Indiabiz Trade experiences. Reach out to us and we'll respond as soon as we can.</p>

<!-- Contact Map start -->
<div class="contact_map">
<?php
				$addressdata=$companyDetails->state.','.$companyDetails->distric.','.$companyDetails->city;
				$myaddress = urlencode($addressdata);
//here is the google api url
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$myaddress&sensor=false";
//get the content from the api using file_get_contents
        $getmap = file_get_contents($url); 
//the result is in json format. To decode it use json_decode
        $googlemap = json_decode($getmap);
//get the latitute, longitude from the json result by doing a for loop
		 $formattedaddress = $googlemap->formatted_address;
	 ?>
                <iframe class="map" width="653" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $myaddress;?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo urlencode($formattedaddress);?>&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
</div>
<!-- Contact Map End -->

</div>
</div>
<!-- catalog right end -->


</div>

        
</div>





</div>