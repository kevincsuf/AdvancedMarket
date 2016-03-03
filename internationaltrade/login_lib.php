<?php

class Login {

    private $id;
    private $pwd;

    function __construct ($input_id, $input_pwd) {
        $this->id = $input_id;
        $this->pwd = $input_pwd;
    }

    // Getter
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    // Setter
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

    // Alert message function
    public function error($message) {
    	echo "
    		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    		<script>
    		window.alert (\"$message\");
    		history.go(-1);
    		</script>
    	";
    }

    // Check login function
    public function check_login() {
        // Query to retrieve user password
        //$db_pwd = //select pwd from xxx_table where id=$id;
        $db_pwd = "123";

        if ($db_pwd == $this->pwd)
            return true;
        else
            return false;
    }

}

?>
