<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dbc=  mysql_connect("localhost","root","");
mysql_set_charset("utf8");
mysql_select_db("datisDB");

$q="";
$r=NULL;
function Q($query="",$L="0",$P="0")
{
    $q=$query==""?$q:$query;
//    echo $q."<br>";
    $h=fopen("xlog","a");
    $r=  mysql_query($q)or die("<p dir=ltr> error[Line:$L,Page:$P]<br>"."[Query:$q]<br>"."[DB:".mysql_error()."]<br>[time:".  date("Y-m-d h:i:s ")."]</p><hr >");
    return $r;
}