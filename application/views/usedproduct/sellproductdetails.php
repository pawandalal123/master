<?php
//echo $ProducrtID;
$ProductDetails=$this->common->ViewProductsellDetails($ProducrtName,$ProducrtID);
///echo $this->db->last_query(); 	
$condition = array('id' => $ProductDetails->category);
$similarAddCondition = array('category'=> $ProductDetails->category);
$similarAddsdata=$this->common->similarAddData($similarAddCondition,10);
$categoryNmae = $this->common->sellcategoryName($condition,false);
//echo $this->db->last_query();
$conditionSub = array('id' => $ProductDetails->subcategory);
$subcategoryNmae = $this->common->sellsubcategoryName($conditionSub,false);
            /* next and pre condition */
$nextCondition="product_id >'".$ProductDetails->product_id."' and category='".$ProductDetails->category."' and subcategory='".$ProductDetails->subcategory."' order by product_id asc";

$priviousCondition="product_id <'".$ProductDetails->product_id."' and category='".$ProductDetails->category."' and subcategory='".$ProductDetails->subcategory."' order by product_id desc";

$checkNextSellList=$this->common->CheckNextsellProduct($nextCondition,1); 

$checkPreviousSellList = $this->common->checkprivioussellProduct($priviousCondition,1); 
                 /* next and pre condition end */
				 
