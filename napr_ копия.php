<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
$napr=get_all_napravleniya($abi['iduroven'], 1);
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

<ul class='napr_spec'>
<?php 
for($i=0;$i<count($napr);$i++){
$idnapr=$napr[$i]['idNapr'];
$shifr=$napr[$i]['ShifrNapr'];
$name_napr=$napr[$i]['Napr'];	




$template="<li>[shifr]  [name_napr]</li>";
	
echo  str_replace(array('[shifr]','[name_napr]'), array($shifr, $name_napr), $template);

$spec=get_specialization_by_napr($idnapr);
echo '<ul class="napr_spec">';

for($j=0;$j<count($spec);$j++)

{

	$name_spec=$spec[$j]['specialization'];

$template="<li>[name_spec]</li>";
	
echo  str_replace(array('[name_spec]'), array($name_spec), $template);



}

echo '</ul>';

}
?>
</ul>



</main>

</body>
</html>