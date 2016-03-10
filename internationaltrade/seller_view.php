<?php

require_once("libs/_lib_login.php");

if (isset($_GET['login_id']) && isset($_GET['login_pwd'])) {
    $login = new Login($_GET['login_id'], $_GET['login_pwd']);
    $login->check_login();
}

?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>

		<!-- Registeration section start -->
		<div id="contact" class="contact">
            <div class="section secondary-section">

                <div class="container">
                    <div class="title">
                        <h2>Welcome Seller</h2>
						<p> This page allows you to add and view deals <p>
                        <!-- <p>Some Info For Registerstion Goes Here</p>-->
                    </div>
                </div>


                <div class="container">






				</div>

            </div>
		</div>

        <?php include "libs/_incl_footer.php";?>
    </body>
</html>
