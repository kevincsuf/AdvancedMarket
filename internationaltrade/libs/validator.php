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
	  public function add_rule_to_field($field_name,$field_rule)
	 {
		 $rule_name = $field_rule[0];    // field rule is an array which has two elements for first name field in register.php
		 
		 switch($rule_name)
		 {
			 case 'min-length':
				if(strlen($_POST[$field_name])< $field_rule[1])
				{
					$this->add_error_to_field($field_name,ucwords($field_name). "cannot be less than {$field_rule[1]} in length");
				}
			 break;
			 
			 case 'empty':
				if(strlen($_POST[$field_name])==0)
				{
					$this -> add_error_to_field($field_name,ucwords($field_name). "{$field_rule[0]} cannot be  empty");
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
				 //echo "<div class= 'error left-align' id='err-email'>{$field_error} </div>";
				 echo "<p class = 'error'>{$field_error} </p>";
			 }
		 }
	 }
 }


?>