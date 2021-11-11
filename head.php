<?php session_start(); ?>
<head>
<meta charset="utf-8">
<script src="../js/scroll.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link href="../css/head.css" rel="stylesheet">
<link rel="stylesheet" media="all" href="../css/animate.css">
<script src="../js/wow.min.js"></script>
<script>
new WOW().init();
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<?php
require_once 'js/mobile.php';
$detect = new Mobile_Detect;
if( $detect->isMobile() && !$detect->isTablet() ){
    echo '<div id="mlogo" class="fadeInLeft animated"></div>';
}
            $HOST = 'localhost';
            $USER = 'root'; 
            $PASS = '';
            $NAME = 'game'; 
?>
<div id="nav" class="fadeInDown animated">
    		<ul>
      			<li ><a href="/" class="nava main">Главная</a></li>
      			<li><a href="/forum" class="nava">Форум</a></li>
      			<li><a href="/donate" class="nava">Донат</a></li>
                <li><a href="/user" class="nava user">Личный кабинет</a></li>
    		</ul>
      </div>
</head>