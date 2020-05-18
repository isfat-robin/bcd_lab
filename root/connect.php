<?php
set_time_limit(0);
error_reporting(0);
if (file_exists("root/conf.php")) {
	$conf = "root/conf.php";
	$db_file = "root/dbsetup.php";
	$dashboard = "dashboard.php";
}elseif (file_exists("conf.php")) {
	$conf = "conf.php";
	$db_file = "dbsetup.php";
	$dashboard = "../dashboard.php";
}elseif (file_exists("../root/conf.php")) {
	$conf = "../root/conf.php";
	$db_file = "../root/dbsetup.php";
	$dashboard = "dashboard.php";
}
else{
	if (file_exists("create.php")) {
		$cr_page = "create.php";
		header('location: '.$cr_page);
	}
	elseif (file_exists("root/create.php")) {
		$cr_page = "root/create.php";
		header('location: '.$cr_page);
	}
	elseif(file_exists("../root/create.php")){
		$cr_page = "../root/create.php";
		header('location: '.$cr_page);
	}
	else{
		echo "File Doesn't Exist..... :(";
	}
}

if ($conf) {
	require_once $conf;
	$con = mysql_connect($host, $user, $pass);
	if (!$con) {
		echo "db connection failed &#9785;";
	}else{
		$db_connect = mysql_select_db($db);
		if (!$db_connect) {
			header("location:".$db_file);
		}else{
			//echo "[&#10004;] ~~ Connection All OK :)";
		}
	}
}

?>
