<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo metaname;?>
<title>IndiaBizTrade</title>
<link rel="icon" href="<?php echo WEBROOT_PATH_IMAGES;?>FaviconIBS.jpg" type="image/png" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>indiabizsaath.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>popup.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>jquery-ui-1.8.2.custom.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>wysiwyg-css.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>according_menu.css" media="screen">
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php echo WEBROOT_PATH_CSS;?>SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>leftbar.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>common.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>validation_engine/validation.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.cycle.all.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>wysiwyg.js"></script>
<script>
var SITE_URL = '<?php echo  SITE_URL;?>';
$(document).ready(function(){
		showSubcatOnHover(); 
	});
</script>

</head>
<body>
<div class="modal-backdrop" style="display:none;"></div>
<div  class="modal fade"  >                     
				</div>                  
				</div>
<div class="wrapper">
  <div id="header">
    <div class="container"> 
	<?php echo $this->load->view('/elements/user_header');?> 
      <div id="logo" class="span7 alpha"> </div>
    </div>
  </div>
  <?php echo $this->load->view($view_file);?> 
  <?php echo $this->load->view('/elements/user_footer');?> </div>
</body>
</html>