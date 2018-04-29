<!--
صفحه تامین کننده اعلان پیام خوانده نشده
-->
<?php
require_once '../lib/dbc.php';
session_status()==PHP_SESSION_ACTIVE or session_start();
$idu=$_SESSION["idU"];
$re6=Q("select * from chat where `read`=0 and writer=1 and idUser=".$_SESSION["idU"]."");
if(mysql_num_rows($re6)<1)
{
    
}
else
{
    echo "پیام خوانده نشده";
}
?>
