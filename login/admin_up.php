<style type="text/css">
	table{
		text-align: center;
		margin-top: 10px;
		margin-left: 10px;
	}
	table tr{
		height: 15px;
	}
	table tr td{
		width: 120px;
	}
	/*table tr td input{float: left;}*/
</style>
<?php 
	@mysql_connect('localhost','root','root') or die("数据库连接失败");
	@mysql_select_db('db_admin')or die ("数据表选择失败");
	$sql = mysql_query("select id,user,password from tb_admin");
?>
	<table>
		<tr>
			<td>用户名</td>
			<td>密码</td>
		</tr>
	</table>
<?php
	while($row = mysql_fetch_array($sql)){
?>
	<table>
		<tr>
			<td><?php echo $row['user']?></td>
			<td><?php echo $row['password']?></td>
			<?php $id = $row['id']?>
			<form method="post" action="d_alter.php">
			<td>
				<input type="text" value="<?php echo $id?>" name="alt" hidden="hidden">
				<input type="submit" name="sub" value="修改">
			</td>
			</form>
			<form method="post" action="update.php">
			<td>
				<input type="submit" name="submit" value="删除">
				<input type="text" value="<?php echo $id?>" name="delete" hidden="hidden">
			</td>
			</form>
			
		</tr>
	</table>
<?php
	}
	@$id_num = $_POST['delete'];
	if(isset($_POST['sub'])){

	}else if(isset($_POST['submit'])){
		$delete = "delete from tb_admin where id = $id_num";
		$del = mysql_query($delete);
		echo "<script>alert('删除成功!');</script>";
		echo "<script>window.location.href='update.php';</script>";

	}
 ?>