<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>删除记录</title>
</head>

<body>
	<?php
	session_start();
	if (isset($_SESSION['yes'])){
		echo '<p align="center">'.$_SESSION['yes'].'</p>';
		unset($_SESSION['yes']);
	}
	$link = mysqli_connect('localhost','root','035289Th','myschool');
		if (!$link){
			exit('数据库连接失败！');
		}
	session_start();
	$del = $_SESSION['del'];
	mysqli_query($link,"delete from students where s_id= $del ");
	unset ($_SESSION['del']);
	header('location:myschool.php');
	?>
</body>
</html>