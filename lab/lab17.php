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


$frm_result = "<p style='color:coral'>LogIn to Database </p>";

if (isset($_POST['result'])) {
	if (!empty($_POST['name']) or !empty($_POST['pass'])) {
		$user = $_POST['name'];
		$pass = $_POST['pass'];


		$sql = "SELECT * FROM `users` WHERE email = $user and pass = $pass ";
		$frm_data = mysql_fetch_array(mysql_query($sql));
		if ($frm_data) {
			$frm_result = "<p style='color: #00ff00;'> &check; Logged In &#9763; <br> Hello <strong style='color: yellow;''>".$frm_data['name']."</strong><br>Your Email is : <strong style='color: yellow;'>".$frm_data['email'] ."</strong><br> Your Password is : <strong style='color: yellow;''>".$frm_data['password']."</strong><br> Please Crack this password and submit on result box bellow.";
		}else{
			$frm_result = "<p style='color:coral'> [X] Sorry Incorrect Entry
			<br>".mysql_error()."</p>";
		}
	}else{
		$frm_result = "<p>Invalid Input </p>";
	}
}

?>

<div class="data">
    <h3>Post SQL Injection [Error based Integer ]</h3>

    <div class="frm-box">
    	<form action="" method="POST">
    		<input type="text" name="name" placeholder="Username Or Email">
    		<input type="password" name="pass" 	placeholder="Password">
    		<input type="Submit" name="result" value="Submit">
    	</form>
    	<?php 
    		echo $frm_result;
    	?>
    </div>

</div>