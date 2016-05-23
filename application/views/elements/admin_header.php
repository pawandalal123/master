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
<img src="<?php echo WEBROOT_PATH_IMAGES;?>placeholders/avatars/avatar2.jpg" alt="avatar" /> <i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
<li class="dropdown-header text-center">Account</li>
<li>
<a href="./page_ready_timeline.php.html">
<i class="fa fa-clock-o fa-fw pull-right"></i>
<span class="badge pull-right">10</span>
Updates
</a>
<a href="./page_ready_inbox.php.html">
<i class="fa fa-envelope-o fa-fw pull-right"></i>
<span class="badge pull-right">5</span>
Messages
</a>
<a href="./page_ready_pricing_tables.php.html"><i class="fa fa-magnet fa-fw pull-right"></i>
<span class="badge pull-right">3</span>
Subscriptions
</a>
<a href="./page_ready_faq.php.html"><i class="fa fa-question fa-fw pull-right"></i>
<span class="badge pull-right">11</span>
FAQ
</a>
</li>
<li class="divider"></li>
<li>
<a href="./page_ready_user_profile.php.html">
<i class="fa fa-user fa-fw pull-right"></i>
Profile
</a>
<a href="#modal-user-settings" data-toggle="modal">
<i class="fa fa-cog fa-fw pull-right"></i>
Settings
</a>
</li>
<li class="divider"></li>
<li>
<a href="./login.php.html"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
</li>
<li class="dropdown-header text-center">Activity</li>
<li>
<div class="alert alert-success alert-alt">
<small>5 min ago</small><br />
<i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
</div>
<div class="alert alert-info alert-alt">
<small>10 min ago</small><br />
<i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
</div>
<div class="alert alert-warning alert-alt">
<small>3 hours ago</small><br />
<i class="fa fa-exclamation fa-fw"></i> Running low on space<br /><strong>18GB in use</strong> 2GB left
</div>
<div class="alert alert-danger alert-alt">
<small>Yesterday</small><br />
<i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">New bug submitted</a>
</div>
</li>
</ul>
</li>
</ul>
</header>