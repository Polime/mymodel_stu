<?php 
	@mysql_connect('localhost','root','root') or die("数据库连接失败");
	@mysql_select_db('db_student') or die("数据库选择失败");
	$sql = "select "
 ?>