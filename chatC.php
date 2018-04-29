<?php
session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_SESSION['pre']))
    {
        unset($_SESSION['pre']);
    }
    if(isset($_SESSION['idU']))
    {
        unset($_SESSION['idU']);
    }
?>
<html>
    <head>
        <style>
            #link
            {
                cursor:pointer;
            }
        </style>
        <meta charset="UTF-8">
        <title>چت</title>
        <script>
            
        </script>
    </head>
    <?php
    
    ?>
    <body onload="update(); setInterval('update()',10000);">
        <div style="direction:rtl;">
            <a id="link" onclick="prev();">view preview chat</a>
          <div id="chat1" style="width:100%;height:150px;background-color:#eee;overflow:scroll;">
          </div> 
            <p><input type="text" id="text" name="text" onkeydown="if(event.keyCode==13)updateChat('text');" >
                <input type="button" name="reg" onclick="updateChat('text');" value="send"></p>
        </div>
    </body>
</html>
