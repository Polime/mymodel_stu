<style type="text/css">
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
	@session_start();
	// $pdo -> new PDO("mysql:host=localhost;dbname=db_student","root","root");
	$pdo = new PDO("mysql:host=localhost;dbname=db_student",'root','root');
	// if($pdo){echo "!";}
	$num = $_SESSION['stu_num'];
	$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num and tb_stu.stu_num = $num order by tb_stu.stu_num";
	// $res = $pdo->prepare($sql);
	// $res->execute();
	// $row = $res -> fetch(PDO::FETCH_BOTH);
	// while ($row) {	
	// 	var_dump($row);
	// }

	// while($row = $res->fetch()){
	// 	print_r($row);
	// }

	// @mysql_connect('localhost','root','root');
	// @mysql_select_db('db_student');
	// $re = mysql_query($sql);
	// $row = mysql_fetch_array($re);
	// print_r($row);

	$sth = $pdo->query($sql);
	// var_dump($sth);
?>
	<!-- <section>
		<option></option>
	</section> -->
	<table>
 		<tr>
 			<td>学号</td>
 			<td>姓名</td>
 			<td>班级</td>
 			<td>专业</td>
 			<td>课程名</td>
 			<td>分数</td>
 		</tr>
 	</table>
<?php
	
	while($row = $sth->fetch()){
 ?>
 	

 	<table>
 		<tr>
 			<td><?php echo $row['stu_num'];?></td>
 			<td><?php echo $row['name'];?></td>
 			<td><?php echo $row['class'];?></td>
 			<td><?php echo $row['profession'];?></td>
 			<td><?php echo $row['class_name'];?></td>
 			<td><?php echo $row['grade'];?></td>
 		</tr>
 	</table>
 <?php    
	}
?>
