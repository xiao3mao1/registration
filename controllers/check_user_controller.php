<?php
include "../functions_bd.php";
initSession();
$login=htmlspecialchars($_POST['login']);
$pass=htmlspecialchars($_POST['pass']);


if (check_user($login, $pass) ) 
{
	$_SESSION['login']=$login;
	$_SESSION['pass']=$pass;
	$_SESSION['error_auth']=false;
	
}
else $_SESSION['error_auth']=true;
header ("Location: ../index1.php");
?>