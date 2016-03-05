<?php

class Login {

    private $id;
    private $pwd;
    public $member_type;

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
        $db_pwd_seller = "12";
        $db_pwd_buyer = "34";

        if ($db_pwd_seller == $this->pwd) {
            $this->member_type = "seller";
            return true;
        }
        else if ($db_pwd_buyer == $this->pwd) {
            $this->member_type = "buyer";
            return true;
        }
        else {
            $this->member_type = "";
            return false;
        }
    }

}

?>
