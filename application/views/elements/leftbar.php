<?php
$condition=array("company_id"=>$comnayID);
$userCategorySubCategory = $this->common->userCtalogcatgeoryList($condition);
$ctalognewslist = $this->common->ctalognewslist($condition);
?>
<div class="catalog_left_link">
<div class="benefits">
        <h3>Products</h3>
<ul class="left_list">
<?php
foreach($userCategorySubCategory as $userCategorySubCategory)
{
?>
  <li class="hed_list"><a href="#"><b><?php
   $condition=array("cat_id"=>$userCategorySubCategory['categoryId']);
   $catName=$this->common->CategoryName($condition); echo $catName->category ;?>
   </b></a></li>
  <?php
  unset($userCategorySubCategory['categoryId']);
  foreach($userCategorySubCategory as $productsubcatgeory)
  {
  ?>
  <li><a href="#"><?php $condition=array("sub_cat_id"=>$productsubcatgeory->sub_category);
                      $catName=$this->common->SubCategoryNameDisplay($condition); echo $catName->subcategory?></a></li>
  <?php } } ?>
</ul>
</div>
<div class="news_sbox">
        <div class="news_h">News</div>
        <div id="news_s">
            <div>
                <img src="http://malsup.github.com/images/beach1.jpg" width="200" height="200" />
                <p>St Andrews State Park - Panama City, FL</p>
                <p>This park is one of the most popular outdoor recreation spots 
                in Florida.
                </p>
            </div>
            <div>
                <img src="http://malsup.github.com/images/beach2.jpg" width="200" height="200" />
                <p>Located in the Florida panhandle, the 1,260 acre park is situated on a scenic peninsula 
                and is well known for its sugar white sands and brilliant blue water.
                </p>
            </div>
            <div>
                <img src="http://malsup.github.com/images/beach3.jpg" width="200" height="200" />
                <p>The ocean provides opportunity for endless fun.  From boogie boarding to snorkeling
                to  swimming and boating, there is always something to do.</p>
            </div>
        </div>
        <div class="news_m"><a href="#">read more</a></div>
        </div>
</div>