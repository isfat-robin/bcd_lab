<?php
set_time_limit(0);
error_reporting(0);
include '/root/source.php';
include 'root/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
   <title>BCD SQL Injection Lab</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="https://res.cloudinary.com/bangladesh-cyber-defender/image/upload/v1582978229/bcd/BCD_Main_icon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Grand+Hotel|Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/mod.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>

<div class="popup" id="popup">
<div class="hr" id="hr">
<span class="open-modal" id="mod-btn1">&#9760;</span>
<div class="vr" id="vr">
    <?php
    include 'pages/videos.php';
    include 'pages/contact.php';
    include 'pages/about.php';
    ?>
</div>
</div>
</div>

    <div class="main">
        <nav class="hnav">
            <ul>
                <li><a href="<?php echo $home; ?>">Home</a></li>

                <li>
                    <button class="btn" id="mod-btn" onclick="modal_main('videos')">Videos</button> 
                </li>
                <li>
                    <button class="btn" id="mod-btn" onclick="modal_main('contact')">Contact</button> 
                </li>

                <li>
                    <button class="btn" id="mod-btn" onclick="modal_main('about')">About</button> 
                </li>

            </ul>
        </nav>

        <div class="lab-box">
            <nav class="snav">
                <ul>
                    <li><a href="<?php echo $slf.'lab1'.$p; ?>">Error 1
                        </a></li>

                    <li><a href="<?php echo $slf.'lab2'.$p; ?>">Error 2
                        </a></li>
                    <li><a href="<?php echo $slf.'lab3'.$p; ?>">Error 3
                        </a></li>

                    <li><a href="<?php echo $slf.'lab4'.$p; ?>">Error 4
                        </a></li>

                    <li><a href="<?php echo $slf.'lab5'.$p; ?>">Error 5
                        </a></li>

                    <li><a href="<?php echo $slf.'lab6'.$p; ?>">Error 6
                        </a></li>

                    <li><a href="<?php echo $slf.'lab7'.$p; ?>">Double
                        </a></li>

                    <li><a href="<?php echo $slf.'lab8'.$p; ?>">Double
                        </a></li>

                    <li><a href="<?php echo $slf.'lab9'.$p; ?>">Blind
                        </a></li>

                    <li><a href="<?php echo $slf.'lab10'.$p; ?>">Blind
                        </a></li>
                    <li><a href="<?php echo $slf.'lab11'.$p; ?>">Blind
                        </a></li>

                    <li><a href="<?php echo $slf.'lab12'.$p; ?>">Time
                        </a></li>

                    <li><a href="<?php echo $slf.'lab13'.$p; ?>">Dump
                        </a></li>

                    <li><a href="<?php echo $slf.'lab14'.$p; ?>">Post
                        </a></li>

                    <li><a href="<?php echo $slf.'lab15'.$p; ?>">Post Err
                        </a></li>

                    <li><a href="<?php echo $slf.'lab16'.$p; ?>">Post Err
                        </a></li>

                    <li><a href="<?php echo $slf.'lab17'.$p; ?>">Post Err
                        </a></li>
                    <li><a href="<?php echo $slf.'lab18'.$p; ?>">Post Err
                        </a></li>

                    <li><a href="<?php echo $slf.'lab19'.$p; ?>">Post Blind
                        </a></li>

                    <li><a href="<?php echo $slf.'lab20'.$p; ?>">Post Blind
                        </a></li>

                    <li><a href="<?php echo $slf.'lab21'.$p; ?>">Update Pass
                        </a></li>

                    <li><a href="<?php echo $slf.'lab22'.$p; ?>">Blacklist 1
                        </a></li>

                    <li><a href="<?php echo $slf.'lab23'.$p; ?>">Blacklist 2
                        </a></li>

                    <li><a href="<?php echo $slf.'lab24'.$p; ?>">Blacklist 3
                        </a></li>

                    <li><a href="#End">Lab End
                        </a></li>
                </ul>
            </nav>
        </div>


        <div class="main-body">
            <?php
		include $page; 
		?>
        </div>

        <div class="progress">
            <div class="done-box">
                <div style="height: <?php echo $job_done; ?>" class="done">
                </div>
                <p>Complete~<?php echo $job_done; ?></p>
            </div>
        </div>


        <div class="footer">
            <div class="footer-content">
                <div id="urlbox" class="url-box">
                    <button class="url-btn" id="onurl">&or; URL</button>
                    <button class="url-btn1" id="onurl1">&and; URL</button>
                    <form action="" method="POST">
                        <textarea name="url"><?php echo 'http://'.$index_url; ?></textarea>
                        <input type="submit" name="execute" value="Go">
                    </form>

                </div>
                <div id="result" class="submit">
                    <button class="sub-btn" id="onsum">&and; Result</button>
                    <button class="sub-btn1" id="onsum1">&or; Result</button>
                    <form action="" method="POST">
                        <p>Submit Your Injected Result ( MD5 cracked Password )</p>
                        <input type="Email" name="sub_mail" placeholder="Email" required>
                        <input type="password" name="sub_pass" placeholder="md5 Cracked pass" required>
                        <input style="display: none;" type="text" name="main_url" value="<?php echo 'http://'.$index_url; ?>">
                        <?php 
                        $l = str_replace('.php', '', $page);
                        $l = array_reverse(explode('/', $l));
                        $l = $l[0]; 
                        ?>
                        <input style="display: none;" type="link" name="sub_page_link" value="<?php echo $l; ?>">
                        <input type="submit" name="sql_submit" value="Submit SQL">
                    </form>

                </div>
            </div>

        </div>


    </div>

    <script type="text/javascript" src="style/mod.js"></script>
    <script type="text/javascript" src="style/java.js"></script>
</body>

</html>