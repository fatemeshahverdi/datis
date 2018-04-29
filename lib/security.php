<?php
session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_SESSION["userName"])&& isset($_SESSION["time"])&&(300>time()-$_SESSION["time"]))
{
    $_SESSION["time"]=time();
    require_once 'dbc.php';
    Q("update users set lastActivity=".time().",online=1 where userName='".$_SESSION['userName']."'");
    $ad;
    $ti="پنل کاربری";
}
else 
{
    session_destroy();
    header ("location:../user/logInUser.php");
    exit(0);
}
if(!(pow(2,$lvl)&(int)$_SESSION['level'])) 
{
    header("location:404.html");
    exit(0);
}