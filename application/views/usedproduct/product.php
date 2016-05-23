<?php 

$Getdata=$options;
$optionsFilter='';
 $pageNumber = 1;
 $pageNation='';

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
//echo $this->db->last_query();
?>

<div class="mainContainer">
    <div class="topBanner clearfix container">
        <div class="right_content">
        <!-- detail page start -->
        <div class="detail_box">
       		<div class="list_button_box clearfix">
            	<a href="<?php echo SITE_URL;?>all-results<?php  echo $addTourl.$pageNation; ?>" class="list_view_active fl">List View</a>
                <a href="<?php echo SITE_URL;?>all-results-grid<?php echo $addTourl.$pageNation; ?>" class="grid_view fl">Grid View</a>
                
                                    <p class="fr">Sort By:
                                     <input type="hidden" class="pagenumber" value="<?php echo $pageNumber;?>" id="<?php echo $pageNumber;?>"/>
                                    <select class="productshort" id="list">
                                   
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
										echo '<option value="sort_price" selected="selected">Price: Low To High</option>';
                                    }
									else
									{
										echo '<option value="sort_price">Price:Low to High</option>';
									}
									if($Getdata=='sort_pricedesc')
                                    {
										echo '<option value="sort_pricedesc" selected="selected">Price: High to Low</option>';
                                    }
									else
									{
										echo '<option value="sort_pricedesc">Price: High to Low</option>';
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
            	<div class="list_view_result1" id="<?php echo $allproductsListing->product_id;?>">
                	<div class="list_view_img"><a href="<?php echo SITE_URL;?>productdetail/<?php echo $this->common->cleanURL($allproductsListing->title).'/'.$allproductsListing->product_id?>"><img title="<?php echo substr($allproductsListing->title,0,30);?>" src="<?php echo $path;?>" style="height:90px; width:130px;"></a></div>
                	<div class="list_view_hd"><h3><a href="<?php echo SITE_URL;?>productdetail/<?php echo $this->common->cleanURL($allproductsListing->title).'/'.$allproductsListing->product_id?>"><?php
					 $condition = array('id' => $allproductsListing->category);
					 $categoryNmae = $this->common->sellcategoryName($condition,false);
					 $cityName = $this->common->cityDisplayName($allproductsListing->city); 
					 echo substr($allproductsListing->title,0,30);?></a></h3><p><?php echo $cityName->city;?> | <?php echo           $categoryNmae;?> </p></div>
                	<div class="list_view_price">र <?php echo $allproductsListing->price;?></div>
                  <div class="list_view_date"><?php echo $allproductsListing->date;?><br><?php echo substr($allproductsListing->date,10)?></div>
                </div>
                <div class="clear"></div>
                
       
            <?php }}
			
			echo '<div class="list_box_t1">'.$this->pagination->create_links().'</div>';
			 ?>
            <!-- List View End -->
            
       
            
        </div>
        <!-- detail page end -->
        </div>
    
    </div>
  </div></div>