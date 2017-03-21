<?php
	@session_start();
	$pdo = new PDO("mysql:host=localhost;dbname=db_student",'root','root');
	$num = $_SESSION['stu_num'];
	$stu_func = $pdo->query("select AVG(grade),count(class_num),count(grade>60) from tb_grade where stu_num = $num");
	$stu_function = $stu_func->fetch();
	// print_r($avg_num);
	$stu_avg = $stu_function[0];
	$stu_count = $stu_function[1];
	$stu_pass = $stu_function[2];
	// var_dump($avg_num);
	// echo $stu_sum.$stu_avg.$stu_pass;
 ?>