<?php
	// header("Content-Type:text/html;charset=utf-8");
	function htmtocode($content){
		$content = str_replace("\n","</br>",str_replace(" ","&nbsp;",$content)); 
		//代替
		return $content;
	}
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
	$user = @$_POST['users_admin'];
	$psd = @$_POST['password'];
	$ad_ph = @$_FILES['file']['name'];
	// $md_ad_ph = md5($ad_ph);
	$postfix = @$_FILES['file']['type'];
	$pdo = new PDO("mysql:host=localhost;dbname=db_admin","root","root");
	// echo "PDO连接成功";
	$rs = $pdo -> query("select user from tb_admin where user = '$user'"); 
	$row = $rs -> fetch();
	// while($row = $rs -> fetch()){ 
	// 	if(@$_POST['users_admin'] == $row['user']){
	// 		$a = 1;
	// 		$a++;
	// 	}
	// 	if(@$_POST['users_admin'] != $row['user']){
	// 		$a = 0;
	// 	}
	// }
	// var_dump($row);
	if (isset($_POST['sub'])) {
		@session_start();
		if ($_POST['users_admin']=='') {
			echo "<script>alert('用户名不能为空！');</script>";
		}else if($_POST['password'] == ''){
			echo "<script>alert('密码不能为空！')</script>";
		}else if($_POST['password_r']==''){
			echo "<script>alert('请再次输入密码!');</script>";
		}else if($_POST['inputverify']==''){
			echo "<script>alert('验证码不能为空！');</script>";
		}else if($_POST['password_r'] != $_POST['password']){
			echo "<script>alert('两次密码不同!')</script>";
		}else if(@$_FILES['file']['name'] == null ){
			echo "<script>alert('请放入头像!')</script>";
		}else{
			if (@$_POST['inputverify'] == $_SESSION['code']) {	//验证码是否正确
				
				if($row == ''){
					// $sql = ;
					// var_dump($user);
					$rel = $pdo -> prepare("insert into tb_admin(user,password,add_ph) values('$user','$psd','$ad_ph')");
					$rel -> execute();
				     move_uploaded_file($_FILES["file"]["tmp_name"],"ph_admin/".$ad_ph);
				     echo "<script>alert('增加成功!')</script>;";
				}else {

					echo "<script>alert('账号已存在！');</script>";
				}
				
			}else{
				echo "<script>alert('验证码错误！');</script>";
				echo "<script>window.location.href='admin_add_admin.php';</script>";
			}
		}
	}
?>
