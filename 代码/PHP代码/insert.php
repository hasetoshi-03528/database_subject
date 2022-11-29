<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新增学生记录</title>
</head>

<body>
	<h1 align="center">新增学生记录</h1>
	<form action="" method="post" name="inf">
	<p align="center">学生学号：<input type="text" name="s_id" /></p>
	<p align="center">学生名字：<input type="text" name="s_n" /></p>
	<p align="center">学生性别：<input type="text" name="s_s" /></p>
	<p align="center">学生年龄：<input type="text" name="s_a" /></p>
	<p align="center">学生专业：<input type="text" name="s_c" /></p>
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
		$s_n = $_POST['s_n'];
		$s_s = $_POST['s_s'];
		$s_a = $_POST['s_a'];
		$s_c = $_POST['s_c'];
		mysqli_query($link,"insert students (s_id,s_name,s_sex,s_age,s_course) values ('$s_id','$s_n','$s_s','$s_a','$s_c')");
		$_SESSION['succese'] = '添加成功!';
		header('location:myschool.php');
	}
	mysqli_close($link);
	?>
	<p align="center"><input type="button" value="返回" name="inbut" onClick="location.href='myschool.php'"/></p>
</body>
</html>