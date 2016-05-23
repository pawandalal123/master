
<div class="modal-dialog" >
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">Edit Category</h3>
</div>
<div class="modal-body">
<form action="<?php echo SITE_URL.'admin/update_category';?>" method="post" id="editcategory" enctype="multipart/form-data" class="form-horizontal form-bordered" >
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Category Name <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="cat" name="cat" class="form-control validate[required]" placeholder="Enter Category Name" value="<?php echo $res->category;?>" />
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="example-file-input">Category Image</label>
<div class="col-md-9">
<input type="file" id="image" name="image" /><img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>catImage/<?php echo $res->image;?>" alt="avatar" class="img-circle" width="64" height="64" />
</div>
</div>


<div class="modal-footer">
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<input type="hidden" name="cat_id" value="<?php echo $res->cat_id;?>" />
<input type="submit" id="submit" class="btn btn-sm btn-primary" name="submit"  value="Submit"/>

<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
