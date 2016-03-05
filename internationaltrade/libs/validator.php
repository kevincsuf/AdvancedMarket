<?php
 
 class validator
 {
	 // for form field names
	 private $fields = array();
	 
	 // to store the errors of form fields
	 private $field_errors =  array();
	 
	 private $form_is_valid = true;
	 
	 public function add_field($field_name)
	 {
		 $this-> fields[]= $field_name;
		 
		 //associative array for errors
		 $this -> field_errors[$field_name] = array();
	 }
	  public function add_rule_to_field($field_name, $field_rule, $field_display_name)
	 {
		 $rule_name = $field_rule[0];    // field rule is an array which has two elements for first name field in register.php
		 
		 switch($rule_name)
		 {
			 case 'email':
				 if(!filter_var($_POST[$field_name], FILTER_VALIDATE_EMAIL)) {
					 $this->add_error_to_field($field_name, "Please enter valid email address.");
				 }
                 break;

			 case 'min-length':
				if(strlen($_POST[$field_name]) < $field_rule[1]) {
					$this->add_error_to_field($field_name, ucwords($field_display_name)." cannot be less than {$field_rule[1]} in length.");
				}
			    break;
			 
			 case 'empty':
				if(strlen($_POST[$field_name]) == 0) {
					$this->add_error_to_field($field_name, ucwords($field_display_name)." cannot be empty.");
				}
			    break;

             case 'pwd-not-match-seller':
                 if($_POST['seller_pwd'] != $_POST['seller_pwd_repeat']) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." is not identical.");
                 }
                 break;

             case 'pwd-not-match-buyer':
                 if($_POST['buyer_pwd'] != $_POST['buyer_pwd_repeat']) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." is not identical.");
                 }
                 break;

             case 'letters-only':
                 if (!preg_match("/^[a-zA-Z]*$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." allows only alphabets.");
                 }
                 break;

             case 'numbers-only':
                 if (!preg_match("/^[0-9]*$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." allows only numbers.");
                 }
                 break;
			 
			 default:
			 
			    break;
		 }
		 		 
	 }
	 
	private function add_error_to_field($field_name, $error_message)
	{
		 $this->form_is_valid = false;  // sets the form as not valid
		 $this->field_errors[$field_name][] = $error_message;
	}
	 
	public function form_valid()
	{
		return $this-> form_is_valid;
	}
	
	 public function out_field_error($field_name)
	 {
		 if(isset($this->field_errors[$field_name]))
		 {
			 foreach($this->field_errors[$field_name] as $field_error)
			 {
                 $echo_message = "<div class=\"warning left-align\" id=\"err_".$field_name."\"><p>".$field_error."</p></div>";
                 echo $echo_message;
			 }
		 }
	 }
 }


?>