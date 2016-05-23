<div id="page-content">
  <ul class="breadcrumb breadcrumb-top">
    <li>Admin</li>
    <li><a href="subCategory"> Sub Category</a></li>
  </ul>
  <div class="block full">
    <div class="block-title">
      <h2><a href="#modal-regular" class="btn btn-primary" data-toggle="modal"><strong>Add Manual</strong></a>&nbsp;
      <a href="#modalExcel" class="btn btn-primary" data-toggle="modal"><strong>Upload Excel</strong></a>
       <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
      </h2>
      <?php
		echo form_error("cat"); 
		echo form_error("image");

?>
    </div>
    <div class="table-responsive">
      <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th>Category</th>
            <th>Sub Category</th>
            <!--<th class="text-center">Image</th>-->
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
if(isset($rows)){
//pr($rows);
$c=0;
foreach($rows as $result){
if($result->subcategory==""){
continue;
}

$c++;

 ?>
          <tr>
            <td class="text-center"><?php echo $c;?></td>
            <td><?php echo $result->category;?></td>
            <td><?php echo $result->subcategory;?></td>
            <td class="text-center"><div class="btn-group">
                <?php if($result->status==1){?>
                <a href="<?php echo SITE_URL.'admin/activeDeactiveSubCategory';?>/<?php echo $result->sub_cat_id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES;?>green_icon.png" alt="Activated" /></a>
                <?php } else{?>
                <a href="<?php echo SITE_URL.'admin/activeDeactiveSubCategory';?>/<?php echo $result->sub_cat_id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES;?>red_icon.png" alt="Deactivated" /></a>
                <?php }?>
              </div></td>
            <td class="text-center"><div class="btn-group"> <a href="#modal-regular2" data-toggle="modal" title="Edit" class="btn btn-xs btn-default editSubCat" rel="<?php echo $result->sub_cat_id;?>"><i class="fa fa-pencil"></i></a> <a href="deleteSubCat/<?php echo $result->sub_cat_id;?>" onclick="return confirm('Are you sure to delete ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a> </div></td>
            <td></td>
          </tr>
          <?php } }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Add Sub Category</h3>
      </div>
      <div class="modal-body">
    
     
         <form action="<?php echo SITE_URL.'admin/addSubCategory';?>" method="post" id="add_subCategory" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Category <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="cat" id="cat" class="form-control validate[required]">
            
              <option value="">--select--</option>
              <?php if(isset($catrow)){
			
              foreach($catrow as $cat){?>
              <option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['category'];?></option>
              <?php } }?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Sub Category <span class="err">*</span></label>
          <div class="col-md-9">
            <input type="text" id="subcat" name="subcat" class="form-control validate[required]" placeholder="Enter Sub Category" value="" />
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
              <input type="submit" id="submit" class="btn btn-sm btn-primary" name="submit"  value="Submit"/>
              <input type="reset" id="reset" class="btn btn-sm btn-warning" name="reset"  value="Reset"/>
              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </form>
        
      
      </div>
    </div>
  </div>
</div>
<div id="modalExcel" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Upload Sub Category</h3>
      </div>
      <div class="modal-body">
    
     
         <form action="<?php echo SITE_URL.'admin/addexcel';?>" method="post" id="uploadexcel" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Category <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="cat" id="cat" class="form-control validate[required]">
            
              <option value="">--select--</option>
              <?php if(isset($catrow)){
			
              foreach($catrow as $cat){?>
              <option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['category'];?></option>
              <?php } }?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Excel File <span class="err">*</span></label>
          <div class="col-md-9">
            <input type="file" id="excelfile" name="excelfile" class="validate[required]"  />
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
              <input type="submit" id="submit" class="btn btn-sm btn-primary" name="submit"  value="Import"/>
              <input type="reset" id="reset" class="btn btn-sm btn-warning" name="reset"  value="Reset"/>
              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </form>
        
      
      </div>
    </div>
  </div>
</div>


<div id="modal-regular2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"> </div>
