<?php 
$CategoryID=$CategoryID;
$allSubcatgeroy =  $this->common->categorySubCategory(false,$CategoryID,FALSE);

?>

<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <!-- left sidebar end -->
        <div class="right_content">
        	<!-- category start -->
            <h3 class="inr_heading">Sub Category of <?php echo $CategoryType;?></h3>
            <div class="category_list">
            <ul>
           <?php  
		   foreach($allSubcatgeroy as $subCategory)
		   { 
		   $SubCategoryData= $this->common->SubCategoryData(0,$CategoryID,$subCategory->sub_cat_id,false);
		    ?> 
<li><a href="<?php echo SITE_URL;?>subcategory/<?php  echo str_replace(' ','-',$CategoryType).'/'.str_replace(' ','-',$subCategory->subcat_url).'/'.$CategoryID.'/'.$subCategory->sub_cat_id;?>"><?php  echo $subCategory->subcategory;?><span class="fr count"><?php echo  count(array_filter($SubCategoryData));?></span></a></li>

    <?php } ?>

</ul>      
            </div>
            <!-- category end -->        
        </div>
    </div>
  </div>