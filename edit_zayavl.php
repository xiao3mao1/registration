<?php
include "functions_bd.php";
initSession();
$status=get_all_status();
$zayavl=get_zayavl_by_id($_GET['idzayavl']);




?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Направления</title>
</head>
<body>
	
<main class='admin'>


<?php echo '<h3>Направление:'.$zayavl['specialization'].'</h3>';

echo '<h4>Приоритет:'.$zayavl['prioritet'].'</h4>';
?>


<form action="controllers/edit_zayavleniye_controller.php?idzayavl=<?php echo $_GET['idzayavl']?>&idabiturient=<?php echo $zayavl['idabiturient']?>" method="POST" role='form'>
 <div >
 	



<div class="pole" > 
  <label for="status" >Статус</label>
  <div >
<select name='status'>
	

<option value='0'>  </option>
	<?php
	for($i=0;$i<count($status);$i++)
	{

$idstatus=$status[$i]['idstatus'];
$name_status=$status[$i]['name_status'];

$a='';
if($idstatus==$zayavl['idstatus']) $a='selected';

echo "<option $a value=$idstatus>$name_status</option>";

	}
?>

</select>
  </div> 
  </div>


<div class="pole" > 
  <label for="comment" >Комментарий</label>
  <div >
<textarea name='comment'><?php echo $zayavl['comment'];?></textarea>
  </div> 
  </div>


<button class="add_button" type="submit" name="add" >Сохранить</button></div>



</form>


</main>

</body>
</html>