<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo metaname;?>
<title>IndiaBizTrade</title>
<link rel="icon" href="<?php echo WEBROOT_PATH_IMAGES;?>Favicon @ IBS.jpg" type="image/png" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>indiabizsaath.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>popup.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>jquery-ui-1.8.2.custom.css" media="screen">
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php echo WEBROOT_PATH_CSS;?>SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>leftbar.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>common.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>validation_engine/validation.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.cycle.all.js"></script>

<script>

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
<div class="wrapper">
  <div id="header">
    <div class="container"> 
	<?php echo $this->load->view('/elements/user_header');?> 
	<?php echo $this->load->view('/elements/lead_left_slider.php');?>
      <div id="logo" class="span7 alpha"> </div>
    </div>
  </div>
  <?php echo $this->load->view($view_file);?> 
  <?php echo $this->load->view('/elements/user_footer');?> </div>
</body>
</html>