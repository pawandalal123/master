<?php
session_start();
include("config.php");
error_reporting(0);
if(isset($_POST['Login']))
{
	$login=mysql_query("select * from tb_register where Username='".$_POST['username']."' and Password='".md5($_POST['password'])."'");
	if(mysql_num_rows($login)>0)
	{
		$fetch=mysql_fetch_array($login);
		$_SESSION['userid']=$fetch['id'];
		header("location:registration.php");
		exit;
		}
	  else {
		  $_SESSION['SESS_MSG']="Wrong Username Password";
		  header("location:index.php");
		  exit;
		  }
}

?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
 <form name="" action=""  method="post">                
<div id="login" class="animate form">
                                <h1>Log in</h1> 
                                <div style="color:#B70000" align="center"><?php echo $_SESSION['SESS_MSG'];unset($_SESSION['SESS_MSG']);?></div>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Username </label>
                                    <span id="sprytextfield1">
                                    <input id="username" name="username"  type="text"/>
                                    <span class="textfieldRequiredMsg">Please Enter Username.</span></span></p>
                                <p> 
                                <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                                    <span id="sprytextfield2">
                                    <input id="password" name="password"  type="password"/>
                                    <span class="textfieldRequiredMsg">Please Enter Password.</span></span></p>
                                
                                <p class="login button"> 
                                    <input type="submit" value="Login" name="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="register.php" class="to_register">Join us</a>
								</p>
                        </div>

</form>                        
						
                  </div>
                </div>  
            </section>
        </div>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1","none",{validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2","none",{validateOn:["blur"]});
    </script>
    </body>
</html>