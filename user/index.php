<?php 
session_start();
if(isset($_SESSION['id']))
{
    echo '<meta http-equiv="refresh" content="0;URL=/user/id.php"/>';
}
if($_POST['nick'])
{
    if (preg_match("/^[".chr(0x7F)."-".chr(0xff)."_-]+$/",$_POST['nick']))
    {
        $eroornick = 1;
    }
    else{
            $nick=$_POST['nick'];
            $HOST = 'localhost';
            $USER = 'root'; 
            $PASS = '';
            $NAME = 'game'; 
            $pass = $_POST['pass'];
            $connects=mysqli_connect($HOST,$USER,$PASS,$NAME);
            $nick = mysqli_real_escape_string($connects,$nick);
            $pass = mysqli_real_escape_string($connects,$pass);
            $query=mysqli_query($connects,"SELECT * from accounts WHERE Name = '".$nick."' and pKey = '".$pass."'");
            $dans=mysqli_fetch_array($query,MYSQLI_BOTH);
            $id=$dans['id'];
            if($dans)
            {
                if($dans['pKey']==$_POST['pass'])
                {
                    $_SESSION['id'] = $id;
                    echo '<meta http-equiv="refresh" content="0;URL=/user/id.php"/>';
                }
                else
                {
                    $fp=1;
                }
            }
            else
            {
                $fn=1;
            }
        }
}
include '../head.php'; ?>
<body>
<link href="../css/login.css" rel="stylesheet">
<title>Example RP - Авторизация</title>
<link href="../css/font-awesome.css" rel="stylesheet">
<center><h3 class="main2 fadeInUp animated">АВТОРИЗАЦИЯ</h3></center>
<section id="main">
    <section id="login" class="fadeInUp animated">
        <div id="warn" class="fadeInUp animated"><center><p><span>ВНИМАНИЕ!</span> Передача аккаунтов карается баном.</p></center></div>
        <center>
            <h3 class="loginh3 fadeInUp animated">ВХОД</h3>
            <?php
                if(isset($fp)) echo '<div id="ert">Неправильный пароль</div>';
                if(isset($fn)) echo '<div id="ert">Аккаунт не найден</div>';
                if(isset($eroornick)) echo '<div id="ert">Данные неверные</div>';
                ?>
            <section id="forms" class="fadeInUp animated">
                <form action=""  method="post">
                    <div id="dn">
                    <div id="input"><i id="icon" class="fa fa-user-o fa-2x" aria-hidden="true"></i><input type="text" name="nick" class="dn" placeholder='ВАШ НИК'></div></div>
                    <div id="dn">
                    <div id="input"><i id="icon" class="fa fa-lock fa-2x" aria-hidden="true"></i><input type="text" name="pass" class="dv" placeholder="ВАШ ПАРОЛЬ"></div></div>
                    <center><div id="dn"><input type="submit" value="Войти" class="su"></div></center>
                </form>
            </section>
        </center>
    </section>
    <section id="infoall">
        <section id="info" class="fadeInUp animated">
            <center>
                <h3 class="fadeInUp animated">МОНИТОРИНГ</h3>
                <div id="monc" class="fadeInUp animated">
                <p class="mont">250</p>
                </div>
                <div id="htpsu" style="margin-top: 2.5vw;" class="fadeInUp animated"><a href="samp://127.0.0.1:7777/">ПОДКЛЮЧИТЬСЯ</a></div>
            </center>
        </section>
    </section>
    <div style="clear: left;"></div>
</section>
<section id="footer" class="fadeIn wow">
<div id="logo"></div>
</section>