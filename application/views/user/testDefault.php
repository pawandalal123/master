<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IndiaBizTrade</title>
<link href="<?php echo WEBROOT_PATH_CSS;?>indiabiz_new.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEBROOT_PATH_CSS;?>TabPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery-latest_new.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".tabContent").not(":first").hide(); 
	$("ul.tabs li:first").addClass("active").show();  
	
	$("ul.tabs li").click(function() {
		$("ul.tabs li.active").removeClass("active"); 
		$(this).addClass("active"); 
		$(".tabContent").hide();		
		$($('a',this).attr("href")).fadeIn('slow'); 
		
		return false;
	});

});
</script>

<script type="text/javascript">
$(document).ready(function(){
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
</script>

<!--<script src="js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
    $(function () {
        $(".tscroller").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>
</head>
<body>
 <?php echo $this->load->view($view_file);?> 
<a href="#" class="scrollToTop"></a>
</body>
</html>