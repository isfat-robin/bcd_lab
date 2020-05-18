<?php 
set_time_limit(0);
error_reporting(0);
$con_file = 'root/connect.php';
	if (file_exists($con_file)) {
		require_once $con_file;
		if ($db_connect){
			header('location: dashboard.php');
		}else{
			header('location: root/dbsetup.php');
		}
		
	}else{
		header('location: root/create.php');
		
	}
	
 ?>
