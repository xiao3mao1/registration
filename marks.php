<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
$predmets=get_all_predmets($abi['idabiturient']);
?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Правила приема</title>
</head>
<body>
<?php include 'blocks/nav.php';?>	
<?php include 'blocks/head_block.php';?>	
<main class='pravila'>

 <form action="controllers/add_mark_controller.php?idabiturient=<?php echo $abi['idabiturient']?>" method="POST" role='form'>
 <div >
 
<div class="pole" > 
<label for="predmet" >Предмет</label>
<div >
<select id='predmet' name='predmet' required>
	<option></option>
	<?php
	for($i=0;$i<count($predmets);$i++)
	{

$idpredmet=$predmets[$i]['idpredmet'];
$predmet=$predmets[$i]['predmet'];
echo "<option value=$idpredmet>$predmet</option>";

	}

?>
</select>
</div>
</div>


<div class="pole" > 
<label for="mark" >Оценка</label>
<div >
<input id="mark" type="text"  name="mark" required />
</div>
</div>


<button class="add_button" type="submit" name="add" >Сохранить</button></div>

</form>

</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>