<?php
if(isset($_COOKIE['lang']))
{
    $lang=$_COOKIE['lang'];
}
else if(isset($_GET['lang']))
{
    $lang=$_GET['lang'];
    $lang[0]=  strtoupper($lang[0]);
    setcookie("lang", $lang,  time()+31536000);
}
else
{
    $lang="En";
}
$lang[0]=  strtoupper($lang[0]);
$dic=array("En"=>array(),"Fa"=>array());
if(isset($_GET['change']) )
{
    $lang=$_GET['change'];
    $lang[0]=  strtoupper($lang[0]);
    $lang=array_key_exists($lang,$dic)?$lang:"En";
    setcookie("lang", $lang,  time()+31536000);
    header("location:".$_SERVER["PHP_SELF"]);
    exit();
}
function addInDic($key,$en,$fa)
{
    $dic=&$GLOBALS['dic'];
    $dic["En"][$key]=$en;
    $dic["Fa"][$key]=$fa;
}
function E($key)
{
    $dic=&$GLOBALS['dic'];
    $lang=&$GLOBALS['lang'];
    echo $dic[$lang][$key];
}
function R($key)
{
    $dic=&$GLOBALS['dic'];
    $lang=&$GLOBALS['lang'];
    return $dic[$lang][$key];
}

/****initalaize****/
addInDic("page title", "","");
addInDic("dir", "ltr", "rtl");
addInDic("text-align", "left", "right");
addInDic("font family", "calibry", "tahoma");
addInDic("Empety Email", "Please enter your Email.","لطفا ایمیل خود را وارد کنید");
addInDic("Incorect Email", "Please enter your Email correctly.","لطفا ایمیل خود را صحیح وارد کنید");