<?php 
$allCatList =  $this->common->userCategoryListing(false);
?>

<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <!-- left sidebar end -->
        <div class="right_content">
        	<!-- category start -->
            <h3 class="inr_heading">All Category List</h3>
            <div class="category_list">
            <ul>
           <?php  foreach($allCatList as $allCatList)
		   { 
		   $catCountData = $this->common->categoryListingdata(false,$allCatList->cat_id,false);
		    ?> 
<li><a href="<?php echo SITE_URL;?>product/<?php  echo str_replace(' ','-',$allCatList->category).'/'.$allCatList->cat_id;?>"><?php  echo $allCatList->category;?><span class="fr count"><?php echo count(array_filter($catCountData));?></span></a></li>

    <?php } ?>

</ul>      
            </div>
            <!-- category end -->        
        </div>
    </div>
  </div>