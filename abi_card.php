<?php
include "functions_bd.php";



$zayavl=get_all_zayavl_by_idabi($_GET['idabiturient']);
$docs=get_all_docs_by_idabi($_GET['idabiturient']);
$lgota=get_all_lgota_docs_by_idabi($_GET['idabiturient']);
?>

<html>
<head>



<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Направления</title>
</head>
<body>

<main >

<h1><?php echo $zayavl[0]['fio'];?></h1>


<h2>Заявления</h2>
<table>

<tr>
<th>Направление</th>

<th>Форма обучения</th>
<th>Приоритет</th>
<th>Статус</th>
<th>Комментарий</th>
<th>Редактировать</th>
<th>Удалить</th>
</tr>

<?php 

for($i=0;$i<count($zayavl);$i++){
$idzayavl=$zayavl[$i]['idzayavl'];
$spec=$zayavl[$i]['specialization'];
$prioritet=$zayavl[$i]['prioritet'];	
$status=$zayavl[$i]['name_status'];
$comment=$zayavl[$i]['comment'];
$forma=$zayavl[$i]['idForma'];
$abi=$_GET['idabiturient'];
if($forma==1) $forma='очная';
else $forma='заочная';



$style="style='color: ";
if ($status=='Ожидание') $style=$style."#eee527'";
else 
	if ($status=='Отклонено') $style=$style."red'";
     else $style=$style."green'";

$edit="<a href='edit_zayavl.php?idzayavl=$idzayavl'>...</a>";
$del="<a href='controllers/del_zayavl_controller.php?idzayavl=$idzayavl&abi=$abi'><img src='images/del.png'></a>";
$template="<tr><td>[spec]</td><td>[forma]</td><td>[prioritet]</td><td $style>[status]</td><td>[comment]</td><td>[edit]</td><td>[del]</td></tr>";
     
echo  str_replace(array('[spec]','[forma]','[prioritet]','[status]','[comment]', '[edit]', '[del]'), array($spec, $forma, $prioritet,$status,$comment, $edit, $del), $template);



}
?>
</table>


<h2>Документы</h2>
<table>
  		<tr>
<th>Документ</th>
<th>Ссылка</th>
  		</tr>

<?php 
for($i=0;$i<count($docs);$i++){
$iddoc=$docs[$i]['iddoc'];
$doc_type=$docs[$i]['doc_type'];
$url=$docs[$i]['doc_path'];	

$doc_path="<a href='$url' download>$url </a>";




$template="<tr><td>[doc_type]</td><td>[doc_path]</td></tr>";
     
echo  str_replace(array('[doc_type]','[doc_path]'), array($doc_type, $doc_path), $template);



}
?>
</table>

<h2> Льгота</h2>
<table>
  		<tr>
<th>Документ</th>
<th>Ссылка</th>
  		</tr>

<?php 
for($i=0;$i<count($lgota);$i++){
$iddoc=$lgota[$i]['iddoc'];
$doc_name=$lgota[$i]['doc_name'];
$url=$lgota[$i]['doc_path'];	

$doc_path="<a href='$url' download>$url</a>";



$template="<tr><td>[doc_name]</td><td>[doc_path]</td></tr>";
     
echo  str_replace(array('[doc_name]','[doc_path]'), array($doc_name, $doc_path), $template);



}
?>
</table>

</main>

</body>
</html>