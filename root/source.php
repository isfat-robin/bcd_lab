<?php
set_time_limit(0);
error_reporting(0);

if (file_exists('root/connect.php')) {
	include "root/connect.php";
}elseif (file_exists('../root/connect.php')) {
	include "../root/connect.php";
}else{
	include "connect.php";
}

//custom url ------------------

$home = $_SERVER['PHP_SELF'];
$p = '&id=1';
$slf = $home.'?';
$uri = $_SERVER['REQUEST_URI'];
function explod ($items,$string) {
	$rep = str_replace($items, $items[0], $string);
   	$exp = explode($items[0], $rep);
   	return  $exp;
}

$fname = explod(array("&","?"),$uri);

if (!empty($fname[1]) && $fname[1] != ''){
	$source = 'lab/'.$fname[1].'.php';
}else{
	$page = 'pages/indexpage.php';
}

if (!empty($fname[1]) && $fname[1] != $home) {
	if (file_exists($source)) {
		$page = $source;
	}else{
		$page = 'pages/notfound.php';
	}
}



//Textarea Link Box-------------------
$index_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$index_url = urldecode($index_url);
$index_url = str_replace([" ", "++"], "+", $index_url);

if (isset($_POST['execute']) && !empty($_POST['url'])) {
	$final_url = $_POST['url'];
	$final_url = preg_replace("/\r|\n/", " ", $final_url);
	header('location:'.$final_url);
}



//Progress Bar -------------------

$job_done = mysql_query("SELECT * from challenge WHERE result = 5");
$job_done = mysql_num_rows($job_done);
if ($job_done < 1) {
	$job_done = 1;
}else{
	$job_done = $job_done * 4.5;
	$job_done = intval($job_done);
	if ($job_done > 100) {
		$job_done = 100;
	}
}

$job_done = $job_done.'%';



//Submit Data ----------------------

if (isset($_POST['sql_submit'])) {
	if (!empty($_POST['sub_mail']) && !empty($_POST['sub_pass']) && !empty($_POST['sub_page_link']) && !empty($_POST['main_url'])) {
		$lab_mail = $_POST['sub_mail'];
		$lab_pass = md5($_POST['sub_pass']);
		$lab_name = $_POST['sub_page_link'];
		$main_url = $_POST['main_url'];

		if ($lab_name == "indexpage" OR $lab_name == "notfound" OR $lab_name == "lab13") {
			echo '<script type="text/javascript">
 				alert("Soryy! No need to submit for this page ('.$lab_name.')")</script>';
		}else{
			$sub_sql = "SELECT * FROM `users` WHERE email = '$lab_mail' and password = '$lab_pass' ";
			$data = mysql_fetch_row(mysql_query($sub_sql));
			if (!empty($data)) {
				$sub_data = "SELECT * from challenge WHERE labs = '$lab_name'";
				$sub_data = mysql_num_rows(mysql_query($sub_data));
				if ($sub_data == 0) {
					$sub_sql= "INSERT INTO `challenge`(`labs`, `result`) VALUES('$lab_name', 5)";
					$sub_sql= mysql_query($sub_sql);
					if (!$sub_sql) {
						echo '<script type="text/javascript">
 						alert("Data doesn\'t inserted");</script>';
					}else{
						echo '<script type="text/javascript">
 						alert("Well Done. Data Submitted Sucess fully")</script>';
 						header('Refresh: 0');
					}
				}elseif ($sub_data == 1) {
					echo '<script type="text/javascript">
 					alert("Alreday Submitted Results...")</script>';
				}else{
					echo '<script type="text/javascript">
 					alert("Something Went Wrong ...")</script>';
				}
			}else{
				echo '<script type="text/javascript">
 				alert("Data Incorrect")</script>';
			}
	
		}
	}else{
		echo '<script type="text/javascript">
 		alert("Input Some Values")</script>';
	}
}





?>