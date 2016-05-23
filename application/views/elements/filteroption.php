<?php
$Getdata=$options;
$CategoryName = $CategoryName;
$CategoryID = $CategoryID;
$subCategoryName = $SubCategoryName;
$subCategoryID = $subCategoryID;
$subcategory= $this->common->sellproductSubCategory(false,$CategoryID,15);
$CategoryIDLIST=array("category"=>$CategoryID,"subcategory"=>$subCategoryID);
$brandList=$this->common->sellcategoryBrand($CategoryIDLIST,false);
//$localityList = $this->common->sellcategoryBrand($CategoryIDLIST,false);
$localityList= $this->common->LocationList('state');

if($Getdata!='')
{
	$Gettype=$CategoryName.'/'.$subCategoryName.'/'.$CategoryID.'/'.$subCategoryID.'/'.$Getdata;
	$optionsFilter=$Getdata;
	
}
else
{
	$Gettype=$CategoryName.'/'.$subCategoryName.'/'.$CategoryID.'/'.$subCategoryID;
	$optionsFilter='';
}

$Listingdata=$this->common->allListingFilter($CategoryIDLIST,$optionsFilter,false);
?>
<div class="left_grey_box">
        <a href="<?php echo SITE_URL;?>productsell/allproduct" class="category_heading">All Categories</a>
        <div class="search_form clearfix">
        	<ul class="buy_sell_category_list">
            <li><a href="<?php echo SITE_URL;?>add/<?php echo $CategoryName.'/'.$CategoryID;?>"><?php echo str_replace('-',' ',$CategoryName);?></a>
            	<ul>
                	<li><a href="#"><?php echo str_replace('-',' ',$subCategoryName);?></a></li>
                    
                </ul>
            </li>
            </ul>
            
            <!-- price range start -->
            	<div class="price_range_box">
                	<!--<h3>Price Range</h3>
                     <input type="text" class="keyword_box" name="textfield" placeholder="Min" id="textfield" />
                     <span>-</span>
                     <input type="text" class="keyword_box" name="textfield" placeholder="Max" id="textfield" />
                     <input type="submit" name="button" class="submit_btn2" id="button" value="Go" />-->
                     <ul class="list_type">
                     <?php
					 if($CategoryID==18)
					 {
						 echo '<h3>Salery Range</h3>';
					 }
					 else
					 {
						 echo '<h3>Price Range</h3>';
					 }
					 ?>
                        
                        <div class="scroll">
                        <?php 
                      $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '0_3000' , 'price');
					   $urlArrayData1= $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '3000_5000' , 'price');
					    $urlArrayData2 = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '5000_10000' , 'price');
						 $urlArrayData3 = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '10000_15000' , 'price');
						  $urlArrayData4 = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '15000_25000' , 'price');
						  $urlArrayData5 = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '25000_50000' , 'price');
						  $urlArrayData6 = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '50000' , 'price');
					  ?>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="checkbox" value="0_3000"  <?php if(in_array('0_3000' , $urlArrayData['paramArray']['price'])) echo 'checked=checked'?>  /> 
                        <a href="<?php echo $urlArrayData['URL'];?>">0-3000</a></li>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData1['URL'];?>" value="3000_5000" <?php if(in_array('3000_5000' , $urlArrayData1['paramArray']['price'])) echo 'checked=checked'?> /> <a href="<?php echo $urlArrayData1['URL'];?>">3000-5000</a></li>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData2['URL'];?>" value="5000_10000" <?php if(in_array('5000_10000' , $urlArrayData2['paramArray']['price'])) echo 'checked=checked'?> /> <a href="<?php echo $urlArrayData2['URL'];?>">5000-10000</a></li>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData3['URL'];?>" value="10000_15000"  <?php if(in_array('10000_15000' , $urlArrayData3['paramArray']['price'])) echo 'checked=checked'?>/> <a href="<?php echo $urlArrayData3['URL'];?>">10000-15000</a></li>
                        <li>
                        <input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData4['URL'];?>" value="15000_25000"  <?php if(in_array('15000_25000' , $urlArrayData4['paramArray']['price'])) echo 'checked=checked'?>/> <a href="<?php echo $urlArrayData4['URL'];?>">15000-25000</a></li>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData5['URL'];?>" value="25000_50000" <?php if(in_array('25000_50000' , $urlArrayData5['paramArray']['price'])) echo 'checked=checked'?> /> <a href="<?php echo $urlArrayData5['URL'];?>">25000-50000</a></li>
                         <li><input type="checkbox" class="checkbox" name="checkbox" id="checkbox" value="50000" <?php if(in_array('50000' , $urlArrayData6['paramArray']['price'])) echo 'checked=checked'?> />  <a href="<?php echo $urlArrayData6['URL'];?>">More Than 50000</a></li>
                       </div>
                     </ul>
                     <?php
					 if($CategoryID==19)
					 {
						 ?>
						 <ul class="list_type">
                        <h3>Bedroom Type</h3>
                        <div class="scroll">
                        <?php for($i=1; $i<=30; $i++)
						{
							$urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, $i , 'bedroom');	?>
                        <li>
                             <input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" value="<?php echo $i;?>" <?php if(in_array($i , $urlArrayData['paramArray']['bedroom'])) echo 'checked=checked'?> />
                             <a href="<?php echo $urlArrayData['URL'];?>"><?php echo $i;?> Bedroom</a>
                        </li>
                       <?php } ?>
                       </div>
                     </ul>
                     
                     <?php
					 }
					 else
					 {
					 ?>
                     
                    <ul class="list_type">
                        <h3>Type</h3>
                        <div class="scroll">
                        <?php foreach( $brandList as $brandList)
						{
							$urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, $brandList->brand_id , 'Option');	?>
                        <li>
                             <input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" value="<?php echo $brandList->brand_id;?>" <?php if(in_array($brandList->brand_id , $urlArrayData['paramArray']['Option'])) echo 'checked=checked'?> />
                             <a href="<?php echo $urlArrayData['URL'];?>"><?php echo $brandList->brand_name;?></a>
                        </li>
                       <?php } ?>
                       </div>
                     </ul>
                     <?php } ?>
                     <ul class="list_type">
                        <h3>Locality</h3>
                        <div class="scroll">
                        <?php 
						foreach( $localityList as $localityList)
						{
							$urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, $localityList->state , 'locality');?>
                        <li>
                        <input type="checkbox" name="checkbox" class="checkbox" id="<?php echo $urlArrayData['URL'];?>" value="<?php echo $localityList->state;?>" <?php if(in_array($localityList->state , $urlArrayData['paramArray']['locality'])) echo 'checked=checked'?> />
                             <a href="<?php echo $urlArrayData['URL'];?>"><?php echo $localityList->state;?></a>
                           
                        </li>
                       <?php } ?>
                       </div>
                     </ul>
                     
                     <?php
					 if($CategoryID==18)
					 {
						 ?>
                         <ul class="list_type">
                        <h3>Job Type</h3>
                      
                       
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, 'part' , 'jobtype');				 
						  ?>
                            <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('part' , $urlArrayData['paramArray']['jobtype'])) echo 'checked=checked'?>/>
                         <a href="<?php echo $urlArrayData['URL'];?>">Part Time</a>
                         </li>
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, 'full' , 'jobtype'); 
						 ?>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('full' , $urlArrayData['paramArray']['jobtype'])) echo 'checked=checked'?>/> <a href="<?php echo $urlArrayData['URL'];?>">Full Time</a></li>
                         
                     </ul>
                         <?php
					 }
					 elseif($CategoryID==19)
					 {
						 ?>
						 <ul class="list_type">
                        <h3>Furnished Type</h3>
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, 'Yes' , 'furnished');				 
						  ?>
                            <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('Yes' , $urlArrayData['paramArray']['furnished'])) echo 'checked=checked'?>/>
                         <a href="<?php echo $urlArrayData['URL'];?>">Yes</a>
                         </li>
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, 'No' , 'furnished'); 
						 ?>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('No' , $urlArrayData['paramArray']['furnished'])) echo 'checked=checked'?>/> <a href="<?php echo $urlArrayData['URL'];?>">No</a></li>
                         
                     </ul>
                     <ul class="list_type">
                        <h3>Broker Free</h3>
                      
                       
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, 'Yes' , 'broker');				 
						  ?>
                            <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('Yes' , $urlArrayData['paramArray']['broker'])) echo 'checked=checked'?>/>
                         <a href="<?php echo $urlArrayData['URL'];?>">Yes</a>
                         </li>
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, 'No' , 'broker'); 
						 ?>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('No' , $urlArrayData['paramArray']['broker'])) echo 'checked=checked'?>/> <a href="<?php echo $urlArrayData['URL'];?>">No</a></li>
                         
                     </ul>
                     <?php
					 }
					 else
					 {
					 ?>
                     <ul class="list_type">
                        <h3>Seller Type</h3>
                      
                       
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '1' , 'seller');				 
						  ?>
                            <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('1' , $urlArrayData['paramArray']['seller'])) echo 'checked=checked'?>/>
                         <a href="<?php echo $urlArrayData['URL'];?>">Individual</a>
                         </li>
                         <?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , $Getdata, '2' , 'seller'); 
						 ?>
                        <li><input type="checkbox" class="checkbox" name="checkbox" id="<?php echo $urlArrayData['URL'];?>" <?php if(in_array('2' , $urlArrayData['paramArray']['seller'])) echo 'checked=checked'?>/> <a href="<?php echo $urlArrayData['URL'];?>">Professional/Business</a></li>
                         
                     </ul>
                     <?php } ?>
                </div>
            <!-- price range end -->
        </div>        
        </div>