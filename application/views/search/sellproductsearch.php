<?php 
$Getdata=$options;
//pr($Getdata);
if($Getdata!='')
{
	$Gettype=$type.'/'.$Getdata;
	$optionsFilter=$Getdata;
	
}
else
{
	$Gettype=$type;
	$optionsFilter='';
}
$allproductsListing =  $this->common->sellproductsearch(str_replace('-',' ',$type),$optionsFilter,false);
?>
<div class="mainContainer">
    <div class="topBanner clearfix container">
        <div class="right_content">
        <!-- detail page start -->
        <div class="detail_box">
       		<div class="list_button_box clearfix">
            	<a href="<?php echo SITE_URL;?>search/searchProduct/<?php  echo $Gettype; ?>" class="grid_view fl">List View</a>
                <a href="<?php echo SITE_URL;?>search/searchProductGrid/<?php echo $Gettype; ?>" class="list_view_active fl">Grid View</a>
                
                 <p class="fr">Sort By:
                                   <input type="hidden" class="hidden" value="<?php echo $type;?>" />
                                    <select class="searchfilter" id="list">
                                    <?php
									 if($optionsFilter=='sort_date')
									 {
										  echo  '<option  value="sort_date" selected="selected">Most Recent Ads</option>';
										
									 }
									 else
									 {
										 echo  '<option  value="sort_date">Most Recent Ads</option>';
										 
									 }
									 if($optionsFilter=='sort_price')
									 {
										  echo ' <option value="sort_price" selected="selected">Price: Low to High</option>';
										
									 }
									 else
									 {
										 echo  ' <option value="sort_price" >Price: Low to High</option>';
										 
									 }
									 if($optionsFilter=='sort_pricedesc')
									 {
										 echo ' <option value="sort_pricedesc" selected="selected">Price: High to Low</option>';
										
									 }
									 else
									 {
										 echo  ' <option value="sort_pricedesc">Price: High to Low</option>';
										 
									 }
									  ?>
                                   
                                   
                                     </select>
                        </p>
            </div>
            <!-- List View Start -->
            <div class="list_view_result clearfix">
           <?php  if($allproductsListing==0 )
		   {
			   echo "No Product Found....";
		   }
		   else
		   {
			   foreach($allproductsListing as $allproductsListing)
			   {?>
            	<div class="list_view_result1">
                	<div class="list_view_img"><a href="#"><img title="<?php echo substr($allproductsListing->title,0,30);?>" src="<?php echo WEBROOT_PATH_sell.''.$allproductsListing->image_name;?>" style="height:90px; width:130px;"></a></div>
                	<div class="list_view_hd"><h3><a href="#"><?php
					 $condition = array('id' => $allproductsListing->category);
					 $categoryNmae = $this->common->sellcategoryName($condition,false);
					 echo substr($allproductsListing->title,0,30);?></a></h3><p><?php echo $allproductsListing->city;?> | <?php echo           $categoryNmae;?> </p></div>
                	<div class="list_view_price">र <?php echo $allproductsListing->price;?></div>
                  <div class="list_view_date"><?php echo $allproductsListing->date;?><br>6:19am </div>
                </div>
                
       
            <?php }} ?>
            <!-- List View End -->
            
       
            
        </div>
        <!-- detail page end -->
        </div>
    
    </div>
  </div></div>