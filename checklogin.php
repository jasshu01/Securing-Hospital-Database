<?php
function check_login()
{

 echo $_SESSION['login'];
if(strlen($_SESSION['login'])==0)
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="admin.html";		
		$_SESSION["login"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>