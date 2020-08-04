<?php
include "functions_bd.php";
$urovni=get_all_urovni();
$error=$_GET['error'];
initSession();

?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script>
$(function(){
  
  $("#tel").mask("+38(099)-999-99-99");
});
</script>
<title>Регистрация</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<main class='reg'>
<div class="reg_form2">

<?php if ($error==1) echo "<h2 style='color: red;'>Все поля формы должны быть заполнены!</h2>";

if ($error==2) echo "<h2 style='color: red;'>Этот телефон уже зарегистрирован в системе!</h2>";

if ($error==3) echo "<h2 style='color: red;'>Решите, пожалуйста капчу!</h2>";
?>

 <form action="controllers/add_abiturient_controller.php" method="POST" role='form'>
 <div >
 
  <div class="pole" > 
  <label for="fio" >Фамилия Имя Отчество</label>
  <div >
 <input id="fio" type="text" name="fio" required placeholder="Фамилия Имя Отчество" />
  </div> 
  </div>


<div class="pole" > 
<label for="email" >Адрес электронной почты</label>
<div >
<input id="email" type="email" required name="email" />
</div>
</div>

<div class="pole" > 
<label for="pass" >Пароль</label>
<div >
<input id="pass" type="password" required name="pass" />
</div>
</div>


<div class="pole" > 
<label for="tel" >Телефон</label>
<div >
<input id="tel" type="text" name="tel" required placeholder="+38(071)-111-11-11" />
</div>
</div>


<div class="pole" > 
<label for="uroven" >Уровень</label>
<div >
<select id='uroven' name='uroven'>
	<?php
	for($i=0;$i<count($urovni);$i++)
	{

$iduroven=$urovni[$i]['iduroven'];
$uroven=$urovni[$i]['uroven'];
echo "<option value=$iduroven>$uroven</option>";

	}

?>
</select>
</div>
</div>



<div class="check" > 
<input type='checkbox' name='pers'value='1' required> <label>Я даю согласие на обработку моих персональных данных приемной комиссией ГОУ ВПО "ДонАУиГС"  согласно закону Донецкой Народной Республики о персональных данных  № 61-IHC от 19.06.2015</label>

</div>

<!--<div class="pole" > 
<label for="polovina" >Выберите подходящую половину дня:</label>
<div >
<select id='polovina' name='polovina'>
	<option value='1'>Первая половина дня </option>
	<option value='2'>Вторая половина дня </option>
</select>
</div>
</div>
-->

<div class="g-recaptcha" data-sitekey="6LdMBLQZAAAAABTG5ctxQiyZGPP03KQolQRnpIEh"></div>


<button class="add_button" type="submit" name="add" >Сохранить</button></div>



</form>

</div>
</main>

</body>
</html>