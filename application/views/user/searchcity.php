<?php
$citylist =  $this->common->CityList(20);
?>

<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <!-- left sidebar end -->
        <div class="right_content">
        	<!-- category start -->
            <h3 class="inr_heading">Listing Of All Category</h3>
            <div class="category_list">
            <ul>
           <?php  foreach($citylist as $citylistData){ ?>
<li class="as_country_container" id="<?php echo $citylistData->state_id; ?>"><a href="<?php echo SITE_URL;?>searchcity/cityproductlist/<?php  echo str_replace(' ','-',$citylistData->state).'/'.$citylistData->state_id;?>"><?php  echo $citylistData->state;?><span class="fr count">4931</span></a></li>
    <?php } ?>   
    
     <div id="loader"></div>
</ul>
            </div>
            <!-- category end -->
        </div>
      
    </div>
  </div>