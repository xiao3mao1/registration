<?php
include "../functions_bd.php";
initSession();
$tel=$_POST['tel'];
$pass=$_POST['pass'];
$email=$_POST['email'];
//echo "jjjj".check_abiturient($tel);

if (check_abiturient($tel, $pass))
{
	$_SESSION['tel']=$tel;
	$_SESSION['pass']=$pass;
	$_SESSION['email']=$email;
	$_SESSION['error_auth']=false;
	header ("Location: ../prof.php?error=0");

	
}
else {$_SESSION['error_auth']=true;
header ("Location: ../index.php?error=1");}
?>