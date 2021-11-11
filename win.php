<?
session_start();
$HOST = 'localhost';
$USER = 'root'; 
$PASS = '';
$NAME = 'game'; 
$get=$_GET['prize'];
/*if($_SESSION['redirect'] != 1){
    echo '<meta http-equiv="refresh" content="0;URL=/roul.php"/>';
    exit(); 
}*/
if(!isset($_GET['prize'])){
    echo '<meta http-equiv="refresh" content="0;URL=/roul.php"/>';
    exit(); 
}
if($get != $_SESSION['prize']){
    echo '<meta http-equiv="refresh" content="0;URL=/roul.php"/>';
    exit(); 
}
$_SESSION['prize'] = -rand(0,100000);
$_SESSION['redirect'] = 0;
switch($get)
{
    case 0: $src='../img/rulet3.png'; $text='Золотая VIP навсегда!';
    break;
    case 1: $src='../img/rulet4.png'; $lvl=rand(30,100); $text='Донат-Рублей: '.$lvl.'';
    break;
    case 2: $src='../img/rulet5.png'; $lvl=rand(1000,10000); $text='Дом элитного класса';
    break;
    case 3: $src='../img/rulet6.png'; $text='Золотая VIP навсегда!';
    break;
    case 4: $src='../img/rulet.png'; $lvl=rand(1,10); $text='Машина Bullet';
    break;
    case 5: $src='../img/rulet2.png'; $lvl=rand(1000000,10000000); $text='Вирты в размере: '.$lvl.'';
    break;
}
if(!$_SESSION['id']) echo 'Авторизуйтесь!', exit();
$id = $_SESSION['id'];
$connects=mysqli_connect($HOST,$USER,$PASS,$NAME);
$query=mysqli_query($connects,"SELECT * FROM accounts WHERE id = '$id'");
$dans=mysqli_fetch_array($query,MYSQL_BOTH);
mysqli_query($connects,"INSERT INTO `prizes`(`pID`, `type`, `lvl`) VALUES (".$dans['id'].",".$get.",".$lvl.")");
?>
<link rel="stylesheet" media="all" href="/css/animate.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<div id="nav" class="fadeInDown animated">
    		<ul1>
      			<li1><a href="/" class="nava main">Главная</a></li1>
      			<li1><a href="/forum" class="nava">Форум</a></li1>
      			<li1><a href="/donate" class="nava">Донат</a></li1>
                <li1><a href="/user" class="nava user">Личный кабинет</a></li1>
    		</ul1>
  </div>
<meta charset="utf-8">
<meta name="viewport" content="user-zoom: fixed, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../css/rulet.css" rel="stylesheet">
<link rel="stylesheet" media="all" href="../css/animate.css">
<title>Example RP - Рулетка</title>
<section id="all">
    <a class="upr" href="/prizes.php">ИСТОРИЯ ВЫИГРЫШЕЙ</a>
    <center>
        <div id="h2">Рулетка</div>
        <div id="hcw2">
        <div id="hwin">Ваш приз</div>
        <? echo '<img src='.$src.' class="eimg"</img>';
           echo '<div id="ptext">'.$text.'</div>';
            ?>
            <div id="ptext2">Чтобы получить введите /prize в игре</div>
            <a class="upr2" href="/roul.php">ВЕРНУТЬСЯ К РУЛЕТКЕ</a>
        </div>
        </center>
</section>

