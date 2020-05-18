<?php 
set_time_limit(0);
error_reporting(0);
$msg = "<p style='color:#00FF00'>Input Database Info</p>";
function check($h,$u,$p,$db){
	global $msg;
	$con = mysql_connect($h,$u,$p);
	if (!$con) {
		$msg = '<p>'.mysql_error().'<br>'.'Input Correct Host,User and Pass';
	}else{
		$conf = fopen("conf.php", "w") or die("Unable to open conf.php!");
$conf_txt = '
<?php 
$host = "'.$h.'";
$user = "'.$u.'";
$pass = "'.$p.'";
$db = "'.$db.'";
?>';
				
			$file = fwrite($conf, $conf_txt);
			if ($file) {
				$msg = "<p style='color:#00FF00'>File Create Successfull.....<br> Page will be redirect after 3 seconds...</p>";
				$url = "dbsetup.php";


				$ren = rename($_SERVER['SCRIPT_FILENAME'], 'temp_create.php');
				if($ren) {
					header('Refresh: 4 '.$url);
				}
				
			
			}
			fclose($conf);


				}
			}

	if (!empty($_POST['submit'])) {
		if (!empty($_POST['host']) && !empty($_POST['username']) && !empty($_POST['database'])){
			
			$host = $_POST['host'];
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$db = $_POST['database'];

			check($host,$user,$pass,$db);

		
		}else {
			$msg = "<p>Invalid Input</p>";
		}
	}

	
	
?> 


<!DOCTYPE html>
<html>
<head>
	<title>Setup Database Settings</title>
	<style type="text/css">
		body{
			background: #212f3c;
			color: white;
			font-family: sans-serif;

		}
		h3{
			text-align: center;
			color: aqua;
		}

		.db-data{
			border:2px solid red;
			border-radius: 30px;
			padding: 20px 10px;
			padding-top: 30px;
			width: 350px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			text-align: center;
		}

		img{
			width: 200px;
		}


		form{
			width: 90%;
			margin: auto;
			color: red;
		}
		.p>p{
			margin: 0 auto;
			text-align: center;
		}

		input[type='text'],
		input[type='password'],
		input[type='submit']{
			border: 0;
			width: 200px;
			padding: 5px 20px;
			display: block;
			border: 2px solid red;
			background: none;
			margin: 10px auto;
			border-radius: 20px;
			transition: 0.2s;
			text-align: center;
			color: #2ECCFA;
			font-size: 15px;
		}

		input[type='submit']{
			cursor: pointer;
			background: #b03a2e;
		}
		input[type='submit']:hover{
			background:  #e74c3c ;
		}

		input[type='text']:focus,
		input[type='password']:focus{
			width: 250px;
		}





	</style>
</head>
<body>
	<div class="db-data">
		<img class="img" src="../img/logo.png">
		<form action="" method="POST">
			<h3>Create Lab Configuration</h3>
			<input type="text" name="host" placeholder="Host" value="localhost" required="required">
			<input type="text" name="username" placeholder="Username"required="required">
			<input type="password" name="password" placeholder="Password">
			<input type="text" name="database" placeholder="Database Name" required="required">
			<input type="submit" name="submit" value="Setup"><br>
			<div class="p"><?php echo $msg; ?></div>
		</form>

	</div>
</body>
</html>