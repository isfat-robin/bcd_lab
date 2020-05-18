<?php 
	include include '../root/source.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>indpage</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background: black;
			text-align: center;
			margin: 0 auto;
		}

		.content{
			margin: auto;
		}

		.content>p{
			text-align: justify;
			margin: 20px;
		}

		r{
			color: red;
		}

	</style>
</head>
<body>
	<div class="content">
		 <img class="mod-logo" src="img/logo.png" alt="">
		<h2>Welcome to Our SQLi lab</h2>
		<p>Hey. It's a great news for us, You are using our Lab.
		Thank's for choosing our lab to learn sql injection. It's a great time to learn Web Security for you. SQL injection is a first step to learn for web penatration testing. So with sql injection every hacker's known about web most common and basic problem's and vulnerability. I suggest that to everyone, please fisrt learn about php and database system and after try to do this. If you start trying to do now, Please At first read about us and Disclaimers (Click About button). <br>
		 </p><br>
		 <h3> <r>Your injection result is <?php echo $job_done; ?> </r> <br>Best Of luck. :) </h3>
		
	</div>

</body>
</html>