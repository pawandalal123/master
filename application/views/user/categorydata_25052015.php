<?php
 $category=$CategoryType;
 $catId=$CategoryId;
 $data= $this->common->categorySubCategory(false,$catId,15);
// echo $this->db->last_query();
 $CategoryData= $this->common->categoryListingdata(false,$catId,10);
// echo $this->db->last_query();

 ?>

<script type="text/javascript">

$(document).ready(function(){  

	 $(window).scroll(function(){

		//	alert('pawan');

		 /* window on scroll run the function using jquery and ajax */

		var WindowHeight = $(window).height(); /* get the window height */

		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */

			$("#loader").html("<img src='http://localhost/php/indiabiz/assets/img/loading_icon.gif' alt='loading'/>"); /* displa the loading content */

			var LastDiv = $(".info_list:last"); /* get the last div of the dynamic content using ":last" */

			var LastId  = $(".info_list:last").attr("id");

			var CatId='<?php echo $catId; ?>';

			 /* get the id of the last div */

			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */

			

			$.post(SITE_URL+'commonfunc/productOnLode',{'LastId':LastId,'CatId':CatId},function(data,status)
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

  <!-- Inner Navigation -->

           <div class="main_container clearfix">

            <div class="centralContent">

            <div class="floatfix"></div>

        </div>

		<!-- inr left content start -->

        <div class="lhsContent cont-lft">

<fieldset>

  <ul class="accnt-nav-box leftnavbox">

<a href="#" class="category_heading">Related Products</a>



    <?php 

    if($data!='')

	{

	foreach($data as $subCategory){  ?> 

    <li id="rpsLink" >

    <a title="RewardPointTxnStatement" href="<?php echo SITE_URL;?>category/subcategory/<?php  echo str_replace(' ','-',$CategoryType).'/'.str_replace(' ','-',$subCategory->subcategory).'/'.$catId.'/'.$subCategory->sub_cat_id;?>"><?php  echo $subCategory->subcategory;?></a>

        <span>&raquo;</span>

    </li>

    <?php } ?>

    <li><a href="<?php echo SITE_URL;?>catlist/<?php  echo $category.'/'.$catId;?>"> View More</a></li>

    <?php

	}

	?>

  </ul>

</fieldset>

  <fieldset>

  </fieldset>

        <div class="floatfix">

        </div>

        </div>



      <div class="right_content3">

      <?php if($CategoryData==0)

	{

		echo "No Record Found...";

	}

	else

	{ 

	foreach ($CategoryData as $CatListingData)
	  {
		  $catcondition=array("cat_id"=>$CatListingData->category);
          $condition=array("sub_cat_id"=>$CatListingData->sub_category);
          $SubcatName=$this->common->userSubCategoryName($condition);
          $catNameDisplay=$this->common->CategoryName($catcondition);
		  $stateNameData=$this->common->stateDisplayName($CatListingData->state);
  		  $districtNameData=$this->common->districtDisplayName($CatListingData->distric);
		  if($CatListingData->product_image!='')
			{
			
				$path=WEBROOT_PATH_sell.''.$CatListingData->product_image;
			}
			else
			
			{
			
				$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
			
			}

		  ?>

          <div class="info_list" id="<?php echo $CatListingData->product_id ?>">

            	<h3><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?PHP echo str_replace(' ','-',$CatListingData->company_name).'/'.$CatListingData->company_id;?>"><?php echo $CatListingData->company_name.' ('.$SubcatName->subcategory.')';?></a></h3>

                <div class="info_list_box clearfix">
                	<div class="info_img">
                    <img src="<?php echo $path;?>" class="info_img2"><a href="javascript:;" class="zoom" onClick="document.getElementById('fade<?php echo $CatListingData->product_id ?>').style.display = 'block';document.getElementById('lightpec<?php echo $CatListingData->product_id ?>').style.display = 'block';"><img src="<?php echo WEBROOT_PATH_IMAGES;?>zoom.png"></a>

                    </div>

                    <div class="info_details">
                    	<ul class="info_contact">
                         <li class="info_name"><a href="<?php echo SITE_URL;?>detail/<?PHP echo str_replace(' ','-',$CatListingData->bussiness_nature).'/'.$CatListingData->product_id;?>"><?php echo $CatListingData->bussiness_nature;?></a></li>

                        <li class="info_name"><?php echo $CatListingData->contect_person;?></li>
                        <?php
						if($CatListingData->mobile_no!='')
						{
							echo '<li class="info_mobile">+91-'.$CatListingData->mobile_no.'</li>';
						}
						if($CatListingData->wesite!='')
						{
							echo '<li class="info_web">+91-'.$CatListingData->wesite.'</li>';

						}
						?>
                        <li class="info_email"><?php echo $CatListingData->email_id;?></li>
                        <li class="info_add"><?php echo $stateNameData->state.','.$districtNameData->district;?></li>
                        </ul>

                    </div>

                    

                    <div class="info_sendto2 fr">
                    	<ul class="sendto_list">
                        <li class="sendto_email">
                        <a href="#" class="send_to_email" id="<?php echo $CatListingData->product_id ?>/1">SMS/Email Me</a>
                        </li>

                        <li class="send_enquiry">
                        <a href="#" title="Forward to Friends" class="send_to_email" id="<?php echo $CatListingData->product_id ?>/2">Forward </a>
                        </li>

                        <li class="write_review">
                        <a href="<?php echo SITE_URL;?>detail/<?PHP echo str_replace(' ','-',$CatListingData->company_name).'/'.$CatListingData->product_id;?>">View Details</a>
                        </li>

                        <?php /*?><li class="write_review"><div class="fb-like" data-href="<?php echo SITE_URL;?>/category/viewdetails/<?PHP ?>" data-width="700px" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></li><?php */?>

                        </ul>
                    </div>
                </div>
            </div>

            <div id="fade<?php echo $CatListingData->product_id ?>" class="black_overlay" onClick="document.getElementById('fade<?php echo $CatListingData->product_id; ?>').style.display = 'none';document.getElementById('lightpec<?php echo $CatListingData->product_id ?>').style.display = 'none';"></div>
            <div id="lightpec<?php echo $CatListingData->product_id ?>" class="popup_box clearfix">
<div class="popup_hdr clearfix">
<div class="close_b1">
<a id="close" onClick="document.getElementById('fade<?php echo $CatListingData->product_id; ?>').style.display = 'none';document.getElementById('lightpec<?php echo $CatListingData->product_id ?>').style.display = 'none';">X</a></div>

  <div class="hdg1"><?php echo $CatListingData->company_name.' ('.$CatListingData->bussiness_nature.')';?></div>

                          <div class="date_time pdg_l">
                                <span class="fa-clock-o fa"></span>
                                <span class="time-info">Membere Since:<?php echo date("F j, Y",strtotime($CatListingData->join_date));?></span>
                                <span class="fa-map-marker fa"></span>
                                <span class="place-info"> <?php 
								 echo $stateNameData->state.','.$districtNameData->district;?></span>
                            </div>
  </div>
  
<div class="inr_box">
<div class="popup_gallery">
<img src="<?php echo $path;?>" style="height:350px; width:350px;">
</div>

<div class="popup_enquiry">
<h3 class="h3_p">Send Email Enquiry</h3>
<input type="hidden" class="for" id="<?php  echo $CatListingData->product_id ?> "/>
<textarea name="textarea" id="requirment" cols="45" rows="5" class="texta_w"></textarea>
<input type="text" class="inp_w" placeholder="Entere Name" id="name" />
<input type="text" class="inp_w" placeholder="Enter Email" id="email" />
<input type="text" class="inp_w" placeholder="Enter Mobile" id="Mobile" />
<input type="button" class="btn btn-blue" name="button" id="button" value="Send Enquiry"  onclick="mailsend()" />
<?php /*?><?php

if($this->session->userdata('Userid')!='')

{ 

?>

<div class="contact_info">

<h3>Your Contact Information:</h3>

Mr. Pawan Dalal (pawan.dalal123@gmail.com)<br>

Way2012 (Delhi, India)<br>

Mobile: +(91)-9999102918<br>

</div>

<?php

}

?><?php */?>

</div>
</div>
</div>

   		           <?php } }?>
           </div>
      <!-- inr right content end -->
    </div>
