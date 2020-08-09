<?php
include "../functions_bd.php";
initSession();
$tel=$_POST['tel'];

$abi=get_abiturient_by_tel($tel);

$pass=$abi['pass'];

$to      = $abi['email'];
$subject = 'Восстановление пароля';
$message ="Ваш логин: $tel"."\r\n"."Ваш пароль: $pass";
$headers = 'From: priem@donampa.ru' . "\r\n" .
    'Reply-To: priem@donampa.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



header ("Location: ../index.php?error=0");
?>