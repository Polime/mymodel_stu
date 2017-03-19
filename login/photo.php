<?php 
	@session_start();
	$admin_name = $_SESSION['user'];
	// var_dump($admin_name);
	@mysql_connect('localhost','root','root');
	mysql_select_db('db_admin');
	$select = "select add_ph from tb_admin where user  = '$admin_name'";
	$add = mysql_query($select);
	$add_ph = mysql_fetch_assoc($add);
	// print_r($add_ph);
	foreach ($add_ph as $photo) {
		// echo $photo;
?>

	<img src="ph_admin/<?php echo $photo;?>">
<?php
	}
	// echo $add_ph['0'];
	?>
	
	

	