<?php
if(isset($_POST['nick']))
{
    $off=1;
    if (preg_match("/^[".chr(0x7F)."-".chr(0xff)."_-]+$/",$_POST['nick']))
    {
        $eracc = 1;
    }
    else
    {
        if(isset($_POST['sum']) && $_POST['sum'] > 0)
        {
            $HOST = 'localhost';
            $USER = 'root'; 
            $PASS = '';
            $NAME = 'game'; 
            $nick=$_POST['nick'];
            $sum=$_POST['sum'];
            $nick = mysqli_real_escape_string($connects,$nick);
            $connects=mysqli_connect($HOST,$USER,$PASS,$NAME);
            $query = mysqli_query($connects,"SELECT * FROM accounts WHERE Name = '$nick'");
            $dans = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if($dans)
            {   
                echo ' <META HTTP-EQUIV="REFRESH" CONTENT="0; URL=donateurl">';
            }
            else{
                $eracc = 1;
            }
        }
        else{
            $ersum = 1;
        }
    }
}
?>
<?php include '../head.php'; ?>
<body>
<link href="../css/donate.css" rel="stylesheet">
<title>Example RP - Донат</title>
<?php
require_once '../js/mobile.php';
$detect = new Mobile_Detect;
if( $detect->isMobile() && !$detect->isTablet() ){
    include 'mdonate.php';;
    echo '<link href="../css/mobile.css" rel="stylesheet">';
    $mobile = 1;
}
?>
<link href="../css/font-awesome.css" rel="stylesheet">
<center><h3 class="main2 fadeInUp animated">Пополнение счета</h3></center>
<section id="main">
    <section id="cash" class="fadeInUp animated">
        <center><h3>Пополнение</h3></center>
        <center>
        <?php
        if(isset($eracc)) echo '<div id="ert">Аккаунт не найден</div>';
        if(isset($ersum)) echo '<div id="ert">Неправильная сумма</div>';
        ?>
        </center>
        <section id="forms">
            <form action=""  method="post">
                <div id="dn">
                <div id="input"><i id="icon" class="fa fa-user-o fa-2x" aria-hidden="true"></i><input type="text" name="nick" class="dn" placeholder='ВАШ НИК'></div></div>
                <div id="dn">
                <div id="input"><i id="icon" class="fa fa-rub fa-2x" aria-hidden="true"></i><input type="text" name="sum" class="dv" placeholder="СУММА ПОПОЛНЕНИЯ"></div></div>
                <center><div id="dn"><input type="submit" value="Оплатить" class="su"></div></center>
            </form>
    </section>
    </section>
    <section id="infoall" class="fadeInUp animated">
        <section id="info" >
            <center>
                <h3>ИНФОРМАЦИЯ</h3>
                <p>Если вам, после пополнения, на аккаунт не постуил донат, введите комманду <span>/check</span>.<br>Все возможности, которые вы сможете купить, можно увидеть введя комманду <span>/donate</span> в игре.<br>При возникновении проблем с оплатой, обращайтесь в <span>поддержку</span>.</p>
            </center>
        </section>
        <section id="vk">
            <center>
                <h3>ПОДДЕРЖКА</h3>
                <div id="tpsu"><a href="https://vk.com/djmarchelo">НАЧАТЬ ЧАТ</a></div>
            </center>
        </section>
    </section>
    <div style="clear: left;"></div>
</section>
<section id="footer" class="fadeIn wow">
<div id="logo"></div>
</section>
</body>