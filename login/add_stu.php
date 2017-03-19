<?php 
	@mysql_connect('localhost','root','root') or die("数据库连接失败");
	@mysql_select_db('db_student') or die("数据库选择失败");
	mysql_query("set names 'utf8';");
	$user = @$_POST['users_stu'];
	$psd = @$_POST['password'];
	$name = @$_POST['name'];
	$clas = @$_POST['class'];
	$pre = @$_POST['profession'];
	$ad_ph = @$_FILES['file']['name'];
	// $md_ad_ph = md5($ad_ph);
	$postfix = @$_FILES['file']['type'];
	// $pdo = new PDO("mysql:host=localhost;dbname=db_admin","root","root");
	// echo "PDO连接成功";
	$sql = "select stu_num from tb_stu where stu_num = '$user'";
	$rs = mysql_query($sql); 
	$row = mysql_fetch_array($rs);

	
	if (isset($_POST['sub'])) {
		@session_start();
		if ($_POST['users_stu']=='') {
			echo "<script>alert('学号不能为空！');</script>";
		}else if($_POST['password'] == ''){
			echo "<script>alert('密码不能为空！')</script>";
		}else if($_POST['profession']==''){
			echo "<script>alert('专业不能为空!');</script>";
		}else if($_POST['class'] == ''){
			echo "<script>alert('班级不能为空!');</script>;";
		}else if($_POST['inputverify']==''){
			echo "<script>alert('验证码不能为空！');</script>";
		}else if($_POST['name'] == ''){
			echo "<script>alert('名字不能为空!');</script>";
		}else if(@$_FILES['file']['name'] == null ){
			echo "<script>alert('请放入头像!')</script>";
		}else{
			if (@$_POST['inputverify'] == $_SESSION['code']) {	//验证码是否正确
				
				if($row == ''){
					// $sql = ;
					// var_dump($user);
					// $inser = ;
					$rel = mysql_query("insert into tb_stu(stu_num,password,stu_ph,name,class,profession) values('$user','$psd',
					'$ad_ph','$name','$clas','$pre')");
					// $rel -> execute();
				     move_uploaded_file($_FILES["file"]["tmp_name"],"ph_stu/".$ad_ph);
				     echo "<script>alert('增加成功!');</script>";

				}else {

					echo "<script>alert('账号已存在！');</script>";
				}
				
			}else{
				echo "<script>alert('验证码错误！');</script>";
				echo "<script>window.location.href='admin_add_stu.php';</script>";
			}
		}
	}
 ?>