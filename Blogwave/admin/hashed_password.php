<?php 
$password = "Shakti$321";
$hashpassword = password_hash($password,PASSWORD_DEFAULT);
echo "Hash Password is here :".$hashpassword;
?>