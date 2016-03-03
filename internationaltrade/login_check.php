<?php

require_once("login_lib.php");
$login = new Login($_POST['login_id'], $_POST['login_pwd']);

// login form check
if(isset($_POST['login_exe']) == "login") {
    if (!$_POST['login_id'])
        $login->error("Check ID!");
    else {
        if (!$_POST['login_pwd'])
            $login->error("Check password!");
        else {
            if (!$login->check_login())
                $login->error("Check ID or password!");
            else {
                // Create a cookie for login session
                //SetCookie("TempLogin",$config_login_pwd,0,"/");
                // Go to the first page of after-login
                //echo "<meta http-equiv='refresh' content='0; url=./xxx.php'>";
                $login->error("Logged in successfully!");
            }
        }
    }
}

?>
