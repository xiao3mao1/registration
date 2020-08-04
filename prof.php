<?php
include "functions_bd.php";
$urovni=get_all_urovni();
$error=$_GET['error'];
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
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
</head>
<body>
<?php include 'blocks/nav.php';?>	
<?php include 'blocks/head_block.php';?>	
<main class='pers_cab'>

<div class="enter">

<?php if ($error==1) echo "<h2 style='color: red;'>Все поля формы должны быть заполнены!</h2>";

if ($error==2) echo "<h2 style='color: red;'>Этот телефон уже зарегистрирован в системе!</h2>";


?>

 <form action="controllers/edit_abiturient_controller.php" method="POST" role='form'>


<input id="id" type="hidden" name="id"  value='<?php echo $abi['idabiturient'];?>' />


 <div >
 
  <div class="pole" > 
  <label for="fio" >Фамилия Имя Отчество</label>
  <div >
 <input id="fio" type="text" name="fio" placeholder="Фамилия Имя Отчество" value='<?php echo $abi['fio'];?>' />
  </div> 
  </div>

<div class="pole" > 
<label for="email" >Адрес электронной почты</label>
<div >
<input id="email" type="email" name="email"  value='<?php echo $abi['email'];?>' />
</div>
</div>

  <div class="pole" > 
<label for="pass" >Изменить пароль</label>
<div >
<input id="pass" type="password" name="pass"  value='<?php echo $abi['pass']?>' />
</div>
</div>

<div class="pole" > 
<label for="tel" >Телефон</label>
<div >
<input id="tel" type="text" name="tel" placeholder="+38(071)-111-11-11"  value='<?php echo $abi['tel'];?>'/>
</div>
</div>



<div class="pole" > 
<label for="uroven" >Уровень</label>
<div >
<select id='uroven' name='uroven'>
	<?php
	for($i=0;$i<count($urovni);$i++)
	{

$a='';
$iduroven=$urovni[$i]['iduroven'];
$uroven=$urovni[$i]['uroven'];
if ($iduroven==$abi['iduroven']) $a='selected';
echo "<option $a value=$iduroven>$uroven</option>";

	}

?>
</select>
</div>
</div>








<button class="add_button" type="submit" name="add" >Сохранить</button>

</div>



</form>

</div>
</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>