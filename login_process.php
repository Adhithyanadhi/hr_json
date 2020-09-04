<?php
if($_POST['name'] == "admin" && $_POST['password'] == "password"){
	header("Location: admin.html");
}else{
	echo "Invalid name or password";
}