<?php
	// header("Content-Type:text/html;charset=utf-8");
	function htmtocode($content){
		$content = str_replace("\n","</br>",str_replace(" ","&nbsp;",$content)); 
		//代替
		return $content;
	}
		$pdo= new PDO("mysql:host=localhost;dbname=db_student","root","root"); 
		$pdo -> query("set names utf8;");
		$pro = @$_POST['pro'];
		$class = @$_POST['class'];
		$info = @$_POST['info'];
		// if (isset($_POST['sub'])) {
			if (preg_match('/^\d{12}$/', $info)) {
			// 	$sql = ;
				$res = $pdo-> query("select * from tb_stu where stu_num = '$info'");
			}else if ($info =='') {
				// $sql = 
				if ($pro == ''||$class == '') {
					$res = $pdo-> query("select * from tb_stu where profession = '$pro' or class = '$class'");
				}
				else {
					$res = $pdo-> query("select * from tb_stu where profession = '$pro' and class = '$class'");
				}
				// $row = $res -> fetch();
			// }else if ($info == '' && $pro == ''  &&$class == ''){
			// 	$stu_num = $_POST['alt_stu_num'];
			// 	$name =  $_POST['alt_name'];
			// 	$class =  $_POST['alt_class'];
			// 	$pro =  $_POST['alt_pro'];
			// 	var_dump($stu_num);
			// 	var_dump($name);
			// 	var_dump($class);
			// 	var_dump($pro);
			// 	$sql = "update tb_stu set stu_num='$stu_num',name='$name',class='$class',profession='$pro'";
			// 	$pdo -> exec($sql);
			// 	echo "<script>alert(修改成功!);</script>";
			}else{
				// $sql = ;
				$res = $pdo-> query("select * from tb_stu where name = '$info'");
			// 	$row = $res -> fetch();
			}
		// }
		
		// while($row = $rs -> fetch())
		// { 
			// $row = $res -> fetch();
		// }
		// $pdo = new PDO("mysql:host=localhost;dbname=db_student","root","root"); 
		// $pro = @$_POST['pro'];
		// $class = @$_POST['class'];
		// $info = @$_POST['info'];
		// $res = $pdo -> query("select * from tb_stu where stu_num = '$info' and class = '$class'");
		// $row = $res -> fetch();
 ?>