<?php
if(count($_GET)!=1)
    header("location:./noResult.html");
$s=  key($_GET);
$s=substr($s,10).substr($s, 0,10);
$s1=substr($s, 0,7);
if(substr(hash("md5",$s1),0,22)!=substr($s, 8))
    header("location:./noResult.html");
$l=  (int)substr($s, 7,1);
$s2= hexdec(substr($s1, 7-$l,$l-1));
$s1=(int)hexdec(substr($s1, 6));
require_once './lib/dbc.php';
$name="";
if($s1%2)
{
    $r=Q("select * FROM glass where `gID`=".$s2);
    if(mysql_num_rows($r)!=1)
        header("location:./noResult.html");
    $row=  mysql_fetch_assoc($r);
    $s= "<p><b>En Name: </b>".$row['eName']."</p>";
    $s.= "<p><b>Fa Name: </b>".$row['fName']."</p>";
    $s.= "<p><b>Brand: </b>".$row['brand']."</p>";
    $s.= "<p style='float:left; margin:20px 40px 0 0;'>".html_entity_decode($row['pic'],ENT_QUOTES)."</p>";
    $s.= "<p><b>Comment: </b>".html_entity_decode($row['comment'],ENT_QUOTES)."</p>";
    $s.= "<p><b>Information: </b>".html_entity_decode($row['size'],ENT_QUOTES)."</p>";
    $name=$row['eName'];
}
else
{
    $r=Q("select * FROM chempdt as c ,detail as d where d.`cpID`=".$s2." and c.`cpID`=".$s2);
    if(mysql_num_rows($r)!=1)
        header("location:./noResult.html");
    $row=  mysql_fetch_assoc($r);
    $row['GPI']=html_entity_decode($row['GPI'],ENT_QUOTES);
    $row['CPD']=html_entity_decode($row['CPD'],ENT_QUOTES);
    $row['Package']=html_entity_decode($row['Package'],ENT_QUOTES);
    $row['Specification']=html_entity_decode($row['Specification'],ENT_QUOTES);
    $row['Toxicology']=html_entity_decode($row['Toxicology'],ENT_QUOTES);
//    $rows= "<p>Name:".$row['Name']."</p>";
//    $rows.= "<p>BPNo:".$row['BPNo']."</p>";
//    $rows.= "<p>Brand:".$row['brand']."</p>";
//    $rows.= "<p>CasNo:".$row['CasNo']."</p>";
//    $rows.= "<p>Formula:".$row['Formula']."</p>";
    $name=$row['Name'];  
$s=<<<VIEW1000
        <p><b>Brand: </b>{$row['brand']}</p>
        <p><b>Name: </b>{$row['Name']}</p>
        <p><b>Product No: </b>{$row['BPNo']}</p>
 <div class="tabTool">
                <div class="tabs" id="tabs"><div class="tab" onclick="showSec(this,'sec1')">General Prodauct Information
                    </div><div class="tab" onclick="showSec(this,'sec2')">Chemical Physical Data
                    </div><div class="tab" onclick="showSec(this,'sec3')">Package
                    </div><div class="tab" onclick="showSec(this,'sec4')">Specification
                    </div><div class="tab" onclick="showSec(this,'sec5')">Toxicology
                    </div></div>
                <div class="sectors" id="sects"><div class="sector" id="sec1">
                        {$row['GPI']}
                    </div><div class="sector" id="sec2">
                        {$row['CPD']}
                    </div><div class="sector" id="sec3">
                        {$row['Package']}
                    </div><div class="sector" id="sec4">
                        {$row['Specification']}
                    </div><div class="sector" id="sec5">
                        {$row['Toxicology']}
                    </div></div>
                <script id="tS">
                    var sects=document.getElementById('sects').childNodes;
                    var tabs=document.getElementById('tabs').childNodes;
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
                    var onl=window.onload;
                var onr=window.onresize;
                function reSize2()
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
                window.onload=function ()
                {
                    if(onl) onl();
                    reSize2();
                        showSec(document.getElementById('tabs').childNodes[0],'sec2')
                };
                window.onresize=function ()
                {
                    if(onr)onr();
                    reSize2();
                };
                </script>
            </div>
VIEW1000;
}
$style="            .tabs{padding: 0 25px;overflow: auto;} .wrapper p{line-height:50px;}.tabTool{margin:20px 0;}
            .tab{float: left; margin:0 2px;padding: 10px;min-width: 30px;background-color: #ccc; border-radius: 5px 5px 0 0;color:#inherit;}
            .tab2{float: left; margin:0 2px;padding: 10px;min-width: 30px;background-color: #004481; border-radius: 5px 5px 0 0;color:#fff;}
            .tab:hover{background-color: #004481;color:#fff;} td,th{border: 1px solid #999; padding:5px;} table{border-collapse: collapse;}
            .sectors{background-color: #ccc;min-height: 400px;border-radius: 15px;padding:0;}
            .sector{border: 2px solid #004481;border-radius: 15px;min-height: 400px; display: none; background-color: #fff;padding: 15px;}";
require_once './template/header.php';
echo '<div class="title">'.$name.'</div>';
echo $s;
require_once './template/footer.php';
