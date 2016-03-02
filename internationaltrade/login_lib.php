<?php

// Alert message function
function Error($message) {
	echo "
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
		<script>
		window.alert (\"$message\");
		history.go(-1);
		</script>
	";
}


// Check login function
function CheckLogin($id, $pwd) {
    // Query to retrieve user password
    //$db_pwd = //select pwd from xxx_table where id=$id;
    $db_pwd = "123";

    if ($db_pwd == $pwd)
        return true;
    else
        return false;
}

?>
