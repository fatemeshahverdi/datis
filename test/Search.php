<?php
session_status()==PHP_SESSION_ACTIVE or session_start();
$needle=isset($_GET['needle'])? $_GET['needle']:"";
$haystack=isset($_GET['haystack'])? $_GET['haystack']:""; 
$isnew=FALSE;
if( !isset($_SESSION['searchCount']) )
{
    $_SESSION['searchCount']=1;
    $_SESSION['needle']=$_SESSION['haystack']=NULL;
    $R="search";
}
if($needle!=$_SESSION['needle'] || $haystack!=$_SESSION['haystack'])
{
    $_SESSION['needle']=$needle;
    $_SESSION['haystack']=$haystack;
    $isnew=TRUE;
}
if($_SESSION['searchCount']<10)
{
    if($isnew)
    {
        $_SESSION['searchCount']++;
    }
    $R="search";
}
else
{
    if( isset($_SESSION['kapcha'])) 
    {
        if($isnew)
        {
            $R="kapcha";
        }
        else
        {
            if(!isset($_GET['kapcha']) || $_GET['kapcha']!= $_SESSION['kapcha'])
            {
                $R="kapcha";
            }
            else
            {
                $R="search";
                unset($_GET['kapcha']);
                unset($_SESSION['kapcha']);
            }
        }
    }
    else
    {
        $R=$isnew?"kapcha":"search";
    }
}
$cnt="";
if($R=="kapcha" )
{
    $cnt="<form><input type='hidden' value='".$_GET['needle']."' name='needle'>".
"            <input type='hidden' value='".(isset($_GET['haystack'])? $_GET['haystack']:'')."' name='haystack'>".
"            <p><label>&nbsp;</label><img style='border: 3px dotted black;' src='./lib/kapcha.php?code=".rand(100000, 999999)."'></p>".
"            <p><label for='kapcha'>Security Image:</label><input name='kapcha' id='kapcha'></p><p><label >&nbsp;</label><input type='submit' value='Continue Search ...'></p></form>";
}
else
{
    require_once './lib/dbc.php';
    if(strlen($needle)<3)  
    {
        header("location:./noResult.php");
        exit();
    }
    $needle= str_replace("'", htmlentities("'",ENT_QUOTES), $needle)  ;
    if(isset($haystack) && $haystack!="")
    {
        $h=  base64_decode($haystack);
        $h=  explode("#", $h);
        if($chem=($h[0]=="chemical"))
        {
            $t=$h[1]." like '%".$needle."%' ";
            if($h[2]!="All")
            {
                $t.="and (";
                foreach (explode(" ", $h[2])as $v)
                {
                    $t.= " brand like '$v' or";
                }
                $t.=" 0)";
            }
            $q="select `cpID`, brand,`BPNo`,`CasNo`,`Name`,`Formula` FROM chempdt WHERE ".$t;
            $p="select count(`cpID`) FROM chempdt WHERE ".$t;
        }
        else 
        {
            $q="select `gID`,brand,`fName`,`eName` from glass where `eName` like '%".$needle."%' or `fName` like '%".$needle."%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'";
            $p="select count(`gID`) from glass where `eName` like '%".$needle."%' or `fName` like '%".$needle."%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'";
        }
    }
    else 
    {
        $chem=TRUE;
        $q="select `cpID`, brand,`BPNo`,`CasNo`,`Name`,`Formula` FROM chempdt WHERE `BPNo` like '%".$needle."%' or `Name` like '%".$needle."%'or `CasNo` like '%".$needle."%'or `Formula` like '%".$needle."%'";
        $p="select count(`cpID`) FROM chempdt WHERE `BPNo` like '%".$needle."%' or `Name` like '%".$needle."%'or `CasNo` like '%".$needle."%'or `Formula` like '%".$needle."%'";
    }
    if (isset($_GET['start']))
    {
        $start=  explode(".",$_GET['start'] );
        $start[0]=(int)$start[0];
        $start[1]=(int)$start[1];
    }
    else 
    {
        $start[0]=1;
        $start[1]= (int) mysql_result(Q($p,__LINE__,__FILE__), 0,0);
    }
    if($start[1]==0) 
    {
        header("location:./noResult.php");
    }
    $t=isset($haystack)?"haystack=".$haystack."&":"";
    $needle=$needle;
    $nav="<p style='text-align:center; word-spacing:15px;'><a href='?".$t."needle=$needle&start=1.$start[1]'>&lt;&lt;</a> <a href='?".$t."needle=$needle&start=".($start[0]>15?$start[0]-15:1).".$start[1]'>&lt;</a> $start[0] to ".($start[0]+14>$start[1]?$start[1]:$start[0]+14)." <a href='?".$t."needle=$needle&start=".($start[0]+15<$start[1]?$start[0]+15:$start[1]-($start[1]%15)).".$start[1]'>&gt;</a> <a href='?".$t."needle=$needle&start=".($start[1]-($start[1]%15)).".$start[1]'>&gt;&gt;</a></p>";
    if($chem)
    {
        $r=Q($q." limit ".$start[0].",15",__LINE__,__FILE__);
        while ($row=  mysql_fetch_assoc($r))
        {
            $t=  rand(0, 14);
            $s1=  dechex($row['cpID']);
            $s1.=dechex($t+($t%2==0?0:1));
            $t+=$t%2==0?0:1;
            $l=strlen($s1);
            $s2=dechex(time());
            $s=  substr($s2,strlen($s2)-(7-$l)).$s1;
            $s.=$l.substr(hash("md5", $s), 0,22);
            $s=substr($s,20).substr($s, 0,20);
            $rows.="<div class='pdc'><p><span>Brand : </span><span class='sp1'>".$row['brand']."</span><span>Name : </span>".$row['Name']."</p><p><span>Product No : </span><span class='sp2'>".$row['BPNo']."</span><span>CasNo : </span>".$row['CasNo']."<span>Formula : </span>".$row['Formula']."<a href='view.php?".$s."'>View detail</a></p></div>";
        }
    }
    else 
    {
        $r=Q($q." limit ".$start[0].",15",__LINE__,__FILE__);
        while ($row=  mysql_fetch_assoc($r))
        {
            $t=  rand(0, 14);
            $s1=  dechex($row['gID']);
            $s1.=dechex($t+($t%2==1?0:1));
            $l=strlen($s1);
            $s2=dechex(time());
            $s=  substr($s2,strlen($s2)-(7-$l)).$s1;
            $s.=$l.substr(hash("md5", $s), 0,22);
            $s=substr($s,20).substr($s, 0,20);
            $rows.="<div class='pdc'><p><span>Brand : </span>".$row['brand']."</p><p><span>Fa Name : </span>".$row['fName']."<span>En Name : </span>".$row['eName']."<a href='view.php?".$s."'>View detail</a></p></div>";
        }
    }
            $cnt= $nav.$rows.$nav;
}

    $style="            .error{font-size:10px;color:red;}  .pdc span{display:inline-block;  margin:0 10px 0 40px;font-weight: bold;color: #555 }.pdc span.sp1,.pdc span.sp2{font-weight: normal;margin:0;} .sp1{ width:120px;}.sp2{display:inline-block; width:75px;}\n"
            . "             .pdc{ border:#004481 2px solid; border-radius:5px; margin:10px 0; padding:20px 0 0; } .pdc p{padding:0 0 20px 0;} .pdc a:visited, .pdc a:active, .pdc a:link{color:#82b942;font-weight: bold; } .pdc a{float:right;margin:0 40px}";
$title="Result";
require_once './template/header.php';
echo '<div class="title">Result</div>'; 
echo $cnt;
require_once './template/footer.php';