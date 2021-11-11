<?
session_start();
$HOST = 'localhost';
$USER = 'root'; 
$PASS = '';
$NAME = 'game'; 
if(!$_SESSION['id']) echo 'Авторизуйтесь!', exit();
$id = $_SESSION['id'];
$connects=mysqli_connect($HOST,$USER,$PASS,$NAME);
$query=mysqli_query($connects,"SELECT * FROM accounts WHERE id = '$id'");
$dans=mysqli_fetch_array($query,MYSQL_BOTH);
$name=$dans['Name'];
$donate=$dans['UseDonate'];
$ndonate=$donate;
?>
<meta charset="utf-8">
<meta name="viewport" content="user-zoom: fixed, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../css/rulet.css" rel="stylesheet">
<link rel="stylesheet" media="all" href="/css/animate.css">
<style>
    #all{
        overflow-y: scroll;
    }
</style>
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
<title>Example RP - Рулетка</title>
<section id="all">
    <a class="upr" href="/prizes.php">ИСТОРИЯ ВЫИГРЫШЕЙ</a>
    <center>
        <div id="h2" class="fadeInUp animated">Рулетка</div>
        <div id="hpri">
        <br>
        <br>
        <a class="upr3" href="/roul.php">ВЕРНУТЬСЯ К РУЛЕТКЕ</a>
        <br>
        <br>
        <br>
        <?
        $query2=mysqli_query($connects,"SELECT * FROM prizes WHERE pID = ".$dans['id']."");
        while($dans2=mysqli_fetch_array($query2,MYSQL_BOTH))
        {
        switch($dans2['type'])
        {
            case 0: $src='../img/rulet3.png';  $text='Золотая VIP навсегда!';
            break;
            case 1: $src='../img/rulet4.png'; $text='Донат-Рублей: '.$dans2['lvl'].'';
            break;
            case 2: $src='../img/rulet5.png'; $text='Дом элитного класса';
            break;
            case 3: $src='..//img/rulet6.png'; $text='Золотая VIP навсегда!';
            break;
            case 4: $src='../img/rulet.png'; $text='Машина Bullet';
            break;
            case 5: $src='../img/rulet2.png'; $text='Вирты в размере '.$dans2['lvl'].'';
            break;
        }
        echo '<img src="'.$src.'"></img>';
                echo '<div id="ptext4">ID Выигрыиша: '.$dans2['id'].'</div>';
        echo '<div id="ptext3">'.$text.'</div>';
        }
        ?>
        </div>
        </center>
</section>

