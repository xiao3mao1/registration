<?php

include "../functions_bd.php";
//echo $_POST['spec']==0;


del_zayavl($_GET["idzayavl"]);


header('Location: ../abi_card.php?idabiturient='.$_GET['abi']);

?>