<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="description" content="Домашнее задание 11 А класса.">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<link href="post_style.css" rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<title>Расписание</title> 
	</head>
	<body>
		<div id="container">
		<div id="header"></div>
		<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span>Расписание</span>
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
			<div id="timetable"> 
				<div id="div1"><img src="/img/monday.jpg" class="tt_img">
					<li>Биология
					<li>История
					<li>Алгебра
					<li>Алгебра
					<li>Английский язык
					<li>Физкультура
				</div>
				<div id="div2"><img src="/img/tuesday.jpg" class="tt_img">
					<li>Геометрия
					<li>Геометрия
					<li>Литература
					<li>Физкультура
					<li>Литература
					<li>Английский язык
				</div>
				<div id="div3"><img src="/img/wednesday.jpg" class="tt_img">
					<li>Алгебра
					<li>Алгебра
					<li>Физика
					<li>История
					<li>Информатика
					<li>Информатика
				</div>
				<div id="div4"><img src="/img/thursday.jpg" class="tt_img">
					<li>География
					<li>Английский язык
					<li>Алгебра
					<li>Алгебра
					<li>Физкультура
					<li>Обществознание
					</div>
				<div id="div5"><img src="/img/friday.jpg" class="tt_img">
					<li>Геометрия
					<li>Геометрия
					<li>Информатика
					<li>Информатика
					<li>Обществознание
					<li>Литература
					<li>Химия
				</div>
				<div id="div6"><img src="/img/saturday.jpg" class="tt_img">
					<li>Алгебра
					<li>Алгебра
					<li>Русский язык
					<li>Кубановедение
					<li>Физика
					<li>ОБоЖе
				</div>
				<div id="div7"><img src="/img/sunday.jpg" class="tt_img">
					<b>Миссия:</b><br>
					Проснуться до полудня. Всем выходной!
				</div>
				<div style="clear:both;"></div>
			</div>
			<script>
				$("#div1,#div2,#div3,#div4,#div5,#div6,#div7").bind("click", our_function);
				function our_function(){
				$("#div1,#div2,#div3,#div4,#div5,#div6,#div7").unbind("click");
				$("#div1,#div2,#div3,#div4,#div5,#div6,#div7").animate({width:"60px"},500);
				$(this).animate({width:"300px"},500,function() {
				$("#div1,#div2,#div3,#div4,#div5,#div6,#div7").bind("click", our_function);
				});
				}
			</script>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div>
	</body>
</html>