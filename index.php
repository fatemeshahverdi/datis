<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Datis Sanat Abnus","داتیس صنعت آبنوس");
/****private****/
addInDic("Register", "Register","ثبت نام");
addInDic("Login", "Login","ورود");
addInDic("hi", "hi "," سلام ");
addInDic("Exit", "Exit","خروج");
addInDic("Home", "Home","صفحه نخست");
addInDic("Gallery", "Gallery","گالری");
addInDic("labware", "labware","شیشه آلات");
addInDic("SIGMA ALDERICH", "SIGMA ALDERICH","سیگما آلدریچ");
addInDic("MERCK", "MERCK","مرک");
addInDic("products", "products","محصولات");
addInDic("order", "order"," سفارش");
addInDic("Advance Search", "Advance Search","جستجوی پیشرفته");
addInDic("placeholder", "Search by Product No , Name , Formula Hill or CAS No ...","چستجو بر اساس کد محصول، نام، فرمول و یا کد CAS...");
addInDic("chat", "chat","گفتگو");
addInDic("preview", "view preview chat","مشاهده گفتگو های قبلی");
addInDic("send", "send","ارسال");
addInDic("start", "for start chat","برای شروع گفتگو");
addInDic("about us", "about us","درباره ما");
addInDic("News", "News","اخبار");
addInDic("articles", "articles","مقالات");
addInDic("More", "More","بیشتر");
addInDic("specification of analysis", "specification of analysis","مشخصات تجزیه و تحلیل");
addInDic("index", "index","شاخص");
addInDic("alphabetical index", "alphabetical index","شاخص الفبایی");
addInDic("bulk quota", "bulk quota","bulk quota");
addInDic("information", "information","اطلاعات");
addInDic("contact", "contact","تماس");
addInDic("Comment", "Comment","پیشنهادات");
addInDic("Cooperation", "Cooperation","دعوت به همکاری");
addInDic("location", "location","موقعیت");
addInDic("contact us", "contact us","تماس با ما");
addInDic("copyright", "copyright 2015 datis sanat abnous all right reserved.","کپی رایت 2015 کلیه حقوق برای داتیس صنعت آبنوس محفوظ میباشد.");
addInDic("Name", "Name","نام");
addInDic("Family", "Family","نام خانوادگی");
addInDic("Mail", "Mail","ایمیل");
addInDic("Start Chat", "Start Chat","شروع گفتگو");
addInDic("logOut", "logOut","خروج");
addInDic("", "","");
/****end dic****/
$a=file("document/picAddress");
require_once './lib/dbc.php';
session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_SESSION['pre']))
    {
        unset($_SESSION['pre']);
    }
    if(isset($_SESSION['idU']))
    {
        unset($_SESSION['idU']);
    }
