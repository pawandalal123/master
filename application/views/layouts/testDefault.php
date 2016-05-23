<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="GBY6-Cw7u1f_7Ed5Tni7d1eMtrlRu7hoFDvgZrs5Skg" />
<meta name="p:domain_verify" content="392e560e44b97f7cb1aba990f9f127b5"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="business directory, business listing sites, b2b marketing, international trade, exporters India, manufacturing companies, export business, yellow pages India, trade India, manufacturing industries" />
<meta name="description" CONTENT="Indiabiztrade: India's leading business directory sites trade in India. It promotes B2B marketing, yellow pages, manufacturing industries, export business.">
<title>Business Directory: B2B Marketing, Exporters Trade India</title>
<link rel="icon" href="<?php echo WEBROOT_PATH_IMAGES;?>FaviconIBS.jpg" type="image/png" />
<link href="<?php echo WEBROOT_PATH_CSS;?>indiabiz_new.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEBROOT_PATH_CSS;?>TabPanels.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>jquery-ui-1.8.2.custom.css" media="screen">
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery-latest_new.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>leftbar.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>common.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>validation_engine/validation.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.cycle.all.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.bootstrap.newsbox.min.js"></script>

<script type="text/javascript">
var SITE_URL='<?PHP echo SITE_URL;?>';
 auto_ready();
$(document).ready(function() {
	 $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
	$(".tabContent").not(":first").hide(); 
	$("ul.tabs li:first").addClass("active").show();  
	
	$("ul.tabs li").click(function() {
		$("ul.tabs li.active").removeClass("active"); 
		$(this).addClass("active"); 
		$(".tabContent").hide();		
		$($('a',this).attr("href")).fadeIn('slow'); 
		
		return false;
	});
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

<script src="<?php echo WEBROOT_PATH_JS;?>jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
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
<div id="page_hide">
<img src="<?php echo WEBROOT_PATH_IMAGES;?>preloaderTransparent.gif"/>
		</div>
 <?php echo $this->load->view($view_file);?> 
 <?php echo $this->load->view('/elements/footer');?> 
 
</body>
</html>