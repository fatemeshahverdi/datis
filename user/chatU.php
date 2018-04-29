<?php
$lvl=11;
require_once '../lib/security.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>چت</title>
        <script>
         var ajax1,ajax2;
         if(window.XMLHttpRequest)
         {
             ajax1=new XMLHttpRequest();
             ajax2=new XMLHttpRequest();
         }
//         else
//         {
//             ajax1=new ActiveXobject("Microsoft.XMLHTTP");
//             ajax2=new ActiveXobject("Microsoft.XMLHTTP");
//         }
         
         ajax1.onreadystatechange=function ()
         {
             if(this.readyState==4 
                     && ajax1.status==200)
             {
                 var chat=document.getElementById("chat");
                 var x1=ajax1.responseText.split('$$');
                 
                 if(x1[0].indexOf('chat')>-1)
                 {
                     chat.innerHTML=chat.innerHTML+x1[1];
                 }
                 else if(x1[0].indexOf("history")>-1)
                 {
                     chat.innerHTML=x1[1]+chat.innerHTML;
                 }
             }
         };
          ajax2.onreadystatechange=function ()
         {
             if(ajax2.readyState==4 && ajax2.status==200)
             {
                 var t2=document.getElementById("online");
                 document.getElementById("online").innerHTML=ajax2.responseText;
                 
                 
             }
         };
         function selectUser (a,b)
         {
             ajax2.open("get","testOnlineUsers.php?idK="+a+"&idC="+encodeURIComponent(b)+"&part=onlineUser",true);
             ajax2.send();
         }
         function upDate1 ()
         {
             ajax1.open("get","testChat.php?idC="+encodeURIComponent('<?php echo $_GET['id']; ?>')+"&part=chat",true);
             ajax1.send();
             ajax2.open("get","testOnlineUsers.php?idC="+encodeURIComponent('<?php echo $_GET['id']; ?>')+"&part=onlineUsers",true);
             ajax2.send();
         }
         function updateChat1(id)
         {
             var e=document.getElementById(id);
                var str=e.value;
                e.value='';
             if (str=="")
             {
                 document.getElementById("chat").innerHTML="";
                 return ;
             }
             str=encodeURIComponent(str);
             ajax1.open("get","testChat.php?idC="+encodeURIComponent('<?php echo $_GET['id']; ?>')+"&part=chat&str="+str,true);
             ajax1.send();
         }
          function prevU()
         {
             document.getElementById("link").style.visibility="hidden";
             ajax1.open("get","testChat.php?idC="+encodeURIComponent('<?php echo $_GET['id']; ?>')+"&part=history",true);
             ajax1.send();
         }
         
         window.onload=function ()
         {
             upDate1 ();
             setInterval('upDate1 ()',10000);
         }
        </script>
    </head>
      <?php
    if(isset($_SESSION['pre']))
    {
        unset($_SESSION['pre']);
    }
    ?>
    <body >
        <p id="test"></p>
        <div style="direction:rtl;">
            <a id="link" style="margin-right:200px; " onclick="prevU();">see preview chat</a>
            <div id="chat" style="width:500px;height:250px;background-color:#eee;overflow:scroll;"></div>
            <div><p><input type="text" id="text" name="text" onkeydown="if(event.keyCode==13)updateChat1('text');" >
                    <input type="button" id="reg" name="reg" value="send" onclick="updateChat1('text');"></p></div>
            <div id="online" style="overflow:scroll;width:170px;height:80px;"></div>
        </div>
    </body>
</html>