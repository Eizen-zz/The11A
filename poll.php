<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
		<base href="index.php" />
		<meta charset="utf-8" />
		<? include('style.php'); ?>
		<script src="/js/but.js"></script>
		<script src="/js/jquery.js"></script>
		<title>Голосование</title>
	</head>

	<body>

	<div id="container">
	<div id="header"></div>
	<? include('table.php'); ?>
	</div>
	
	<div id="content">
	<div id="sidebar">
	<b>Голосование</b>
	<? include('sidebar.php'); ?>
	</div>
	<div id="main">
	<?
		include ('connect.php');
		$id = $_SESSION['id'];
		$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$id'");
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		$poll = $row['poll'];
		$id = 1;
		$query = mysql_query("SELECT * FROM `poll` WHERE `id` = '$id'");
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		if ($poll == 0 && $row['stat'] == 1 && $_SESSION['online'] == 1) {
			$query = mysql_query("SELECT * FROM `poll` WHERE `id` = '$id'");
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			echo $row['subj'].'<br>';
			echo '<form name="poll" action="poll.php?act=res" method="POST">';
			echo '<input type="radio" name="vp" value="1" checked>'.$row['tv1'].'<br>';
			echo '<input type="radio" name="vp" value="2">'.$row['tv2'].'<br>';
			echo '<input type="submit" name="ipoll" value="Голосовать">';
			echo '</form>';
		}
		else {
			$id = 1;
			$query = mysql_query("SELECT * FROM `poll` WHERE `id` = '$id'");
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			$sum = $row['v1'] + $row['v2'];
			$v1 = ($row['v1']*100)/$sum;
			$v2 = ($row['v2']*100)/$sum;
			echo $row['subj'].'<br>';
			printf("<em>%s</em> - <b>%3.1f </b>", $row['tv1'], $v1); echo '%<br>';
			printf("<em>%s</em> - <b>%3.1f </b>", $row['tv2'], $v2); echo '%<br>';
		}


		$act = $_GET['act'];
		if ($act == res && isset($_POST['ipoll'])) {
			$vp = $_POST['vp'];
			$id = 1;
			$query = mysql_query("SELECT * FROM `poll` WHERE `id` = '$id'");
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			switch($vp) {
			case 1: {
				$newv = ++$row['v1'];
				$query = mysql_query("UPDATE `poll` SET `v1`='$newv' WHERE `id` = '$id'");
			$id = $_SESSION['id'];
			$query = mysql_query("UPDATE `users` SET `poll`='1' WHERE `id` = '$id'");
			}
			break;

			case 2: {
				$newv = ++$row['v2'];
				$query = mysql_query("UPDATE `poll` SET `v2`='$newv' WHERE `id` = '$id'");
				$id = $_SESSION['id'];
				$query = mysql_query("UPDATE `users` SET `poll`='1' WHERE `id` = '$id'");
			}
			break;
			}
			header('Location: http://the11a.16mb.com/poll.php');
		}
		mysql_close();
	?>

	</div>
	<? include('footer.php'); ?>
	</div>
	</body>
</html>