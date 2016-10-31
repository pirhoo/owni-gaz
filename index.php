<?php
define("APP_NAME", "Gaz de schiste");
define("BASE_HREF", "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
define("DOC_URL", "http://owni.fr/2010/12/07/app-attention-forages-a-risques/");
define("DOC_TITLE", "[application] ". APP_NAME);
define("DOC_TWUSER", "owni");
define('THEME_DIR', '');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1, user-scalable=no, maximum-scale=1"/>
<title>Gaz de schiste</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<link href="styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var tileIndex = 0;
var nextId = 0;
var captions = 0;

$('document').ready(function(){
    $('.button').click(function () {
       tileIndex = $('.tile').index($(this).parent());
       // slide to next
       nextId = (tileIndex<$('.tile').length) ? tileIndex+1 : 0;
       var next = $("#tile"+nextId).offset();
       var current = $("#tile"+tileIndex).offset();
       if (next) {
           if (tileIndex == 2) {
               // boom
               $("#white").css('display', 'block');
               $("#boom").css('display', 'block');

               $("#white").fadeIn('fast', function () {
                    $("#white").fadeOut('fast', function () {
                        $("#white").fadeIn('fast', function () {
                            $("#boom").css('display', 'none');
                            setTimeout(function(){
                                jumpColn ();
                                $("#white").fadeOut('fast', function () {
                                   captions = $("#tile"+nextId+" .caption").length;
                                   showCaption (0);
                                });
                            },200);
                        });
                    });
               });
           }
           else {
                // animate to next
               $("#grid").animate({"top": "-="+(next.top-current.top)+"px", "left": "-="+(next.left-current.left)+"px"}, "slow", function (){
                   if (nextId == 5 || nextId == 7) {
                      nextId += 1;
                        jumpColn ();
                   }
                   // afficher captions
                   captions = $("#tile"+nextId+" .caption").length;
                   showCaption (0);
               });
           }
       }else {window.location.href=window.location.href;}
    });
    showCaption (0);
    for ( var n=0; n < $("#tile9 .caption a").length; n++ ) {
        $("#tile9 .caption a:eq("+n+")").css("height",  $("#tile9 .caption:eq("+n+")").css("height"));
        $("#tile9 .caption a:eq("+n+")").css("width", $("#tile9 .caption:eq("+n+")").css("width"));
    }
    $("#sharetab #tab").hover(function() {
        $("#sharetab #share").animate({"top": "4px"});
    }, false);
    $("#sharetab #share").hover(false, function () {
        $("#sharetab #share").animate({"top": "80px"});
    });
});

function jumpColn () {
   $("#grid").css('top', "-"+$("#tile"+(nextId)).css('top'));
   $("#grid").css('left', "-"+$("#tile"+(nextId)).css('left'));
}

function btnThrob (btn) {
    var p=new Array(10,20,10,0,-10,-20,-10,0);
    p=p.concat(p.concat(p));
    btn.css('position','relative');
    shake(btn,p,15);
}

function shake(btn,a,d){
    c=a.shift();
    s(btn,c);
    if(a.length>0){setTimeout(function(){shake(btn,a,d);},d);}
    else{
        btn.css('position','static');
    }
}

function s(btn,pos){btn.css('left', pos+'px');}

function showCaption (ci) {
    if (ci<captions) {
        $("#tile"+nextId+" .caption:eq("+ci+")").show('fast', function () {
            showCaption((ci+1));
        });
    }
    else {
        showBtn (nextId);
    }
}

function showBtn (ti) {
    if ($("#tile"+ti+" .button").length > 0) {
        $("#tile"+ti+" .button").show('fast', function () {
            btnThrob( $("#button"+ti+"") );
        });
    }
}
function showAlert (text) {
    $("#alert").html(text);
}
        </script>
    </head>
    <body>
        <div id="container">
        <div id="content">
            <div id="viewpoint">
                <div id="grid">
                    <div class="tile" id="tile0">
                        <div class="button">
                            <div id="button0"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile1">
                        <div class="caption" id="caption10"></div>
                        <div class="button">
                            <div id="button1"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile2">
                        <div class="caption" id="caption20"></div>
                        <div class="caption" id="caption21"></div>
                        <div class="button">
                            <div id="button2"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile3">
                        <div class="caption" id="caption30"></div>
                        <div class="button">
                            <div id="button3"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile4">
                        <div class="caption" id="caption40"></div>
                        <div class="button">
                            <div id="button4"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile5">
                        <div class="caption" id="caption50"></div>
                        <div class="button">
                            <div id="button5"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile6">
                        <div class="caption" id="caption60"></div>
                        <div class="button">
                            <div id="button6"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile7"></div>
                    <div class="tile" id="tile8">
                        <div class="caption" id="caption80"></div>
                        <div class="button">
                            <div id="button8"></div>
                        </div>
                    </div>
                    <div class="tile" id="tile9">
                        <div class="caption" id="caption90"><a href="files/Resume_-_Rapports_et_etudes_-_Gaz_de_Schiste_-_Octobre.pdf" target="_blank" title="le gaz s'échape du lit des rivières"></a></div>
                        <div class="caption" id="caption91"><a href="http://www.youtube.com/watch?v=dZe1AeH0Qz8" target="_blank" title="le gaz remonte dans les conduites d'eau"></a></div>
                        <div class="caption" id="caption92"><a href="files/Analyse_de_l_eau_souterraine_Pavillion_Area_Wyoming_-_Rapport_EPA.pdf" target="_blank" title="Analyse de l'eau"></a></div>
                        <div class="caption" id="caption93"><a href="files/Schiste_-_Serieuses_menaces_pour_la_qualite_de_l_air.pdf" target="_blank" title="Schistes sérieuses menaces pour la qualité de l'air"></a></div>
                        <div class="caption" id="caption94"><a href="files/DishTXHealthSurvey_FINAL_hi.pdf" target="_blank" title="Dish Health Survey"></a></div>
                        <div class="button">
                            <div id="button9"></div>
                        </div>
                    </div>
                </div>
                <div class="tile" id="boom"></div>
                <div class="tile" id="white"></div>
            </div>
            <div id="sharetab">
                <div id="tab"></div>
                <div id="share">
                    <div id="tag"></div>
                    <div id="social">
                        <div id="left"></div>
                        <div id="middle">
                                <!-- Les outils pour partager l'APP (Facebook, Twitter, etc) -->
                                <?php include("share.php"); ?>
                        </div>
                        <div id="right"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="alert"></div>
    </body>
</html>
