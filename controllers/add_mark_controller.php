<?php

include "../functions_bd.php";
//echo $_POST['spec']==0;



add_mark($_GET["idabiturient"], $_POST['predmet'],$_POST['mark']);


header('Location: ../mydocs.php?error=0');

?>