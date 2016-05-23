<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IndiaBizSaath</title>
<link rel="icon" href="<?php echo WEBROOT_PATH_IMAGES;?>Favicon @ IBS.jpg" type="image/png" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>indiabizsaath.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>popup.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>jquery-ui-1.8.2.custom.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>wysiwyg-css.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>according_menu.css" media="screen">
<script src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>

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