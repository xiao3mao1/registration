<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);

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


<a href='add_zayavl.php?idform=1'>Добавить заявление на очную форму</a>

<a href='add_zayavl.php?idform=2'>Добавить заявление на заочную форму</a>
</main>

</body>
</html>