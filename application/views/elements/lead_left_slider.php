<?php
$userCategorySubCategory = $this->common->userCategorySubCategoryList();
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
				 foreach ($userCategorySubCategory as $userCategorySubCategory){
					 ?>
	 <li class="maincat"><a href="<?php echo SITE_URL;?>buylead/allindex/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $userCategorySubCategory['CategoryName'];?></a>
		<div class="cataloglistexpand electronics">
        <h2><a href="<?php echo SITE_URL;?>buylead/index/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];
					?>" class=""><strong><?php  echo  $userCategorySubCategory['CategoryName'];?></strong></a></h2>
			<div class="flt subcatwrapper col4bg">
               <!--<div class="nav_add">
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                <img src="<?php echo WEBROOT_PATH_IMAGES; ?>computer.jpg" width="150" />
                </div>-->
				<div class="col">
					
                    <a title="For Men" href="#">Men Footwear</a>
							<ul>
                             <?php
					  	$i = 1;
						$CategoryName = $userCategorySubCategory['CategoryName'];
						$categoryId = $userCategorySubCategory['categoryId'];
						$CategoryNameUrl=$userCategorySubCategory['CategoryNameUrl'];
						unset($userCategorySubCategory['CategoryName']);
						unset($userCategorySubCategory['categoryId']);
						unset($userCategorySubCategory['CategoryNameUrl']);
						unset($userCategorySubCategory['CategoryLogo']);
						
					   	foreach($userCategorySubCategory as $subCategory){ 
					  
					    ?> 
                         <li><a href="<?php echo SITE_URL;?>buylead/subcategory/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.str_replace(' ','-',$subCategory->subcategory).'/'.$categoryId.'/'.$subCategory->sub_cat_id;?>" class="gm-tc-nm maintainHover"><?php  echo $subCategory->subcategory;?></a> </li>
                        <?php 
						if($i  > 59){
							?>
									<a href="<?php echo SITE_URL;?>buylead/allindex/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>">More</a>
                                    <?php
									break;
								}
						if($i%20 == 0){
								echo '</ul></div><div class="col">
					<a title="For Men" href="#">Men Footwear</a>
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
                <a href="<?php echo SITE_URL;?>buylead/categotyListing">More</a>
</ul>
<span class="showtransparentdiv"> </span>
			
            </li>
          </ul>
</nav>
            
          </div>
        </div>
      </div>