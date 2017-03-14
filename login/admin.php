<?php 
	include('db_admin.php');
	try{
		$query = "select from tb_admin";
		$result = $pdo->prepare($query);
		$result->execute();
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
		echo $res[0];
	}catch(PDOException $e){
		die("Error!:".$e->getMessage()."</br>");
	}
 ?>