<?php
include "functions_bd.php";
initSession();
$error=$_GET['error'];
?>
<html>
<head>
	<title>Проверка</title>


<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script>
$(function(){
  
  $("#tel").mask("+38(099)-999-99-99");
});
</script>
</head>
<body>


	<main class='reg'>


		<div class='reg_form'>

		<?php if ($error==1) echo "<h3 style='color: red;'>Или номер телефона,или пароль неверны</h3>";



?>


 <form action="controllers/check_abiturient_controller.php" method="POST" role='form'>
 

<div class="pole" > 
<label for="tel" >Введите Ваш номер телефона:</label>
<div >
<input id="tel" type="text" name="tel" placeholder="+38(071)-111-11-11" />
</div>
</div>


<div class="pole" > 
<label for="pass" >Введите Ваш пароль:</label>
<div >
<input id="pass" type="password" name="pass" />
</div>
</div>



<button class="add_button" type="submit" name="add" >Вход</button>

</form>
<h3> Вы в первый раз на этом сайте? <a href='enter.php?error=0'>Регистрация</a></h3>
<h3>  <a href='forget_pass.php?error=0'>Забыли пароль?</a></h3>
</div>

<?//php echo $_SESSION['tel'];?>





</div>




</main>

</body>
</html>