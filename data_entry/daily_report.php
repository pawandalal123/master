<?php
include("config.php");
$cat=mysql_query("select * from tb_category order by category");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
  <link href="js/jsDatePick_ltr.min.css" rel="stylesheet" type="text/css" />
  <script>
  $(function() {
	$("#viewdemolist").hide();
	$("#dailyCat").change(function(){
		var dailyCat=$(this).val();
		$.post('return.php',{'CategoryDaily':dailyCat,"part":"DailyReport"},function(data){
			$("#dailSub").html(data);
		});
	});
	
	$("#Search").click(function(){
		var dailycatId=$(".Dcat").val();
		//alert(dailycatId);
		var dailySub=$(".Dsub").val();
		//alert(dailySub);
		var date=$(".datePicker").val();
		var company=$("#cmp").val();
		var admin=$("#adm").val();
		$.post('return.php',{'category':dailycatId,'subcategory':dailySub,'datePart':date,'companyName':company,'adminName':admin,"part":"demoView"},function(data){
			$("#viewdemolist").html(data);
			$("#viewdemolist").show();
		});
	});
	
	$(document).on('click','#Generate',function(data){
		alert("Hello");
		$.post('return.php',{"part":"GenertaExcel"},function(data){
			if(data==0)
			{
				alert("Sucessfully");
				}
		});
	});
	
  });
  </script>
  <script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%M-%d"
		});
		
	};
</script>
  <style type="text/css">
  td{
	  padding:2px 3px;
  }
  </style>
</head>

<body>
<table width="499" border="0" cellspacing="2" cellpadding="2" bgcolor="#3C7777">
  <tr>
    <td width="99"><select name="category" id="dailyCat" class="Dcat">
    <option value="">-Select Category-</option>
    <?php
		while($fetchCat=mysql_fetch_array($cat))
		{
			echo "<option value='$fetchCat[category]'>".$fetchCat['category']."</option>";
			}
	 ?>
    </select>
    </td>
    <td width="15"><select name="subcategory" id="dailSub" class="Dsub">
    <option value="">-Select Subcategory</option></select>
    </td>
    <td width="42"><input type="text"  size="32" class="date" id="cmp" placeholder="Company Name" /></td>
      <td width="42"><input type="text" size="32" class="date" id="adm" placeholder="Admin Name"/></td>
    <td width="42"><input type="text" name="date" size="32" class="datePicker" id="inputField" value="" /></td>
    <td width="17"><input type="button" value="Search" name="Search" id="Search" /></td>
  </table>
    </tr>
</table>
<table id="viewdemolist"></table>
</body>
</html>