<?php
include "functions_bd.php";
initSession();
$error=$_GET['error'];
?>
<html>
<head>
	<title>Забыли пароль</title>


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
	


 <form action="controllers/forget_controller.php" method="POST" role='form'>
 

<div class="pole" > 
<label for="tel" >Введите Ваш номер телефона:</label>
<div >
<input id="tel" type="text" name="tel" placeholder="+38(071)-111-11-11" />
</div>
</div>

<h3 style ='color: red;'>Пароль будет отправлен на ваш email.</h3>
<button class="add_button" type="submit" name="add" >Отправить</button>

</form>

</div>

<?//php echo $_SESSION['tel'];?>





</div>




</main>

</body>
</html>