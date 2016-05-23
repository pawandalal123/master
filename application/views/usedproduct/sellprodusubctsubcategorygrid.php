<?php 
$Getdata=$options;
$CategoryName = $CategoryName;
$CategoryID = $CategoryID;
$subCategoryName = $SubCategoryName;
$subCategoryID = $subCategoryID;
$subcategory= $this->common->sellproductSubCategory(false,$CategoryID,15);
$CategoryIDLIST=array("category"=>$CategoryID,"subcategory"=>$subCategoryID);
$brandList=$this->common->sellcategoryBrand($CategoryIDLIST,false);
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
            <input type="button" name="button" class="submit_btn2" id="button" value="Go" onclick="CheckDataSearchProduct(document.searchFormads);">
             </form>
           
        </div>        
        </div>
    <!-- Search By Keyword end -->

<!-- filter box start -->
<?php echo $this->load->view('elements/filteroption'); ?>
<!-- filter box end -->

    </div>
    <!-- left sidebar end -->
    
    
        <div class="right_content">
        <!-- detail page start -->
        <div class="detail_box">
       		<div class="list_button_box clearfix">
            	<a href="<?php echo SITE_URL;?>productsell/subcategoryList/<?PHP echo $Gettype;?>" class="list_view_active fl">List View</a>
                <a href="<?php echo SITE_URL;?>productsell/subcategoryGrid/<?PHP echo $Gettype;?>" class="grid_view fl">Grid View</a>
                <p class="fr">Sort By:
                               <input type="hidden" class="hidden" value="<?php echo $CategoryName.'/'.$subCategoryName.'/'.$CategoryID.'/'.$subCategoryID;?>"/>
                                    <select class="suibcategoryfiter" id="list">
                                    <option selected="" value="<?php  $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , 'sort_date' , 'sort'); echo $urlArrayData['URL'];?>" <?php if(in_array('sort_date' , $urlArrayData['paramArray']['sort'])) echo 'selected=selected'?>>Most Recent Ads</option>
                                    <option value="<?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , 'sort_price' , 'sort'); echo  $urlArrayData['URL'];?>" <?php if(in_array('sort_price' , $urlArrayData['paramArray']['sort'])) echo 'selected=selected'?>>Price: Low to High</option>
                                    <option value="<?php $urlArrayData = $this->common->makeUrlSubCatList($CategoryName , $subCategoryName , $CategoryID , $subCategoryID , 'sort_pricedesc' , 'sort');  echo  $urlArrayData['URL'];?>" <?php if(in_array('sort_pricedesc' , $urlArrayData['paramArray']['sort'])) echo 'selected=selected'?>>Price: High to Low</option>
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
                <div class="grid_view_result1">
                	<div class="grid_view_img"><a href="<?php echo SITE_URL;?>productdetail/<?php echo $this->common->cleanURL($Listingdata->title).'/'.$Listingdata->product_id?>"><img title="<?php echo substr($Listingdata->title,0,30);?>" src="<?php echo $path;?>" style="height:192px; width:144px;"></a></div>
                    <div class="grid_view_hd"><h3><a href="#"><?php 
					 $condition = array('id' => $Listingdata->category);
					 $categoryNmae = $this->common->sellcategoryName($condition,false); 
					 $conditionSub = array('id' => $Listingdata->subcategory);
					 $subcategoryNmae = $this->common->sellsubcategoryName($conditionSub,false);
					 $cityName = $this->common->cityDisplayName($Listingdata->city); 
					echo substr($Listingdata->title,0,30);?></a></h3><p><?php echo $cityName->city.'|'.$categoryNmae.'-'.$subcategoryNmae;?> </p></div>
                    <div class="grid_view_price">र <?php echo $Listingdata->price;?></div>
                  <div class="grid_view_date"><?php echo $Listingdata->date;?> 6:19am </div>
                </div>
                <?php }} ?>
            </div>
            <!-- List View End -->
            
         
            
        </div>
        <!-- detail page end -->
        </div>
    
    </div>
  </div>