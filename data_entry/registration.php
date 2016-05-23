<?php
session_start();
include("config.php");
if($_SESSION['userid']=='')
{
	header("location:index.php");
	}
$admin_name=mysql_query("select * from `tb_register` order by Name");
if(isset($_POST['Submit']))
{
	$logo=str_replace(' ','',$_FILES['logo']['name']);
	$reg=mysql_query("insert into tb_registration set category='".$_POST['category']."',subcategory='".$_POST['subcategory']."',name='".$_POST['name']."',company_name='".$_POST['company']."',description='".$_POST['description']."',email='".$_POST['email']."',website='".$_POST['website']."',phon='".$_POST['phone']."',mobile_number='".$_POST['mobile']."',fax_number='".$_POST['fax']."',country='".$_POST['country']."',state='".$_POST['state']."',city='".$_POST['city']."',address='".$_POST['address']."',image='".$logo."',admin_name='".$_POST['adminName']."',add_date=now()");
  $id=mysql_insert_id();
  $folder='documents/'.$id;
 if(!is_dir($folder))
	{
			mkdir($folder);
			}
	if($logo!='')
		{
				move_uploaded_file(str_replace(' ','',$_FILES["logo"]["tmp_name"]),$folder."/" .$logo);
			}
	if($reg)
	{
	$_SESSION['manish']="Insert Sucessfully...";
	header("location:registration.php");
	exit;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Sign Up Form by PremiumFreeibes.eu</title>
	<!---------- CSS ------------>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
    <script type="text/javascript" src="js/jquery-latest.js"></script>
    <script>
$(document).ready(function(){
$("#category").change(function()
{
	var id=$(this).val();
    $.post('return.php',{'catValue':id,"part":"Category"},function(data){
		$('#subcategory').html(data);
	});
});
$("#country").change(function(){
	var country=$(this).val();
		 $.post('return.php',{'country':country,"part":"Country"},function(data){
		 
		$('#state').html(data); 
		});
});
$(".State").change(function(){
	var state=$(this).val();
	$.post('return.php',{'state':state,"part":"State"},function(data){
		//$("#city").html(data);
	});
});
	
    });
</script>
<style>
.success {
    background-color: #DFF2BF;
    background-image: url("img/success.png");
    color: #4F8A10;
}
.success, .warning, .errormsgbox{
    background-position: 10px center;
    background-repeat: no-repeat;
    border: 1px solid;
    font-weight: bold;
    margin: 0 auto;
    padding: 10px 5px 10px 50px;
    width: 450px;
}
.errormsgbox {
    background-color: #FFBABA;
    background-image: url("img/error.png");
    color: #D8000C;
}
</style>
</head>
<body>
<div id="loader">
<img src="images/ajaxloader.gif" height="5" />
</div>
    <div align="right" style="width:100px; margin-left:800px"><a href="logout.php"><img src="images/logout-button-over.png" height="40"/></a></div>
     <?php if(isset($_SESSION['manish'])) { ?>
    		<div class="success">
            		<h5>Insert Sucessfully..</h5>
            </div>
	<?php } unset($_SESSION['manish']);?>
    <div id="signup-form">
        <div id="signup-inner">
        <form name="" action="" method="post" enctype="multipart/form-data">
        	<div class="clearfix f" id="header">
                <p>
                <label for="name">Category</label>
               <select name="category" class="select" id="category">
               <option value="">-Select Category-</option>
              <?php
			   $cate=mysql_query("select * from tb_subcategory group by category_id");
			   while($fetchdata=mysql_fetch_array($cate)){
				echo "<option value='".$fetchdata['category_id']."'>".$fetchdata['category_id']."</option>";   
			   }
			  ?>
               </select>
                </p>
                <p>
                <label for="name">Subcategory</label>
				<select name="subcategory" class="select" id="subcategory">
                <option value="">-Select Subcategory-</option></select>
                </p>
                <p>
                <label for="name">Contact Person *</label>
                <input id="name" type="text" name="name"  value="" />
                </p>
                <p>
                <label for="company">Company Name</label>
                <input id="company" type="text" name="company" value="" />
                </p>
                <p>
                <label for="company">Buissness Description</label>
                <input id="company" type="text" name="description" value="" />
                </p>
                <p>
                <label for="email">Email *</label>
                <input id="email" type="text" name="email" value="" />
                </p>
                
                <p>
                <label for="website">Website</label>
                <input id="website" type="text" name="website" value="" />
                </p>
                
                <p>
                <label for="phone">Phone Number</label>
                <input id="phone" type="text" name="phone" value="" />
                </p>
                 <p>
                <label for="phone">Mobile Number</label>
                <input id="phone" type="text" name="mobile" value="" />
                </p>
                 <p>
                <label for="phone">Fax Number</label>
                <input id="phone" type="text" name="fax" value="" />
                </p>
                
                <p>
                <label for="country">Country</label>
                <select name="country" class="select" id="country">
                <option value="">-Select Country-</option>
                <?php
				 $Countr=mysql_query("select * from tb_country group by country");
				 while($fetchCountry=mysql_fetch_array($Countr))
				 {
					 echo "<option value='".$fetchCountry['country']."'>".$fetchCountry['country']."</option>";
					 }
				?>
                </select>
                </p>
               <!-- id=state-->
                <p>
                <label for="state">State</label>
                <select name="state" id="state" class="select State">
                <option value="">-Select State-</option>
                <?php $query=mysql_query("select * from tbl_city-old group by state_id order by state_id");
				
				while($fetQuery=mysql_fetch_array($query)){
					
					echo "<option value='$fetQuery[state_id]'>".$fetQuery['state_id']."</option>";
					
					}
				?>
                </select>
                </p>
               <!-- id=city-->
                <!--<p>
                <label for="city">City</label>
                <select name="city" class="select" id="city">
                <option value="">-Select City-</option>
                </select>
                </p>-->
                
                <p>
                <label for="profile">Address</label>
                <textarea name="address" id="profile" cols="30" rows="10"></textarea>
                </p>
                
                <p>
                <label for="image">Logo</label>
                <input type="file" name="logo" />
                </p>
                
                 <p>
                <label for="image">Admin Name</label>
                <select name="adminName" class="select">
                <option value="">-Select Admin Name-</option>
                <?php 
					while($fetcAdmin=mysql_fetch_array($admin_name))
					{
						echo "<option value='$fetcAdmin[Name]'>".$fetcAdmin['Name']."</option>";
						}
				?>
                </select>
                </p>
                <p>

<!--                <button class="submit" type="submit" id="Register">Register</button>
-->                <input type="submit" name="Submit" value="Register" />
                </p>
                
 </div>
 </form>
 </div>
 </div>
</body>
</html>
