<?php
set_time_limit(0);
error_reporting(0);
if (file_exists('root/connect.php') && file_exists('pages/banner.php')) {
	include "root/connect.php";
	include 'pages/banner.php';
}elseif (file_exists('../root/connect.php') && file_exists('../pages/banner.php')) {
	include "../root/connect.php";
	include '../pages/banner.php';
}else{
	include "connect.php";
	include 'pages/banner.php';
}
$err = '';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "SELECT * FROM `users` WHERE id = (('$id')) LIMIT 0,1";
	$data = mysql_fetch_array(mysql_query($sql));

	if($data && !empty($data)){
		$err = "<div class='data'><p> Page is absolutly OK <br> <strong> Dump Data To Server <strong>
			</p></div>";
	}else{

		$err = "<div class='data'><p>Page Have been something Wrong.
			</p></div>";
	}
}
else{
	 if (isset($_GET['id']) && empty($_GET['id'])) {
		$err = 'Your id perameter value is null. Please Input a value.';
	}
	else{
		$err = 'Input a id perameter.';
	}
}

?>

<div class="data">
	<h2>Dump Data</h2>
    <p style="color:#17a589; font-size: 1rem"><?php echo $err; ?></p>

</div>