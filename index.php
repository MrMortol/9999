<?php include 'head.php'; ?>
<body>
<link href="../css/index.css" rel="stylesheet">
<?php
require_once 'js/mobile.php';
$detect = new Mobile_Detect;
if( $detect->isMobile() && !$detect->isTablet() ){
    include 'mindex.php';
    echo '<link href="css/mobile.css" rel="stylesheet">';
    $mobile = 1;
}
?>
<script src="js/typed.js"></script>
<script>
  $(document).ready(function() {
      //$(".am").mPageScroll2id();
      $("#sec1").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top+1}, 1500);
    });
});
try { 
    document.addEventListener('DOMContentLoaded', function () {
        var intervalID = setInterval(texta, 1000);
        Typed.new('.am', {
            strings: ["","НАЧАТЬ ИГРАТЬ"],
            typeSpeed: 0,
            startDelay: 50,
            showCursor: false
        });
    });
} catch (e) { } 
function isIntoView(elem) { 
    if(!$(elem).length) return false; // element not found

    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom < docViewBottom) && (elemTop > docViewTop));
}
function texta()
{
if(isIntoView('#ihtp1'))
{
$(function(){
        $(".1").typed({
            strings: ["ДЛЯ НАЧАЛА ВАМ НУЖНО<br>СКАЧАТЬ GTA:SA, ЭТО <br>ОСНОВА ДЛЯ МУЛЬТИПЛЕЕРА"], // строки выводимые в печать
            typeSpeed: -10, // скорость набора
            startDelay: 300,
            showCursor: false, // отображение курсора
        });
        $(".2").typed({
            strings: ["ТЕПЕРЬ ВЫ СКАЧИВАЕТЕ САМ<br>МУЛЬТИПЛЕЕР, ДЛЯ ИГРЫ<br>В ОНЛАЙНЕ С ИГРОКАМИ"], // строки выводимые в печать
            typeSpeed: -10, // скорость набора
            startDelay: 2500,
            showCursor: false, // отображение курсора
        });
        $(".3").typed({
            strings: ["СЕЙЧАС ВЫ ДОБАВИТЕ НАШ<br>СЕРВЕР В ИЗБРАННЫЕ,<br>И МОЖЕТЕ НАЧИНАТЬ ИГРАТЬ"], // строки выводимые в печать
            typeSpeed: -10, // скорость набора
            startDelay: 5000,
            showCursor: false, // отображение курсора
        });
        clearInterval(intervalID);
    });
}
}
</script>
<title>Example RP - Главная</title>
<div id="up" class="up"></div>
<section id="sec1" <?php if($mobile != 1) echo 'class="fadeIn animated"'; ?>>
    <section id="main" class="fadeInLeft animated">
        <section id="maint">
            <div id="line"></div>
            <div id="maint2"></div>
            <div class="clear: left;"></div>
            <div id="am"><a href="#sec2" class="am" id="scroll_1"></a></div>
        </section>
    </section>
</section>
<section id="sec2">
    <center><h3 class="fadeInUpBig wow"><span>КАК НАЧАТЬ ИГРАТЬ</span></h3></center>
    <section id="htp" class="fadeInUpBig wow">
        <div id="htpb" style="margin-left: 15vw;">
            <div id="ihtp1"></div>
            <center>
            <p class="htpt 1"><br>
            </p>
            <div id="htpsu"><a href="/gta.torrent">СКАЧАТЬ</a></div>
            </center>
        </div>
        <div id="htpb" >
            <div id="ihtp2"></div>
            <center>
            <p class="htpt 2"><br>
            </p>
            <div id="htpsu"><a href="http://files.sa-mp.com/sa-mp-0.3.7-install.exe">СКАЧАТЬ</a></div>
            </center>
        </div>
        <div id="htpb">
            <div id="ihtp3"></div>
            <center>
            <p class="htpt 3 spec"><br>
            </p>
            <div id="htpsu"><a href="samp://127.0.0.1:7777/">ДОБАВИТЬ</a></div>
            </center>
        </div>
        <div class="clear: left;"></div>
    </section>
</section>
<section id="sec3" class="fadeIn wow">
    <center>
        <h3 class="fadeInUpBig wow">МОНИТОРИНГ</h3>
        <div id="monc" class="fadeInUpBig wow">
        <p class="mont">250</p>
        <div id="htpsu" style="margin-top: 8vw;"><a href="samp://127.0.0.1:7777/">ПОДКЛЮЧИТЬСЯ</a></div>
        </div>
    </center>
</section>
<section id="sec4">
<center>
<h3 class="fadeInUpBig wow">МЫ В СОЦИАЛЬНЫХ СЕТЯХ</h3>
<p class="sec4mt" class="fadeInUpBig wow">Example RP #SAMP</p>
<p class="sec4t" class="fadeInUpBig wow">2000+ участников</p>
<div id="vk" class="fadeInUpBig wow"></div>
<div id="htpsu" class="fadeInUpBig wow"><a href="https://vk.com">ПОДПИСАТЬСЯ</a></div>
</center>
</section>
<section id="footer" class="fadeIn wow">
<div id="logo"></div>
</section>
<script>
var ua = navigator.userAgent.toLowerCase();
var isOpera = (ua.indexOf('opera')  > -1);
var isIE = (!isOpera && ua.indexOf('msie') > -1);

function getDocumentHeight() {
  return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollHeight : document.documentElement.scrollHeight, getViewportHeight());
}

function getViewportHeight() {
  return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientHeight : document.body.clientHeight : (document.parentWindow || document.defaultView).innerHeight;
}
var updownElem = document.getElementById('up');
var innerHeight = getDocumentHeight();
window.onscroll = function() {
    var pageY = window.pageYOffset || document.documentElement.scrollTop;
    switch (updownElem.className) {
        case 'up':
            if (pageY > innerHeight/180*110) {
            updownElem.className = 'down';
        }
        break;
        case 'down':
            if (pageY < innerHeight/180*110) {
            updownElem.className = 'up';
        }
        break;
    }
}
updownElem.onclick = function() {
      var pageY = window.pageYOffset || document.documentElement.scrollTop;
      var pageYLabel = 0;
      if(isIntoView('#am'))
      {
      pageYLabel = document.getElementById('sec2').offsetTop;
      }
      else if(isIntoView('#htpb'))
      {
      pageYLabel = document.getElementById('sec3').offsetTop-innerHeight/180*8;
      }
      else if(isIntoView('#monc'))
      {
      pageYLabel = document.getElementById('sec4').offsetTop+innerHeight/180*5;
      }
      switch (this.className) {
        case 'down':
          $('body,html').animate({scrollTop: 0}, 1500);
          this.className = 'down';
          break;

        case 'up':
          $('body,html').animate({scrollTop: pageYLabel}, 2000);
          this.className = 'up';
      }

    }
</script>
</body>