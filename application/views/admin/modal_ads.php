
<div class="modal-dialog" >
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">Edit Ads Image</h3>
</div>
<div class="modal-body">
        <form action="<?php echo SITE_URL.'admin/addAds';?>" method="post" id="add_Adv" enctype="multipart/form-data" class="form-horizontal form-bordered">
         <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Ads Type <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="type" id="type" class="form-control validate[required]">
            <?php if($res->image_for==""){?>
              <option value="" selected="selected">--select--</option>
              <?php }else{?>
               <option value="<?php echo $res->image_for;?>" selected="selected"><?php echo $res->image_for;?></option>
               <?php }?>
                <option value="slider">Slider</option>
                <option value="ads">Ads Image</option>
                </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Display Position <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="position" id="position" class="form-control validate[required]">
            
              <?php if($res->position==""){?>
              <option value="" selected="selected">--select--</option>
              <?php }else{?>
               <option value="<?php echo $res->position;?>" selected="selected"><?php echo $res->position;?></option>
               <?php }?>
                <option value="left">Left</option>
                <option value="right">Right </option>
                <option value="footer">Footer</option>
                <option value="header">Header</option>
               </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Valid Till <span class="err">*</span></label>
          <div class="col-md-9">
          <input type="text" id="example-datepicker2" name="end_date" value="<?php echo $res->end_date;?>" class="form-control input-datepicker validate[required]" data-date-format="dd/mm/yyyy" placeholder="dd-mm-yyyy" />
           
          </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="example-file-input">Ads Image</label>
        <div class="col-md-9">
        <input type="file" id="image" name="image" class="validate[required]" />
        <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>ads_image/<?php echo $res->image_name;?>" alt="avatar" class="img-circle" width="64" height="64" />
        </div>
        </div>
        <div class="modal-footer">
          <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                 <input type="hidden" name="image_id" value="<?php echo $res->image_id;?>" />
              <input type="submit" id="submit" class="btn btn-sm btn-primary" name="submit"  value="Update"/>
              
              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </form>
      </div>
</div>
</div>
