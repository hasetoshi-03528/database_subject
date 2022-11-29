<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>学生信息首页-myschool.php</title>
</head>

<body>
	<h1 align="center">学生信息</h1>
	<form action"" method="post" name="indexf">
		<p align="center"><input type="button" value="新增" name="inbut" onClick="location.href='insert.php'"/></p>
		<p align="center"><input type="text" name="sel"/><input type="submit" value="搜索" name="selsub"/></p>
		<table align="center" border="1px" cellspacing="0px" width="800px">
			<tr><th>学号</th><th>学生名字</th><th>学生性别</th><th>学生年龄</th><th>专业</th><th>操作</th><th>成绩查看</th></tr>
<?php
	session_start();
	if (isset($_SESSION['succese'])){
		echo '<p align="center">'.$_SESSION['succese'].'</p>';
		unset($_SESSION['succese']);
	}
	$link = mysqli_connect('localhost','root','035289Th','myschool');
		if (!$link){
			exit('数据库连接失败！');
		}
		if (empty($_POST["selsub"])){
			$res = mysqli_query($link,"select * from students order by s_id");//全结果集
		}else{
			$sel = $_POST["sel"];
			$res = mysqli_query($link,"select * from students where s_id like '%$sel%' or s_name like '%$sel%' or s_sex like '%$sel%' or s_age like '%$sel%' or s_course like '%$sel%'");//搜索框得到的结果集
		}
		while ($row = mysqli_fetch_array($res)){
			echo '<tr align="center">';
			echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
					<td>
					<input type='submit' name='upsub$row[0]' value='修改'/>
					<input type='submit' name='delsub$row[0]' value='删除'/>
					</td>
					<td>
					<input type='submit' name='score$row[0]' value='成绩查看'/>
					</td>";
			echo '</tr>';
			/*在修改里面不添加学号内容可以做到保护学号不被修改
				因为我设计的数据库是学号不可改，学生信息可以改*/
			if(!empty($_POST["upsub$row[0]"])){
				echo '<tr align="center">';
				echo "<td>$row[0]</td>
						<td><input type='text' name='ups_n' value='$row[1]' /></td>
						<td><input type='text' name='ups_s' value='$row[2]' /></td>
						<td><input type='text' name='ups_a' value='$row[3]' /></td>
						<td><input type='text' name='ups_c' value='$row[4]' /></td>
						<td><input type='submit' value='确认修改' name='upsubs$row[0]'/></td>
					<td><input type='submit' value='返回' name='return' onClick='location.href='myschool.php''/></td>";
				echo '</tr>';
			}
			//修改
			if(!empty($_POST["upsubs$row[0]"])){
				$ups_n = $_POST['ups_n'];
				$ups_s = $_POST['ups_s'];
				$ups_a = $_POST['ups_a'];
				$ups_c = $_POST['ups_c'];
				mysqli_query($link,"update students set s_name='$ups_n',s_sex='$ups_s',s_age=$ups_a,s_course='$ups_c' where s_id=$row[0]");
				header('location:#');
			}
			//删除
			if (!empty($_POST["delsub$row[0]"])){
			$_SESSION['del'] = $row[0];
			//弹窗
			echo '<script>
				 if (confirm("是否删除?") == true){
				 	location.href="del.php";
				 }
			     </script>';
			}
			if(!empty($_POST["score$row[0]"])){
				$_SESSION['s_id'] = $row[0];
				header('location:score.php');
			}
		}
		mysqli_close($link);
?>
		</table>
	</form>
</body>
</html>