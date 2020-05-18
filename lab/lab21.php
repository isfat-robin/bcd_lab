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



$frm_result = "<p style='color:coral'>Change Password </p>";

if (isset($_POST['result'])) {
	if (!empty($_POST['name']) or !empty($_POST['pass'])) {
		$user = $_POST['name'];
		$pass = $_POST['pass'];

		$sql="SELECT username, password FROM usr WHERE username= '$user' LIMIT 0,1";

		$result=mysql_query($sql);
		$sql = mysql_fetch_array($result);


		if ($sql) {	
			$update="UPDATE usr SET password = '$pass' WHERE username='$user'";

			if (mysql_query($update)) {
				$frm_result = "<p style='color: #00ff00;'> &check; Data Updated Sucessfully.";

			}else{
				$frm_result = "<p style='color:coral'> Something went wrong <br>".mysql_error().'</p>';
			}

		}else{
			$frm_result = "<p style='color:coral'> `(-_-)`</p>";
		}
	}else{
		$frm_result = "<p>Invalid Input </p>";
	}
}

?>

<div class="data">
    <h3>Update Password</h3>

    <div class="frm-box">
    	<form action="" method="POST">
    		<input type="text" name="name" placeholder="Username">
    		<input type="text" name="pass" 	placeholder="Password">
    		<input type="Submit" name="result" value="Submit">
    	</form>
    	<?php 
    		echo $frm_result;
    	?>
    </div>

</div>