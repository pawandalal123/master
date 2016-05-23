<?php
	include("config.php");
	$contents="id,Category,Subcategory,Name,Company Name,Description,Email,Website,Phone Number,Mobile Number,Fax Number,Country,State,City,Address,Admin Name,Date\n";
	$user_query = mysql_query('SELECT * FROM `tb_registration` ORDER BY RAND( ) LIMIT 0 , 15');
	while($rows = mysql_fetch_array($user_query))
	{
	$contents.=$rows['id'].",";
	$contents.=$rows['category'].",";
	$contents.=$rows['subcategory'].",";
	$contents.=$rows['name'].",";
	$contents.=$rows['company_name'].",";
	$contents.=$rows['description'].",";
	$contents.=$rows['email'].",";
	$contents.=$rows['website'].",";
	$contents.=$rows['phone'].",";
	$contents.=$rows['mobile_number'].",";
	$contents.=$rows['fax_number'].",";
	$contents.=$rows['country'].",";
	$contents.=$rows['state'].",";
	$contents.=$rows['city'].",";
	$contents.=$rows['address'].",";
	$contents.=$rows['admin_name'].",";
	$contents.=$rows['add_date']."\n";
	}
$contents = strip_tags($contents); 
header("Content-Disposition: attachment; filename=".date('d-m-Y').".csv");
print $contents;
?>