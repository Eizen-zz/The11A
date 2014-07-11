<?
	session_start();
	$i_login = $_POST['login'];
	$i_pass = $_POST['pass'];
	if (strlen($i_login)>16 || strlen($i_pass)>16 || strlen($i_login)==0 || strlen($i_pass)==0)
		exit('Введенные вами данные некорректны. Попробуйте еще раз. <a href="login.php">Вернуться</a>');
	include('connect.php');
	$query = mysql_query("SELECT * FROM `users` WHERE `login`='$i_login'");
	$row = mysql_fetch_array($query, MYSQL_ASSOC);
	if (empty($row['login'])) 
	exit('Неверно введен логин. Повторите еще раз. <a href="login.php">Вернуться</a>');
	if ($i_pass==$row['pass']) {
		$_SESSION['login']=$row['login'];
		$_SESSION['pass']=$row['pass'];
		$_SESSION['name']=$row['name'];
		$_SESSION['lastname']=$row['lastname'];
		$_SESSION['fname']=$row['fname'];
		$_SESSION['id']=$row['id'];
		$_SESSION['status']=$row['status'];
		$_SESSION['online']=1;
		$file = "req.txt";
		$rfile = fopen($file, 'a+');
		$today = date(d.m.y);
		$time = date(H.i.s);
		$source = $row['login'].' '.$_SERVER['REMOTE_ADDR'].' '.$today.' '.$time."\n";
		fwrite($rfile, $source);
		fclose($rfile);
	} else exit('Неверно введен пароль. Повторите еще раз. <a href="login.php">Вернуться</a>');
	mysql_close();
	Header('Location: http://the11a.16mb.com/');	
?>