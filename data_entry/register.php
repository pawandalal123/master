<?php
include("config.php");
if(isset($_POST['Submit']))
{
		$Query=mysql_query("insert into tb_register set Name='".$_POST['name']."',Username='".$_POST['username']."',Email='".$_POST['email']."',Password='".md5($_POST['password'])."'");
		header("location:index.php");
		exit;
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
                    <form name="" action="" method="post">
                        <div id="register" class="animate form">
                          <h1> Sign up </h1> 
                          <p> 
                              <label for="usernamesignup" class="uname" data-icon="u">Name</label>
                            <span id="sprytextfield1">
                                    <input id="usernamesignup" name="name" type="text" />
                            <span class="textfieldRequiredMsg">Please Enter Name..</span></span></p>
                                <p> 
                               <p> 
                                  <label for="usernamesignup" class="uname" data-icon="u">Username</label>
                            <span id="sprytextfield4">
                                    <input id="usernames" name="username" type="text" />
                            <span class="textfieldRequiredMsg">Please Enter username..</span></span></p>
                               </p>
                                  <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                  <span id="sprytextfield2">
                                  <input id="email" name="email"  type="text"/>
                                  <span class="textfieldRequiredMsg">Please Enter Valid Email.</span>
                                  <span class="textfieldInvalidFormatMsg">Invalid Email Id...</span>
                                 </span></p>
                                <p> 
                                  <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                  <span id="sprytextfield3">
                                 <input id="passwordsignup" name="password"  type="password"/>
                                  <span class="textfieldRequiredMsg">Please Enter Password.</span></span></p>
                               
                                <p class="signin button"> 
									<input type="submit" value="Sign up" name="Submit"/> 
						  </p>
                                <p class="change_link">  
									Already a member ?
									<a href="index.php" class="to_register"> Go and log in </a>
								</p>
                        </div>
                       </form>
                  </div>
                </div>  
            </section>
        </div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1","none",{validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2","email",{validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3","none",{validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4","none",{validateOn:["blur"]});
</script>
</body>
</html>