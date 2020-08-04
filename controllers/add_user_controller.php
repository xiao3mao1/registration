<?php
include "../functions_bd.php";


add_user($_POST["fio"], $_POST['role'],$_POST['login'], $_POST['pass'] );


header('Location: ../index1.php');

?>