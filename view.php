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
    $row['pic']= html_entity_decode($row['pic'],ENT_QUOTES);
    $row['comment']= html_entity_decode($row['comment'],ENT_QUOTES);
    $row['size']= html_entity_decode($row['size'],ENT_QUOTES);
//    $name=$row['eName'];
    $s=<<<VIEW1000
            <p class='box1'><b>{$row['eName']}</b></p>
            <div class='box1' style='overflow:auto;height: 813px;'>
                <div style='float:left'>
                    <div class='win'><div class='tit'>Brand</div><div class='cc'>&nbsp;{$row['brand']}</div></div>
                    <div class='win'><div class='tit'>{$row['eName']}<hr>{$row['fName']}</div><div class='cc'>{$row['pic']}</div></div>
                </div>
                <div style='float:left'>
                    <div class='win' style='max-width:400px;'><div class='tit'>Comment</div><div class='cc'>{$row['comment']}</div></div>
                    <div class='win'><div class='tit'>Properties</div><div class='cc'>{$row['size']}</div></div>
                </div>
            </div><div style='clear:both;'></div>
VIEW1000;
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
//    $name=$row['Name'];  
$s=<<<VIEW1000
        <!--tab--> 
 <div class="tabTool">
                <div class="tabs" id="tabs"><div class="tab" onclick="showSec(this,'sec1')">General Prodauct Information
                    </div><div class="tab" onclick="showSec(this,'sec2')">Chemical Physical Data
                    </div><div class="tab" onclick="showSec(this,'sec3')">Package
                    </div><div class="tab" onclick="showSec(this,'sec4')">Specification
                    </div><div class="tab" onclick="showSec(this,'sec5')">Toxicology
                    </div></div>
                <div class="sectors" id="sects"><div class="sector" id="sec1">
                        <h3>General Prodauct Information</h3>
                        <div class='pdtTit'><div><p>{$row['BPNo']}</p><p>{$row['brand']}</p></div><p>{$row['Name']}</p></div>
                        <p class='box'><b style='color:blue;'> Synonyms</b></p>
                        <div class='sectWrap'><div class='sectcnt'>{$row['GPI']}</div></div>
                    </div><div class="sector" id="sec2">
                        <h3>Chemical Physical Data</h3>
                        <div class='pdtTit'><div><p>{$row['BPNo']}</p><p>{$row['brand']}</p></div><p>{$row['Name']}</p></div>
                        <p class='box'><b style='color:blue'> Synonyms</b></p>
                        <div class='sectWrap'><div class='sectcnt'>{$row['CPD']}</div></div>
                    </div><div class="sector" id="sec3">
                        <h3>Package</h3>
                        <div class='pdtTit'><div><p>{$row['BPNo']}</p><p>{$row['brand']}</p></div><p>{$row['Name']}</p></div>
                        <p class='box'><b style='color:blue'> Synonyms</b></p>
                        <div class='sectWrap'><div class='sectcnt'>{$row['Package']}</div></div>
                    </div><div class="sector" id="sec4">
                        <h3>Specification</h3>
                        <div class='pdtTit'><div><p>{$row['BPNo']}</p><p>{$row['brand']}</p></div><p>{$row['Name']}</p></div>
                        <p class='box'><b style='color:blue'> Synonyms</b></p>
                        <div class='sectWrap'><div class='sectcnt'>{$row['Specification']}</div></div>
                    </div><div class="sector" id="sec5">
                        <h3>Toxicology</h3>
                        <div class='pdtTit'><div><p>{$row['BPNo']}</p><p>{$row['brand']}</p></div><p>{$row['Name']}</p></div>
                        <p class='box'><b style='color:blue'> Synonyms</b></p>
                        <div class='sectWrap'><div class='sectcnt'>{$row['Toxicology']}</div></div>
                    </div></div>
            </div>
VIEW1000;
}
//$style="            .tabs{padding: 0 25px;overflow: auto;} .wrapper p{line-height:50px;}.tabTool{margin:20px 0;}
//            .tab{float: left; margin:0 2px;padding: 10px;min-width: 30px;background-color: #ccc; border-radius: 5px 5px 0 0;color:#inherit;}
//            .tab2{float: left; margin:0 2px;padding: 10px;min-width: 30px;background-color: #004481; border-radius: 5px 5px 0 0;color:#fff;}
//            .tab:hover{background-color: #004481;color:#fff;} td,th{border: 1px solid #999; padding:5px;} table{border-collapse: collapse;}
//            .sectors{background-color: #ccc;min-height: 400px;border-radius: 15px;padding:0;}
//            .sector{border: 2px solid #004481;border-radius: 15px;min-height: 400px; display: none; background-color: #fff;padding: 15px;}";
//require_once './template/header.php';
//echo '<div class="title">'.$name.'</div>';
echo $s;
//require_once './template/footer.php';
