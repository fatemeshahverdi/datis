<?php 
$lvl=9;
require_once '../lib/security.php';
$needle=isset($_GET['needle']) && $_GET['needle']!=""?$_GET['needle']:"";
require_once '../lib/dbc.php';
$start=isset($_GET['start'])?(int)$_GET['start']:0;
if (isset($_GET['count']))
{
    $total=(int)$_GET['count'];
}
else 
{
    $total= (int) mysql_result(Q("select count(*) FROM glass".($needle==""?"":" where `fName` like '%$needle%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%'  or`eName` like '%$needle%'")), 0,0);
}
$nav="<a href='?count=$total&needle=$needle&start=0'>&lt;&lt;</a> <a href='?count=$total&needle=$needle&start=".($start>50?$start-50:0)."'>&lt;</a> ".($start+1)." to ".($start+50>$total?$start+$total%50:$start+50)." <a href='?count=$total&needle=$needle&start=".($start+50<$total?$start+50:$total-($total%50))."'>&gt;</a> <a href='?count=$total&needle=$needle&start=".($total-($total%50))."'>&gt;&gt;</a>".($needle==""?"":"  <a href='?needle='>همه محصولات</a>");
$r=Q("select `gID`,`fName`,`eName` from glass ".($needle==""?"":" where `fName` like '%$needle%' or `fName` like '%".mb_convert_encoding( $needle, 'HTML-ENTITIES', 'UTF-8')."%' or `eName` like '%$needle%'")." limit $start,50" ,__LINE__,__FILE__);
$rows="";
    //<td>".html_entity_decode( $row['comment'], ENT_QUOTES)."</td><td>".html_entity_decode( $row['size'], ENT_QUOTES)."</td><td>".html_entity_decode( $row['pic'], ENT_QUOTES)."</td>
while ($row=  mysql_fetch_assoc($r))
{
    $start++;
    $rows.="<tr class='".($start%2?"":"even")."'><th>$start</th><td>".$row['eName']."</td><td>".$row['fName']."</td><td><a href='editGlass.php?gID=".$row['gID']."&goto=".urlencode( $_SERVER["QUERY_STRING"])."' target='_new'> مشاهده و ویرایش</a><td><a href='delGlass.php?gID=".$row['gID']."&goto=".urlencode( $_SERVER["QUERY_STRING"])."' >X</a></td></tr>";
}
require_once './template/header.php';
?>
<a href="newGlass.php">شیشه جدید</a>
</div>
   <div>
       <div>
            <form>
                <p style="text-align: center; border: 2px red dashed;padding: 20px;margin: 10px;">
                    <input name="needle" id="needle"><input type="submit" value="جستجو">
                </p>
            </form>
        </div>
        <div class="nav"><?php echo $nav;?></div>
        <div>
            <table class="productTable">
                <thead><tr><th>ردیف</th><th class="cell">نام انگلیسی</th><th class="cell">نام فارسی</th><th>لینک</th><th>حذف</th></tr></thead>
                <tbody>
        <?php echo $rows;?>
                </tbody>
            </table>
        </div>
        <div class="nav"><?php echo $nav;?></div>
<?php
require_once './template/footer.php';
?>
