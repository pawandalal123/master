<?php
    $descDis='';
	$keywords='';
	$title='IndiaBizTrade';
if($keywordDisplay)
{
	$keywords=$keywordDisplay;
}

if($descDisplay)
{
	$descDis=$descDisplay;
}

if($titleDisplay)
{
	$title=$titleDisplay;
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="google-site-verification" content="GBY6-Cw7u1f_7Ed5Tni7d1eMtrlRu7hoFDvgZrs5Skg" />
<title><?php echo $titleDisplay;?></title>
<meta name="keywords" content="<?php echo $keywordDisplay;?>" />
<meta name="description" CONTENT="<?php echo $descDis;?>">
<link rel="icon" href="<?php echo WEBROOT_PATH_IMAGES;?>FaviconIBS.jpg" type="image/png" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>indiabizsaath.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>popup.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>jquery-ui-1.8.2.custom.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>font-awesome.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>font-awesome.min.css" media="screen">
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php echo WEBROOT_PATH_CSS;?>SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>leftbar.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>common.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>validation_engine/validation.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery-ui-1.8.2.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>according_menu.css" media="screen">
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.cycle.all.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=515672738549263";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>

	ddaccordion.init({
	headerclass: "technology",
	contentclass: "thelanguage",
	revealtype: "click",
	mouseoverdelay: 200,
	collapseprev: false, 
	defaultexpanded: [],
	onemustopen: false,
	animatedefault: false, 
	scrolltoheader: false, 
	persiststate: false, 
	toggleclass: ["closedlanguage", "openlanguage2"], 
	togglehtml: ["prefix", "<img src='http://localhost/php/indiabiz/assets/img/list-arow1.png' style='width:16px; height:11px; margin:2px 0px 0px 0px; float:right;' /> ", "<img src='http://localhost/php/indiabiz/assets/img/list-arow1.png' style='width:16px; height:11px; margin:2px 0px 0px 0px; float:right;' /> "],
	animatespeed: "fast", 
	oninit:function(expandedindices){
	},
	onopenclose:function(header, index, state, isuseractivated){ 
	}
})

var SITE_URL = '<?php echo  SITE_URL;?>';
$(document).ready(function(){
		showSubcatOnHover(); 
	});
</script>

</head>
<body>
<div id="page_hide">
<img src="<?php echo WEBROOT_PATH_IMAGES;?>preloaderTransparent.gif"/>
		</div>
<div class="modal-backdrop" style="display:none;"></div>
<div  class="modal fade"  >                     
				</div>
  <div id="container" class="container_24">
  <?php echo $this->load->view('/elements/sellproduct_header');?> 
  <?php echo $this->load->view($view_file);?> 
  <?php echo $this->load->view('/elements/user_footer');?> 
  </div>
</body>
</html>