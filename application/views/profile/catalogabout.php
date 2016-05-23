<?php
$condition=array("company_id"=>$comnayID);
$conditionAnother=array("tbl_company_details.company_id"=>$comnayID);
$conditionContent=array("tbl_company_details.company_id"=>$comnayID,"feature_for"=>"profile");
$companyDetails = $this->common->companyDetails($condition);
$companyDisplayContent=$this->common->companyDataDisplayContent($conditionContent);
?>
<div class="catalog_box clearfix">
<div class="catalog_top">

 <?php

$this->load->view('elements/ctaloghead.php');
?>


<div class="catalog_content clearfix">
<?php

$this->load->view('elements/leftbar.php');
?>

<!-- catalog right start -->
<div class="catalog_right">
<div class="pd">
<?php
if($companyDisplayContent=='')
{
	echo "Uploade Profile Description To make Your Product Effective And Papular";
}
else
{
foreach($companyDisplayContent as $companyContent)
	{
		?>
        <li>
        	<div class="box1">
            	<h3 class="inrheading"><?php echo $companyContent->feature_for;?></h3>
                <?php
				if($companyContent->display_image!='')
				{
					?>
					<img src="<?php echo WEBROOT_PATH_sell.''.$companyContent->display_image;?>" class="pro_img mr">
                    <?php
				}
				?>
                
<p><?php echo $companyContent->feature_description;?></p>
                
            </div>
        </li>
		<?php }} ?>
</div>
</div>
<!-- catalog right end -->


</div>

        
</div>





</div>