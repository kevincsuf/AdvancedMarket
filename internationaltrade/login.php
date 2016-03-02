<!-- Author: Yongseok Kim
	Date: 02/26/2016 */ -->

<?php
include "login_lib.php";

// login form check
if(isset($_POST['login_exe']) == "login") {
    if (!$_POST['login_id'])
        Error("Check ID!");
    else {
        if (!$_POST['login_pwd'])
            Error("Check password!");
        else {
            if (!CheckLogin($_POST['login_id'], $_POST['login_pwd']))
                Error ("Check ID or password!");
            else {
                // Create a cookie for login session
                //SetCookie("TempLogin",$config_login_pwd,0,"/");
                // Go to the first page of after-login
                //echo "<meta http-equiv='refresh' content='0; url=./xxx.php'>";
                Error ("Logged in successfully!");
            }
        }
    }
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="" />
	<!--meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /-->

	<!--meta name="keyword" content="" /-->
	<!--meta name="description" content="" /-->
	<meta name="copyright" content="" />
	<meta name="distribution" content="Global" />

	<title>Advanced Group Buying &gt; Log in</title>

	<!--link rel="stylesheet" href="" type="text/css" /-->

    <style type="text/css">
    	body { background: #b7b7c0;}
    </style>
</head>

<body class="login" onload="document.loginform.user_id.focus();">

	<div id="login">
		<h1>Log in</h1>
		<form name="loginform" id="loginform" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <p>
                <label>ID<br /><input type="text" name="login_id" id="user_id" class="input" value="" size="20" tabindex="20" /></label>
            </p>
            <p>
				<label>Password<br /><input type="password" name="login_pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
			</p>
			<p class="submit">
				<input type="hidden" name="login_exe" value="login" />
				<input type="submit" name="login-submit" id="login-submit" class="" value="Log in" tabindex="100" />
			</p>
		</form>
	</div><!--end of login-->

</body>

</html>
