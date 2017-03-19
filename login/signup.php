<?php
	// header("Content-Type:text/html;charset=utf-8");
	function htmtocode($content){
		$content = str_replace("\n","</br>",str_replace(" ","&nbsp;",$content)); 
		//代替
		return $content;
	}
	// $db = 'mysql';
	// $loacl = 'loaclhost';
	// $name = 'root';
	// $pwd = 'root';
	// $dbname_admin = 'db_admin';
	// $dbname_stu = 'db_student';
	// $dsn_admin = "$db:host = $loacl;dbname = $dbname_admin";
	// $dsn_stu = "$db:host = $loacl;dbname = $dbname_stu";
	// try{
	// 	$pdo = new PDO($dsn,$name,$pwd);
	// 	echo "PDO连接成功";
	// 	$query = "select * from tb_admin";
	// 	$result = $pdo->prepare($query);
	// 	$result->execute();
	// 	$row = $result->fetchAll(PDO::FETCH_BOTH);
	// 	// var_dump($row);
	// 	// print_r($row);
	// 	 // var_dump($result);
	// 	$arr = $pdo->errorInfo();
	// 	print_r($arr); 
	// }catch(Exception $e){
	// 	echo $e->getMessage()."</br>";
	// }
	@session_start();
	if (preg_match('/^[A-Za-z]+$/', @$_POST['users_num'])) {
		$pdo_admin = new PDO("mysql:host=localhost;dbname=db_admin","root","root"); 
		$user = @$_POST['users_num'];
		$res = $pdo_admin -> query("select user,password from tb_admin where user = '$user'"); 
		// while($row = $rs -> fetch())
		// { 
			$row = $res -> fetch();
		// }
		$_SESSION['user'] = $row['user'];
	}else if (preg_match('/^\d{12}$/', @$_POST['users_num'])) {
		$pdo_stu = new PDO("mysql:host=localhost;dbname=db_student","root","root"); 
		$pdo_stu -> query("set names utf8;");
		$user = @$_POST['users_num'];
		$res = $pdo_stu -> query("select * from tb_stu where stu_num = '$user'");
		$row = $res -> fetch();
		$_SESSION['stu_num'] = $row['stu_num'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['pro'] = $row['profession'];
		$_SESSION['class'] = $row['class'];
	}
 ?>
 