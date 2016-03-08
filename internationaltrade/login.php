
<html>

    <head>
        <title>Advanced Marketing123456 &gt; Log in</title>
        <?php include "_incl_header.php";?>
    </head>

	<body>
        <?php include "_incl_navbar.php";?>

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
                        <form name="loginform" id="loginform" action="login_check.php" method="post">
                            <div class="control-group">
                                <div class="controls">
                                    <input class="span5" type="text" id="user_id" placeholder="ID" name="login_id" />
                                    <input class="span5" type="password" id="user_pass" placeholder="Password" name="login_pwd" />
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

	   <?php include "_incl_footer.php";?>
	</body>

</html>
