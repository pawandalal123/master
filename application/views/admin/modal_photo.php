<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-pencil"></i> Changed Profile Picture</h2>
</div>
<div class="modal-body">
<form action="<?php echo SITE_URL.'admin/changePic';?>" method="post"  enctype="multipart/form-data" class="form-horizontal form-bordered" >

<fieldset>

<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-password">Choose Photo <span class="err">*</span></label>
<div class="col-md-8">
<input type="file" id="image" name="image"  />
<img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $res->profile_image;?>" alt="avatar" class="img-circle" width="64" height="64" />
</div>
</div>

</fieldset>
<div class="form-group form-actions">
<div class="col-xs-12 text-right">
<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
<input type="hidden" name="user_id" value="<?php echo $res->user_id;?>" />
<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Change"/>
</div>
</div>
</form>
</div>
</div>
</div>