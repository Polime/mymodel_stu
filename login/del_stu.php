<style type="text/css">
	#stu{
		text-align: center;
		margin-top: 10px;
		margin-left: 10px;
	}
	#stu tr{
		/*width: 30px;*/
		height: 10px;
	}
	#stu tr td{
		width:120px;
	}
	#stu tr td form{
		margin-top: 16px;
	}
	#hid{
		display: hidden;
	}
</style>
<?php 
	@mysql_connect('localhost','root','root') or die("数据库连接失败");
	@mysql_select_db('db_student') or die("数据库选择失败");

	$pro = @$_POST['pro'];
	$class = @$_POST['class'];
	$info = @$_POST['info'];
	// if (isset($_POST['sub'])) {
	if (preg_match('/^\d{12}$/', $info)) {
	// 	$sql = ;
		$res = mysql_query("select * from tb_stu where stu_num = '$info'");
	}else if ($info =='') {
		// $sql = 
		if ($pro == ''||$class == '') {
			$res = mysql_query("select * from tb_stu where profession = '$pro' or class = '$class'");
		}if ($pro == ''&&$class == '') {
			$res = mysql_query("select * from tb_stu");
		}
		else {
			$res = mysql_query("select * from tb_stu where profession = '$pro' and class = '$class'");
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
		$res = mysql_query("select * from tb_stu where name = '$info'");
	// 	$row = $res -> fetch();
	}
// }

	// $sql = "select id,stu_num,name,password,class,profession from tb_stu";
	$rs = $res;
?>
	<table id = "stu">
		<tr>
			<td>学号</td>
			<td>姓名</td>
			<td>密码</td>
			<td>班级</td>
			<td>专业</td>
			<!-- <td>
				<form method="post" action="admin_del_stu.php">
					<input type="submit" name="del" value="删除">
				</form>
			</td> -->
		</tr>
	</table>
	
<?php
	while($row = mysql_fetch_array($rs)){
?>
		<table id = "stu">
			<tr>
				<!-- <td id = "hid" name="id_num" hidden="hidden"><?php echo @$row['id']?></td> -->
				<td><?php echo @$row['stu_num']; ?></td>
				<td><?php echo @$row['name']; ?></td>
				<td><?php echo @$row['password']; ?></td>
				<td><?php echo @$row['class']; ?></td>
				<td><?php echo @$row['profession']; ?></td>
				<td>
				<form method="post" action="admin_del_stu.php" onsubmit="alert('删除成功');location.replace() ">
					<?php $id = $row['id']?>
					<input type="submit" name="submit" value="删除" onsubmit="">
					<input type="hidden" name="id_num" value="<?php echo $id?>">
				</form>
				</td>		
			</tr>
		</table>
<?php
	}
	$num = @$_POST['id_num'];
	if(isset($_POST['submit'])){
			$del = "delete from tb_stu where id = $num";
			// var_dump($num);
			$ds = mysql_query($del);
			echo "<script>location = 'admin_del_stu.php';</script>";
		}

 ?>



