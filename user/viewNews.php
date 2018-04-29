<?php
$lvl=2;
require_once '../lib/security.php';
$ti="اخبار";
$s=0;
require_once '../lib/dbc.php';
require_once '../lib/cal.php';
require_once './template/header.php';

$re=Q("select title,time,id from news",6);

$row=mysql_num_rows($re);
?>
<div><a href="addNews.php">افزودن خبر جدید</a></div>
</div>
<div style="direction:rtl;">
    <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;"><?php if(isset($_GET["status"])){if($_GET["status"]==1){echo("خبر با موفقیت ویرایش شد");}if($_GET["status"]==2){echo("خبر با موفقیت حذف گردید");}if($_GET["status"]==3){echo("خبر با موفقیت ثبت گردید");}} ?></p></div>
    

      <div>
           <table border="1" style="border-collapse:collapse;width:500px;margin:0 auto;">
               <thead><tr style="background-color:#5cf;"><th>ردیف</th> <th>عنوان</th><th>زمان درج</th><th>مشاهده خبر</th><th>حدف خبر</th></tr></thead>
         <?php
         $r=1;
         for($i=0;$i<$row;$i++)
         {
             echo($i%2==0?'<tr class="even">':'<tr class="odd">');
             echo("<td>".$r."</td>");
             for($j=0;$j<2;$j++)
             {
                if($j==1)
                {
                    $t=jdate(mysql_result($re,$i,$j));
                    echo("<td>".$t[0]."/".$t[1]."/".$t[2]."</td>");
                }
                else
                {
                    echo("<td>".mysql_result($re,$i,$j)."</td>");
                }
                 
             }
             $r++;
             $id=mysql_result($re,$i,2);
             echo("<td>"."<a href='viewNew.php?newsId=$id'>مشاهده</a>"."</td>");
             echo("<td>"."<a href='delNew.php?newsId=$id'>X</a>"."</td>");
             echo ("</tr>");
         }
         ?>
            </table>
      </div>
    
<?php
require_once './template/footer.php';
?>