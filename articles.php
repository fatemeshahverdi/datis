<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Articles","مقالات");
addInDic("Abstract", "Abstract","چکیده");
addInDic("Article", "Article","مقاله");
addInDic("This Article is not free", "This Article is not free","این مقاله رایگان نیست");
/****private****/
/****end dic****/
require_once './lib/dbc.php';
if(isset($_GET['ID']))
{
    $r=  Q("select * FROM article WHERE id=".$_GET['ID'],__LINE__,__FILE__);
    $row=  mysql_fetch_assoc($r);
    require_once './lib/cal.php';
    session_status()==PHP_SESSION_ACTIVE or session_start();
    $t=  jdate($row['time']);
    $cnt= "<h3 style='margin:15px 0; border-bottom: #004481 2px solid; padding-bottom:15px;'>".$row['title'].
            "</h3><div><h4>".R("Abstract").":</h4>".$row['abstract']."</div><div><h4>".R("Article").":</h4>";
    if(isset($_SESSION['id'])&& isset($_SESSION['specific'])&&$_SESSION['specific'] )
    {
        $cnt.=$row['article']."</div><p style='font-size:12px;color:#888'>$t[0]/$t[1]/$t[2]</p>";
    }
    else
    {
        $cnt.=($row['status']?$row['article']:R("This Article is not free").".")."</div><p style='font-size:12px;color:#888'>$t[0]/$t[1]/$t[2]</p>";
    }
    $keys=$row['keys'];
}
else
{
    $r=  Q("select title,id FROM article ",__LINE__,__FILE__);
    $cnt="";
    while ($row=  mysql_fetch_assoc($r))
    {
        $cnt.="<p><a href='?ID=".$row['id']."'>".$row['title']."</a></p>";
    }
}
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
require_once './document/article'.$lang[0];
echo $cnt;
echo '</div>';
require_once './template/footer.php';

