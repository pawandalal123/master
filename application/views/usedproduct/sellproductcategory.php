<?php 
$GetData=$options;
$CategoryName = $CategoryName;
$CategoryID = $CategoryID;
$subcategory= $this->common->sellproductSubCategory(false,$CategoryID,15);
$CategoryIDLIST=array("category"=>$CategoryID);
$optionsFilter='';
$pageNumber = '';
$pageNation='';
//echo $this->uri->segment(5).'5';
//echo $this->uri->segment(4).'4';
if($Getdata!='')
{   if(!is_numeric($GetData))
    {
		$optionsFilter=$Getdata;
		$addTourl= '/'.$optionsFilter;
		$GetType=$CategoryName.'/'.$CategoryID.$addTourl;
		if($this->uri->segment(5))
		{
			$pageNumber = $this->uri->segment(5);
			$pageNation = '/'.$this->uri->segment(5);
			echo $pageNumber;
		}
	    
    }
	else
	{
		$GetType=$CategoryName.'/'.$CategoryID;
		$optionsFilter='';
		$addTourl= '';
		if($this->uri->segment(4))
		{
			$pageNumber = $this->uri->segment(4);
			$pageNation = '/'.$this->uri->segment(4);
		}
		
		
	}
}
else
{
	$GetType=$CategoryName.'/'.$CategoryID;
	
}
/*if($GetData!='')
{
	$GetType=$CategoryName.'/'.$CategoryID.'/'.$GetData;
	$optionsFilter=$GetData;
}
else
{
	$GetType=$CategoryName.'/'.$CategoryID;
	$optionsFilter='';
}*/

$Listingdata = $this->common->allListingproduct($CategoryIDLIST,$optionsFilter,18, $pageNumber);
//echo $this->db->last_query();
//$Listingdata=$this->common->allListing($CategoryIDLIST,$optionsFilter,false);
?>

<div class="mainContainer">
    <div class="topBanner clearfix container">
    
    <!-- left sidebar start -->
    <div class="leftside">
    <!-- Search By Keyword -->
    	<div class="search_by_key">
        <h3>Search by Keywords</h3>
        <div class="search_form clearfix">
            <form name="searchFormads">
             <input type="text" class="keyword_box" name="ss" placeholder="E.g. mobile, car, sofa..." id="textfield">
            <input type="hidden" name="variant" id="variant-id" value="supplier">
            <input type="button" name="button" class="submit_btn2" id="button" value="Go" onclick="CheckDataSearchProduct(document.searchFormads);" />
             </form>
           
        </div>        
        </div>
    <!-- Search By Keyword end -->

<!-- filter box start -->
<div class="left_grey_box">
        <a href="<?php echo SITE_URL;?>all-results" class="category_heading">All Categories</a>
        <div class="search_form clearfix">
        	<ul class="buy_sell_category_list">
                <li><a href="<?php echo SITE_URL;?>add/<?php echo $CategoryName.'/'.$CategoryID; ?>"><?php echo str_replace('-',' ',$CategoryName);?></a>
                	<ul>
                    <?php foreach($subcategory as $subcategorydata)
					{ ?>
                	<li><a href="<?php echo SITE_URL;?>addsubcat/<?php  echo $CategoryName.'/'.str_replace(' ','-',$subcategorydata->category_name).'/'.$CategoryID.'/'.$subcategorydata->id;?>"><?php echo $subcategorydata->category_name;?></a></li>
                    <?php } ?>
                </ul>
            </li>
            </ul>
        </div>        
        </div>
        <div class="left_ads_box">
	<div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad2.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad3.jpg"></a></div>
    <div class="ads_box"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>ad1.jpg"></a></div>
    
</div>
<!-- filter box end -->

    </div>
    <!-- left sidebar end -->
    
    
        <div class="right_content">
        <!-- detail page start -->
        <div class="detail_box">
       		<div class="list_button_box clearfix">
            	<a href="<?php echo SITE_URL;?>add/<?PHP echo $GetType.$pageNation;?>" class="list_view_active fl">List View</a>
                <a href="<?php echo SITE_URL;?>addgrid/<?PHP echo $GetType.$pageNation;?>" class="grid_view fl">Grid View</a>
                <p class="fr">Sort By:
                           <input type="hidden" class="hidden" value="<?PHP echo $CategoryName.'/'.$CategoryID;?>"/>
                            <input type="hidden" class="pagenumber" value="<?php echo $pageNumber;?>" id="<?php echo $pageNumber;?>"/>
                                  <select class="categoryfiter" id="list">
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
            <?php if($Listingdata==0)
			{
				echo "No Record Found";
			}
			else
			{
				foreach($Listingdata as $Listingdata)
				{
					$prosductcondition=array("product_id "=>$Listingdata->product_id);
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
                	<div class="list_view_img"><a href="<?php echo SITE_URL;?>productdetail/<?php echo str_replace(' ','-',$Listingdata->title).'/'.$Listingdata->product_id?>"><img title="<?php echo substr($Listingdata->title,0,30);?>" src="<?php echo $path;?>" style="height:90px; width:130px;"></a></div>
                	<div class="list_view_hd"><h3> <a href="<?php echo SITE_URL;?>productdetail/<?php echo str_replace(' ','-',$Listingdata->title).'/'.$Listingdata->product_id?>">
					<?php  
					 $condition = array('id' => $Listingdata->category);
					 $categoryNmae = $this->common->sellcategoryName($condition,false); 
					 $conditionSub = array('id' => $Listingdata->subcategory);
					 $subcategoryNmae = $this->common->sellsubcategoryName($conditionSub,false); 
					 $cityName = $this->common->cityDisplayName($Listingdata->city);
					  $stateName = $this->common->stateDisplayName($Listingdata->state); 
					 echo substr($Listingdata->title,0,30);?></a></h3><p><?php echo $stateName->state.'|'.$cityName->city.'|'.$categoryNmae.'-'.$subcategoryNmae;?> </p></div>
                	<div class="list_view_price">र <?php echo $Listingdata->price;?></div>
                  <div class="list_view_date"><?php echo $Listingdata->date;?><br>6:19am </div>
                </div>
                <?php }} 
				echo '<div class="list_box_t1">'.$this->pagination->create_links().'</div>';
				?>
                
                
            </div>
            <!-- List View End -->
            
         
            
        </div>
        <!-- detail page end -->
        </div>
    
    </div>
  </div>