<?php
/****begin dic****/
/****public****/
/****private****/
addInDic("Register", "Register","ثبت نام");
addInDic("Login", "Login","ورود");
addInDic("hi", "hi "," سلام ");
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
//if(session_status()==PHP_SESSION_NONE)
    session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_SESSION['pre']))
    {
        unset($_SESSION['pre']);
    }
    if(isset($_SESSION['idU']))
    {
        unset($_SESSION['idU']);
    }
$cv=array("cname"=>"","cfamily"=>"","cmail"=>"");
$chat=  isset($_SESSION["id"]) || isset($_SESSION["chat"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php E("page title"); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo implode("", file("document/keyWord".$lang[0])); echo isset($keys)?",".$keys:"";?>">
        <style>
            *{margin: 0; font-family: <?php E("font family") ?>;direction: ltr;}
            a{text-decoration: none;}
            .tape{position: fixed;background-color:#004481;height: 120px ;width: 100%;min-width: 320px; color: #fff; top: 0;z-index: 1000;}
            .tape div{max-width: 1200px;margin: 0 auto;}
            .tape a,.footter a{color: #fff;}
            .tape1{height: 70px; text-align: left;}.tape2{height: 50px;}
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
            .wrapper{max-width: 1000px; overflow: auto;margin: 118px auto 0 ;  color: #626262;padding: 30px; }
            .wrapper *{direction: <?php E("dir") ?>;}
            .wrapper a:visited,.wrapper a:active,.wrapper a:link{color:#004481; }
            .coontent{border: 2px solid #CCC; padding: 15px;border-radius: 5px; min-height: 400px;}
/*            .brands{text-align: center}
            .merc,.sigma,.glass{background-color: #fff;  display: inline-block;width: 100px; height: 100px; margin: 35px 70px;
                  box-shadow: 0px 9px 0px #d4d4d4, 0px 9px 25px rgba(0,0,0,.7);border-radius: 8px; padding: 5px; background-repeat: no-repeat; background-position: center; }
            .merc{background-image: url('newImg/merck-logo.png')}
            .merc:hover,.sigma:hover,.glass:hover{box-shadow: 0px 3px 0px #d4d4d4, 0px 3px 6px rgba(0,0,0,.7);position: relative; top: 6px;}
            .sigma{background-image: url('newImg/sigma-logo.png')}
            .glass{background-image: url('newImg/glass-logo.png')}*/
            .title{color: #333;line-height: 30px ;background-color: #82b942 ;width: 100%;height: 30px; text-align: center;  border-radius: 5px; margin: 4px auto 10px;text-transform: capitalize;overflow: hidden;}
            .cell *{ direction: <?php E("dir") ?>}
            .small{width: 90%;  margin: 0 auto; float: none; display: block;}
            .footter{width: 100%;min-height: 300px; background-color: #004481;color: #fff; margin-top: 20px;}
            .footter,.footter *{overflow: auto; direction: <?php E("dir") ?>;}
            .footter div{ margin: 0 auto;}
            .options{min-height: 260px;text-align: center;padding:0 2%;max-width: 1200px;}
            .optionTitle{width: 90%; border-bottom: 1px solid #376b9b;text-transform: uppercase;padding: 10px 0; font-size: 16px;}
            .option{float: left; width: 250px;margin: 10px 30px;text-align:<?php E("text-align") ?> ; font-size: 12px;text-transform: capitalize;line-height: 20px;}
            .option ul {padding: 5%; list-style: none;}
            .copyRight{height: 40px; background-color: #376b9b;padding: 0 10%;text-align: center;}
            .copyRight p{display: inline-block;width: 40%; text-transform: capitalize; font-size: 12px; }
            #chat{position: fixed; bottom: 0;right: 0; width: 206px;height: 330px;background-color: #fff; border: 1px #ccc solid; opacity: 0.5;border-radius: 5px;}
            #chat:hover{opacity: 1;}
            #chat1{width:100%;height:200px;background-color:#eee;overflow:auto;}
            #chat .title{margin: 0;}
            .chatTit1{direction:ltr;font-size:10px;margin-top:25px;}
            .chatTit2{direction:rtl;font-size:10px;margin-top:25px;}
            .msg1{direction:ltr;font-size:14px;}
            .msg2{direction:rtl;font-size:14px;}
            .lbl2{display: inline-block; width: 100px;}
            #chat form input{width: 100px;}
            #chat form p{margin: 0;direction: <?php E("dir")?>;}
        <?php echo isset($style)?$style:""; ?>
        </style>
        <script>
            function reSize()
            {
                if(document.body.offsetWidth<=980)
                {
                    document.getElementById("menu").style.display="none";
                    document.getElementById("openMenu").style.display="block";
                    document.getElementById("search").style.width="85%";
                    document.getElementById("chat").style.display="none";
                }
                else
                {
                    with(document.getElementById("menu").style)
                    {
                        display="block";
                        position="static";
                    }
                    document.getElementById("openMenu").style.display="none";
                    document.getElementById("chat").style.display="block";
                    document.getElementById("search").style.width="60%";
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
            <?php
            if($chat) echo "var onl2=window.onload;
            window.onload=function ()
            {
                if(onl2)onl2();
                update(); setInterval('update()',10000);
            };";
            ?>
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
        <div id="chat"><div class="title" onclick="showChat();"><?php E("chat") ?></div>
            <script>
                function setCookie(c_name,value,exdays)
                {
                var exdate=new Date();
                exdate.setDate(exdate.getDate() + exdays);
                var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
                document.cookie=c_name + "=" + c_value;
                }
                function getCookie(c_name)
                {
                var i,x,y,ARRcookies=document.cookie.split(";");
                for (i=0;i<ARRcookies.length;i++)
                {
                  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
                  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
                  x=x.replace(/^\s+|\s+$/g,"");
                  if (x==c_name)
                    {
                    return unescape(y);
                    }
                  }
                }
                function showChat()
                {
                    var chat=document.getElementById('chat');
                    if(getCookie('chatView')=="1")
                    {
                        setCookie('chatView',"0",365);
                        chat.style.height="30px";
                    }
                    else
                    {
                        setCookie('chatView',"1",365);
                        chat.style.height="330px";
                    }
                }
                chat.style.height=getCookie('chatView')=="1"?"330px":"30px";
            </script>
            <?php
                        if($chat)
                        {
                            echo "<div style=\"direction:rtl;\">
            <a id=\"link\" onclick=\"prev();\">".R("preview")."</a>
          <div id=\"chat1\" >
          </div> 
            <p><input type=\"text\" id=\"text\" name=\"text\" onkeydown=\"if(event.keyCode==13)updateChat('text');\" style='width:150px;'>
                <input type=\"button\" name=\"reg\" onclick=\"updateChat('text');\" value=\"".R("send")."\" ></p>
        </div>";
                        }
                        else
                        {
                            echo ' <img src="newImg/live.jpg" alt=""><p style="font-size:12px;">'.R("start").' : <a href="logIn.php">'.R("Login").'</a>&nbsp;/&nbsp;<a href="./register.php">'.R("Register").'</a></p>';
                            echo "<p><input value='".R("Start Chat")."' style='width:100%;' type='button' onclick='open(\"start.php\",\"start\",\"width=300,height=250,left=200,top=200\");'></p>";
                        }
                        ?>
        </div>
        <?php
        ?>
        <div class="wrapper">
<!--            <div class="brands">
                <div class="merc"></div>
                <div class="sigma"></div>
                <div class="glass"></div>
            </div>-->
            <div>