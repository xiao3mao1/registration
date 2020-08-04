<?php
include "functions_bd.php";
initSession();

$abi=get_abiturient_by_tel($_SESSION['tel']);

?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style2.css">
<!-- Begin Verbox {literal} -->
<script type='text/javascript'>
	(function(d, w, m) {
		window.supportAPIMethod = m;
		var s = d.createElement('script');
		s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
		s.async = true;
		var id = '7de771f054630b87c4e3bbf4e32fdd3b';
		s.src = 'https://admin.verbox.ru/support/support.js?h='+id;
		var sc = d.getElementsByTagName('script')[0];
		w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
		if (sc) sc.parentNode.insertBefore(s, sc); 
		else d.documentElement.firstChild.appendChild(s);
	})(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox -->

<title>Ваше время</title>
</head>
<body>
	<?php include 'blocks/nav.php';?>	
<?php include "blocks/head_block.php";?>
<main class='pravila'>
<div class="enter">

	<div class='ticket'>
 <?php
if ($_SESSION['error_auth']) echo "<h3>Этот телефон не зарегистрирован в базе данных.</h3> <a href='proverka.php'>Ввести другой телефон</a>";
else
{
	//echo $_SESSION['tel'];

$ticket=get_ticket_by_tel($_SESSION['tel']);

if (is_null($ticket['date_rasp'])) echo"<h3>Этот телефон зарегистрирован, но дата и время  не выбраны.</h3> <a href='welcome.php'>Выберите желаемую дату и время подачи документов</a>";
else
{
	
 //echo $ticket['tel'];
 $newDate = date("d.m.Y", strtotime($ticket['date_rasp']));
 $newTime = date("G:i", strtotime($ticket['time_rasp']));
	//echo $newDate;
echo '<h3>Абитуриент: '.$ticket['fio'].'</h3>';
echo '<h3>Дата подачи оригиналов: '.$newDate.'г.</h3>';
echo '<h3>Время: '.$newTime.'</h3>';
echo "<a href='welcome.php'>Поменять время</a>";
}
}
?>
</div>
</div>
</main>
<?php include "blocks/footer_block.php";?>
</body>
</html>