<?php

include "../functions_bd.php";
//echo $_POST['spec']==0;


edit_zayavl_by_id($_GET["idzayavl"], $_POST['comment'],$_POST['status']);


header('Location: ../abi_card.php?idabiturient='.$_GET['idabiturient']);

?>