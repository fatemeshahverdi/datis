<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Result","نتیجه");
/****private****/
addInDic("Product Number / Name", "Product Number / Name","کد محصول/  نام");
addInDic("", "","");
/****end dic****/
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
    unset($_SESSION['start']);
    unset($_SESSION['ctotal']);
    unset($_SESSION['gtotal']);
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
            $t=" (`Name` like '".$h[1].$needle.$h[2]."' or";
            $t.=" `BPNo` like '".$h[1].$needle.$h[2]."' or";
            $t.=" `CasNo` like '".$h[1].$needle.$h[2]."' or";
            $t.=" `Formula` like '".$needle."') ";
            if($h[3]!="All")
            {
                $t.="and (";
                foreach (explode(" ", $h[3])as $v)
                {
                    $t.= " `brand` like '$v' or";
                }
                $t.=" 0) ORDER BY `brand` ASC";
            }
            $qc="select `cpID`, `BPNo` FROM chempdt WHERE ".$t;
            $pc="select count(`cpID`) FROM chempdt WHERE ".$t;
            $pg=$qg="";
        }
        else 
        {
            $qg="select `gID`,`eName` from glass where `eName` like '%".$needle."%' or `fName` like '%".$needle."%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'";
            $pg="select count(`gID`) from glass where `eName` like '%".$needle."%' or `fName` like '%".$needle."%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'";
            $qc=$pc="";
        }
    }
    else 
    {
        $qc="select `cpID`, `BPNo` FROM chempdt WHERE (`BPNo` like '%".$needle."%' or `Name` like '%".$needle."%'or `CasNo` like '%".$needle."%'or `Formula` like '%".$needle."%')";
        $pc="select count(`cpID`) FROM chempdt WHERE (`BPNo` like '%".$needle."%' or `Name` like '%".$needle."%'or `CasNo` like '%".$needle."%'or `Formula` like '%".$needle."%')";
        $qg="select `gID`,`eName` from glass where `eName` like '%".$needle."%' or `fName` like '%".$needle."%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'";
        $pg="select count(`gID`) from glass where `eName` like '%".$needle."%' or `fName` like '%".$needle."%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'";
    }
    if (isset($_SESSION['start'])&&isset($_SESSION['ctotal'])&&isset($_SESSION['gtotal']))
    {
        if(isset($_GET['page']))
        {
            $page=(int)$_GET['page'];
        }
        else
        {
            $page=1;
        }
    }
    else 
    {
        $page=1;
        $_SESSION['start']=0;
        $_SESSION['gtotal']= $pg==""?0:(int) mysql_result(Q($pg,__LINE__,__FILE__), 0,0);
        $_SESSION['ctotal']= $pc==""?0:(int) mysql_result(Q($pc,__LINE__,__FILE__), 0,0);
    }
    $total=ceil(($_SESSION['ctotal']+$_SESSION['gtotal'])/15);
    if($total==0 || $page<1 || $page>$total) 
    {
        header("location:./noResult.php");
        exit();
    }
    $t=(isset($haystack)?"haystack=".$haystack."&":"")."needle=$needle&page=";
    //$page from $total
    $nav="<div class='nav'><a href='?".
            $t."1'><button>&lt;&lt;</button></a><a href='?".$t.($page>1?$page-1:1)."'><button>&lt;</button></a>".
            ($total==$page && $page-2>0?"<a href='?".$t.($page-2)."'><button>".($page-2)."</button></a>":"").
            ($total>=$page && $page-1>0?"<a href='?".$t.($page-1)."'><button>".($page-1)."</button></a>":"").
            "<button style='color:red;'>$page</button>".
            (1<=$page && $page+1<=$total?"<a href='?".$t.($page+1)."'><button>".($page+1)."</button></a>":"").
            (1==$page && $page+2<=$total?"<a href='?".$t.($page+2)."'><button>".($page+2)."</button></a>":"").
            "<a href='?".$t.($page<$total?$page+1:$total)."'><button>&gt;</button></a><a href='?".$t.$total."'><button>&gt;&gt;</button></a>".
            "<br><span style='margin:0;'>".R("page title").": ".($_SESSION['ctotal']+$_SESSION['gtotal'])."</span></div>";
    $rows="<div class='pdc' id='pdc'><div class='tit'>".R("Product Number / Name")."</div>";
    $gpage=ceil($_SESSION['gtotal']/15);
    $step=($page==$gpage?$_SESSION['gtotal']%15:15);
    if($_SESSION['gtotal']>0 && $page <=  $gpage ) 
    {
        $r=Q($qg." limit ".($page*15-15).",$step",__LINE__,__FILE__);
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
            $rows.="<p><a href='javascript:viewDetail(\"".$s."\");'>".$row['eName']."</a></p>";
        }
    }
    if($_SESSION['ctotal']>0 && $page >=  $gpage)
    {
        $r=Q($qc." limit ".($step==15?($_SESSION['gtotal']%15)+(($page-$gpage)*15-15).",15":"0,".(15-$step)),__LINE__,__FILE__);
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
            $rows.="<p><a href='javascript:viewDetail(\"".$s."\");'>".$row['BPNo']."</a></p>";
        }
    }
    $rows.=$nav."</div>";
            $cnt= $rows;
}

    $style="             .pdc span{display:inline-block;  margin:0 10px 0 40px;font-weight: bold;color: #555 }
            .tabTool{position:relative;}
            .wrapper *{direction:ltr; }
            .pdc{ width:200px; border:#999 2px solid;  float:left;height:867px;position:relative; } 
            .pdc p{padding: 5px 5px 10px; } .pdc p:hover{background-color:#ddd;} 
            .pdc a:visited, .pdc a:active, .pdc a:link{color:#000;font-weight: bold; }
            .detail{ max-width:750px;float: left; } .detail *{font-family: calibry;}
            .nav{text-align:center; word-spacing:1px;clear:both;position:absolute; bottom:0px; width:100%; } 
            .nav button{font-weight:bold;padding:3px;}
            .pdc .tit{padding:15px; background-color: #fff;color:#000;border-bottom:2px solid #999;height:auto;}
            .tabs{overflow: auto;width: 750px} 
            .detail p{line-height:50px;} 
            .pdtTit{background-color:blue ;color:#fff; height:70px;border-top:2px solid black; border-bottom:2px solid #ddd; } 
            .pdtTit div{float:left;width:100px;}
            .pdtTit p{ padding: 10px 15px 0;  line-height: 20px; }
            .tab{float: left; margin:0 0 0 2px;padding: 5px;min-width: 30px;background-color: #eee; border-radius: 2px 2px 0 0;color:#000;border-right:1px solid #999;}
            .tab2{float: left; margin:0 0 0 2px;padding: 5px;min-width: 30px;background-color: #ddd; border-radius: 2px 2px 0 0;color:#000;border-right:1px solid #999;}
            .tab:hover{background-color: #B8BD6F;color:#fff;}
            th,td{padding: 0 5px;text-align:left;} 
            table{border-collapse: collapse;width:400px;}
            .sectors{background-color: #ccc;height: 835px;padding:0;} 
            .box{ border-bottom:2px solid #666; padding:0 8px;}
            .box1{ border:2px solid #999; padding:0 8px;}
            .sector{border: 4px ridge #ddd;height: inherit; display: none; background-color: #fff;}
            .win {border:1px solid #ccc; border-radius:5px; margin:10px 10px 10px 0 ; } 
            .win .tit{background-color:#ccc;color:#000; padding:5px 10px; font-weight:bold;} .win .cc{padding:5px;} 
            .sectcnt {margin:10px 0 0 0;float:left; height:675px;}
            .sectWrap{overflow:auto;} ";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div>';
echo $cnt;
?>
<div class="detail" id="detail"></div>
<script>
    var ajax;
    if (window.XMLHttpRequest){ajax=new XMLHttpRequest();}else{ajax=new ActiveXObject("Microsoft.XMLHTTP");}
    function viewDetail(link)
    {
        ajax.open("GET","view.php?"+link,true);
        ajax.send();
    }
    ajax.onreadystatechange=function ()
    {
        if (ajax.readyState==4 && ajax.status==200)
        {
            document.getElementById("detail").innerHTML=ajax.responseText;
            if(ajax.responseText.indexOf('<!--tab-->')>-1)
            {
                sects=document.getElementById('sects').childNodes;
                tabs=document.getElementById('tabs').childNodes;
                reSize2();
                showSec(document.getElementById('tabs').childNodes[0],'sec1');
            }
        }
    };
    /****************/
    var tabs;
    var sects;
                    function showSec(e,id)
                    {
                        for(var i=0;i<sects.length;i++)
                            sects[i].style.display="none";
                        for(var i=0;i<tabs.length;i++)
                        {
                            tabs[i].className="tab"
                        }
                        document.getElementById(id).style.display="block";
                        e.className="tab2";
                        effect(id);
                    }
                    function effect(id)
                    {
                        
                    }
                var onr=window.onresize;
                function reSize2()
                {
                    try
                    {
                        if(document.body.offsetWidth<750)
                        {
                            for(var i=0;i<tabs.length;i++)
                            {
                                tabs[i].style.width="200px";
                                tabs[i].style.cssFloat="none";
                            }
                        }
                        else
                        {
                            for(var i=0;i<tabs.length;i++)
                            {
                                tabs[i].style.width="auto";
                                tabs[i].style.cssFloat="left";
                            }
                        }
                    }
                    catch(ex){}
                }
                window.onresize=function ()
                {
                    if(onr)onr();
                    reSize2();
                };
                var onl=window.onload;
                window.onload=function ()
                {
                    if(onl)onl();
                    eval(document.getElementById('pdc').childNodes[1].childNodes[0].href);
                };
</script>
<?php
require_once './template/footer.php';