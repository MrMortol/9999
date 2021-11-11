<?
session_start();
$HOST = 'localhost';
$USER = 'root'; 
$PASS = '';
$NAME = 'game'; 
include('js/mobile.php');
$detect = new Mobile_Detect;
if ( $detect->isMobile() ) {
echo 'Рулетка недоступна на моб.устройстве.';
echo '<meta http-equiv="refresh" content="3;URL=/user/id.php"/>';
exit();
}
if($_COOKIE['but'] == 1)
{
$but = 1;
setcookie("but",0,time()-3600);
}
if(!$_SESSION['id']) echo 'Авторизуйтесь!', exit();
$id = $_SESSION['id'];
$connects=mysqli_connect($HOST,$USER,$PASS,$NAME);
$query=mysqli_query($connects,"SELECT * FROM accounts WHERE id = '$id'");
$dans=mysqli_fetch_array($query,MYSQL_BOTH);
$name=$dans['Name'];
$donate=$dans['UseDonate'];
$ndonate=$donate;
$prize = rand(0,5);
$_SESSION['prize'] = $prize;
if($but == 1) 
{
    $_SESSION['redirect'] = 1;
    $ndonate=$donate-49;
    $but = 0;
    mysqli_query($connects,"UPDATE `accounts` SET `UseDonate` = ".$ndonate." WHERE `id` = '".$id."'");
}
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
<link href="../css/rulet.css" rel="stylesheet">
<title>Example RP - Рулетка</title>
<section id="all" class="fadeIn animated">
    <a class="upr" href="/prizes.php">ИСТОРИЯ ВЫИГРЫШЕЙ</a>
    <center>
        <div id="h2" class="fadeInUp animated">рулетка</div>
        <? echo '<div title="Пополнить донат счет" id="ds" class="fadeInUp animated"><a class="adon" href="/donate">Донат счет: '.$ndonate.' рублей</a></div>'; ?>
   <div class="divv" class="fadeInUp animated">
		<ul id="carusel" class="fadeInUp animated">
		</ul>
	</div>
    <div id="curs"></div>
    <div id="msu"><input name="" title="49 РУБЛЕЙ" type="button" value="Крутить" class="su fadeInUp animated"></div>       
    <div id="hcw" class="fadeInUp animated">
    <div id="hcwt">ЧТО МОЖНО ВЫИГРАТЬ?</div>
    <div id="list"></div>
    </div>
        </center>
<script type="text/javascript">
$(function () {
    var arr = [1,2,3,4,5,6], carusel = $('#carusel');
    function rand(min, max, integer) {
      var c = getRandomInt(0,11);
      switch(c)
      {
          case 1: var r = 1;
          break;
          case 2: var r = 4;
          break;
          case 3: var r = 5;
          break;
          case 4: var r = 3;
          break;
          case 5: var r = 1; 
          break;
          case 6: var r = 4;
          break;
          case 7: var r = 2;
          break;
          case 8: var r = 5;
          break;
          case 9: var r = 4;
          break;
          case 10: var r = 1;
          break;
              
      }
      return integer ? r|0 : r;
    }
function getRandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
    function setCookie(name, value, options) {
      options = options || {};

      var expires = options.expires;

      if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
      }
      if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
      }

      value = encodeURIComponent(value);

      var updatedCookie = name + "=" + value;

      for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
          updatedCookie += "=" + propValue;
        }
      }

      document.cookie = updatedCookie;
    }
    function rgbColor(id) {
        switch(id)
        {
            case 1: var img = 'url(../img/rulet.png)';
            break;
            case 2: var img = 'url(../img/rulet2.png)';
            break;
            case 3: var img = 'url(../img/rulet3.png)';
            break;
            case 4: var img = 'url(../img/rulet4.png)';
            break;
            case 5: var img = 'url(../img/rulet5.png)';
            break;
            case 6: var img = 'url(../img/rulet6.png)';
            break;
        }
        return img;
    }
    $.each(arr,function(indx, el){
          $('<li/>',{ data : {i : indx},css : {'background-image' : rgbColor(el)}}).appendTo(carusel)
          $('<li/>',{ data : {i : indx},css : {'background-image' : rgbColor(el)}}).appendTo(list)
          });
    var click;
   function lotto()
    {
    if(click == 1) return 1;
    click = 1;
    var don = "<? echo $ndonate; ?>";
    if(don < 49) return alert("Стоимость рулетки 49 рублей!");
    setCookie("but",1);
    document.getElementById('msu').innerHTML = '<input name="" title="49 РУБЛЕЙ" type="button" value="Крутим..." class="su fadeIn animated">';
    var ndonate2 = "<? echo $ndonate-49; ?>";
    document.getElementById('ds').innerHTML = '<a class="adon" href="/donate">Донат счет: '+ ndonate2 +' рублей</a>';
    var n = "<? echo $prize; ?>";
        r = getRandomInt(3,6);
       var s = 100;
        carusel.stop();
    (function go() {
        carusel.animate({
            left: '-5.3vw'
        }, s, function () {
            var li = $('li:first');
                data = li.next().data('i');
            if (data == n) s += 0, r--;
            if (r == 0) setCookie("but",1), setTimeout( 'location="/win.php?prize=' + n + '";', 0 );
            li.appendTo(carusel)
            carusel.css({
                left: '0px'
            });
            r && go()
        })
    }())


    }
    $('[type="button"]').on({click : lotto})
	
})
</script>
</section>
