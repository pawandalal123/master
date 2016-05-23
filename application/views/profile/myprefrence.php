<?php
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$userCategorySubCategory = $this->common->userCategorySubCategoryList();
$condition=array('user_id'=>$userId);
$userprefrenceId = $this->common->userprefrencelead($condition);
$this->load->view('elements/profilehead');
?>
<div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
		<!-- inr left content start -->
        <?php
		$this->load->view('elements/leftlead');
		$PrefrenceID=explode(',',$userprefrenceId->prefrence_cat_id);	
		?>
      <!-- inr left content end -->
      <!-- inr right content start -->
      <div class="right_content" style="margin-top:0;">
      	<div class="pd preference_box">
        <div class=" clearfix">
        <h3 class="fl">Manage Buy Lead Product Preference<br><span>No. of Product Categories Subscribed: <?php  echo count($PrefrenceID);?></span></h3>
        <span><a href="#" class="addmorecat send_sms fr">Add More Categories</a></span>
        </div>
        
        
            <div class="preference clearfix">
            <div class="preference_top clearfix">
            <span class="fl">Product Categories</span>
            </div>
            
            <div class="preference_list_left">
<ul>
<?PHP

foreach($userCategorySubCategory as $userCategorySubCategoryData)
{
	
	
	   foreach($PrefrenceID as $PrefrenceIDList )
	   {
		   $Listprefrence=$PrefrenceIDList;
	   }
		   if($userCategorySubCategoryData['categoryId']==$Listprefrence)
		{
			echo '<li class="remove'.$userCategorySubCategoryData['categoryId'].'">'.$userCategorySubCategoryData['CategoryName'].'
 <input type="checkbox" name="checkbox" value="'.$userCategorySubCategoryData['CategoryName'].'-'.$userCategorySubCategoryData['categoryId'].'" id="remove'.$userCategorySubCategoryData['categoryId'].'" class="fr chkbox" checked="checked"/>
 </li>';
		}
		else
		{
			echo '<li class="remove'.$userCategorySubCategoryData['categoryId'].'">'.$userCategorySubCategoryData['CategoryName'].'
 <input type="checkbox" name="checkbox" value="'.$userCategorySubCategoryData['CategoryName'].'-'.$userCategorySubCategoryData['categoryId'].'" id="remove'.$userCategorySubCategoryData['categoryId'].'" class="fr chkbox" />
 </li>';
	   }
	
} 
?>
	

</ul>
            </div>
            <div class="preference_list_right" style="display:none;">
            </div>
            
            </div>
        </div>
      <!-- inr right content end -->
      
      
     
    </div>

  </div>