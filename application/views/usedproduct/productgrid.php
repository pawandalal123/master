<?php 
 $Getdata=$options;
 $optionsFilter='';
 $pageNumber = 1;
 $pageNation='';
//pr($Getdata);
   if(!empty($page))
    {
		$optionsFilter=$Getdata;
		$addTourl= '/'.$optionsFilter;
		if($this->uri->segment(3))
		{
			$pageNumber = $this->uri->segment(3);
			$pageNation = '/'.$this->uri->segment(3);
		}
	    
    }else{

		if(!is_numeric($this->uri->segment(2)))
		{
			$optionsFilter=$Getdata;
		        $addTourl= '/'.$optionsFilter;
		}
                else
               {
                        $pageNumber = $this->uri->segment(2);
			$pageNation = '/'.$this->uri->segment(2);
               }
		
		
	}
$allproductsListing = $this->common->allListingproduct(FALSE,$optionsFilter,18,($pageNumber-1)*18);
//pr($allproductsListing);
?>
<div class="mainContainer">
    <div class="topBanner clearfix container">
        <div class="right_content">
        <!-- detail page start -->
        <div class="detail_box">
       		<div class="list_button_box clearfix">
            	<a href="<?php echo SITE_URL;?>all-results<?php  echo $addTourl.$pageNation; ?>" class="grid_view fl">List View</a>
                <a href="<?php echo SITE_URL;?>all-results-grid<?php echo $addTourl.$pageNation; ?>" class="list_view_active fl">Grid View</a>
                
                <p class="fr">Sort By:
                 <input type="hidden" class="pagenumber" value="<?php echo $pageNumber;?>" id="<?php echo $pageNumber;?>"/>
                              
                                     <select class="productshort" id="grid">
                                   <?php
									if($Getdata=='sort_date')
									{
										echo '<option selected="" value="sort_date" selected="selected">Most Recent Ads</option>';
									}
									else
									{
										echo'<option selected="" value="sort_date">Most Recent Ads</option>';
									}
									
                                    if($Getdata=='sort_price')
                                    {
										echo '<option value="sort_price" selected="selected">Price: High to Low</option>';
                                    }
									else
									{
										echo '<option value="sort_price">Price: Low to High</option>';
									}
									if($Getdata=='sort_pricedesc')
                                    {
										echo '<option value="sort_pricedesc" selected="selected">Price: High to Low</option>';
                                    }
									else
									{
										echo '<option value="sort_pricedesc">Price: Low to High</option>';
									}
                                    ?>
                                    </select>
                              
                </p>
            </div>
          
           <!-- grid view start --> 
          <div class="list_view_result clearfix">
          <?php  if($allproductsListing==0 )
		   {
			   echo "No Product Found....";
		   }
		   else
		   {
			   foreach($allproductsListing as $allproductsListing)
			   {
				   $prosductcondition=array("product_id "=>$allproductsListing->product_id);
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
                <div class="grid_view_result1">
                	<div class="grid_view_img"><a href="<?php echo SITE_URL;?>productdetail/<?php echo $this->common->cleanURL($allproductsListing->title).'/'.$allproductsListing->product_id?>"><img src="<?php echo $path;?>" style="height:192px; width:191px;"></a></div>
                    <div class="grid_view_hd"><h3><a href="<?php echo SITE_URL;?>productdetail/<?php echo str_replace(' ','-',$allproductsListing->title).'/'.$allproductsListing->product_id?>">
					<?php 
					$cityName = $this->common->cityDisplayName($allproductsListing->city);
					echo substr($allproductsListing->title,0,28);?></a></h3><p><?php echo $cityName->city;?> | Mobile Phones </p></div>
                    <div class="grid_view_price">र <?php echo $allproductsListing->price;?></div>
                  <div class="grid_view_date"><?php echo $allproductsListing->date;?> </div>
                </div>
                
               <?php }}
			   echo '<div class="clear"></div><div class="list_box_t1">'.$this->pagination->create_links().'</div>'; ?>
			   
            </div>
            <!-- grid view end -->
            
            
            
        </div>
        <!-- detail page end -->
        </div>
    
    </div>
  </div>