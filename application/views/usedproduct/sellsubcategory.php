<?php 
$CategoryID=$CategoryID;
$allSubcatgeroy =  $this->common->sellcategorySubCategory(false,$CategoryID,FALSE);
?>
<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <!-- left sidebar end -->
        <div class="right_content">
        	<!-- category start -->
            <h3 class="inr_heading">Sub Category of <?php echo str_replace('-',' ',$CategoryType);?></h3>
            <div class="category_list">
            <ul>
           <?php  foreach($allSubcatgeroy as $subCategory){  ?> 
<li><a href="<?php echo SITE_URL;?>addsubcat/<?php  echo $CategoryType.'/'.str_replace(' ','-',$subCategory->category_name).'/'.$CategoryID.'/'.$subCategory->id;?>"><?php  echo $subCategory->category_name;?><span class="fr count">4931</span></a></li>
    <?php } ?>    
</ul>      
            </div>
            <!-- category end -->        
        </div>
      
    </div>
  </div>