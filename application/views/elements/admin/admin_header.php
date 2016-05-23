<header class="navbar navbar-default">
<ul class="nav navbar-nav-custom">
<li class="hidden-xs hidden-sm">
<a href="javascript:void(0)" id="sidebar-toggle-lg">
<i class="fa fa-list-ul fa-fw"></i>
</a>
</li>
<li class="hidden-md hidden-lg">
<a href="javascript:void(0)" id="sidebar-toggle-sm">
<i class="fa fa-bars fa-fw"></i>
</a>
</li>
<li class="hidden-md hidden-lg">
<a href="./index.php.html">
<i class="gi gi-stopwatch fa-fw"></i>
</a>
</li>
</ul>
<form action="page_ready_search_results.php" method="post" class="navbar-form-custom" role="search" />
<div class="form-group">
<input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search.." />
</div>
</form>
<ul class="nav navbar-nav-custom pull-right">
<li class="dropdown">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<i class="gi gi-settings"></i>
</a>
<ul class="dropdown-menu dropdown-custom dropdown-options dropdown-menu-right">
<li class="dropdown-header text-center">Header Style</li>
<li>
<div class="btn-group btn-group-justified btn-group-sm">
<a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
<a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
</div>
</li>
<li class="dropdown-header text-center">Page Style</li>
<li>
<div class="btn-group btn-group-justified btn-group-sm">
<a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
<a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
</div>
</li>
<li class="dropdown-header text-center">Main Layout</li>
<li>
<button class="btn btn-sm btn-block btn-primary" id="options-header-top">Fixed Side/Header (Top)</button>
<button class="btn btn-sm btn-block btn-primary" id="options-header-bottom">Fixed Side/Header (Bottom)</button>
</li>
</ul>
</li>
<li class="dropdown">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $this->session->userdata('photo');?>" alt="Login required" class="img-circle" width="40" height="40" /></a>
<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
<li class="dropdown-header text-center">Account</li>
<li>
<a href="#modal-user-settings" data-toggle="modal">
<i class="fa fa-cog fa-fw pull-right"></i>
Settings
</a>
</li>
<li class="divider"></li>

<li class="divider"></li>
<li>
<a href="<?php echo SITE_URL.'admin/logout';?>"><i class="fa fa-ban fa-fw pull-right"></i>Logout</a>
</li>

</ul>
</li>
</ul>
</header>