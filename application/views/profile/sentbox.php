<?php
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$this->load->view('elements/profilehead');
?>
<div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
                <!-- ads box start -->
<?php
$this->load->view('elements/enquiry-left'); 
?>
<!-- ads box end -->
        <div class="floatfix"></div>
      </div>
      <div class="right_content" style="margin-top:0px;">
      	<div id="inr_profile">       
              <div class="seller_tool_box pd">
              <h3 class="mb">Inbox</h3>
             <div class="inbox-box">
             <div class="example-5">
<ul>
<?php for($i=date('Y'); $i>=2010; $i--)
{ ?>
    <li><a href="#<?php echo $i;?>"><?php echo $i;?></a></li>
      <?php } ?>
</ul>
<?php for($i=date('Y'); $i>=2010; $i--)
{ ?>
			<div name="#<?php echo $i;?>">
           		<div class="tab1">
                <?php 
				$condition=array("YEAR(LEFT(tbl_products_enqiry.DATE,10))"=>$i,"company_details.user_id"=>$userId,"tbl_products_enqiry.status"=>'sentreply');
				$userinboxData=$this->common->userenquiryData($condition,false);
				//echo $this->db->last_query();
				if($userinboxData==0)
				{
					echo "There are no messages in your Inbox  for this year";
				}
				else
				{
				?>
                	<div class="tab-inr">
                    	<?php
						$this->load->view('elements/enquiry-option'); 
						?>
                        <!-- tab inner bottom -->
                        	<div class="tab-inr-bottom">
                            	<div class="list-detail-top clearfix">
                            	<ul class="ullist2 clearfix">
                                <li class="chk"><input type="checkbox" name="checkbox" id="checkbox"  class="selectallenquiery"/></li>
                                <li class="type">Type</li>
                                <li class="country">Country</li>
                                <li class="sender">Sender</li>
                                <li class="subject">Subject</li>
                                <li class="date">Date</li>
                                </ul>
                                </div>
              <?php 

			  $j=1;
			  foreach($userinboxData as $enquieryData) 
			  {?>
                               <div class="listbox<?php echo $enquieryData->id;?>">

							<div class="list-details clearfix" id="<?php echo $j;?>">
                            <ul class="ullist3">
                                <li class="chk"><input type="checkbox" name="checkbox" class="checkBoxClass"  id="<?php echo $enquieryData->id;?>"/></li>
                                <li class="type"><span><?PHP echo $enquieryData->network?></span></li>
                                <li class="country"><img src="<?php echo WEBROOT_PATH_IMAGES; ?>in_flag.png"></li>
                                <li class="sender"><?php echo ucwords ($enquieryData->name);?></li>
                                <li class="subject"><?php echo substr($enquieryData->message,0,20);?></li>
                                <li class="date"><?php echo date("F j, Y",strtotime($enquieryData->date));?></li>
                              </ul>
                               <input name="submit" id="<?php echo $j;?>" value="View" class="replybtn2" type="submit"  />
                            </div>                            <!-- show box -->
                             
                          <div class="tab-inr-bottom showbox" id="tab-inr-bottom<?php echo $j;?>" style="display:none;">
                          	<div class="showbox_contact">
                            	<ul>
                            	<li class="person"><?php echo ucwords ($enquieryData->name);?></li>
                                <li class="email"><?php echo $enquieryData->email?></li>
                                <li class="mobile"><?php echo $enquieryData->mobile?></li>
                                 <li class="address">Gurgaon Haryana, India</li>
                                </ul>
                            </div>
                         
                            
                            <!-- sender requirement -->
                            <div class="sender_reply">
                            	<div class="sender_reply_top">
                                	<div class="reply_top clearfix">
                                    <p class="fl fs16">Sender's Requirement Details</p>
                                    </div>
                                    
                                </div>
                                <div class="reply_txt pd">
                                   <p><strong><?php echo ucwords ($enquieryData->company_name.'('.$enquieryData->bussiness_nature.')');?> Business Enquiry Through IndiaBizSaath.com</strong></p>
                            		<p><?php echo $enquieryData->message;?></p>
                                    </div>
                                
                            </div>
                            <!-- sender requirement end -->
                            
                            
                            <!-- sender form start -->
                            <div class="showbox_form">
                            
                            <!-- reply box start -->
                            <?php
							$conenquiry=array("enquiry_id"=>$enquieryData->id);
							$checkReplyStatus=$this->common->checkreply($conenquiry);
							if($checkReplyStatus==0)
							{
							}
							else
							{
								$replyId=1;
								foreach($checkReplyStatus as $checkReplyStatus)
								{
							?>
                                    <div class="sender_reply clearfix">
                            	    <div class="sender_reply_top">
                                	<div class="reply_top clearfix">
                                    <p class="fl"><span><strong><?php echo ucwords($this->session->userdata('DisplayName'));?></strong></span> to <?php echo $enquieryData->name;?></p>
                                     <p class="fr">
                                       <a href="javascript:;" class="show_detail" id="show-<?php echo $replyId;?>">Show Details</a>
                                       <a href="javascript:;" class="hide_detail" id="hide-<?php echo $replyId;?>" style="display:none;">Hide Details</a> 
                                       <?php echo date("F j, Y",strtotime($checkReplyStatus->reply_date));?>
                                       <img src="<?PHP echo WEBROOT_PATH_IMAGES; ?>attachment3.png" width="14" class="ml"></p>
                                       </div>
                                       <div class="reply_details clearfix hide" id="reply_details<?php echo $replyId;?>">
                                        <ul class="liststyle">
                                        <li>To:  Mr. <?php echo ucwords($enquieryData->name);?> &lt;<?php echo  $enquieryData->email?>&gt;</li>
                                        <li>Date:  <?php echo date("F j, Y",strtotime($checkReplyStatus->reply_date));?></li>
                                        <li>Subject:  <?php echo ucwords ($enquieryData->company_name.'('.$enquieryData->bussiness_nature.')');?> Business Enquiry Through Indiabizzsaath.com</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                                <div class="reply_txt pd">
                                <?php echo $checkReplyStatus->reply_message;?>  
                                <?php
								if($checkReplyStatus->attach_file!='')
								{
								?>                              
                                <div class="reply_attachment clearfix">
                                <div class="fl mr"><strong>file.jpg</strong></div>
                                <div class="fl mr">(118.73 KB)</div>
                                <div class="fl mr"><a href="#" class="view">View</a></div>
                                <div class="fl mr"><a href="#" class="download">Download</a></div>
                                </div>
                                <?php
								}
								?>
                                </div>
                            </div>
                            <?php
						$replyId++;	} }
							?>
                            </div>
                            <!-- sender form end -->
                          </div>  </div>                       
                          <?php $j++; } ?>
                                                </div>
                        <!-- tab inner bottom -->
                        
                    </div>
                    <?php
				}
					?>
                
                </div>
            </div>
            
<?php } ?>
			
</div>
             </div>
             <!-- inbox end -->
                           </div>
        </div>
      <!-- inr right content end -->      
     
    </div>

  </div>