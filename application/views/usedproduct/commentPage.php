<?php  $p_ay=explode('/',$_SERVER['REQUEST_URI']);
            $pro_id=$p_ay[4];?>

<div class="col-sm-9 content-main">
  <!-- One of each of the following for entries perhaps -->
  <div class="row profile">
   <div class="col-sm-4">
      <div class="box no-padding">
        <h1 class="blue_col"><?php echo $rows->name;?></h1>
        <div class="list-group">
          <div class="list-group-item">
            <div class="row">
              <div class="col-sm-7 number"> 
              <span data-votes-id="<?php echo $rows->user_id;?>" id="<?php echo $rows->user_id;?>_upvote_result">
			  <?php echo $votes->vcount;?></span> </div>
              <div class="col-sm-4 description"> Votes </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="row">
              <div class="col-sm-5 number"><span>#
               <?php $rnk_val="";
			   if(count($rank) >0){
			  foreach($rank as $rnk){
			  if($rnk->user_id == $rows->user_id){
			  $rnk_val=$rnk->rank;
			  }
			  }
			  } 
			  echo $rnk_val;?></span> </div>
              <div class="col-sm-7 description">  &nbsp;&nbsp;<a href="<?php echo SITE_URL.'selfi/top100';?>">Top BestSelfie</a> </div>
            </div>
          </div>
          <div class="list-group-item no-padding">
            <div class="row">
              <div class="col-sm-12"> 
             
               <a rel="<?php echo $rows->user_id;?>" class="btn btn-warning btn-vote" id="<?php echo $rows->user_id;?>_upvote" href="#">
                   <span class="glyphicon glyphicon-thumbs-up"></span> Vote me! </a>
              </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="row">
              <div class="col-sm-12">
                <p class="user-description"><?php echo $rows->details;?> </p>
              </div>
            </div>
          </div>
          <div class="list-group-item report">
            <div class="row">
           
              <div class="col-sm-12" style="text-align: center;"> 
              <a href="#" class="btn-rept" data-toggle="tooltip" data-placement="top" title="Administrator   will  see the report ,you sent for this selfie" id="<?php echo $pro_id;?>"> Report</a> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box no-padding share">
        <div class="row">
          <div class="col-sm-12">
            <h3>Share this selfie</h3>
          
             <div style="padding: 10px;" class="addthis_sharing_toolbox" data-url="<?php echo SITE_URL.'selfi/commentPage/'.$pro_id;?>" data-title="BestSelfie.ro - Argenti Radu"><div id="atstbx" class="at-share-tbx-element addthis_32x32_style addthis-smartlayers animated at4-show"><a class="at-share-btn at-svc-facebook"><span class="at300bs at15nc at15t_facebook" title="Facebook"></span></a><a class="at-share-btn at-svc-google_plusone_share"><span class="at300bs at15nc at15t_google_plusone_share" title="Google+"></span></a><a class="at-share-btn at-svc-email"><span class="at300bs at15nc at15t_email" title="Email"></span></a><a class="at-share-btn at-svc-reddit"><span class="at300bs at15nc at15t_reddit" title="Reddit"></span></a><a class="at-share-btn at-svc-twitter"><span class="at300bs at15nc at15t_twitter" title="Twitter"></span></a><a class="at-share-btn at-svc-tumblr"><span class="at300bs at15nc at15t_tumblr" title="Tumblr"></span></a></div></div>
             
          </div>
        </div>
         <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50e696a378943624"></script>
      </div>
      
      
       <!--alert box-->
   <div role="dialog" tabindex="-1" class="bootbox modal fade bootbox-alert in dialogAlertTop100" style="display: none;" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button" style="margin-top: -10px;">X</button><div class="bootbox-body"><div class="alert alert-danger">
      <p style="font-size:18px; font-weight:600;color:#900; line-height:35px;">Re-voting allowed on an interval of 1 hrs only ? .</p>
      </div></div></div><div class="modal-footer">
      <button class="btn btn-primary" type="button" data-bb-handler="ok">include</button>
      </div></div></div></div>
  <!--alert box-->
  <div role="dialog" tabindex="-1" class="bootbox modal fade bootbox-alert in dialogAlertTop1000" style="display: none;" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button" style="margin-top: -10px;">X</button><div class="bootbox-body"><div class="alert alert-danger">
      <p style="font-size:18px; font-weight:600;color:#900; line-height:35px;">Reported successfully ! .</p>
      </div></div></div><div class="modal-footer">
      <button class="btn btn-primary" type="button" data-bb-handler="ok">include</button>
      </div></div></div></div>
      
       <div role="dialog" tabindex="-1" class="bootbox modal fade bootbox-alert in dialogAlertTop10000" style="display: none;" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button" style="margin-top: -10px;">X</button><div class="bootbox-body"><div class="alert alert-danger">
      <p style="font-size:18px; font-weight:600;color:#900; line-height:35px;">This selfie reported by you once! <br />You can report this selfie again after 15 minutes?.</p>
      </div></div></div><div class="modal-footer">
      <button class="btn btn-primary" type="button" data-bb-handler="ok">include</button>
      </div></div></div></div>
  
    </div>
    
    <div class="col-sm-8 selfie">
         <div>
        <div class="row box">
          <div class="col-sm-12">
          <?php if($rows->image!=""){?>
           <img class="img-thumbnail-profile" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>userImage/<?php echo $rows->image;?>">
           <?php }else{?>
           <img class="img-thumbnail-profile" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>userImage/med-user.jpg">
          <?php  }?>
            </div>
        </div>
        <div class="row box">
                    <div class="col-sm-12">
                    <div class="fb-comments" data-href="<?php echo SITE_URL.'selfi/commentPage/'.$pro_id;?>" data-width="490" data-numposts="5" data-colorscheme="light"></div>
                  
                        
                    </div>
                </div>
      </div>
    </div>
  </div>
  
  
</div>
