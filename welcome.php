<?php
include "functions_bd.php";
initSession();
$abi=get_abiturient_by_tel($_SESSION['tel']);
?>
<html lang="ru">
<head>
  <meta charset="utf-8">
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
  <link rel="stylesheet" href="style2.css">
</head>
<body>
  <?php include 'blocks/nav.php';?> 
  <?php include "blocks/head_block.php";?>
  <main class='pravila'>
  <div class='enter'>
  <h3>Выберите желаемую дату подачи заявления:</h3>

  

<div class='pole'>
    <label for="date_application"></label>
    <input type="date" id="date_application"/>
    <button class='add_button' id="send">Отправить</button>
</div>
  <div id="welcome" class='welcome_hidden'></div>


  <div>
  </main>
    <?php include "blocks/footer_block.php";?>
<script>
//после загрузки DOM-дерева страницы
document.addEventListener("DOMContentLoaded",function() {
  //получить кнопку
  var mybutton = document.getElementById('send');
  //подписаться на событие click по кнопке и назначить обработчик, который будет выполнять действия, указанные в безымянной функции
  mybutton.addEventListener("click", function(){
    //1. Сбор данных, необходимых для выполнения запроса на сервере
    var date_application = document.getElementById('date_application').value;
    //Подготовка данных для отправки на сервер
    //т.е. кодирование с помощью метода encodeURIComponent
    date_application = 'date_application=' + encodeURIComponent(date_application);
    // 2. Создание переменной request
    var request = new XMLHttpRequest();
    // 3. Настройка запроса
    request.open('POST','controllers/processing.php',true);
    // 4. Подписка на событие onreadystatechange и обработка его с помощью анонимной функции
    request.addEventListener('readystatechange', function() {
      //если запрос пришёл и статус запроса 200 (OK)
      if ((request.readyState==4) && (request.status==200)) {
        // например, выведем объект XHR в консоль браузера
        console.log(request);
        // и ответ (текст), пришедший с сервера в окне alert
        console.log(request.responseText);
        // получить элемент c id = welcome
        var welcome = document.getElementById('welcome');
        // заменить содержимое элемента ответом, пришедшим с сервера
        welcome.innerHTML = request.responseText;
         welcome.classList.add('welcome_visible');
         welcome.classList.remove('welcome_hidden');

      }
    });
    // Устанавливаем заголовок Content-Type(обязательно для метода POST). Он предназначен для указания кодировки, с помощью которой зашифрован запрос. Это необходимо для того, чтобы сервер знал как его раскодировать.
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    // 5. Отправка запроса на сервер. В качестве параметра указываем данные, которые необходимо передать (необходимо для POST)
    request.send(date_application);
  });
});
</script>

</body>
</html>