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
            <div id="dropDownbox1" class="dropDownboxHomePage">
              <div class="brdr-t-blu-strip"></div>
              <!-- category navigation start -->
              <ul class="gm gl">
                <!-- nav 1 -->
                <?php
				 foreach ($userCategorySubCategory as $userCategorySubCategory){
					 ?>
                <li class="gm-mc"> <a href="<?php echo SITE_URL;?>category/allindex/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];?>" class="gm-mc-nm"><?php  echo $userCategorySubCategory['CategoryName'];?></a> <span>&raquo;</span>
                  <div class="hide gm-sc-cntnr">
                    <div class="brdr-t-blu-strip pr"></div>
                    <h3> <a href="<?php echo SITE_URL;?>category/index/<?php  echo str_replace(' ','-',$userCategorySubCategory['CategoryNameUrl']).'/'.$userCategorySubCategory['categoryId'];
					?>" class="gm-mc-nm"><?php  echo  $userCategorySubCategory['CategoryName'];?></a>
                      <hr class="mrgn-b-25">
                    </h3>
                    <ul class="gm-sc-list">
                      <div class="span3">
                      	<div class="gl gm-tc-list">
                      <?php
					  	$i = 1;
						$CategoryName = $userCategorySubCategory['CategoryName'];
						$categoryId = $userCategorySubCategory['categoryId'];
						$CategoryNameUrl=$userCategorySubCategory['CategoryNameUrl'];
						unset($userCategorySubCategory['CategoryName']);
						unset($userCategorySubCategory['categoryId']);
						unset($userCategorySubCategory['CategoryNameUrl']);
						unset($userCategorySubCategory);
					   	foreach($userCategorySubCategory as $subCategory){ 
					  
					    ?> 
                         <a href="<?php echo SITE_URL;?>category/subcategory/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.str_replace(' ','-',$subCategory->subcat_url).'/'.$categoryId.'/'.$subCategory->sub_cat_id;?>" class="gm-tc-nm maintainHover"><?php  echo $subCategory->subcategory;?></a> 
                        <?php 
						if($i  > 59){
							?>
									<a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$CategoryNameUrl).'/'.$categoryId;?>">More</a>
                                    <?php
									break;
								}
						if($i%10 == 0){
								echo '</div></div><div class="span3"> <div class="gl gm-tc-list">';
							}
								
						 ?>
                        <?php $i++;  } ?>
                         </div>
                      </div>
                    
                      
                    </ul>
                  </div>
                </li>
                <?php }	 ?>
                <a href="<?php echo SITE_URL;?>catlist">More</a>
                <!-- nav 1 end -->
                <!-- nav 2 -->
              
                <!-- nav 13 end -->
              </ul>
              <!-- category navigation end -->
            </div>
          </div>
        </div>
      </div>