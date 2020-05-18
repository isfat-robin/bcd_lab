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

	$sql = "SELECT * FROM `users` WHERE id = ('$id') LIMIT 0,1";
	$data = mysql_fetch_array(mysql_query($sql));

	if($data && !empty($data)){
		$name = $data['name'];
		$location = $data['location'];
		echo "<h2>Error Based Injection [String]</h2><div class='data'><p><strong>Name : </strong>".$name."<br>
			<strong>Location : </strong>".$location."</p></div>";
	}else{

		$err = "Data Doesn't Exists ".mysql_error();
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