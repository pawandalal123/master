<script type="text/javascript">
$(document).ready(function(){  
	 $(window).scroll(function(){
		//	alert('pawan');
		 /* window on scroll run the function using jquery and ajax */
		var WindowHeight = $(window).height(); /* get the window height */
		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */
			$("#loader").html("<img src='http://localhost/php/indiabiz/assets/img/loading_icon.gif' alt='loading'/>"); /* displa the loading content */
			var LastDiv = $(".supply_list1:last"); /* get the last div of the dynamic content using ":last" */
			var LastId  = $(".supply_list1:last").attr("id");
			var searchon='<?php echo $serchfeaild;?>'; /* get the id of the last div */
			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */
			
			$.post(SITE_URL+'commonfunc/searchproductOnLode',{'LastId':LastId,'searchon':searchon},function(data,status)
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
<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <div class="leftside">
    <div class="left_arrowbox">
        <h3>Submit Your "<strong>Buy Requirement</strong>" in a Minute</h3>
        <form id="form1"  action="<?php echo SITE_URL?>adduser/AddLeadEnquiry" method="post">
        <textarea name="product_description" id="textarea" cols="45" placeholder="Provide details like products specification, usage/application etc for best quotes." rows="5" class="product_desc" data-bvalidator="required"></textarea>
        
        <input id="name" name="name" placeholder="Name" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>
        <input  name="email" placeholder="Email"  class="signUpInputNew" type="text" data-bvalidator="email,required" />
        <input id="mobile" name="mobile" placeholder="Phone" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
        <input name="submit" value="Send Enquiry" class="btn btn-blue" type="submit" />
        </form>
        
        </div>
        <div class="left_ads_box">
	<div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>

</div>
    </div>
    <!-- left sidebar end -->
        <div class="right_content">
        <!-- detail page start -->
        	<div class="supply_top_links clearfix">
            <ul class="clearfix">
            <li class="active"><a href="<?php echo SITE_URL ?>productsearch/<?php echo $searchOn;?>">Suppliers</a></li>
            <li><a href="<?php echo SITE_URL ?>LeadsSearch/<?php echo $searchOn;?>">Buy Leads</a></li>
            <li class="last"><a href="<?php echo  SITE_URL ?>requirment">Post Buy Requiremtnts</a></li>
            </ul>
            </div>
            <?php  
			if($searchList==0)
			{
				?>
                <p class="error-cty bo">Sorry, your search for <span style="font-weight: bold;color: #C30000;"><?PHP echo $serchfeaild;?></span> did not match any product.</p>
                <table border="0" cellpadding="0" cellspacing="0" align="left" width="663px"><tbody><tr><td valign="TOP" width="480"><div class="sug"><b style="font-size: 13px; padding-bottom: 5px; color: rgb(28, 28, 28);  display:block;">Suggestions:</b><ul><li>Check spellings of your search words </li><li>Try a different set of search words </li><li>Search only one product or service at a time </li><li>Do not use very long search phrase </li><li>Use two or three words for best search results </li><li>Do not use special characters in your search </li><li>Do not use search words that are very specific (e.g., 20x25 mm tone tiles) </li></ul> </div><div id="autosuggest1" style="width: 145px; display: none; cursor: pointer;z-index:100;"><ul><li><!-- Suggestion --></li></ul></div></td></tr></tbody></table>
                <?php
				
			}
			else
			{
			
			
			foreach($searchList as $dataList)
			{ 
			if($dataList->product_image!='')
{
	$path=WEBROOT_PATH_sell.''.$dataList->product_image;

}
else
{
	$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
}?>
              <div class="supply_list1 clearfix" id="<?php echo $dataList->product_id; ?>">
            	<div class="supply_img"><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->company_id;?>"><img src="<?php echo $path;?>"></a></div>
                <div class="supply_desc">
                	<h3><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->company_id;?>"><?php echo $dataList->bussiness_nature	;?></a></h3>
                   <p> <?php echo $dataList->company_name;?> <a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>">more...</a></p>
                   <ul class="contact_list">
                   <li class="address"><?php echo $dataList->wesite	;?></li>
                   <li class="email"><?php
				   $DetailsDta= $this->common->ViewProductDetails(FALSE,$dataList->product_id);
				    echo $DetailsDta->email_id	;?></li>
                   <li class="website"><?php echo $dataList->wesite	;?></li>
                   <li class="phone"><?php echo $DetailsDta->mobile_no	;?></li>
                  </ul>
                   <a href="#"  class="send_to_email gre_btn" id="<?php echo $dataList->product_id; ?>/1">Send Enquiry</a>
                </div>
          </div>
          
            <?php }} ?>
        <!-- detail page end -->
        </div>
    
    </div>
  </div>