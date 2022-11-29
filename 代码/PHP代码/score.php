<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>成绩单</title>
</head>

<body>
	<h1 align="center">学生成绩信息</h1>
	<p align="center"><input type="button" value="新增" name="inbut" onClick="location.href='score_insert.php'"/></p>
	<table align="center" border="1px" cellspacing="0px" width="800px">
			<tr><th>学号</th><th>科目</th><th>分数</th><th>操作</th></tr>
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
	session_start();
	$s_no = $_SESSION['s_id'];
	$res = mysqli_query($link,"select * from s_score where s_no like '%$s_no%'");
	unset ($_SESSION['s_id']);
		while ($row = mysqli_fetch_array($res)){
			echo '<tr align="center">';
			echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>
					<td>
					<input type='submit' name='upsub1$row[0]' value='修改'/>
					<input type='submit' name='delsub1$row[0]' value='删除'/></td>";
			echo '</tr>';
			
			if(!empty($_POST["upsub1$row[0]"])){
				echo '<tr align="center">';
				echo "<td>$row[0]</td><td>$row[1]</td>
						<td><input type='text' name='upsc1' value='$row[2]' /></td>
						<td><input type='submit' value='确认修改' name='upsubs1$row[0]'/></td>
						<td><input type='submit' value='返回' name='return' onClick='location.href='score.php''/>
						</td>";
				echo '</tr>';
			}
			if(!empty($_POST["upsubs1$row[0]"])){
				$upsc1 = $_POST['upsc1'];
				mysqli_query($link,"update s_score set s_sco='$upsc1' where s_no = '$row[0]' AND co_name = '$row[1]'");
				header('location:#');
			}
			if (!empty($_POST["delsub1$row[0]"])){
			$_SESSION['del'] = $row[0];
			//弹窗
			echo '<script>
				 if (confirm("是否删除?") == true){
				 	location.href="del_score.php";
				 }
			     </script>';
			}
		}
	?>
		<p align="center"><input type="button" value="返回" name="inbut" onClick="location.href='myschool.php'"/></p>
</body>
</html>