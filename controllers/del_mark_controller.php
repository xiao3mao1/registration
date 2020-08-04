<?php

include "../functions_bd.php";
//echo $_POST['spec']==0;



del_marks_by_id($_GET["idabitur_predmet"]);


header('Location: ../mydocs.php?error=0');

?>