<html>
<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php
include "../functions_bd.php";
initSession();

if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
 /* $secret = '6LdMBLQZAAAAAFKdTes9BUtKejkLIm6rHdFreAbH';
  $ip = $_SERVER['REMOTE_ADDR'];
  $response = $_POST['g-recaptcha-response'];


  $url ="https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=193.108.39.226";
  

   $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
  $curlData = curl_exec($curl);
  echo $url;
$curlData = json_decode($curlData, true);


if ($curlData->success)
   {*/
//--------------------------------------
$tel=is_tel($_POST['tel']);
if ($tel['vsego']==1) header ('Location: ../enter.php?error=2');// вернуться и сказать, что такой телефон уже есть

else{

if (empty($_POST['fio']) || empty($_POST['tel']) || empty($_POST['uroven']) || empty($_POST['pers']) || empty($_POST['email']) || empty($_POST['pass']) ) header ('Location: ../enter.php?error=1');


else {$n=add_abiturient( trim($_POST['fio']), trim($_POST['tel']), $_POST['pers'], $_POST['uroven'], trim($_POST['email']), trim($_POST['pass']));


$to      = trim($_POST['email']);
$subject = 'Поступление в ГОУ ВПО "ДонАУиГС"';
$message = 'Вы успешно зарегистрировались в личном кабинете абитурента ГОУ ВПО "ДонАУиГС". Ваш логин: '.trim($_POST['tel']).'  Ваш пароль: '.trim($_POST['pass']);
$headers = 'From: priem@donampa.ru' . "\r\n" .
    'Reply-To: priem@donampa.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



	if ($n==1)
	{$_SESSION['tel']=trim($_POST['tel']);
     $_SESSION['email']=trim($_POST['email']);
     $_SESSION['pass']=trim($_POST['pass']);
	$_SESSION['error_auth']=false;}
	else $_SESSION['error_auth']=true;
	



header('Location: ../prof.php');
}
}


//--------------------------------------------

  }
  
 
 // else 
	//header('Location: ../enter.php?error=4');
//}
 else 
	header('Location: ../enter.php?error=3');
?>
</body>
</html>