<?php
session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_SESSION["userName"])&& isset($_SESSION["time"])&&(10>time()-$_SESSION["time"]))
{
    $_SESSION["time"]=time();
    require_once 'dbc.php';
    Q("update users set lastActivity=".time().",online=1 where userName='".$_SESSION['userName']."'");
    $ad;
    $ti;
}
else 
{
    session_destroy();
    header ("location:../user/logInUser.php");
}