<?php
$userId=$this->session->userdata('UserId'); 
?>
<div class="leftside">
    	<div class="benefits">
<h3>Enquiries</h3>
<ul>
<li><a href="<?php echo SITE_URL.'user/useraccount/inbox'?>" class="inbox">Inbox</a>
<span class="countmail">
<?php 
$inboccondition=array("tbl_company_details.user_id"=>$userId,"tbl_products_enqiry.status"=>'Pending');
$inboxstatus = $this->common->checkInbox($inboccondition);
//echo $this->db->last_query();
if($inboxstatus>0)
{
	echo $inboxstatus;
}
?>
</span>
</li>
<li><a href="<?php echo SITE_URL.'user/useraccount/sentbox'?>" class="sent">Sent Box</a></li>
<li><a href="<?php echo SITE_URL.'user/useraccount/junk'?>" class="junk">Junk</a></li>
<li><a href="<?php echo SITE_URL.'user/useraccount/trash'?>" class="trash">Trash</a></li>
<!--<li><a href="#" class="add_book">Address Book</a></li>-->
</ul>
        </div>
        
        <div class="satisfied">
        <h4>You may also like to</h4>
			<ul class="left_list2">
                  <li><a href="#">View Latest Buy Leads</a></li>
                  <li><a href="#">Add Products / Offers</a></li>
                </ul>
        </div>
    </div>