$prosductcondition=array("product_id "=>$ProducrtID);
$getProductImagesList = $this->common->getProductImages($prosductcondition,1);
$imageList=explode(',',$getProductImagesList->data);
?> <!-- new inner page start -->
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=515672738549263&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


	<div class="new_inr_page">
    	<div class="breadcrumbs">
            <a href="<?php echo SITE_URL; ?>all-results">All Categories</a>
            <span class="fa-angle-right fa"></span>
            <a href="<?php echo SITE_URL; ?>add/<?php  echo str_replace(' ','-',$categoryNmae).'/'.$ProductDetails->category; ?>"> <?php echo $categoryNmae;?> </a>
            <span class="fa-angle-right fa"></span>
            <a href="<?php echo SITE_URL; ?>add/<?php  echo str_replace(' ','-',$categoryNmae).'/'.str_replace(' ','-',$subcategoryNmae).'/'.$ProductDetails->category.'/'.$ProductDetails->subcategory; ?>">  <?php echo $subcategoryNmae;?> </a>
            <div class="nextrecords">
            <?php
			if($checkPreviousSellList==0)
			{
				?>
                <a href="" class="prebtn">&#171; Previous</a>
                <?php
			}
			else
			{
				?>
				<a href="<?php echo SITE_URL.'productsell/productdetail'.'/'.str_replace(' ','-',$checkPreviousSellList->title).'/'.$checkPreviousSellList->product_id?>" class="prebtn">&#171; Previous</a>
                <?php
				
			}
			if($checkNextSellList==0)
			{
				?>
                <a href="#" class="nxtbtn">Next &#187;</a>
                <?php
			}
			else
			{
				?>
				<a href="<?php echo SITE_URL.'productsell/productdetail'.'/'.str_replace(' ','-',$checkNextSellList->title).'/'.$checkNextSellList->product_id?>" class="nxtbtn">Next &#187;</a>
                <?php
				
			}
			?>
             
             
           </div>
        </div>
                
        <!-- inner main content start -->
        	<div class="inr_main_box clearfix">
           
             <!-- inner top  -->
        	<div class="inr_top fixheader clearfix">
            	<div class="inr_top_left">
                	<div class="inr_title_box">
                        	<div class="uplftbox">
                            <h3><?php echo str_replace('-',' ',$ProducrtName);?> </h3>
                            <div class="date_time">
                                <span class="fa-clock-o fa1"></span>
                                <span class="time-info"><?php echo $ProductDetails->date;?></span>
                                <span class="fa-map-marker fa2"></span>
                           <span class="place-info"><?php 
								$stateName = $this->common->stateDisplayName($ProductDetails->state);
					            $cityName = $this->common->cityDisplayName($ProductDetails->city);
								echo $stateName->state.','.$cityName->city;?></span>
                            </div>
                            </div>
                           
                            
                        </div>
                        
                </div>
                
                <!-- inner top right -->
                	<div class="inr_top_right">
                    <div class="price">
                        <span>र <?php echo $ProductDetails->price;?></span>
                        <img class="right-corner" alt="" src="<?php echo  WEBROOT_PATH_IMAGES;?>price-right-corner.png">
                        </div>
                    </div>
                <!-- inner top right end -->
            </div>
        <!-- inr top end -->
            
            	<!-- inner main left box -->
                	<div class="inr_main_left">
                    	
                        
                        <!-- inner image gallery -->
                        	<div class="inr_img_gallery">
                            	<div class="gallery clearfix">
                                 <a href="#" onClick="document.getElementById('fade').style.display = 'block';document.getElementById('lightpec').style.display = 'block';">
                    <div  id="slideshow" class="gl_panel_l pics">
                    <?php
					
					 if($getProductImagesList->data=='')
					 {
						 ?>
                         <img title="<?php echo substr($datadispalyadds->title,0,30);?>" src="<?php echo WEBROOT_PATH_IMAGES.''.'nophoto2.gif';?>">
                         
                         <?php
					 }
					 else
					 {
					 
					foreach($imageList as $imageListshow)
					{
						?>
                    <img title="<?php echo substr($datadispalyadds->title,0,30);?>" src="<?php echo WEBROOT_PATH_sell.''.$imageListshow;?>">
                    <?php
					}
					?>
                   
                    </div>
                     </a>            
                        <div class="gl_panel_r">
                        <ul id="nav" class="clearfix">
                       <?php
					 
					foreach($imageList as $imageListshow)
					{
						?>
                        <li><a href="#"><img title="<?php echo substr($datadispalyadds->title,0,30);?>" src="<?php echo WEBROOT_PATH_sell.''.$imageListshow;?>"></a></li>
                        <?php
					} }?>
                    
                       
                      
                      
                        </ul>
                        </div>
							  </div>
                              <?php
							  if($getProductImagesList->data!='')
					 {
							  ?>
                              <!--Popup gallery-->
                              <div id="fade" class="black_overlay" onClick="document.getElementById('fade').style.display = 'none';document.getElementById('lightpec').style.display = 'none';"></div>

<div id="lightpec" class="popup_box clearfix">
<div class="popup_hdr clearfix">
<div class="close_b"><a id="close" onClick="document.getElementById('fade').style.display = 'none';document.getElementById('lightpec').style.display = 'none';">X</a></div>
  <div class="hdg1"><?php echo str_replace('-',' ',$ProducrtName);?></div>
                          <div class="date_time pdg_l">
                                <span class="fa-clock-o fa"></span>
                                <span class="time-info"><?php echo $ProductDetails->date;?></span>
                                <span class="fa-map-marker fa"></span>
                                <span class="place-info"> <?php 
								$stateName = $this->common->stateDisplayName($ProductDetails->state);
					            $cityName = $this->common->cityDisplayName($ProductDetails->city);
								echo $stateName->state.','.$cityName->city;?> </span>
                            </div>
                            
  </div>
  
  <div class="inr_box">
<div class="gallery m_popup clearfix">
<div class="inr_top_right">
                    <div class="price">
                        <span>र <?php echo $ProductDetails->price;?></span>
                        <img class="right-corner" alt="" src="<?php echo WEBROOT_PATH_IMAGES;?>price-right-corner.png">
                        </div>
                    </div>
                  <div  id="slideshow2" class="gl_panel_l pics">
                     <?php
					 
					foreach($imageList as $imageListshow)
					{
						?>
                    <img title="<?php echo substr($datadispalyadds->title,0,30);?>" src="<?php echo WEBROOT_PATH_sell.''.$imageListshow;?>">
                    <?php
					}
					?>
					
                   
                    </div>
                              
                        <div class="gl_panel_r">
                        <ul id="nav2" class="clearfix">                      
                      <?php
					
					foreach($imageList as $imageListshow)
					{
						?>
                        <li><a href="#"><img title="<?php echo substr($datadispalyadds->title,0,30);?>" src="<?php echo WEBROOT_PATH_sell.''.$imageListshow;?>"> </a></li>
                        <?php
					}?>
                   
                        </ul>
                        </div>
			  </div>
  </div>
</div>
<?php } ?>
<div class="uprightbox">
                            <div class="sharebox">
							<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>

  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52033417580ffac0"></script>
  <h4 style="font-family:Calibri !important; font-size:17px !important; font-weight:bold !important;">Share With</h4>            

            <div class="addthis_toolbox addthis_default_style">
                <p>
                     <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                     <a class="addthis_counter addthis_pill_style"></a>
                     <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                     <a class="addthis_button_tweet"></a>

                 </p>             
                <!--<a class="addthis_button_pinterest_pinit"></a>-->                           
            </div>
            </div>
            
                            </div>

                           	  <div class="inr_desc">
                              	<span class="descriptiontxt"><?php echo $ProductDetails->product_description;
								?>
                                </span>
                                <div class="clear"></div>
                                <span class="addresstxt"><strong>Address :</strong><?php 
								if($ProductDetails->address=='')
								{
									echo $ProductDetails->city.','.$ProductDetails->district.','.$ProductDetails->state;
								}
								else
								{
									echo $ProductDetails->address;
								}
								?></span>
                                <?php
                                if($ProductDetails->category==19)
                                {
									?>
								<p>Bedrooms:<?php echo $ProductDetails->Bedrooms;
								?></p>
                                <p>Bathrooms:<?php echo $ProductDetails->Bathrooms;
								?></p>
                                <p>Broker Free:<?php echo $ProductDetails->broker_free;
								?></p>
                                <p>Area:<?php echo $ProductDetails->area;
								?></p>
                                <?php
                                }
								elseif($ProductDetails->category==18)
                                {
									if($$ProductDetails->position!='')
									{?>
                                    
								<p>Position:<?php echo $ProductDetails->position;
								?></p>
                                <?php
									}
									if($ProductDetails->price!='')
									{
									
								?>
                                <p>Salary:<?php echo $ProductDetails->price;
								?></p>
                                <?php
									}
									if($ProductDetails->brand_id!='')
									{
								?>
                                <p>Job For:<?php 
								$brandName=$this->common->sellcategoryBrandname($ProductDetails->brand_id); echo $brandName->brand_name;
								?></p>
                                <?php
									}
									if($ProductDetails->experience!='')
									{
								?>
                                <p>Experience:<?php echo $ProductDetails->experience;
								?></p>
                                <?php
									}
                                }
								else
								{
									?>
                                    <div class="clear"></div>
								<span class="descriptiontxt"><strong>Product Type:</strong><?php $brandName=$this->common->sellcategoryBrandname($ProductDetails->brand_id); echo $brandName->brand_name;
								?></span>
                                <?php	
								}
								?></p>
                              </div>
                                <!-- description end -->
                                
                                <!-- share box start -->
                                	<div class="share_box">
                                    </div>
                                <!-- share box end -->
                      </div>
                        <!-- inner image gallery end -->
                       
 
