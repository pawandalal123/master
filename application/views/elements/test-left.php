<?php
$userCategorySubCategory = $this->common->userCategorySubCategoryList();
?>
<div class="row">
        <div class="span4">
          <div class="flyout-menu">
            <div id="dropDownButton" class="menu-hdr">
              <div class="hdr-title font-caps"><a href="<?php echo SITE_URL;?>catlist">Categories</a></div>
              <div class="icn-dwn-cs2"></div>
            </div>
            <nav class="dropdownsubcat">
	<ul>
	<li class="homecatalog">
	 <ul class="cataloglist  displaycataloglist">
     <?php
				 foreach ($userCategorySubCategory as $userCategorySubCategory){
					 ?>
	 <li class="maincat"><a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $userCategorySubCategory['CategoryName'];?></a>
		<div class="cataloglistexpand electronics">
        <h2><a href="<?php echo SITE_URL;?>product/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];
					?>" class=""><strong><?php  echo  $userCategorySubCategory['CategoryName'];?></strong></a></h2>
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
						$CategoryName = $userCategorySubCategory['CategoryName'];
						$categoryId = $userCategorySubCategory['categoryId'];
						$CategoryNameUrl=$userCategorySubCategory['CategoryNameUrl'];
						unset($userCategorySubCategory['CategoryName']);
						unset($userCategorySubCategory['categoryId']);
						unset($userCategorySubCategory['CategoryNameUrl']);
						unset($userCategorySubCategory['CategoryLogo']);
						
					   	foreach($userCategorySubCategory as $subCategory){ 
					  
					    ?> 
                         <li><a href="<?php echo SITE_URL;?>subcategory/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.str_replace(' ','-',$subCategory->subcat_url).'/'.$categoryId.'/'.$subCategory->sub_cat_id;?>" class="gm-tc-nm maintainHover"><?php  echo ucwords($subCategory->subcategory);?></a> </li>
                        <?php 
						if($i  > 59){
							?>
									<a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>">More</a>
                                    <?php
									break;
								}
						if($i%10 == 0){
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
                <a href="<?php echo SITE_URL;?>catlist">More</a>
</ul>
<span class="showtransparentdiv"> </span>
			
            </li>
          </ul>
</nav>
            
          </div>
        </div>
      </div>