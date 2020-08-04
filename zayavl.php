<?php
include "functions_bd.php";
initSession();

$abi=get_abiturient_by_tel($_SESSION['tel']);
$zayavl=get_all_zayavl_by_idabi($abi['idabiturient']);
$n_den=count_all_zayavl_by_idabi($abi['idabiturient'],1);
$n_zaoch=count_all_zayavl_by_idabi($abi['idabiturient'],2);


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

<div class='add_zayavl'>
<a href='add_zayavl.php?error=0&idform=1' style='visibility: <?php if($n_den['n']>=3) echo "hidden";else echo "visible"?>'>Добавить заявление на очную форму</a>

<a href='add_zayavl.php?error=0&idform=2' style='visibility: <?php if($n_zaoch['n']>=3) echo "hidden";else echo "visible"?>'>Добавить заявление на заочную форму</a>
</div>

<!--<table>

<tr>
<th>Направление</th>

<th>Форма обучения</th>
<th>Приоритет</th>
<th>Статус</th>
<th>Комментарий</th>
<th>Удалить</th>

</tr>-->

<?php 

for($i=0;$i<count($zayavl);$i++){
$idzayavl=$zayavl[$i]['idzayavl'];
$spec=$zayavl[$i]['specialization'];
$prioritet=$zayavl[$i]['prioritet'];	
$status=$zayavl[$i]['name_status'];
$comment=$zayavl[$i]['comment'];
$forma=$zayavl[$i]['idForma'];

if($forma==1) $forma='очная';
else $forma='заочная';

$del="<a href='controllers/del_zayavl_controller.php?idzayavl=$idzayavl'><img src='images/del.png'></a>";

$style="style='color: ";
if ($status=='Ожидание') $style=$style."#eee527'";
else 
	if ($status=='Отклонено') $style=$style."red'";
     else $style=$style."green'";


//$template="<tr><td>[spec]</td><td>[forma]</td><td>[prioritet]</td><td $style>[status]</td><td>[comment]</td><td>[del]</td></tr>";
     $template="<div class='zayavl'> <div >Статус:<span $style>[status]</span></div> <div class='data'><div>[spec]</div><div>[forma] форма</div><div>[prioritet] приоритет</div><div style='color: red;'>[comment]</div></div></div>";
echo  str_replace(array('[spec]','[forma]','[prioritet]','[status]','[comment]'), array($spec, $forma, $prioritet,$status,$comment), $template);



}
?>
</table>



</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>