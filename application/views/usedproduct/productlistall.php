<?php 
$selCategorySubCategory = $this->common->sellCategorySubCategoryList();
//pr($selCategorySubCategory);
?>
<div class="mainContainer">
    <div class="topBanner clearfix container con_p">
     <?php
                 $i = 1;
				 foreach ($selCategorySubCategory as $selCategorySubCategory){
					 $catgoryId=$selCategorySubCategory['categoryId'];
					 $catgoryName=$selCategorySubCategory['CategoryName'];
					 ?>
        <div class="pd_list">
        <div class="technology f14"><a href="<?php echo SITE_URL;?>productsell/allsubcategory/<?php  echo str_replace(' ','-',$selCategorySubCategory['CategoryName']).'/'.$selCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $selCategorySubCategory['CategoryName'];?></a><br>
        <div class="img_list"> <img src="<?php echo WEBROOT_PATH_IMAGES.''.$selCategorySubCategory['Logo'];?>"></div>
        </div>
        <div class="thelanguage">
        <ul class="list">
        <?php
        unset($selCategorySubCategory['categoryId']);
						unset($selCategorySubCategory['CategoryName']);
					   foreach($selCategorySubCategory as $subCategory){  ?>
        <li><a href="<?php echo SITE_URL;?>addsubcat/<?php  echo str_replace(' ','-',$catgoryName).'/'.str_replace(' ','-',$subCategory->category_name).'/'.$catgoryId.'/'.$subCategory->id;?>" class="gm-tc-nm maintainHover"><?php  echo $subCategory->category_name;?></a></li> 
        <?php } ?>
        </ul>
        </div>
        </div>
        <?php 
        if($i%4== 0){
        ?>
								<br clear="all">
                                <?php
							}
                          $i++;  }
                            ?>
    
    <br clear="all">
    
    </div>
  </div>