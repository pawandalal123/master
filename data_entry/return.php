<?php
include("config.php");
session_start();


if($_POST['part']=='DailyReport')
{
	$daily=mysql_query("select * from tb_subcategory where category_id='".$_POST['CategoryDaily']."' order by subcategory");
	if(mysql_num_rows($daily)>0)
	 {
		while($fetcDaily=mysql_fetch_array($daily))
		  {
			  echo "<option value='$fetcDaily[subcategory]'>".$fetcDaily['subcategory']."</option>";
			  } 
		 }
		  else {
					echo "<option value=''>-No Subcategory-</option>";  
			  }
}

if($_POST['part']=='Category')
{
	$queryS=mysql_query("select * from tb_subcategory where category_id='".$_POST['catValue']."' order by subcategory");
	if(mysql_num_rows($queryS)>0)
	{
		while($fetchCat=mysql_fetch_array($queryS)){
			echo "<option value='".$fetchCat['subcategory']."'>".$fetchCat['subcategory']."</option>";
			}
		}
}

if($_POST['part']=='Country')
{
	$country=mysql_query("select * from tb_state where country_id='".$_POST['country']."'");
	if(mysql_num_rows($country)>0)
	{
		while($fCountry=mysql_fetch_array($country)){
			echo "<option value='".$fCountry['state']."'>".$fCountry['state']."</option>";
			}
	 }
}
if($_POST['part']=='State')
{
	$State=mysql_query("select * from tb_city where state_id='".$_POST['state']."' order by city");
	if(mysql_num_rows($State)>0)
	{
		while($fetchstate=mysql_fetch_array($State))
		{
			echo "<option value='".$fetchstate['city']."'>".$fetchstate['city']."</option>";
			//echo "<option value='Hyderabad'>Hyderabad</option>";
			}		
		}
	
	}

if($_POST['part']=='ExistEmail')
{
	$check=mysql_query("select * from tb_register where email='".$_POST['checkm']."'");
	if(mysql_num_rows($check)>0)
	{
		echo 0;
		}
	}
