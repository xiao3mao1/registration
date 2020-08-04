<?php

include "../functions_bd.php";
//echo $_POST['spec']==0;


if ($_POST['spec']==0|| $_POST['prioritet']==0) header ('Location: ../add_zayavl.php?error=1&idform='.$_GET['idform']);
else{
add_zayavl($_GET["idabiturient"], $_POST['spec'],$_POST['prioritet']);


header('Location: ../zayavl.php');}

?>