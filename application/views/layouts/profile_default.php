<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo metaname;?>
<title>IndiaBizTrade</title>
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>indiabizsaath.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>according_menu.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>popup.css" media="screen">
<script src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php echo WEBROOT_PATH_CSS;?>SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>common.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>validation_engine/validation.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.cycle.all.js"></script>
<script>
var SITE_URL = '<?php echo  SITE_URL;?>';
</script>
</head>
<body>
<div id="page_hide">
<img src="<?php echo WEBROOT_PATH_IMAGES;?>preloaderTransparent.gif"/>
		</div>
<div class="modal-backdrop" style="display:none;"></div>
<div  class="modal fade"  >                     
				</div>                  
				</div>
  <div id="container" class="container_24">
  <?php echo $this->load->view('/elements/second_headre');?> 
  <?php echo $this->load->view($view_file);?> 
  <?php echo $this->load->view('/elements/user_footer');?> 
  </div>
</body>
</html>