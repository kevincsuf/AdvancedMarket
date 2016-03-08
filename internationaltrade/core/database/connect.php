<?php 
$con = mysqli_connect('localhost', 'root', 'spouse_idealism_servant_literacy_airlock_revert');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_select_db($con,'advanced_mktg');

?>