$chat=  isset($_SESSION["id"]) || isset($_SESSION["chat"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php E("page title") ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo implode("", file("document/keyWord".$lang[0])); echo isset($keys)?",".$keys:"";?>">
        <style>
            *{margin: 0; font-family: <?php E("font family") ?>; direction: ltr;}
            a{text-decoration: none;}
            .tape{position: fixed;background-color:#004481;height: 120px ;width: 100%;min-width: 320px; color: #fff; top: 0;z-index: 1000;}
            .tape div{max-width: 1200px;margin: 0 auto;}
            .tape a,.footter a{color: #fff;}
            .tape1{height: 70px; text-align: left;}
            .tape2{height: 50px;}
            .logo{float: left; width: 220px;margin: 0 50px;} 
            .login{float: right;margin: 10px 50px;}
            .menu{clear: both;float: left; margin: 0 5%;text-transform: uppercase;overflow: visible;z-index: 10; vertical-align: top; width: 385px;}
            .menuItem{display: inline-block; margin: 10px;vertical-align: top}
            .menuItem li{display: none;background-color:#004481; padding: 2px;font-size: 90%;}
            .menuItem ul{height: 0; overflow: visible;padding: 10px 0 0;}
            .menuItem:hover li{display: block; }
            .openMenu{display: none; line-height: 0;clear: both;float: left;width: 35px;height: 50px;background-image: url('newImg/openMenu.png'); background-repeat: no-repeat; background-position: 0px 10px;}
            .openMenu:hover{background-position:  -41px 10px;}
            .search{float: right;width: 60%;margin: 0 5%; height: 50px;position: relative;}
            .search p{float: right; line-height: 0; margin: 0;direction: rtl;}
            .searchTx{border-radius: 5px 0 0 5px; width: 100%; border: none;height: 30px;direction: ltr; }
            .searchBt{border-radius: 0 5px 5px 0; width: 40px; border: none;height: 32px; background-color: #82b942; background-image: url(newImg/lens.png); background-repeat: no-repeat;background-position: center;}
            .banner{margin: 120px 0 0 0;width: 100%;overflow: hidden;}
            .sence img{width: 100%; height: 100%;}
            .wrapper{max-width: 1000px; margin: 0px auto;min-height: 400px;overflow: auto;padding: 30px;}
            .wrapper a:visited,.wrapper a:active,.wrapper a:link{color:#004481; }
            .brands{text-align: center}
            .merc,.sigma,.glass{background-color: #fff;  display: inline-block;width: 100px; height: 100px; margin: 35px 70px;
                  box-shadow: 0px 9px 0px #d4d4d4, 0px 9px 25px rgba(0,0,0,.7);border-radius: 8px; padding: 5px; background-repeat: no-repeat; background-position: center; }
            .merc{background-image: url('newImg/merck-logo.png')}
            .merc:hover,.sigma:hover,.glass:hover{box-shadow: 0px 3px 0px #d4d4d4, 0px 3px 6px rgba(0,0,0,.7);position: relative; top: 6px;}
            .sigma{background-image: url('newImg/sigma-logo.png')}
            .glass{background-image: url('newImg/glass-logo.png')}
            .part1{float: right;}
            .part2{float: left;min-height: 200px; max-width: 700px;width: 100%;}
            .title{color: #333;line-height: 30px ;background-color: #82b942 ;width: 100%;height: 30px; text-align: center;  border-radius: 5px; margin: 4px auto 10px;text-transform: capitalize;}
            .cell *{ direction: <?php E("dir") ?>}
            .cell p{padding-bottom: 10px;}
            .about,.news,.article{min-height: 100px; margin-bottom: 20px; width: 100%;color: #004481}
            .small{width: 90%;  margin: 0 auto; float: none; display: block;}
            .footter{width: 100%;min-height: 300px; background-color: #004481;color: #fff;}
            .footter,.footter *{overflow: auto; direction: <?php E("dir") ?>;}
            .footter div{ margin: 0 auto;}
            .options{min-height: 260px;text-align: center;padding:0 2%;max-width: 1200px;}
            .optionTitle{width: 90%; border-bottom: 1px solid #376b9b;text-transform: uppercase;padding: 10px 0; font-size: 16px;}
            .option{float: left; width: 250px;margin: 10px 30px;text-align:<?php E("text-align") ?> ; font-size: 12px;text-transform: capitalize;line-height: 20px;direction: <?php E("dir") ?>;}
            .option ul {padding: 5%; list-style: none;}
            .copyRight{height: 40px; background-color: #376b9b;padding: 0 10%;text-align: center;}
            .copyRight p{display: inline-block;width: 40%; text-transform: capitalize; font-size: 12px; }
            #pic2,#pic3,#pic4{display:none;}
            #show{margin:0 auto;width:100%;}
            #show img{width:100%;height:auto}
            #prev,#next{position:absolute;z-index:10;width:70px;padding:50% 0;background-repeat:no-repeat;background-position:0 15%;}
            #next{right:12px;}
            .b{position:relative;}
            #base:hover .b #prev{background-image:url('img/previous.png');}
            #base:hover .b #next{background-image:url('img/next.png');}
            .chatTit1{direction:ltr;font-size:10px;margin-top:25px;}
            .chatTit2{direction:rtl;font-size:10px;margin-top:25px;}
            .msg1{direction:ltr;font-size:14px;}
            .msg2{direction:rtl;font-size:14px;}
            #chat1{width:100%;height:200px;background-color:#eee;overflow:auto;}
            .lbl2{display: inline-block; width: 100px;}
            .chat form input{width: 100px;}
            .chat p{direction: <?php E("dir") ?>}
        </style>
        <script>
            function reSize()
            {
                if(document.body.offsetWidth<=980)
                {
                    document.getElementById("menu").style.display="none";
                    document.getElementById("openMenu").style.display="block";
                    document.getElementById("search").style.width="85%";
                    var t=document.getElementById("part2").childNodes;
                    for(var i=0;t.length>i;i++)
                    {
                        var s=t[i].className;
                        t[i].className=s+((typeof s)=="string" && s.search(" small")==-1  ?" small":"");
                    }
                }
                else
                {
                    with(document.getElementById("menu").style)
                    {
                        display="block";
                        position="static";
                    }
                    document.getElementById("openMenu").style.display="none";
                    document.getElementById("search").style.width="60%";
                    var t=document.getElementById("part2").childNodes;
                    for(var i=0;i<t.length;i++)
                    {
                        var s=t[i].className;
                        t[i].className=((typeof s)=="string" ? s.replace(" small",""):s);
                    }
                }
            }
            
            window.onresize=reSize;
            window.onload=function ()
            {
                reSize();document.getElementById("openMenu").onclick=function()
                {
                    var menu=document.getElementById("menu");
                    with (menu.style)
                    {
                        display="block";
                        position="absolute";
                        zIndex="1000";
                        top="120px";
                        backgroundColor="#004481";
                    }
                    //menu.onfocus=function (){alert(this)};
                    menu.focus();
                    menu.onblur=function (){this.style.display="none";this.style.position="static";};
                };
            };
            var onl=window.onload;
            window.onload=function ()
            {
                if(onl)
                    onl();
                change('pic1');
            };
            var t;
            function reset()
            {
                var node1=document.getElementById("show");
                for(var i=0;i<node1.childNodes.length;i++)
                {
                    node1.childNodes[i].style.display="none";
                }
            }
            function NEXT()
            {
                var node2=document.getElementById("show");
                for(var i=0;i<node2.childNodes.length;i++)
                {
                    if(node2.childNodes[i].style.display=="block")
                    {
                        reset();
                        i++;
                        i=i%node2.childNodes.length;
                        node2.childNodes[i].style.display="block";
                        break;
                    }
                }
            }
            function NEX()
            {
                clearInterval(t);
                NEXT();
                delay();
            }
            function delay()
            {
               t=setInterval("NEXT();",3000);
            }
            function previous()
            {
                var node5=document.getElementById("show");
                for(var i=0;i<node5.childNodes.length;i++)
                {
                    if(node5.childNodes[i].style.display=="block")
                    {
                        reset();
                        i--;
                        i=(i+(node5.childNodes.length))%node5.childNodes.length;
                        node5.childNodes[i].style.display="block";
                        break;
                    }
                }
            }
            function PREV()
            {
                clearInterval(t);
                previous();
                delay();
            }
            function change(id)
            {
                reset();
                clearInterval(t);
                var node3=document.getElementById(id);
                node3.style.display="block";
                delay();
            }
            /*********/
            var xmlhttp=(window.XMLHttpRequest)?new XMLHttpRequest("window.XMLHTTP"):xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp.onreadystatechange=function ()
            {
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                  var t=document.getElementById("chat1");var e=xmlhttp.responseText.split("$$");
                  if(e[0].indexOf("chat")>-1){t.innerHTML=t.innerHTML+e[1];t.scrollTop=t.scrollHeight;}
                  else if(e[0].indexOf("history")>-1){t.innerHTML=e[1]+t.innerHTML;t.scrollTop=t.scrollHeight;}  
                }
            };
            function prev()
            {
                document.getElementById("link").style.visibility="hidden";
                xmlhttp.open("get","Chat.php?part=history",true);
                xmlhttp.send();
            }
            function update()
            {
                
                xmlhttp.open("get","Chat.php?part=chat",true);
                xmlhttp.send();
                
            }
            function updateChat(id)
            {
                var e=document.getElementById(id);
                var str=e.value;
                e.value='';
                if(str=="")
                {
                    document.getElementById("chat1").innerHTML="";
                    return;
                }
                str=encodeURIComponent(str);
                 xmlhttp.open("get","Chat.php?part=chat&str="+str,true);
                 xmlhttp.send();
            }
            var onl2=window.onload;
            window.onload=function ()
            {
                if(onl2)onl2();
                update(); setInterval('update()',10000);
            };
        </script>
    </head>
    <body>
        <div class="tape">
            <div class="tape1">
                <div class="logo"><a href="#"><img src="<?php include './document/logo'; ?>" style="max-width: 220px;"></a></div>
                <div class="login"><?php echo isset($_SESSION['userName1'])?'<a style="font-size:14px;" href="#"> '.R("hi").$_SESSION['userName1'].' !</a> (<a href="./logOut.php">'.R("logOut").'</a>)':'<a style="font-size:14px;" href="logIn.php">'.R("Login").'</a>&nbsp;/&nbsp;<a style="font-size:14px;" href="./register.php">'.R("Register").'</a>'; ?></div>
                <div class="login" style="padding-right: 20px;"><span style="font-size: 80%; padding: 10px;"><a href="?change=En" rel="alternate">En</a> | <a href="?change=Fa" rel="alternate">Fa</a></span></div>
            </div>
            <div class="tape2">
                <div id="openMenu" class="openMenu"></div>
                <div id="menu" class="menu"><span class="menuItem"><a href="./"><?php E("Home") ?></a></span><span class="menuItem"><a href="./Order.php"><?php E("order") ?></a></span><span class="menuItem"><a href="./Galery.php"><?php E("Gallery") ?></a></span><span class="menuItem"><?php E("products") ?><ul><li><a href="Merck.php"><?php E("MERCK") ?></a></li><li><a href="SigmaAldrich.php"><?php E("SIGMA ALDERICH") ?></a></li><li><a href="Labware.php"><?php E("labware") ?></a></li></ul></span></div>
                <div class="search" id="search"><form action="Search.php"><p><input class="searchBt" type="submit" value=""></p><p style="position: relative;width: 80%;"><input name="needle" placeholder="  <?php E("placeholder") ?>"  style="direction: <?php E("dir") ?>;" class="searchTx"><a href="./advanceSearch.php" style="line-height: 25px;position: absolute;font-size: 80%;<?php echo R("dir")=="ltr"?"right: 5px;":"left:5px;"?>color: #004481; background-color: #fff;top: 5px;"><?php E("Advance Search") ?></a></p></form></div>
            </div>
        </div>
        <div class="banner">
            <div id="base">
                <div class='b'>
                    <div id="prev" onclick="PREV();"></div><div id="next"  onclick="NEX();"></div>
                </div>
                <div id="show"><?php for($i=0;$i<count($a);$i++){     $a[$i]=trim($a[$i],"\n");if($a[$i]!="")  echo '<img id="pic'.($i+1).'" src="'.$a[$i].'" alt="pic">';} ?></div>
            </div>
        </div>
        <div class="wrapper">
            <div class="brands">
                <a href="Merck.php"><div class="merc"></div></a>
                <a href="SigmaAldrich.php"><div class="sigma"></div></a>
                <a href="Labware.php"><div class="glass"></div></a>
            </div>
            <div class="part1">
                    <div class="chat">
                        <div class="title"><?php E("chat") ?></div>
                        <?php
                        if($chat)
                        {
                            echo "<div style=\"direction:rtl;\">
            <a id=\"link\" onclick=\"prev();\">".R("preview")."</a>
          <div id=\"chat1\">
          </div> 
            <p><input type=\"text\" id=\"text\" name=\"text\" onkeydown=\"if(event.keyCode==13)updateChat('text');\" >
                <input type=\"button\" name=\"reg\" onclick=\"updateChat('text');\" value=\"".R("send")."\"></p>
        </div>";
                        }
                        else
                        {
                            echo ' <img src="newImg/live.jpg" alt=""><p>'.R("start").' : <a style="font-size:14px;" href="logIn.php">'.R("Login").'</a>&nbsp;/&nbsp;<a style="font-size:14px;" href="./register.php">'.R("Register").'</a></p>';
                            echo "<p><input value='".R("Start Chat")."' style='width:100%;' type='button' onclick='open(\"start.php\",\"start\",\"width=300,height=250,left=200,top=200\");'></p>";
                        }
                        ?>
                    </div></div>
            <div id="part2" class="part2">
                <div class="about cell">
                    <div class="title"><?php E("about us") ?></div>
                    <?php 
                    $str=  implode("", file("document/aboutUs".$lang[0]));
                    echo substr($str,0,strpos($str,"</p>")+4);
                    ?>
                    <p style="font-size: 90%;"><a href="./aboutUs.php" style="color: #333;"><?php E("More") ?></a></p>
                </div>
                <div class="news cell">
                    <div class="title"><?php E("News") ?></div>
                    <?php
    $r=  Q("select title,id FROM news ORDER BY `time` desc limit 7 ",__LINE__,__FILE__);
    while ($row=  mysql_fetch_assoc($r))
    {
        echo "<p><a href='news.php?ID=".$row['id']."'>".$row['title']."</a></p>";
    }
                    ?>
                </div>
                <div class="article cell" >
                    <div class="title "><?php E("articles") ?></div>
                    <?php
    $r=  Q("select title,id FROM article ORDER BY `time` desc limit 7 ",__LINE__,__FILE__);
    while ($row=  mysql_fetch_assoc($r))
    {
        echo "<p><a href='articles.php?ID=".$row['id']."'>".$row['title']."</a></p>";
    }
                    ?>
                </div>
            </div>
        </div>
        <div class="footter">
            <div>
                <div class="options">
                    <div class="option">
                        <div class="optionTitle"><?php E("products") ?></div>
                        <ul><li><a href="Merck.php"><?php E("MERCK") ?></a></li><li><a href="SigmaAldrich.php"><?php E("SIGMA ALDERICH") ?></a></li><li><a href="Labware.php"><?php E("labware") ?></a></li><li><a href="./advanceSearch.php"><?php E("Advance Search") ?></a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle"><?php E("information") ?></div>
                        <ul><li><a href="./develop.php"><?php E("bulk quota") ?></a></li><li><a href="./develop.php"><?php E("alphabetical index") ?></a></li><li><a href="./develop.php">CAS <?php E("index") ?></a></li><li><a href="./specification.php"><?php E("specification of analysis") ?>(<abbr title="specification of analysis">SOA</abbr>)</a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle"><?php E("contact") ?></div>
                        <div style="padding: 5%;"><?php echo implode("", file("document/footercontact".$lang[0]));?></div>
                    </div>
                    <div class="option">
                        <div class="optionTitle"><?php E("about us") ?></div>
                        <ul><li><a href="./aboutUs.php"><?php E("about us") ?></a></li><li><a href="./contactUs.php"><?php E("contact us") ?></a></li><li><a href="./news.php"><?php E("News") ?></a></li><li><a href="./articles.php"><?php E("articles") ?></a></li><li><a href="#"><?php E("location") ?></a></li><li><a href="./cooperation.php"><?php E("Cooperation") ?></a></li><li><a href="./comment.php"><?php E("Comment") ?></a></li></ul>
                    </div>
                </div>
                <div class="copyRight">
                    <p><?php E("copyright") ?></p>
                </div>
            </div>
        </div>
    </body>
</html>