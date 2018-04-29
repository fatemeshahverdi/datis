<?php
$lvl=3;
require_once '../lib/security.php';
$ti="مقالات";
require_once './template/header.php';
require_once '../lib/dbc.php';
require_once '../lib/cal.php';
$re=Q("select title,time,status,id from article",6);
?>
<div><a href="addArticle.php">درج مقاله جدید</a> | <a href="articleText.php">متن صفحه مقالات</a></div>
   </div>
   <div>
       <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center"><?php if(isset($_GET['status1'])){if($_GET['status1']==1){echo("خبر با موفقیت ویرایش گردید");} if($_GET['status1']==2){echo("خبر با موفقیت حذف گردید");} if($_GET['status1']==3){echo("خبر با موفقیت ثبت گردید");}} ?></p></div>
       <div style="direction:rtl;">
           <table border="1" style="border-collapse:collapse;width:600px;margin:0 auto;">
               <thead><tr style="background-color:#5cf;"><th>ردیف</th><th>عنوان</th><th>زمان درج</th><th>رایگان</th><th>مشاهده مقاله</th></tr></thead>
               <?php
               for($r=1;$row=  mysql_fetch_assoc($re);$r++)
               {
                   $t=  jdate($row['time']);
                 echo($r%2==0?"<tr class='even'>":"<tr class='odd'>").
                         "<td>$r</td><td>".$row['title']."</td><td>$t[0]/$t[1]/$t[2]".
                         "</td><td>".($row['status']?"Yes":"No")."</td><td>".
                         "<a href='viewArticle.php?newId1=".$row['id']."'>مشاهده</a>"."</td></tr>";
               }
               ?>
           </table>
       </div>
<?php
require_once './template/footer.php';
?>