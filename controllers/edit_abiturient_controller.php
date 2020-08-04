<?php
include "../functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);


$tel=is_tel_exept_abi($_POST['tel'], $abi['idabiturient']);

if ($tel['vsego']==1) header ('Location: ../prof.php?error=2');// вернуться и сказать, что такой телефон уже есть

else{

if (empty($_POST['fio']) || empty($_POST['tel']) || empty($_POST['uroven']) || empty($_POST['email']) || empty($_POST['pass']) ) header ('Location: ../prof.php?error=1');


else {$n=edit_abiturient( $_POST['id'], trim($_POST['fio']), trim($_POST['tel']), $_POST['uroven'], trim($_POST['email']), trim($_POST['pass']));

	if ($n==1)
	{$_SESSION['tel']=trim($_POST['tel']);
     $_SESSION['email']=trim($_POST['email']);
     $_SESSION['pass']=trim($_POST['pass']);
	$_SESSION['error_auth']=false;}
	else $_SESSION['error_auth']=true;
	



header('Location: ../prof.php?error=0');
}
}
?>