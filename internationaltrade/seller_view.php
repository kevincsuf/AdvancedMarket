<?php

require_once("./libs/core/init.php");
require_once("./libs/_incl_confirm_login.php");

$user_member_type = $_SESSION["utype"];
$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];

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
