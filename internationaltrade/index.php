<?php

require_once("_lib_login.php");

$message = "";

if (isset($_GET['login_id']) && isset($_GET['login_pwd'])) {
    $login = new Login($_GET['login_id'], $_GET['login_pwd']);
    $login->check_login();
    $message = "You are currently LOGGED IN as a ".strtoupper($login->member_type)." and the ID is ".$login->id;
}
else {
    $message = "You are currently LOGGED OUT";
}

?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "_incl_header.php";?>
    </head>

	<body>
        <?php include "_incl_navbar.php";?>

		<div class = "container">
			<H1>Welcome To Our Site OOOO Second open</H1>
            <p><font color="red">===== Login Test Mesage =====</font></p>
            <p><font color="red"><?php echo $message ?></font></p>
		</div>

	   <?php include "_incl_footer.php";?>
	</body>

</html>
