<?php
$lvl=1;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
$re=Q("select `name`,family,email from client WHERE id>0",__LINE__,__FILE__);
$str="نام\tایمیل\n";
while($row=mysql_fetch_assoc($re))
{
    $str.=$row['name']." ".$row['family']. "\t".$row['email']."\n";
}
$str=chr(255).chr(254).mb_convert_encoding($str,'UTF-16LE','UTF-8');
$f=fopen("list.csv",'w');
fwrite($f,$str);
fclose($f);
header("location:list.csv");