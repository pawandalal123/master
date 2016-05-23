<?php
$condition=array("company_id"=>$comnayID);
$companyDetails = $this->common->companyDetails($condition);
?>
<div class="catalog_nav">
<div id="cssmenu2">
<ul>
     <li><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?php echo $companyName.'/'.$comnayID?>"><span>Home</span></a></li>
   <li ><a href=""><span>About Us</span></a></li>
   <li><a href="<?php echo SITE_URL;?>user/mycatalog/product/<?php echo $companyName.'/'.$comnayID?>"><span>Products & Services</span></a></li>
   <li class="active"><a href="<?php echo SITE_URL;?>user/mycatalog/contect/<?php echo $companyName.'/'.$comnayID?>"><span>Contact Us</span></a></li>
   <li class="last active"><a href="<?php echo SITE_URL;?>user/mycatalog/enquiry/<?php echo $companyName.'/'.$comnayID?>"><span>Send Enquiry</span></a></li>
</ul>
</div>
</div>

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
        <a title="Click to send us an email" href="<?php echo $companyDetails->website;?>"><?php echo $companyDetails->website;?></a>
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
<h3 class="inrheading">Enquiry</h3>
<p>We are here to answer any questions you may have about our IndiaBizSaath experiences. Reach out to us and we'll respond as soon as we can.</p>

<!-- Send Enquiry Form Start -->
<div class="send_enquiry">
<!-- contact details -->
                <div class="buying_contact">
                
                <h3 class="inrheading">Send your Enquiry to this supplier</h3>
                
                <textarea name="requirment" id="requirment" class="text_area" placeholder="Describe your buying requirements in detail.
Provide product name, specification,
usage/application etc. for best quotes" cols="45" rows="5"></textarea>
                
                <h3 class="inrheading">Provide your contact details:</h3>
                <div class="field1">
                    	<label>Email</label>
                        <input id="company_name" name="email" tabindex="1" class="signUpInputNew" type="text" />
                </div>
                    
                <div class="field1">
                    	<label>Contact Person</label>
                        <input id="company_name" name="name" tabindex="1" class="signUpInputNew" type="text" />
                </div>
                    <div class="field1">
                    	<label>Mobile</label>
                        <input id="Mobile" name="Mobile" tabindex="1" class="signUpInputNew" type="text" />
                    </div>
                 
                 </div>
                <!-- contact details end -->
                <div class="submit_btn"><input name="submit" value="Get Instant Quotes" class="btn btn-blue" type="submit" onclick="mailsend()" /></div>
</div>
<!-- Send Enquiry Form End -->

</div>
</div>
<!-- catalog right end -->


</div>