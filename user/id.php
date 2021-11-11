<?php
include('../head.php');
if(!$_SESSION['id'])
{
    echo '<meta http-equiv="refresh" content="0;URL=/user/"/>';
}
$id = $_SESSION['id'];
$connects=mysqli_connect($HOST,$USER,$PASS,$NAME);
$query=mysqli_query($connects,"SELECT * from accounts WHERE id = '$id'");
$dans=mysqli_fetch_array($query,MYSQLI_BOTH);   
$name=$dans['Name'];
$skin=$dans['pChar'];
$urlskin="../css/skins/$skin.png";
?>
<body>
<link href="../css/id.css" rel="stylesheet">
<title>Example RP - Личный кабинет</title>
<section id="header" class="fadeInLeft animated">
    <center>
        <section id="headin">
            <div id="skin"></div>
            <h3>DANYA <span>NANCOCK</span></h3>
            <div style="clear: left;"></div>
        </section>
    </center>
</section>
<section id="main" class="fadeInUp animated">
    <center><h3>ИНФОРМАЦИЯ</h3></center>
    <section id="info">
        <section id="info1">
            <div id="name" style="margin-top: 0.5vw;"><div id="inname">Ник</div></div>
            <div id="name"><div id="inname">Уровень</div></div>
            <div id="name"><div id="inname">EXP</div></div>
            <div id="name"><div id="inname">Деньги на руках</div></div>
            <div id="name"><div id="inname">Деньги в банке</div></div>
            <div id="name"><div id="inname">Дом</div></div>
            <div id="name"><div id="inname">Машина</div></div>
            <div id="name"><div id="inname">Фракция</div></div>
            <div id="name"><div id="inname">Ранг</div></div>
            <div id="name" style="padding-bottom: 0.15vw;"><div id="inname" >Статус</div></div>
        </section>
        <section id="info2">
        <?php
        if($dans['pPhousekey'] == -1) $dans['pPhousekey'] = "Отсутсвует";
        $mem=$dans['pMember'];
        $exp = $dans['pLevel']*4;
        $query2=mysqli_query($connects,"SELECT * FROM fractions WHERE id = '$mem'");
        $dans2=mysqli_fetch_array($query2,MYSQLI_BOTH);
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['Name'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pLevel'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pExp'].'/'.$exp.'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pCash'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pBank'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pPhousekey'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pCar'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans2['Name'].'</div></div>';
        echo '<div id="name" style="margin-top: 0.5vw;><div id="inname">'.$dans['pRank'].'</div></div>';
        if($dans['pOnline'] == 1001) echo '<div id="name" style="padding-bottom: 0.5vw;"><div id="inname"><span style="color: darkred; border-color: darkred;">Оффлайн</span></div></div>';
        else echo '<div id="name" style="padding-bottom: 0.5vw;"><div id="inname"><span>Онлайн</span></div></div>';
        ?>  
        </section>
        <div style="clear: left;"></div>
    </section>
    <div id="tpsu" style="margin-left: 15vw;"><a href="/roul.php">РУЛЕТКА</a></div><div id="tpsu" style="margin-left: 6vw;"><a href="/user/exit.php">ВЫХОД</a></div>
    <div style="clear: left;"></div>
</section>
<section id="footer" class="fadeIn wow">
<div id="logo"></div>
</section>