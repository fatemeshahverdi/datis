<?php
$lvl=5;
require_once '../lib/security.php';
$ti="پیشنهادات و انتقادات";
require_once './template/header.php';
require_once '../lib/cal.php';
$re=Q("select name,tel,email,matn,time,id,`read` from comment ORDER BY `time` desc",6);
?>
</div>
<div>
    <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;"><?php if(isset($_GET['status'])){if($_GET['status']==1){echo("پیام با موفقیت حذف گردید");}} ?></p></div>
    <div style="direction:rtl;">
        <table border="1" style="border-collapse:collapse;width:500px;margin:0 auto;">
            <thead><tr style="background-color:#5cf;"><th>ردیف</th><th>نام</th><th>زمان</th><th>مشاهده</th><th>حذف</th></tr></thead>
            <?php
            for($r=1;$row=  mysql_fetch_assoc($re);$r++)
            {
                echo($r%2==0?'<tr class="even">':'<tr class="odd">');
                $t=  jdate($row['time']);
                echo("<td>".$r."</td><td>".$row['name']."</td><td>$t[0]/$t[1]/$t[2]</td><td>"."<a style='font-weight:".
                        ($row['read']==0?'thin;color:#666;':'bolder;color:black;').
                        "'  href='viewComment.php?id=".$row['id']."'>مشاهده</a></td></td><td>"."<a style='font-weight:".
                        ($row['read']==0?'thin;color:#666;':'bolder;color:black;').
                        "'  href='delComment.php?id=".$row['id']."'>X</a></td></td>");
            }
            ?>
        </table>
    </div>
<?php
require_once './template/footer.php';
?>
