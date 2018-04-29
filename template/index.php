<!DOCTYPE html>
<html>
    <head>
        <title><?php echo isset($title)?$title:""; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo implode("", file("document/keyWord")); echo isset($keys)?",".$keys:"";?>">
        <style>
            *{margin: 0; font-family: tahoma;}
            a{text-decoration: none;}
            .tape{position: fixed;background-color:#004481;height: 120px ;width: 100%;min-width: 320px; color: #fff; top: 0;z-index: 1000;}
            .tape div{max-width: 1200px;margin: 0 auto;}
            .tape a,.footter a{color: #fff;}
            .tape1{height: 70px; text-align: left;}.tape2{height: 50px;}
            .logo{float: left; width: 150px;margin: 0 50px;} 
            .login{float: right;margin: 10px 50px;}
            .menu{clear: both;float: left; margin: 0 5%;text-transform: uppercase;overflow: visible;z-index: 10; vertical-align: top; width: 285px;}
            .menuItem{display: inline-block; margin: 10px;vertical-align: top}
            .menuItem li{display: none;background-color:#004481; padding: 2px;font-size: 90%;}
            .menuItem ul{height: 0; overflow: visible;padding: 0;}
            .menuItem:hover li{display: block; }
            .openMenu{display: none; line-height: 0;clear: both;float: left;width: 35px;height: 50px;background-image: url('newImg/openMenu.png'); background-repeat: no-repeat; background-position: 0px 10px;}
            .openMenu:hover{background-position:  -41px 10px;}
            .search{float: right;width: 55%;margin: 0 5%; height: 50px;}
            .search p{float: right; line-height: 0; margin: 0;direction: rtl;}
            .searchTx{border-radius: 5px 0 0 5px; width: 100%; border: none;height: 30px;}
            .searchBt{border-radius: 0 5px 5px 0; width: 40px; border: none;height: 32px; background-color: #82b942; background-image: url(newImg/lens.png); background-repeat: no-repeat;background-position: center;}
            .wrapper{max-width: 1000px; min-height: 400px;overflow: auto;margin: 120px auto 0 ;}
            .brands{text-align: center}
            .merc,.sigma,.glass{background-color: #fff;  display: inline-block;width: 100px; height: 100px; margin: 35px 70px;
                  box-shadow: 0px 9px 0px #d4d4d4, 0px 9px 25px rgba(0,0,0,.7);border-radius: 8px; padding: 5px; background-repeat: no-repeat; background-position: center; }
            .merc{background-image: url('newImg/merck-logo.png')}
            .merc:hover,.sigma:hover,.glass:hover{box-shadow: 0px 3px 0px #d4d4d4, 0px 3px 6px rgba(0,0,0,.7);position: relative; top: 6px;}
            .sigma{background-image: url('newImg/sigma-logo.png')}
            .glass{background-image: url('newImg/glass-logo.png')}
            .title{color: #333;line-height: 30px ;background-color: #82b942 ;width: 100%;height: 30px; text-align: center;  border-radius: 5px; margin: 4px auto 10px;text-transform: capitalize;}
            .cell{text-align: left;}
            .small{width: 90%;  margin: 0 auto; float: none; display: block;}
            .footter{width: 100%;min-height: 300px; background-color: #004481;color: #fff;}
            .footter,.footter *{overflow: auto;}
            .footter div{ margin: 0 auto;}
            .options{min-height: 260px;text-align: center;padding:0 2%;max-width: 1200px;}
            .optionTitle{width: 90%; border-bottom: 1px solid #376b9b;text-transform: uppercase;padding: 10px 0; font-size: 16px;}
            .option{float: left; width: 250px;margin: 10px 30px;text-align: initial; font-size: 12px;text-transform: capitalize;line-height: 20px;}
            .option ul {padding: 5%; list-style: none;}
            .copyRight{height: 40px; background-color: #376b9b;padding: 0 10%;text-align: center;}
            .copyRight p{display: inline-block;width: 40%; text-transform: capitalize; font-size: 12px; }
            #chat{position: fixed; bottom: 0;right: 0; width: 200px;height: 300px;background-color: #fff; border: 1px #ccc solid;}
            <?php echo isset($style)?$style:""; ?>
        </style>
        <script>
            function reSize()
            {
                if(document.body.offsetWidth<=640)
                {
                    document.getElementById("menu").style.display="none";
                    document.getElementById("openMenu").style.display="block";
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
        </script>
    </head>
    <body>
        <div class="tape">
            <div class="tape1">
                <div class="logo"><a href="#"><img src="newImg/Logo.png"></a></div>
                <div class="login"><a href="#">Login</a>&nbsp;/&nbsp;<a href="#">Register</a></div>
            </div>
            <div class="tape2">
                <div id="openMenu" class="openMenu"></div>
                <div id="menu" class="menu"><span class="menuItem">Home</span><span class="menuItem">order</span><span class="menuItem">products<ul><li>MERCK</li><li>SIGMA ALDERICH</li><li>labware</li></ul></span></div>
                <div class="search"><form action="search.php"><p><input class="searchBt" type="submit" value=""></p><p style="width: 75%"><input name="needle" class="searchTx"></p></form></div>
            </div>
        </div>
            <div id="chat"></div>
        <div class="wrapper">
            <div class="brands">
                <div class="merc"></div>
                <div class="sigma"></div>
                <div class="glass"></div>
            </div>
            <div>
                
            </div>
        </div>
        <div class="footter">
            <div>
                <div class="options">
                    <div class="option">
                        <div class="optionTitle">products</div>
                        <ul><li><a href="#">merck</a></li><li><a href="#">sigma aldrich</a></li><li><a href="#">labware</a></li><li><a href="#">advance search</a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle">information</div>
                        <ul><li><a href="#">bulk quota</a></li><li><a href="#">alphabetical index</a></li><li><a href="#">CAS index</a></li><li><a href="#">specification of analys(<abbr title="specification of analys">SOA</abbr>)</a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle">contact</div>
                        <ul><li>datais sanat abnous LTD</li><li>unit 5,no. 1,sima dead end,</li><li>yakhchal st ,shariati st. </li><li>theran iran</li><li>tel :(00) 98 21 22637682 </li><li>or  (00) 98 21 22637683 </li><li>fax: (00) 98 21 22637662</li><li><a href="mailto:info@dataissanat.com">email:info@dataissanat.com</a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle">about us</div>
                        <ul><li><a href="#">about us</a></li><li><a href="#">news</a></li><li><a href="#">article</a></li><li><a href="#">loctions</a></li></ul>
                    </div>
                </div>
                <div class="copyRight">
                    <p>copyright 2015 datis sanat abnous all right reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>