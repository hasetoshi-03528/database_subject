<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新增学生成绩</title>
</head>

<body>
	<h1 align="center">新增学生成绩</h1>
	<form action="" method="post" name="inf">
	<p align="center">学生学号：<input type="text" name="s_id" /></p>
	<p align="center">数据库　：<input type="text" name="sc1" /></p>
	<p align="center">C++　　：<input type="text" name="sc2" /></p>
	<p align="center">PHP　　：<input type="text" name="sc3" /></p>
	<p align="center"><input type="submit" name="insub" value="提交"/></p>
	</from>
	<?php
	session_start();
	$link = mysqli_connect('localhost','root','035289Th','myschool');
		if (!$link){
			exit('数据库连接失败！');
		}
	if(!empty($_POST["insub"]))
	{
		$s_id = $_POST['s_id'];
		$sc1 = $_POST['sc1'];
		$sc2 = $_POST['sc2'];
		$sc3 = $_POST['sc3'];
		mysqli_query($link,"insert s_score (s_no,co_name,s_sco) values ('$s_id','数据库','$sc1')");
		mysqli_query($link,"insert s_score (s_no,co_name,s_sco) values ('$s_id','C++','$sc2')");
		mysqli_query($link,"insert s_score (s_no,co_name,s_sco) values ('$s_id','PHP','$sc3')");
		$_SESSION['s_id'] = $s_id;
		header('location:score.php');
	}
	mysqli_close($link);
	?>
	<p align="center"><input type="button" value="返回" name="inbut" onClick="location.href='score.php'"/></p>
</body>
</html>