<?php

require_once("./libs/core/init.php");

if($_POST) {
    require_once("./libs/login_lib.php");

    $login = new Login($_POST['login_id'],md5($_POST['login_pwd']));

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
                    $message = "Logged in as a ".$login->member_type;
                    $login->warning($message);

                    $_SESSION["ukey"] = $login->user_key;
                    $_SESSION["uid"] = $login->id;
                    $_SESSION["uname"] = $login->name;
                    $_SESSION["utype"] = $login->member_type;

                    // Go to the first page of Seller
                    if ($login->member_type == "seller") {
                        $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./seller_view.php\");</script>";
                        echo $echo_html;
                    }
                    else if ($login->member_type == "buyer") {
                        $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./buyer_view.php\");</script>";
                        echo $echo_html;
                    }
                }
            }
        }
    }
}


?>



<html>

    <head>
        <title>Advanced Marketing123456 &gt; Log in</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>

        <!-- Login section starts -->
        <div id="contact" class="contact">
            <div class="section secondary-section">

                <div class="container">
                    <div class="title">
                        <h2>Login</h2>
                    </div>
                </div>

                <div class="container">
                    <div class="span5 contact-form centered">
                        <form name="loginform" id="loginform" method = "post" action= "<?php echo $_SERVER["PHP_SELF"];?>">
                            <div class="control-group">
                                <div class="controls">
                                    <input class="span5" type="text" id="user_id" placeholder="ID" name="login_id" required />
                                    <input class="span5" type="password" id="user_pass" placeholder="Password" name="login_pwd" required />
                                </div>
                            </div>

                            <div class="control-group">
								<div class="controls">
                                    <input type="hidden" name="login_exe" value="login" />
                                    <button id="login-submit" class="message-btn">Submit</button>
								</div>
							</div>
                		</form>

                    </div>
                </div>

            </div>
        </div>

	   <?php include "libs/_incl_footer.php";?>
	</body>

</html>
