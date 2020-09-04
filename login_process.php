<?php
if($_POST['name'] == "Hydrosphere Reserve" && $_POST['password'] == "neerindriamaiyadhuulagu"){
	header("Location: admin.html");
}else{
	echo "Invalid name or password";
}