if($_POST['part']=='demoView')
{	
		//$date=str_replace('/','-',$_POST['datePart']);
		$dateReport=$_POST['datePart'];
		if($_POST['category']!='' && $_POST['subcategory']!='' && $_POST['datePart']=='' && $_POST['companyName']=='' && $_POST['adminName']=='')
		{
			//echo "select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%'";
			$query=mysql_query("select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%'");
			}
		else if($_POST['category']!='' && $_POST['subcategory']!='' && $_POST['datePart']!='' && $_POST['companyName']=='' && $_POST['adminName']=='')
		{
			// echo "select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%' and add_date='".$_POST['datePart']."'";
			$query=mysql_query("select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%' and add_date='".$_POST['datePart']."'");
			}
		else if($_POST['category']!='' && $_POST['subcategory']=='' && $_POST['datePart']!='' && $_POST['companyName']=='' && $_POST['adminName']=='')
		{
			// echo "select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%' and add_date='".$_POST['datePart']."'";
			$query=mysql_query("select * from tb_registration where category like'".$_POST['category']."%' and add_date='".$_POST['datePart']."'");
			}
		else if($_POST['category']!='' && $_POST['subcategory']=='' && $_POST['datePart']!='' && $_POST['companyName']!='' && $_POST['adminName']=='')
		{
			// echo "select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%' and add_date='".$_POST['datePart']."'";
			$query=mysql_query("select * from tb_registration where category like'".$_POST['category']."%' and company_name like '".$_POST['companyName']."'");
			}
		else if($_POST['category']=='' && $_POST['subcategory']=='' && $_POST['datePart']!='' && $_POST['companyName']=='' && $_POST['adminName']!='')
		{
			// echo "select * from tb_registration where category like'".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%' and add_date='".$_POST['datePart']."'";
			$query=mysql_query("select * from tb_registration where add_date='".$_POST['datePart']."' and admin_name like '".$_POST['adminName']."'");
			}
		
		else if($_POST['category']!='' && $_POST['subcategory']!='' && $_POST['datePart']=='' && $_POST['companyName']!='' && $_POST['adminName']=='')
		{
			$query=mysql_query("select * from tb_registration where category like'".$_POST['category']."%' and subcategory like'".$_POST['subcategory']."%' and company_name like '".$_POST['companyName']."%'");
			}
		else if($_POST['category']!='' && $_POST['subcategory']!='' && $_POST['datePart']=='' && $_POST['companyName']!='' && $_POST['adminName']=='')
		{
			$query=mysql_query("select * from tb_registration where category like '".$_POST['category']."' and subcategory like '".$_POST['subcategory']."%' and company_name like '".$_POST['companyName']."%'");
			}
		else if($_POST['category']=='' && $_POST['subcategory']=='' && $_POST['datePart']=='' && $_POST['companyName']!='' && $_POST['adminName']=='')
		{
			$query=mysql_query("select * from tb_registration where company_name like '".$_POST['companyName']."%'");
			}
		
		else if($_POST['category']=='' && $_POST['subcategory']=='' && $_POST['datePart']=='' && $_POST['companyName']=='' && $_POST['adminName']!='')
		{
			$query=mysql_query("select * from tb_registration where admin_name like '".$_POST['adminName']."%'");
			}
		
	else if($_POST['category']=='' && $_POST['subcategory']=='' && $_POST['datePart']!='' && $_POST['companyName']=='' && $_POST['adminName']=='')
		{
			//echo "select * from tb_registration where add_date='".$_POST['datePart']."'";
			$query=mysql_query("select * from tb_registration where add_date='".$_POST['datePart']."'");
			}
	else {
			$query=mysql_query("select * from tb_registration where category like '".$_POST['category']."%' and subcategory like '".$_POST['subcategory']."%' and company_name like '".$_POST['companyName']."%' and admin_name like '".$_POST['adminName']."' and add_date='".$_POST['datePart']."'");
		}
		
	?>
    <table width="960" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse; border-width:1px;" bordercolor="#408080">
  <tr bgcolor="#49ADB6">
    <td align="center" valign="middle">Category</td>
    <td align="center" valign="middle">Subactegory</td>
    <td align="center" valign="middle">Name</td>
    <td align="center" valign="middle">Company Name</td>
    <td align="center" valign="middle">Email</td>
     <td align="center" valign="middle">Website</td>
     <td align="center" valign="middle">Phone Number</td>
      <td align="center" valign="middle">Mobile Number</td>
     <td align="center" valign="middle">Fax Number</td>
     <td align="center" valign="middle">Country</td>
     <td align="center" valign="middle">State</td>
     <td align="center" valign="middle">City</td>
     <td align="center" valign="middle">Address</td>
    <td align="center" valign="middle">Admin Name</td>
    <td align="center" valign="middle">Add Date</td>
     </tr>
  <?php 
  	while($fetch=mysql_fetch_array($query))
	{
  ?>
  <tr>
    <td align="left" valign="top"><?php echo $fetch['category'];?></td>
    <td align="left" valign="top"><?php echo $fetch['subcategory'];?></td>
    <td align="left" valign="top"><?php echo $fetch['name'];?></td>
    <td align="left" valign="top"><?php echo $fetch['company_name'];?></td>
    <td align="left" valign="top"><?php echo $fetch['email'];?></td>
    <td align="left" valign="top"><?php echo $fetch['website'];?></td>
    <td align="left" valign="top"><?php echo $fetch['phon'];?></td>
    <td align="left" valign="top"><?php echo $fetch['mobile_number'];?></td>
    <td align="left" valign="top"><?php echo $fetch['fax_number'];?></td>
    <td align="left" valign="top"><?php echo $fetch['country'];?></td>
    <td align="left" valign="top"><?php echo $fetch['state'];?></td>
    <td align="left" valign="top"><?php echo $fetch['city'];?></td>
    <td align="left" valign="top"><?php echo $fetch['address'];?></td>
    <td align="left" valign="top"><?php echo $fetch['admin_name'];?></td>
    <td align="left" valign="top"><?php echo $fetch['add_date'];?></td>
  </tr>
  <?php }?>
 <table width="100%" border="0" cellpadding="2" cellspacing="2">
 <tr>
 <td align="center" valign="middle">  
 <div style=" text-align:center; margin:6px 0px;">
 <form id="form1" name="form1" method="post" action="ExportExcel.php"><label>
 <input type="text" name="dateflow" value="<?php echo $dateReport; ?>" />
 <input type="submit" name="getReport" id="getReport" style="border: solid 1px #E0451F; background:#E0451F; font-weight:bold; color:#FFF;" value="Get Report" />
 </label>
 </form></div>
 </td></tr></table>
</table>

	<?php }
?>