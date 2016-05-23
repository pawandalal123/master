<div id="sidebar">
<div class="sidebar-scroll">
<div class="sidebar-content">
<a href="<?php echo SITE_URL.'admin/dashboard';?>" class="sidebar-brand">

<img src="<?php echo WEBROOT_PATH_IMAGES;?>logo1.png"></a>
<div class="sidebar-section sidebar-user clearfix">
<div class="sidebar-user-avatar">
<?php if($this->session->userdata('photo')){?>

<img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $this->session->userdata('photo');?>" alt="Login required" class="img-circle" width="68" height="68" />
<?php }?>
</div>
<div class="sidebar-user-name"><?php if( $this->session->userdata('isLoggedIn') ) { echo $this->session->userdata('name');}?></div>
<div class="sidebar-user-links">
<a href="#modal-user-profile" data-toggle="modal" id="profile" data-placement="bottom" title="Profile" rel="<?php echo $this->session->userdata('id');?>">
<i class="gi gi-user"></i></a>
<a href="#" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
<a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
<a href="<?php echo SITE_URL.'admin/logout';?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
</div>
</div>
<ul class="sidebar-section sidebar-themes clearfix">

</ul>
<ul class="sidebar-nav">
<li>
<a href="<?php echo SITE_URL.'admin/dashboard';?>" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
</li>

<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-certificate sidebar-nav-icon">
</i>User Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/view_admin';?>">Manage Admin</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/users';?>">Manage User</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/enquiry';?>">Manage Enquiry</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/leads';?>">Manage Leads</a>
</li>


</ul>
</li>
<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-notes_2 sidebar-nav-icon"></i>Content Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/contactDetails';?>">Manage Contact Us</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/pageContent';?>">Manage Page Content</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/advertisement';?>">Manage Advertisement</a>
</li>

</ul>
</li>
<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-table sidebar-nav-icon"></i>Data Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/category';?>">Manage Category</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/subcategory';?>">Manage Sub Category</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/products';?>">Manage Business Product</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/selProducts';?>">Manage Sell Product</a>
</li>
</ul>
</li>
</ul>

<div class="sidebar-header">
<span class="sidebar-header-options clearfix">
<a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
</span>
<span class="sidebar-header-title">Activity</span>
</div>
<div class="sidebar-section">
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
<i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)">New bug submitted</a>
</div>
</div>
</div>
</div>
</div>