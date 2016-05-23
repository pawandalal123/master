 <?php 
 $selCategorySubCategory = $this->common->sellCategorySubCategoryList();
 ?>
<div class="row">
        <div class="span4">
          <div class="flyout-menu">
            <div id="dropDownButton" class="menu-hdr">
              <div class="hdr-title font-caps">Categories</div>
              <div class="icn-dwn-cs2"></div>
            </div>
            <nav class="dropdownsubcat">
	<ul>
	<li class="homecatalog">
	 <ul class="cataloglist  displaycataloglist">
     <?php
				 
				 foreach ($selCategorySubCategory as $selCategorySubCategory){
					 
					 ?>
					 
	 <li class="maincat"><a href="<?php echo SITE_URL;?>productsell/allsubcategory/<?php  echo str_replace(' ','-',$selCategorySubCategory['CategoryName']).'/'.$selCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $selCategorySubCategory['CategoryName'];?></a>
		<div class="cataloglistexpand electronics">
        <h2><a href="<?php echo SITE_URL;?>add/<?php  echo str_replace(' ','-',$selCategorySubCategory['CategoryName']).'/'.$selCategorySubCategory['categoryId'];
					?>" ><?php  echo  $selCategorySubCategory['CategoryName'];?></a></h2>
			<div class="flt subcatwrapper col4bg">
               <!--<div class="nav_add">
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                </div>-->
				<div class="col">
					
                    
							<ul>
                              <?php
					  	$i = 1;
						$catgoryId=$selCategorySubCategory['categoryId'];
					    $catgoryName=$selCategorySubCategory['CategoryName'];
						unset($selCategorySubCategory['categoryId']);
						unset($selCategorySubCategory['CategoryName']);
						unset($selCategorySubCategory['Logo']);
					   foreach($selCategorySubCategory as $subCategory){  ?> 
                         <li><a href="<?php echo SITE_URL;?>addsubcat/<?php  echo str_replace(' ','-',$catgoryName).'/'.str_replace(' ','-',$subCategory->category_name).'/'.$catgoryId.'/'.$subCategory->id;?>" class="gm-tc-nm maintainHover"><?php  echo $subCategory->category_name;?></a>  </li>
                        <?php 
						if($i  > 59){
							?>
									<a href="<?php echo SITE_URL;?>productsell/allsubcategory/<?php  echo str_replace(' ','-',$catgoryName).'/'.$catgoryId;?>">More</a>
                                    <?php
									break;
								}
						if($i%2 == 0){
								echo '</ul></div><div class="col">
					
							<ul>';
							}
								
						 ?>
                        <?php $i++;  } ?>
								
								
							</ul>
				</div>
				
				
      			<div style="clear:both;"></div>
		</div></div>
	</li>
	
	<?php }	 ?>
                <a href="<?php echo SITE_URL;?>category/categotyListing">More</a>
</ul>
<span class="showtransparentdiv"> </span>
			
            </li>
          </ul>
</nav>
            
          </div>
        </div>
      </div>