<?php 

//$allSubcatgeroy =  $this->common->categorySubCategory();

 //$stateData= $this->common->LocationList('state');

  $stateData= $this->common->selectAllState('state');

 

 $CategoryListData= $this->common->CategoryList();

 ?>

       <div class="main_container clearfix">

      <div class="right_content">
         <?php $errorMsg =  $error_message; ?>
         <?php $successmsg =  $succ_message; ?>
         <?php if(!empty($successmsg)){?>
          <div class="alert alert-success fade in">
            <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
            <strong><?php echo $successmsg;?>
            </strong> </div>
         <?php } ?>
         <?php if(!empty($errorMsg)){?>
          <div class="alert alert-error fade in">
            <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
            <strong><?php echo $errorMsg;?>
            </strong> </div>
         <?php } ?>

      <div class="register_form">

           <form id="form1" method="post" action=""  enctype="multipart/form-data">

      		<div class="right_left clearfix">

            <label class="fnt-bold fnt-sz10 " for="loginName">Company Name</label>

            <input  name="companyname" tabindex="10"  class="signUpInputNew" type="text"  data-bvalidator="required"/>

            <?php echo form_error('companyname');?>

            <?php if($this->session->userdata('logged_in')== true)

			{

			

			}

			else

			{?>

            

              <label class="fnt-bold fnt-sz10 " for="name"> Name</label>

            <input  name="name" tabindex="10"  class="signUpInputNew" type="text"  data-bvalidator="required"/>

            <?php echo form_error('name');?>

            <?php } ?>

            <label class="fnt-bold fnt-sz10">State</label>

            <div class="select">

                <select class="statelist" name="state">

                <option selected>Select State</option>

                <?php foreach($stateData as  $state)

				{

					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';

				}

				?>

                </select>

                </div>

           

            

            <label class="fnt-bold fnt-sz10">City</label>

             <div class="select">

                <select class="CityList" name="CityList">

                <option selected>Select Country</option>

                 </select>

                </div>  

            

             <label class="fnt-bold fnt-sz10">Category</label>

            <div class="select">

                <select class="categorylist" name="categorylist">

                <option selected>Select  Category</option>

                 <?php foreach($CategoryListData as  $CategoryList)

				{

					echo ' <option value='.$CategoryList->cat_id.'>'.$CategoryList->category.'</option>';

				}

				?>

                              </select>

                </div>

                 <label class="fnt-bold fnt-sz10">Contact Person</label>

            <input name="contact_person" tabindex="20" class="signUpInputNew" type="text" data-bvalidator="maxlength[50],alpha,required" />

            <?php if($this->session->userdata('logged_in')== true)

			{

			

			}

			else

			{?>

                 <label class="fnt-bold fnt-sz10">Email</label>

            <input  id="email" name="email" tabindex="20" class="signUpInputNew" type="text" data-bvalidator="email,required" />

                         <div id="emailresonse" style="display:none;"></div>

                         <div id="emailre" style="display:none;"></div>



       <?php } ?>

         <div class="uplod_t"><a>Upload a Photo</a></div>

             <input type="file" name="logo" class="getimage" id="getimageID1" onchange="readURLChangeImage(this)">

	



            </div>

            

            <div class="right_left2 clearfix">

             <label class="fnt-bold fnt-sz10">Nature of Business</label>

            <input name="nature_of_business" tabindex="20" class="signUpInputNew" type="text" data-bvalidator="alpha,required" />

            <?php if($this->session->userdata('logged_in')== true)

			{

			

			}

			else

			{?>

           

            <label class="fnt-bold fnt-sz10">Permanent Address</label>

            <input name="permanenet_address" tabindex="20" class="signUpInputNew" type="text" data-bvalidator="required" />

            <?php } ?>

            

            <label class="fnt-bold fnt-sz10">District1</label>

            <div class="select">

                <select class="districList" name="districList">

                <option selected>Select District</option>

                </select>

                </div>

            

            <label class="fnt-bold fnt-sz10">Bussiness Address</label>

            <input name="address" tabindex="20"  type="text" class="signUpInputNew"  data-bvalidator="required"  />

             <label class="fnt-bold fnt-sz10">Sub Category</label>

            <div class="select">

                <select class="subcategory" name="subcategory">

                <option selected>Select Sub Category</option>

                     </select>

                </div>

              <?php if($this->session->userdata('logged_in')== true)

			{

			

			}

			else

			{?>

            <label class="fnt-bold fnt-sz10">Mobile No</label>

            <input name="phone_no" tabindex="20"  type="text" class="signUpInputNew"  data-bvalidator="rangelength[10:15],number,required"  />

             <?php echo form_error('phone_no');?>

             <?php } ?>

            <label class="fnt-bold fnt-sz10">Website</label>

            <input name="website" tabindex="20"  type="text" class="signUpInputNew"  data-bvalidator="url,required"  />

           

            </div><br />

            <fieldset>

          <div  class="imgstore" id="imgstore1"  style="background-size:100% 100%">

           </div>

           </fieldset>

            

              <label class="fnt-bold fnt-sz10">Product Description</label>

            <textarea name="description"  class="textarea" id="textarea1"></textarea>

            <script language="javascript1.2">

            generate_wysiwyg('textarea1');

          </script>

             <?php echo form_error('description');?>

           <input name="login" value="Submit" class="btn btn-blue" type="submit" />

            </form>

             </div>

          

            

            

      </div>

      <!-- inr right content end -->

      

      

     

    </div>