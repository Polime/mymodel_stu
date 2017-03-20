<?php  
	// $pdo -> new PDO("mysql:host=localhost;dbname=db_student","root","root");
	$pdo = new PDO("mysql:host=localhost;dbname=db_admin","root","root");
	echo "数据库连接成功";
	// $sql = ;
	$res = $pdo -> query("select * from tb_stu,tb_grade,tb_class where tb_stu.stu_num = tb_grade.stu_num and tb_class.class_num = tb_grade.class_num");
	$row = $res -> fetch();
	print_r($row);
	// foreach ($res as $row) {
		// print_r($row);
	// }

	// @mysql_connect('localhost','root','root');
	// @mysql_select_db('db_student');
	// $re = mysql_query($sql);
	// $row = mysql_fetch_array($re);
	// print_r($row);
?>