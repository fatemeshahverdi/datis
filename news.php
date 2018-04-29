<?php
$title="News";
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "News","اخبار");
/****private****/
/****end dic****/
require_once './lib/dbc.php';
if(isset($_GET['ID']))
{
    $r=  Q("select * FROM news WHERE id=".$_GET['ID'],__LINE__,__FILE__);
    $row=  mysql_fetch_assoc($r);
    require_once './lib/cal.php';
    $t=  jdate($row['time']);
    $cnt= "<h3 style='margin:15px 0; border-bottom: #004481 2px solid; padding-bottom:15px;'>".$row['title']."</h3><div>".$row['news']."</div><p style='font-size:12px;color:#888'>$t[0]/$t[1]/$t[2]</p>";
    $keys=$row['keys'];
}
else
{
    $r=  Q("select title,id FROM news ",__LINE__,__FILE__);
    $cnt="";
    while ($row=  mysql_fetch_assoc($r))
    {
        $cnt.="<p><a href='?ID=".$row['id']."'>".$row['title']."</a></p>";
    }
}
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
echo $cnt."</div>";
require_once './template/footer.php';

