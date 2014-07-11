<div class="sb_links">
	<?php
		$status = $_SESSION['status'];
		if ($status == 2) {?>
			<ul>
				<li><a href="/admin/index.php">Админ. главная</a></li>
     		    <li><a href="/admin/users.php">Список пользователей</a></li>
     	       	<li><a href="/admin/addnews.php">Добавить новость</a></li>
     	       	<li><a href="/admin/addstudy.php">Добавить материал</a></li>
     	       	<li><a href="/admin/addtnew.php">Добавить объявление</a></li>
     	       	<li><a href="/admin/support.php">Поддержка</a></li>
     	       	<li><a href="/admin/addfile.php">Загрузить файл</a></li>
      	      	<li><a href="/admin/chatmod.php">Модерация чата</a></li>
			</ul>
			<hr>
		<?}
	?>
	<ul>
		<li><a href="/hometask/">Домашнее задание</a></li>
		<li><a href="/timetable/">Расписание</a></li>
		<li><a href="/duty/">Дежурство</a></li>
		<li><a href="/tests/">Online-тестирования</a></li>
	</ul>
</div>