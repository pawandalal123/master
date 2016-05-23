<?php 
if($this->session->userdata('UserId')=='')
{
	redirect(SITE_URL);
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$conditionarray=array("company_id"=>3);
$companyHomeContent=$this->common->companyHomeContent($conditionarray);
$UsercompnayList=$this->common->usercompanyDetails($condition);
$this->load->view('elements/profilehead');
//echo $this->db->last_query();
?>
  <!-- Inner Navigation End -->
      <div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
        <div class="lhsContent cont-lft">
                <!-- ads box start -->
<div class="leftside">
    	<div class="benefits">
        <h3>Company Profile</h3>
        <div class="con_pro_m">
</div>
<?php
$this->load->view('elements/left-nav.php');
?>
        </div>
        
        <div class="satisfied">
        <h4>You may also like to</h4>
			<ul class="left_list2">
                  <li><a href="#">View Latest Buy Leads</a></li>
                  <li><a href="#">Add Products / Offers</a></li>
                </ul>
        </div>
    </div>
<!-- ads box end -->
        <div class="floatfix"></div>
      </div>
      <!-- inr left content end -->
      <!-- inr right content start -->
      <div class="right_content" style="margin-top:0;">
      <h3>Home Page</h3>
      <div class="grn_box">Add Home Page details to your Online Catalog:</div>
      <div class="box_bdr">
      
       
         
        <form id="form1" name="example" action="<?php echo SITE_URL?>user/homecontent" method="post">
        <div class="cdfield">
<label>Select Company.</label>
 <select name="company_id" class="companyhomecontent"  >
 <option value="">[SELCET]</option>
 <?php
 foreach($UsercompnayList as $ListCompany)
 {
     echo '<option value="'.$ListCompany->company_id.'">'.$ListCompany->company_name.'</option>';
 }
 ?>
        </select>
</div>
         <div class="homecontent"></div>
<br>
<input type="submit" value="Update Details" id="button" class="btn btn-blue formsavehome" disabled="disabled" />
</form>
        
      </div>
     </div>
      <!-- inr right content end -->
      
      
     
    </div>
    
    
    
    
  