<?php
session_start();
// Указываем тип и кодировку
//Header("Content-Type: text/html; charset=utf-8");
if ($_SESSION['online'] != 1)
exit('<p style="background:#000; color: #FFF;" align="center">Извините, но чат только для авторизованных пользователей. Авторизацию пройдите по следующей ссылке.</p><p align="center"><a href="http://the11a.16mb.com/login.php">Тут.</a></p>');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Чат</title>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<style>
.myButton {
    background: url(/img/butch.jpg) no-repeat;
    cursor:pointer;
    width: 150px;
    height: 70px;
    border: none;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> <!-- jQuery -->
<!-- код чата -->
<script type="text/javascript">

$(document).ready(function () {
    $("#pac_form").submit(Send); // вешаем на форму с именем и сообщением событие которое срабатывает кодга нажата кнопка "Отправить" или "Enter"
    $("#pac_text").focus(); // по поле ввода сообщения ставим фокус
    setInterval("Load();", 10000); // создаём таймер который будет вызывать загрузку сообщений каждые 2 секунды (2000 милесукунд)
});    

// Функция для отправки сообщения
function Send() {
    // Выполняем запрос к серверу с помощью jquery ajax: $.post(адрес, {параметры запроса}, функция которая вызывается по завершению запроса)
    $.post("ajax.php",  
	{
        act: "send",  // указываем скрипту, что мы отправляем новое сообщение и его нужно записать
        name: $("#pac_name").val(), // имя пользователя
        text: $("#pac_text").val() //  сам текст сообщения
    },
     Load ); // по завершению отправки вызвовем функцию загрузки новых сообщений Load()

    $("#pac_text").val(""); // очистим поле ввода сообщения
    $("#pac_text").focus(); // и поставим на него фокус
    
    return false; // очень важно из Send() вернуть false. Если этого не сделать то произойдёт отправка нашей формы, те страница перезагрузится
}

var last_message_id = 0; // номер последнего сообщения, что получил пользователь
var load_in_process = false; // можем ли мы выполнять сейчас загрузку сообщений. Сначала стоит false, что значит - да, можем

// Функция для загрузки сообщений
function Load() {
    // Проверяем можем ли мы загружать сообщения. Это сделанно для того, что бы мы не начали загрузку заново, если старая загрузка ещё не закончилась.
    if(!load_in_process)
    {
	    load_in_process = true; // загрузка началась
	    // отсылаем запрос серверу, который вернёт нам javascript
    	$.post("ajax.php", 
    	{
      	    act: "load", // указываем на то что это загрузка сообщений
      	    last: last_message_id, // передаём номер последнего сообщения который получил пользователь в прошлую загрузку
      	    rand: (new Date()).getTime()
    	},
   	    function (result) { // в эту функцию в качестве параметра передаётся javascript код, который мы должны выполнить
		    eval(result); // выполняем скрипт полученный от сервера
		    $(".chat").scrollTop($(".chat").get(0).scrollHeight); // прокручиваем сообщения вниз
		    load_in_process = false; // говорим что загрузка закончилась, можем теперь начать новую загрузку
    	});
    }
}
</script>

<body background="/img/backch.jpg">
<div style="padding: 10px;">
<b>Чат-рум/#11A</b><br>
<div style="border: 1px ridge white; width:800px;">
Пока бобры, да, те самые, доносят ваши пакеты данных до сервера, подождите 10 секунд. В чате загрузится последнее сообщение. Главное - ждите. Мы работаем над совершенствованием чата.
</div>
<a href="/">На главную</a>  |  <a href="history.php">История сообщений</a>
<!-- Вот в этих 2-х div'ах будут идти наши сообщения из чата -->
<div class="chat r4">

<div id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div>
</div>
<form id="pac_form" action=""><!-- Наша форма с именем, сообщением и кнопкой для отправки -->
<table style="width: 100%;">
	<?
		include ('connect.php');
		$id = $_SESSION['id'];
		$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$id'");
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		if ($row['chatrule'] == 1)
	{	
		echo '<tr>';
		echo '<td>'; 
		printf("Имя: %s %s", $_SESSION['name'], $_SESSION['lastname']);
		echo '</td>';
		echo'<td>Сообщение:</td>';
		echo '<td></td>';
		echo '</tr>';
		echo '<tr>';
		//Поле имени
		echo '<td>';
		$name = $_SESSION['name']." ".$_SESSION['lastname'];
		printf("<input type=\"hidden\" id=\"pac_name\" class=\"r4\" value=\"%s\">", $name);
		echo '</td>';
		//Поле ввода сообщения 
		echo '<td style="width: 80%;"><input type="text" id="pac_text" class="r4" value=""></td>';
		echo '<td><input type="submit" class="myButton" value=""></td>';
		echo '</tr>';
	}
	mysql_close();
	?>
</table>
</form>

</div>
</body>
</html>