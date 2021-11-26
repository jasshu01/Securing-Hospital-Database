<?php
session_start();
include('config.php');
$_SESSION['login']=="";
session_unset();
//session_destroy();
$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="admin.html";		
		$_SESSION["login"]="";
		header("Location: http://$host$uri/$extra");

$_SESSION['errmsg']="You have successfully logout";
?>
