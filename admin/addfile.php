<?php
session_start();
if ($_SESSION['status'] != 2 && $_SESSION['status'] != 1)
exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<? include('style.php'); ?>
<script src="
<?
$std = date("G");

$day = "/js/buttons.js";
$night = "/js/buttonsn.js";

if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
echo $day;
else 
echo $night;
?>
"></script>
<title>Загрузка файла</title>
</head>

<body background="/img/back.jpg">

<div id="container">
   <div id="header"> <!-- <a href=#><img src="head.jpg"/></a>  Это на случай, если делать шапку в виде ссылки.-->
   </div>
<?
$std = date("G");
if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
include('table.php');
else 
include('tablen.php');
?>
   </div>
     
<div id="content">
   <div id="sidebar">
<?php 
echo '<b>Загрузка материала на сервер</b>';
?>
   </div>

   <div id="main">
   Загрузка файлов является массовой. Чтобы загрузить один файл, нажмите на кнопку ниже. Затем выберите файл и два щелчка по нему.
	<br>Чтобы загрузить несколько файлов, нужно зажать Ctrl и щелкать мышкой по файлам, которые хотите загрузить.
	<form action="uploadmass.php" enctype="multipart/form-data" method="post">
   <input type="file" min="1" max="9999" name="file[]" multiple="true" value="Выберите нужные файлы" /> <br>
   <input type="submit" name="submit" value="Загрузить" />
</form>

   </div>
   </div>

   
</body>
</html>