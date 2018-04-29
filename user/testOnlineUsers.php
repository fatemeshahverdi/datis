<?php
$lvl=11;
if(isset($_GET['part']))
{
require_once '../lib/dbc.php';
session_status()==PHP_SESSION_ACTIVE or session_start();
$idU=$_SESSION["idU"];
$_GET['idC']=  isset($_GET['idC'])?urldecode($_GET['idC']):NULL;
Q("update users set online=0 where online=1 and ".time()."-lastActivity>300");

if($_GET['part']=="onlineUsers")
{
    $re4=Q("select * from users where online=1  and id!=".$idU."");
    $r="";
    while ($row3=mysql_fetch_array($re4))
    {
        $r=$r."<p><a onclick='selectUser(".$row3['id'].",\"".$_GET['idC']."\");'>".$row3['userName']."</a></p>";
    }
    echo $r;
}
else if($_GET['part']=="onlineUser")
{
   Q("insert into chat (idUser,idCustomer,start,msg,time,writer,`read`) values (".$_SESSION["idU"].",'".$_GET['idC']."',0,'"."در حال انتقال پیام به کارشناس"."',".time().",0,0)");
   Q("insert into chat (idUser,idCustomer,start,msg,time,writer,`read`) values (".$_GET['idK'].",'".$_GET['idC']."',0,'"."..."."',".time().",0,0)");
   Q("insert into chat (idUser,idCustomer,start,msg,time,writer,`read`) values (".$_GET['idK'].",'".$_GET['idC']."',0,'"."در انتظار پاسخگویی کارشناس"."',".time().",1,0)");
   
}
}
?>