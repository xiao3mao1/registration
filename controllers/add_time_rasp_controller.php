<?php
include "../functions_bd.php";
initSession();

$input_name=$_POST['check'];// узнаем value радиокнопки (оно же idraspisanie)

$idabiturient=get_id_by_tel($_SESSION['tel']); // 

$rasp=get_idrasp_by_idabiturient($idabiturient['idabiturient']);//проверка выбирал ли он уже время


if ($rasp==0) choose_time($idabiturient['idabiturient'], $_POST[$input_name]);// если нет, то записываем его

else // если да
{
free_time($rasp); // старое вытираем
choose_time($idabiturient['idabiturient'], $_POST[$input_name]);// новое записываем

}

header('Location: ../ticket.php');


?>