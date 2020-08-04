<?php
include "functions_bd.php";



$zayavl=get_all_zayavl_by_forma_uroven($_GET['iduroven'],$_GET['idform']);


?>

<html>
<head>



<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">

<title>Направления</title>
</head>
<body>
	
<main>


<table>

<tr>
		<th>№</th>
	<th>ФИО</th>
	<th>Дата</th>
<th>Тел</th>
<th>Email</th>
<th>Направление</th>


<th>Приоритет</th>
<th>Статус</th>
<th>Комментарий</th>
<th>Документы</th>

</tr>

<?php 

for($i=0;$i<count($zayavl);$i++){
$idabiturient=$zayavl[$i]['idabiturient'];
$fio=$zayavl[$i]['fio'];
$date=$zayavl[$i]['reg_date'];
$tel=$zayavl[$i]['tel'];	
$email=$zayavl[$i]['email'];
$spec=$zayavl[$i]['specialization'];
$prioritet=$zayavl[$i]['prioritet'];
$status=$zayavl[$i]['name_status'];
$comment=$zayavl[$i]['comment'];

$n=$i+1;


$doc="<a href='abi_card.php?idabiturient=$idabiturient'> документы</a>";




$template="<tr><td>[n]</td><td>[fio]</td><td>[date]</td><td>[tel]</td><td>[email]</td><td>[spec]</td><td>[prioritet]</td><td>[status]</td><td>[comment]</td><td>[doc]</td></tr>";
     
echo  str_replace(array('[n]', '[fio]','[date]','[tel]','[email]','[spec]','[prioritet]', '[status]', '[comment]', '[doc]'), array($n, $fio, $date, $tel,$email,$spec, $prioritet, $status, $comment,$doc), $template);



}
?>
</table>



</main>

</body>
</html>