<div class="facebookarea">
            
<div class="fb-comments" data-href="<?php echo SITE_URL.'productsell/productdetail/'.$ProducrtName.'/'.$ProducrtID;?>" data-width="600" data-numposts="5" data-colorscheme="light" ></div>
</div>
                        <!-- similar ads box -->
                        	<div class="similar_ads">
                            	<div class="inr_similar_ads">
                                 <h3 class="similar_hd"> Similar Ads</h3>
                                    <?php if($similarAddsdata==0)
									{
										echo "No similar Adds In This Category..";
									}
									else
									{
										
										foreach($similarAddsdata as $datadispalyadds)
										{
											$prosductcondition=array("product_id "=>$datadispalyadds->product_id);
										    $getProductImagesList = $this->common->getProductImages($prosductcondition,1);
											$imageList=explode(',',$getProductImagesList->data);
											if($getProductImagesList->data!='')
											{
												$path=WEBROOT_PATH_sell.''.$imageList[0];
											}
											else
											{
												$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';
											}
											?>
                                            <div class="list_view_result1">
                                    <div class="list_view_img">
                                    <a href="<?php echo SITE_URL;?>/productsell/productdetail/<?php echo str_replace(' ','-',$datadispalyadds->title).'/'.$datadispalyadds->product_id?>">
                                    <img title="<?php echo substr($datadispalyadds->title,0,30);?>" src="<?php echo $path;?>" style="height:89px; width:118px;">
                                    </a>
                                    </div>
                                    <div class="list_view_hd">
                                    <h3><a href="<?php echo SITE_URL;?>/productsell/productdetail/<?php echo str_replace(' ','-',$datadispalyadds->title).'/'.$datadispalyadds->product_id?>">
									<?PHP echo substr($datadispalyadds->title,0,30);?></a>
                                    </h3>
                                    <p>
					<?php $condition = array('id' => $datadispalyadds->category);
					 $categoryNmae = $this->common->sellcategoryName($condition,false); 
					 $conditionSub = array('id' => $datadispalyadds->subcategory);
					 $subcategoryNmae = $this->common->sellsubcategoryName($conditionSub,false); 
					 $stateName = $this->common->stateDisplayName($datadispalyadds->state);
					 $cityName = $this->common->cityDisplayName($datadispalyadds->city);
					  echo $stateName->state.'|'.$cityName->city.'|'.$categoryNmae.'-'.$subcategoryNmae;?>  
                      </p></div>
                                    <div class="list_view_price">र <?php echo $datadispalyadds->price;?></div>
                                    </div>
                                            <?php
										}
									}?>
                                    
                                </div>
                      </div>
                        <!-- similar ads box end -->
                        
                    
                    </div>
                <!-- inner main left box end -->
                
                
                <!-- inner main right box -->
                	<div class="inr_main_right fixheader2 clearfix">
                        <div class="inr_contact">
                        <ul class="inr_list">
                        <li class="name">
                        <span class="fa-user fa1"></span>
                        <strong> <?php echo $ProductDetails->contect_person;?> </strong>
                        </li>
                        
                        <li class="user">
                        <span class="fa-mobile fa2"></span>
                        <strong> <?php echo $ProductDetails->mobile_no;?> </strong>
                        </li>
                        </ul>
                        </div>
                        
                        <div class="user_form">
                        <?php
						if($succ_msg)
						{
							echo '<div class="alert alert-success fade in">
                        <strong>'.$succ_msg.'</strong> </div>';
						}
						?>
                        <h3>E-mail Seller</h3>
                        <form  id="form1" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input id="name" name="name" placeholder="Name" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>
            <?php echo form_error('name');?>
            <input id="emailen" name="email" placeholder="Email" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="email,required" />
            <?php echo form_error('email');?>
            <input id="mobile" name="mobile" placeholder="mobile" tabindex="1" class="signUpInputNew" type="text" data-bvalidator="number,required"/>
            <?php echo form_error('mobile');?>
            <textarea name="product_description" id="textarea" cols="45" placeholder="Message"  rows="5" class="product_desc" data-bvalidator="required"></textarea>
            <input type="hidden" name="product_id" value="<?php echo $ProducrtID?>"/>
            <input name="submit" value="Send Enquiry" class="btn btn-blue" type="submit" />
            </form>
                    </div>
                
                    </div>
                <!-- inner main right end -->
                
            </div>
        <!-- inner main content end -->
    
    </div>

  