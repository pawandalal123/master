
<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <div class="leftside">
    <fieldset>

  <ul class="accnt-nav-box leftnavbox">

<a href="#" class="category_heading">Related Products</a>

   <li id="myAccountLink">

  <a title="My Account" href="#">Account</a>

  <span>&raquo;</span>

  </li>

      <li id="ohLink">

          <a title="My Orders" href="#">Orders</a>

          <span>&raquo;</span>

      </li>

      <li id="emailLink" >

          <a title="My Email Subscriptions" href="#">Email Subscriptions</a>

          <span>&raquo;</span>

      </li>

    <li id="rpsLink" ><a title="RewardPointTxnStatement" href="#">Reward Points</a>

        <span>&raquo;</span>

    </li>

    <li id="myAddressesLink">

      <a title="My Addresses" href="#">Addresses</a>

        <span>&raquo;</span>

    </li>

  </ul>

</fieldset>



<!-- ads box start -->

<div class="left_ads_box">

	<div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>

    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>

    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>

</div>

<!-- ads box end -->

    </div>

    <!-- left sidebar end -->

        <div class="right_content">

        <?php 

			if(!empty($succ_msg)){

					echo '<div class="alert alert-success fade in">
            
            <strong>'.$succ_msg.'</strong> </div>';
			}
			if(!empty($err_msg)){

					echo '<div class="alert alert-error fade in">
           
            <strong>'.$err_msg.'</strong> </div>';
			}
		?>
        <!-- detail page start -->
        <div class="detail_box">
        	<div class="detail_top">
                <div class="ttl-cntnr">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name">Register Here For Buy & Sell:</h1>
                    <span class="icn icn-sqre"></span>
                </div>
            </div>
            <!-- Buy and Sell Form -->	

             <div class="detail_bottom clearfix">

             	<div class="buy_sell_box">

                <form id="form1" method="post" action="" enctype="multipart/form-data"/>

                 <div class="field1">

                    <label>Category: <i>*</i></label>

                    <div class="select">

                                 <select class="categorylistsell" name="categorylistsell"  data-bvalidator="required,max[1],required">

                <option selected>Select  Category</option>

                 <?php foreach($sellcategory as  $sellcategory)

				{

					echo ' <option value='.$sellcategory->id.'>'.$sellcategory->buy_category_name.'</option>';

				}

				?>

                              </select>

                              <div id="passwordstataus"></div>

                              

                      </div>

                      </div>

                      <div class="subcategorysellproduct">

                      </div>

                      <div class="field1">

                    	<label>Image:</label>

                        <div class="img_uplodbox">

<div class="sellimg_pic">

<fieldset>

<div  class="pimgstore" id="pimgstore1" style="background-size:100% 100%"">

</div>

</fieldset>

<input type="file" id="getimage1" name="fileField[]" onchange="readURLChangeImagesell(this)">

<div class="change_pic" id="change_pic1">Upload Image</div>

</div>

<div class="sellimg_pic">

<fieldset>

<div  class="pimgstore" id="pimgstore2" style="background-size:100% 100%">

</div>

</fieldset>

<input type="file" id="getimage2" name="fileField[]" onchange="readURLChangeImagesell(this)">

<div class="change_pic" id="change_pic2">Upload Image</div>

</div>

<div class="sellimg_pic">

<fieldset>

<div class="pimgstore"  id="pimgstore3" style="background-size:100% 100%">

</div>

</fieldset>

<input type="file" id="getimage3" name="fileField[]" onchange="readURLChangeImagesell(this)">

<div class="change_pic" id="change_pic3">Upload Image</div>

</div>



<div class="sellimg_pic mrg_n">

<fieldset>

<div class="pimgstore"  id="pimgstore4" style="background-size:100% 100%">

</div>

</fieldset>

<input type="file" id="getimage4" name="fileField[]" onchange="readURLChangeImagesell(this)">

<div class="change_pic" id="change_pic4">Upload Image</div>

</div>



</div>

                    </div>

                   <div class="detail_top">

                <div class="ttl-cntnr">

                    <span class="icn icn-sqre "></span>

						<h1 class="" itemprop="name">Seller Contact Details:</h1>

                    <span class="icn icn-sqre"></span>

                </div>

            </div>

                    

                <?php

				if($userId=='')

				{

					?>

                		<div class="field1">

                    	<label>Email Id: <i>*</i></label>

                        <input  id="email" name="email" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="email,required" />                           <div id="emailresonse" style="display: none;"></div>

                        <div id="emailre" style="display: none;"></div>

                    </div>

                    

                    <div class="field1">

                    	<label>Contact Name: <i>*</i></label>

                        <input id="company_name" name="name" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="maxlength[50],alpha,required" />

                                          <?php echo form_error('name');?>

                    </div>

                    

                    <div class="field1">

                    	<label>Mobile Number: <i>*</i></label>

                        <input id="company_name" name="mobile" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="rangelength[10:15],number,required" />

                    </div>

                    <?php

				}

					?>

                    <div class="field1">

                    	<label>State: <i>*</i></label>

                        <div class="select">

                        <select  class="statelistsell" name="state" data-bvalidator="required">

                                   <?php foreach($stateData as  $state)

				{

					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';

				}

				?>

                </select>

                </div>

                    </div>

                    <div class="field1 districhide" style="display:none;">

                    	<label>City: <i>*</i></label>

                        <div class="select">

                         <select class="districList" name="districList" data-bvalidator="required">

                <option selected>Select City</option>

                </select>

                </div>

                    </div>

                    <div class="field1 CityListsell" style="display:none;">

                    	<label>Local Area: <i>*</i></label>

                        <div class="select">

                        <select class="CityList" name="CityList" data-bvalidator="required">

                         <option selected="">Select Area</option>

                 </select>

                 </div>

                    </div>

                    <div class="field1">

                    	<label>Address:<i>*</i></label>

                        <input id="Address" name="Address" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required"  />

                        <?php echo  form_error('Address');?>

                    </div>

                    

                    <div class="submit_btn"><input name="submit" value="Classified" class="btn btn-blue" type="submit" /></div>

</form>

                </div>

                

                

             </div>

            <!-- Buy and Sell Form End -->

  

        

        </div>

        <!-- detail page end -->

        </div>

     

    </div>

  </div>