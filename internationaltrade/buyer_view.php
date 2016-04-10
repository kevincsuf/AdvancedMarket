<?php

require_once("./libs/core/init.php");
require_once("./libs/_incl_confirm_login.php");

$user_member_type = $_SESSION["utype"];
$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$message = "";
if (isset($_SESSION["uid"])) {
    
    $message = "You are currently LOGGED IN as a <b>".strtoupper($_SESSION["utype"])."</b>, the NAME is <b>".$_SESSION["uname"]."</b>";
}
else {
    $message = "You are currently <b>LOGGED OUT</b>";
}


?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>
			<div class = "container">
			
            
            <p><font color="blue"><?php echo $message ?></font></p>
		</div>
		<!-- Registeration section start -->
		<div id="contact" class="contact">
            <div class="section secondary-section">

                <div class="container">
                    <div class="title">
                        <h2>Welcome Buyer</h2>
						<p> you can see all your joined deals on this page  <p>
                        
                    </div>
                </div>


                <div class="container">






				</div>

            </div>
		</div>

        <?php include "libs/_incl_footer.php";?>
    </body>
</html>
