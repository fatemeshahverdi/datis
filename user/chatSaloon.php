<?php
$lvl=11;
require_once '../lib/security.php';
$ti="chat";
require_once './template/header.php';
?>
<script>
    var xmlhttp2;
    if(window.XMLHttpRequest)
    {
        xmlhttp2=new XMLHttpRequest("window.XMLHTTP")
    }
    else
    {
        xmlhttp2=new ActiveXobject("Microsoft.XMLHTTP");
    }
    xmlhttp2.onreadystatechange=function ()
    {
        if(xmlhttp2.readyState==4 && xmlhttp2.status==200)
        {
            document.getElementById("name").innerHTML=xmlhttp2.responseText;
        }
    }
    function openWin(s)
    {
        window.open("chatU.php?id="+encodeURIComponent(s),name,"width=500,height=500");
        this.outerHTML="";
    }
    function scan()
    {
        
        xmlhttp2.open("get","saloonTestChat.php?part=customers",true);
        xmlhttp2.send();
    }
    var onl=window.onload;
    window.onload=function ()
    {
        if(onl)onl();
        scan();
        setInterval('scan()',15000);
    }
  
</script>
</div>
<div>
    <div style="direction:rtl">
  
        <div id="name" style="width:200px;height:250px;background-color:#eee;overflow:scroll;float:right;"></div>
  
    </div>
<?php
require_once './template/footer.php';
?>

