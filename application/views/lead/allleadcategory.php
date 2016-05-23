<?php 
$allcatgeroy =  $this->common->userCategoryListing(20);
?>
<script type="text/javascript">
$(document).ready(function(){  
	 $(window).scroll(function(){
		//	alert('pawan');
		 /* window on scroll run the function using jquery and ajax */
		var WindowHeight = $(window).height(); /* get the window height */
		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */
			var loadURL = SITE_URL+'assets/img/loading_icon.gif';
			$("#loader").html("<img src="+loadURL+" alt='loading'/>"); /* displa the loading content */
			var LastDiv = $(".as_country_container:last"); /* get the last div of the dynamic content using ":last" */
			var LastId  = $(".as_country_container:last").attr("id"); /* get the id of the last div */
			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */
			
			$.post(SITE_URL+'commonfunc/categorylistOnLode',{'LastId':LastId},function(data,status)
		     {
				 $("#loader").html("");
					if(data)
					{
						
						LastDiv.after(data);
					}
			
		     });
				  return false;
		}
		return false;
	});
});
</script>
<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <!-- left sidebar end -->
        <div class="right_content">
        	<!-- category start -->
            <h3 class="inr_heading"> All Leads Category</h3>
            <div class="category_list">
            <ul>
           <?php  foreach($allcatgeroy as $allcatgeroy){  ?> 
<li  class="as_country_container" id="<?php echo $allcatgeroy->cat_id; ?>"><a href="<?php echo SITE_URL;?>buylead/allindex/<?php  echo $allcatgeroy->category.'/'.$allcatgeroy->cat_id;?>"><?php  echo $allcatgeroy->category;?><span class="fr count">4931</span></a></li>
    <?php } ?>   
    
     <div id="loader"></div> 
</ul>      
            </div>
            <!-- category end -->        
        </div>
      
    </div>
  </div>