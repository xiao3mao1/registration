<?php
include "../functions_bd.php";

// создадим переменную для формирования ответа
$output ='';
// если в массиве пост есть ключ nameUser, то
if (isset($_POST['date_application'])) {
  // в переменную name помещаем переданное с помощью запроса имя
  $abi=get_all_abi_on_date($_POST['date_application']);

$output="<table><tr><th>Id</th><th>ФИО</th><th>email</th><th>Телефон</th><th>Уровень</th><th>Время</th></tr>";

for ($i=0; $i<count($abi); $i++)
{
  $id=$abi[$i]['idabiturient'];
  $fio=$abi[$i]['fio'];
  $email=$abi[$i]['email'];
  $tel=$abi[$i]['tel'];
  $uroven=$abi[$i]['iduroven'];
  $time_rasp= date("G:i", strtotime($abi[$i]['time_rasp']));
  
$output=$output."<tr><td>$id</td><td>$fio</td><td>$email</td><td>$tel</td><td>$uroven</td><td>$time_rasp</td></tr>";

}

$output=$output."</table>";

  // выводим ответ
  echo $output;
}
?>