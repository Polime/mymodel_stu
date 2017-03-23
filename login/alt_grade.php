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

	$pdo = new PDO("mysql:host=localhost;dbname=db_student",'root','root');


	$pro = @$_POST['pro'];
	$class = @$_POST['class'];
	$info = @$_POST['info'];

	// var_dump($pro);
	// var_dump($class);
	// var_dump($info);

	if($info == '' && $pro == '' && $class == ''){
		$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num order by tb_stu.stu_num asc,profession asc";
	}else{
	if (preg_match('/^\d{12}$/', $info)) {

		$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num and tb_stu.stu_num = '$info' order by tb_stu.stu_num asc,profession asc ";
	}else if ($info =='') {

		if ($pro == ''||$class == '') {
			$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where 
		tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num and (class='$class' or profession = '$pro') order by tb_stu.stu_num asc,profession asc";
		}else if ($pro == ''&&$class == '') {
			$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num order by tb_stu.stu_num asc,profession asc";
		}else {
			$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num and profession = '$pro' and class = '$class' order by tb_stu.stu_num asc,profession asc ";
		}
	}else{
		$sql = "select tb_stu.stu_num,name,class,profession,class_name,grade from tb_stu,tb_grade,tb_class where 
		(tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num) and (class='$info' or profession = '$info' or grade = '$info' or name = '$info') order by tb_stu.stu_num asc,profession asc";
	}

}
	$alt = $pdo->query($sql);
?>
	<table>
 		<tr>
 			<td>学号</td>
 			<td>姓名</td>
 			<td>班级</td>
 			<td>专业</td>
 			<td>课目</td>
 			<td>分数</td>
 		</tr>
 	</table>
<?php
	
	while($row = $alt->fetch()){
		
 ?>
 	

 	<table>
 		<tr>
 			<td><?php echo $row['stu_num'];?></td>
 			<td><?php echo $row['name'];?></td>
 			<td><?php echo $row['class'];?></td>
 			<td><?php echo $row['profession'];?></td>
 			<td><?php echo $row['class_name'];?></td>
 			<td><?php echo $row['grade'];?></td>
 			<td>
 				<form method="post" action="g_alter.php">
 				<?php $stu_n = $row['stu_num'];?>
 				<?php $cla_name = $row['class_name']; ?>
 					<input type="submit" name="" value="修改">
 					<input type="hidden" name="stu" value="<?php echo $stu_n?>">
 					<!-- <input type="hidden" name="clas_name" value="<?php echo $cla_name?>"> -->
 				</form>
 			</td>
 		</tr>
 	</table>
 <?php    
	}
?>
