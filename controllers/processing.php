<?php
include "../functions_bd.php";
initSession();
$idabiturient=get_id_by_tel($_SESSION['tel']);
// создадим переменную для формирования ответа
$output ='';
// если в массиве пост есть ключ nameUser, то
if (isset($_POST['date_application'])) {
  // в переменную name помещаем переданное с помощью запроса имя
  $times=get_all_time_by_date($_POST['date_application'], $idabiturient['iduroven']);

$output="<form action='controllers/add_time_rasp_controller.php' method='POST' role='form'>
<h2>Выберите подходящее Вам время: </h2>
<table><tr><th style='visibility: hidden;'></th><th>Время</th><th>Число свободных мест</th><th>Выбрать</th></tr>";

for ($i=0; $i<count($times); $i++)
{
  $id=$times[$i]['id'];
  $time_rasp= date("G:i", strtotime($times[$i]['time_rasp']));
  $vsego=$times[$i]['vsego'];
$output=$output."<tr><td style='visibility: hidden;'><input name='$i' type='hidden'value='$id'></td><td>$time_rasp</td><td>$vsego</td><td><input value='$i' name='check' type='radio'/></td></tr>";

}

$output=$output."</table> <button class='add_button' type='submit' name='add' >Сохранить</button></div></form>";

if (count($times)==0) { $newDate = date("d.m.Y", strtotime($_POST['date_application']));$output='К сожалению на '.$newDate.'г. все места уже заняты';}
  }
  else {
   $output.= 'Вы не указали дату.';
  }
  // выводим ответ
  echo $output;
?>