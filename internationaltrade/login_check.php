<?php

session_start();
require_once("_lib_login.php");

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
                $message = "Logged in as a ".$login->member_type;
                $login->warning($message);

                $_SESSION["uid"] = $login->id;
                $_SESSION["uname"] = $login->name;
                $_SESSION["utype"] = $login->member_type;

                // Go to the first page of Seller
                if ($login->member_type == "seller") {
                    //$echo_html = "<meta http-equiv='refresh' content='0; url=./seller_view.php?login_id=".$login->id."&login_pwd=".$login->pwd."&member_type=".$login->member_type."'>";
                    $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./seller_view.php\");</script>";
                    echo $echo_html;
                }
                else if ($login->member_type == "buyer") {
                    //$echo_html = "<meta http-equiv='refresh' content='0; url=./buyer_view.php?login_id=".$login->id."&login_pwd=".$login->pwd."&member_type=".$login->member_type."'>";
                    $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./buyer_view.php\");</script>";
                    echo $echo_html;
                }
            }
        }
    }
}

?>
