<?php
 //$stateData= $this->common->LocationList('state');
 $CategoryListData= $this->common->CategoryList();
 
 $stateData = $this->common->selectAllState('state')
 ?>

<div class="mainContainer">
    <div class="topBanner clearfix container">
    
    <!-- left sidebar start -->
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
        <h3>Over <strong>5 Million</strong> Satisfied Buyers Worldwide.</h3>
				<ul id="demo1">
                  <li>Thank you Indiabizsaath Buyers Helpdesk and All staff you all are very </li>
                  <li>ff you all are very help full. and great service, regarding Test kits, We Forward all the information to Our south East Asia Office and they will continue with Ro</li>
                </ul>
        </div>
    </div>
    <!-- left sidebar end -->
        <div class="right_content">
        <!-- Buy Requirement page start -->
        <?php
		$succ_msg='';
		if($succ_msg)
		{
			echo $succ_msg;
		}
		?>
        	<div class="buy_requirement">
            <!--<div class="ttl-cntnr">
                    <span class="icn icn-sqre "></span>
						<h1 class="" itemprop="name">Tell us your Buy Requirement </h1>
                    <span class="icn icn-sqre"></span>
                </div>-->
                <form id="form1" method="post" action="<?php  $_SERVER['PHP_SELF'];?>"/>
                <h3 class="border2">Tell us your Buy Requirement</h3>
				<div class="buy_top">
                	<div class="field1">
                    	<label>Product / Service</label>
                        <input id="company_name" name="productname" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
                         <?php echo form_error('productname');?>
                    </div>
                    
                    <div class="field1">
                    	<label>Requirement in detail</label>
                        <textarea name="requirment" id="requirment" cols="45" rows="5" class="product_desc" data-bvalidator="required"></textarea>
                          <?php echo form_error('requirment');?>
                    </div>
                    
                    <div class="field1">
                    	<label>Estimated Quantity</label>
                        <input id="Quantity" name="Quantity" tabindex="1" class="inputsmall" type="text" data-bvalidator="number,required" />
                            <div class="select">
                                <select name="quantity">
               <option value="">--Select Unit--</option> 
               <option value="Tons">Tons</option>
               <option value="Pieces">Pieces</option>
               <option value="Units">Units</option>
               <option value="Kilogram">Kilogram</option>   
                                </select>
                            </div>
                    </div>
                    
                    
                    <div class="field1">
                    	<label>Category/Subcategory</label>
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
                            <div class="select">
                                <select class="subcategory" name="subcategory">
                <option selected>Select Sub Category</option>
                     </select>
                            </div>
                    </div>
                 
                </div>
                
                <!-- contact details -->
                <?php  if($this->session->userdata('logged_in')== true)
			  {
			  }
			  else
			  {?>
                <div class="buying_contact">
                 <h3 class="border2">Your Contact Details</h3>
                <div class="field1">
                    	<label>Email:<span>*</span></label>
                        <input id="email" name="email" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="email,required" />
                        <?php echo form_error('email');?>
                        <div id="emailresonse" style="display:none;"></div>
                         <div id="emailre" style="display:none;"></div>
                    </div>
                    
                 <div class="field1">
                    	<label>Contact Person:<span>*</span></label>
                        <input id="contect_person" name="contect_person" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="required" />
                         <?php echo form_error('contect_person');?>
                    </div>
                    
                    <div class="field1">
                    	<label>Company:<span>*</span></label>
                        <input id="company_name" name="company_name" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>
                    </div>
                    
                    <div class="field1">
                    	<label>State</label>
                        <div class="select select2">
                                <select  class="statelist" name="state">
                                   <?php foreach($stateData as  $state)
				{
					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';
				}
				?>
                                </select>
                            </div>
                            
                            <div class="select select3">
                                <select class="districList" name="districList">
                <option selected>Select District</option>
                </select>
                            </div>
                    </div>
                    
                    <div class="field1">
                    	<label>Mobile:<span>*</span></label>
                        <input id="mobile" name="mobile" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="rangelength[10:15],number,required"  />
                         <?php echo form_error('mobile');?>
                    </div>
                 
                 </div>
                 <?php }?>
                <!-- contact details end -->
                <div class="submit_btn"><input name="submit" value="Get Instant Quotes" class="btn btn-blue" type="submit" /></div>
                
                         </form>
            </div>
        <!-- Buy Requirement page end -->
        </div>
      
    </div>
  </div>