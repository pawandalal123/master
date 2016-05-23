
<div class="modal-dialog" >
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">Edit Sub Category</h3>
</div>
<div class="modal-body">
<form action="<?php echo SITE_URL.'admin/updateSubCategory';?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input"> Category <span class="err">*</span> </label>
<div class="col-md-9">
<select name="cat" id="cat" class="form-control validate[required]">

<option value="">--select--</option>

<?php if(isset($catd)){
foreach($catd as $catR){?>
<option value="<?php echo $catR->cat_id;?>" <?php if($res->cat_id==$catR->cat_id) echo "selected";?>><?php echo $catR->category;?></option>
<?php } }?>
</select>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Sub Category <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="subcat" name="subcat" class="form-control validate[required]" placeholder="Enter Sub Category" value="<?php echo $res->subcategory;?>" />
</div>
</div>



<div class="modal-footer">
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<input type="hidden" name="sub_cat_id" value="<?php echo $res->sub_cat_id;?>" />
<input type="submit" id="submit" class="btn btn-sm btn-primary" name="submit"  value="Submit"/>

<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
