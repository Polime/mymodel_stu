<style type="text/css">
	select{
		margin-left: 20px;
		margin-top: 10px;
	}
	table{
		text-align: center;
		margin-top: 10px;
		margin-left: 10px;
	}
	table tr{
		height: 10px;
	}
	table tr td{
		width: 120px;
	}
</style>
<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=db_student","root","root");
 ?>
 <form method="post" action="admin_add_grade.php">
 	<select name="cl_na">
 	<option></option>
 <?php
 	$res = $pdo->query("select class_name from tb_class order by class_name");
 	while($row = $res->fetch()){
 ?>
 		<option><?php echo"$row[0]";?></option>
 <?php
 	}
 ?>
 	</select>
 	<select name="cl">
 		<option></option>
 <?php
 	$re = $pdo->query("select DISTINCT class from tb_stu order by class");
 	while($ro = $re->fetch()){
 ?>
 		<option><?php echo"$ro[0]";?></option>
 <?php
 	}
 ?>
 	</select>	
 	<select name="pro">
 		<option></option>
 <?php
 	$r = $pdo->query("select DISTINCT profession from tb_stu order by profession");
 	while($o = $r->fetch()){
 ?>
 		<option><?php echo"$o[0]";?></option>
 <?php
 	}
 ?>
 	</select>
 	<input type="submit" name="" value="确定" style="margin-left: 20px;">
 </form>
 <?php 
 	$n = @$_POST['cl_na'];
 	$c = @$_POST['cl'];
 	$p = @$_POST['pro'];
 	$sql = "select stu_num,name,profession,class,class_name from tb_class,tb_stu,tb_grade where tb_class.class_num = tb_grade.class_num and tb_stu.stu_num = tb_grade.stu_num and profession = $p and class = $c and class_name = $n order by stu_num";
 	$res_t = $pdo -> query($sql);
 ?>
 	<table>
 		<tr>
 			<td>专业</td>
 			<td>班级</td>
 			<td>课目</td>
 			<td>学号</td>>
 			<td>成绩</td>
 		<tr>
 			<td><?php echo $p;?></td>
 			<td><?php echo $c;?></td>
 			<td><?php echo $n;?></td>
 			<form method="post" action="admin_add_grade.php">
 				<td><input type="text" name="stu"></td>
 				<td><input type="text" name="gra"></td>
 				<td><input type="submit" name=""></td>
 			</form>
 		</tr>
 	</table>
 <?php
 	$grade = @$_POST['gra'];
 	$stu_num = @$_POST['stu'];
 	$ins = $pdo->exec("insert into tb_grade(grade) values('$grade') where stu_num = $stu_num");



  ?>