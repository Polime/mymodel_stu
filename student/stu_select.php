<?php 
  @session_start();
  $num = $_SESSION['stu_num'];
	$sub_sel = @$_POST['sel'];
  var_dump($num);
  var_dump($sub_sel);
	$pdo = new PDO("mysql:host=localhost;dbname=db_student",'root','root');
	$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num and tb_stu.stu_num = $num and profession = '$sub_sel' order by tb_stu.stu_num";
	$sth = $pdo->query($sql);
if(isset($_POST['sub'])){

 ?>
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
}
?>