<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
$spec=get_specialization_by_form_uroven($_GET['idform'], $abi['iduroven']);
$prioritet=get_all_prioritet_by_idabi($abi['idabiturient']); 






?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Направления</title>
</head>
<body>
<?php include 'blocks/nav.php';?>	
<?php include 'blocks/head_block.php';?>	
<main class='pravila'>




<form action="controllers/add_zayavleniye_controller.php?idform=<?php echo $_GET['idform'];?>&idabiturient=<?php echo $abi['idabiturient']?>" method="POST" role='form'>
 <div >
 	<?php if ($_GET['idform']==1) echo "<h2>Заявление на очную форму</h2>";
else echo "<h2>Заявление на заочную форму</h2>";
?>
 
  <?php if ($_GET['error']==1) echo "<h2 style='color: red;'>Все поля формы должны быть заполнены!</h2>";?>



<div class="pole" > 
<label for="spec" >Выберите направление</label>
<div >
<select id='spec' name='spec'>
	<option value='0'>  </option>
	<?php
	for($i=0;$i<count($spec);$i++)
	{

$idspec=$spec[$i]['idspecialization'];
$spec_name=$spec[$i]['specialization'];
echo "<option value=$idspec>$spec_name</option>";

	}

?>
</select>
</div>
</div>

<div class="pole" > 
  <label for="prioritet" >Укажите приоритет</label>
  <div >
<select name='prioritet'>
	

<option value='0'>  </option>
	<?php
	for($i=0;$i<count($prioritet);$i++)
	{

$pr=$prioritet[$i]['prioritet'];
$name_prioritet=$prioritet[$i]['name_prioritet'];
echo "<option value=$pr>$name_prioritet</option>";

	}
?>

</select>
  </div> 
  </div>



<button class="add_button" type="submit" name="add" >Сохранить</button></div>



</form>


</main>

</body>
</html>