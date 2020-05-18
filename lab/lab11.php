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

	$sql = "SELECT * FROM `users` WHERE id = $id LIMIT 0,1";
	$data = mysql_fetch_array(mysql_query($sql));

	if($data && !empty($data)){
		echo "<h2>Blind SQL Injection [Integer]</h2><div class='data'><p>You are accepted in this page. <br> Now you have to chance to Do <strong> Blind SQL Here <strong>
			</p></div>";
	}else{

		$err = "You are trying to do somthing. Don't worry, Go ahead :)";
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
    <p style="color:#17a589; font-size: 1rem"><?php echo $err; ?></p>

</div>