<?php
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$this->load->view('elements/profilehead');
$condition=array('user_id'=>$userId);
$userCategory = $this->common->userRegisterCategory($condition);
$userStates= $this->common->userRegisterstate($condition);
//$condition=array("user_id"=>$this->session->userdata('UserId'));
$checkCredits = $this->common->CheckuserCredits($condition);
//echo $userCategory->data;
//echo $userCategory->datasub;

//echo $this->db->last_query();
?>
=
<div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
		<!-- inr left content start -->
        <?php
		$this->load->view('elements/leftlead');
		?>
      <!-- inr left content end -->
      <!-- inr right content start -->
      <div class="right_content" style="margin-top:0;">
      	<div class="pd preference_box">
        <div class=" clearfix">
        <h3 class="fl">Manage Buy Lead Product Preference<br><span>No. of Product Categories Subscribed: 14</span></h3>
        <span><a href="#" class="send_sms fr">Add More Categories</a></span>
        </div>
        
        
            <div class="preference clearfix">
            <div class="preference_top clearfix">
            <span class="fl">Product Categories</span>
            </div>
            
            <div class="preference_list_left">
<ul>
<li>ASTM Fasteners <input type="checkbox" name="checkbox" value="ASTM Fasteners" id="checkbox" class="fr chkbox" /></li>	
<li>Aluminium Name Badge <input type="checkbox" name="checkbox" value="Aluminium Name Badge" id="checkbox" class="fr chkbox" /></li>
<li>Cost Negotiation Service <input type="checkbox" name="checkbox" value="Cost Negotiation Service" id="checkbox" class="fr chkbox" /></li>
<li>Custom Advisory Service <input type="checkbox" name="checkbox" value="Custom Advisory Service" id="checkbox" class="fr chkbox" /></li>
<li>Custom Clearance Documentation Services <input type="checkbox" name="checkbox" value="Custom Clearance Documentation Services" id="checkbox" class="fr chkbox" /></li>
<li>Custom Clearing Agent <input type="checkbox" name="checkbox" value="Custom Clearing Agent" id="checkbox" class="fr chkbox" /></li>
<li>Dance Floor Light <input type="checkbox" name="checkbox" value="Dance Floor Light" id="checkbox" class="fr chkbox" /></li>
<li>Export Clearance <input type="checkbox" name="checkbox" value="Export Clearance" id="checkbox" class="fr chkbox" /></li>
<li>Freight Broker Services <input type="checkbox" name="checkbox" value="Freight Broker Services" id="checkbox" class="fr chkbox" /></li>
<li>Freight Negotiation Services <input type="checkbox" name="checkbox" value="Freight Negotiation Services" id="checkbox" class="fr chkbox" /></li>
<li>In-House Custom Clearance <input type="checkbox" name="checkbox" value="In-House Custom Clearance" id="checkbox" class="fr chkbox" /></li>
<li>Indenting Agent Service <input type="checkbox" name="checkbox" value="Indenting Agent Service" id="checkbox" class="fr chkbox" /></li>
<li>Octroi Clearance <input type="checkbox" name="checkbox" value="Octroi Clearance" id="checkbox" class="fr chkbox" /></li>
<li>Sea Customs Clearance <input type="checkbox" name="checkbox" value="Sea Customs Clearance" id="checkbox" class="fr chkbox" /></li>
</ul>
            </div>
            
            <div class="preference_list_right">
<!--<ul>
<li>ASTM Fasteners</li>
<li>Aluminium Name Badge</li>
<li>Cost Negotiation Service</li>
<li>Custom Advisory Service</li>
<li>Custom Clearance Documentation Services</li>
</ul>-->
            </div>
            
            </div>
        </div>
      <!-- inr right content end -->
      
      
     
    </div>

  </div>