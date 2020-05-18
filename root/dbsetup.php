<head>
	<style type="text/css">
		body{
			background: black;
			color: white;
			font-family: sans-serif;
		}

		p{
			text-align: left;

		}

		.box{
			height: 300px;
			width: 400px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
	</style>
</head>

<div class="box">
<?php
error_reporting(0);

$conf = 'conf.php';
if (file_exists("create.php")) {
    $crt ='create.php';
}elseif (file_exists("temp_create.php")) {
    $crt = 'temp_create.php';
}

if (file_exists($conf)){
    require 'conf.php';
    echo  "[ok] ~~  Configuring Database.....";
    $con = mysql_connect($host, $user, $pass);
    if (!$con){
        die("Connection error");
        echo "<p>" . mysql_errno() . "</p>";
        header('Refresh 3: create.php');
    }else{
        echo "<p> [&#10004] ~~  Main Database Connect OK ..............</p>";
        configure();
    }
}else{
    header('location: '.$crt);
}

    // &check;
    // &#10004;
        function configure(){
        global $db, $crt;
        $url = '../main.php';

        //Check Databse ---------------------
            if (mysql_select_db($db)) {
                echo "<p> [x] ~~  Databse Already Exist ...... </p>";

                echo "<p> [&check;] ~~  Database Selected ..............</p>";
                $db_select = mysql_select_db($db);
               
            }else{
                 //Creating Databse -------------------
                 $sql = "CREATE database IF NOT EXISTS`" . $db . "` CHARACTER SET `utf8`";
                if (mysql_query($sql))
                {
                echo "<p> [&#10004;] ~~  Creating Database Ok<b><i> " . $db . "  </i></b>..............</p>";
                if (mysql_select_db($db)) {
                    $db_select = mysql_select_db($db);
                    echo "<p> [&check;] ~~  Database Selected ..............</p>";
                }
                }
                else
                {
                echo "<p> [x] ~~  Unable to create Database " . $db, mysql_error() , "</p>";
                }
            }

        //select database
        if ($db_select){           
            $users = mysql_query("select 1 from users");
            $cookies = mysql_query("select 1 from cookies");
            $challenge = mysql_query("select 1 from challenge");
            
            if (!$users or !$cookies or !$challenge) {
            
            //Creating Table ----------------
            $sql = "CREATE TABLE IF NOT EXISTS `users` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `location` TEXT NOT NULL , `email` VARCHAR(60) NOT NULL , `password` TEXT NOT NULL , `pass` TEXT NOT NULL , PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB";

            if (mysql_query($sql))
            {
                echo "<p> [&#10004;] ~~  Users table Created ...............</p>";
            }
            else
            {
                echo "<p> [x] ~~  Unable to create users </p>", mysql_error();
            }


            //Creating Table Extra usr ---------------

            $sql = "CREATE TABLE IF NOT EXISTS `usr` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `username` VARCHAR(50) NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`), UNIQUE (`username`)) ENGINE = InnoDB;";

            if (mysql_query($sql))
            {
                echo "<p> [&#10004;] ~~  usr table Created ..............</p>";
            }
            else
            {
                echo "<p> [x] ~~  Unable to create usr</p>";
            }



            //Creating Table 2 ----------------
            $sql = "CREATE TABLE IF NOT EXISTS `cookies` ( `id` INT(5) NOT NULL auto_increment, `name` TEXT NOT NULL , `value` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

            if (mysql_query($sql))
            {
                echo "<p> [&#10004;] ~~  Cookies table Created ..............</p>";
            }
            else
            {
                echo "<p> [x] ~~  Unable to create Cookies</p>";
            }


            //Creating Table 3 ----------------
            $sql = "CREATE TABLE IF NOT EXISTS `challenge` ( `id` INT(5) NOT NULL auto_increment, `labs` TEXT NOT NULL , `result` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

            if (mysql_query($sql))
            {
                echo "<p> [&#10004;] ~~  Challenge table Created ..............</p>";
            }
            else
            {
                echo "<p> [x] ~~  Unable to create Challenge</p>";
            }


            //Inserting Data -----------------
            $insert = "INSERT INTO `users`( `name`, `location`, `email`, `password`, `pass`) VALUES 
	('Admin','BD','admin@mail.com','21232f297a57a5a743894a0e4a801fc3','admin'),
	('Jhon','USA','jhon@mail.com','4d2ff2f945883e090ac4de4fb9e23fab', 'jhon123'),
	('Root','AUS','root@mail.com','ff9830c42660c1dd1942844f8069b74a', 'root123'),
	('Micle','UK','micle@mail.com','132bc1a6916e11e35f4d115c6a5972b9', 'micle123'),
	('David','London','david@mail.com','55fc5b709962876903785fd64a6961e5', 'david123')
	";

            if (mysql_query($insert))
            {
                echo "<p> [&#10004;] ~~  Data Inserted ..............</p>";

            }
            else
            {
                echo "<p> [x] ~~  Unable to Insert Data" . mysql_error() . "</p>";
            }


            $insert = "INSERT INTO `usr`(`name`, `username`, `password`) VALUES ('Offensive Root','admin','root'),('Isfat Robin','isfat','admin123'),('Jhon Davis','jhon','pass123')";
            if (mysql_query($insert)) {
                echo "<p> [&#10004;] ~~  usr Data Inserted ..............</p>";

            }else{
                echo "<p> [x] ~~  Unable to Insert usr Data" . mysql_error() . "</p>";
            }




            $insert = "INSERT INTO `challenge`(`labs`, `result`) VALUES ('indexpage',0),('notfound',0)";
            if (mysql_query($insert)) {
                echo "<p> [&#10004;] ~~  Challenge Data Inserted ..............</p>";
                header('Refresh: 4 ' . $url);

            }else{
                echo "<p> [x] ~~  Unable to Insert Challebge Data" . mysql_error() . "</p>";
            }



        }else{
                echo "<p> [x] ~~  All Data already Updated......" . mysql_error() . "</p>";
                header('Refresh: 4 ' . $url);
            }
        }
        else
        {
            echo "<p> [x] ~~  Database Select Failed </p>";
            echo "<p> [x] ~~  Please Check your username or password is right or not? </p>";
            header('Refresh: 5 ' . $crt);
        }

    }
    

?>

</div>

