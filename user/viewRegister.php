<?php
$lvl=1;
require_once '../lib/security.php';
$ti="ثبت نام اعضا";
require_once './template/header.php';
require_once '../lib/dbc.php';
require_once '../lib/cal.php';
$re=Q("select name,email,work,workP,tel,mob,regTime,`specific`,id from register WHERE id>0",__LINE__,__FILE__);
$row=mysql_num_rows($re);
?>
<a href="downloadUsersList.php">خروجی اکسل اعضا</a> | <a href="downloadUsersList2.php">خروجی اکسل غیر عضو</a></div>
<div>
    <div style="direction:rtl;">
        <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;"><?php if(isset($_GET["status"])&&$_GET["status"]==2){echo("عضو با موفقیت حذف گردید");}if(isset($_GET["status"])&&$_GET["status"]==1){echo("غیر عضو با موفقیت حذف گردید");} ?></p></div>
        <h3>اعضا</h3>
        <table border="1" style="border-collapse:collapse;width:700px;margin:0 auto;">
            <tr style='background-color:#5cf;'><th>ردیف</th><th>نام</th><th>ایمیل</th><th>شغل</th><th>محل کار</th><th>تلفن</th><th>موبایل</th><th>زمان ثبت نام</th><th>ویژه</th><th>حذف</th></tr>
           <?php
           $r=1;
           for($i=0;$i<$row;$i++)
           {
               echo($i%2==0?'<tr class="even">':'<tr class="odd">');
               echo("<td>$r</td>");
               for($j=0;$j<8;$j++)
               {
                   if($j==6)
                   {
                       $t=jdate(mysql_result($re,$i,$j));
                       echo("<td>".$t[0]."/".$t[1]."/".$t[2]."</td>");
                   }
                   else if($j==7)
                   {
                       echo("<td><a href='".(1<=(int)mysql_result($re,$i,$j)?"specificRegister.php?id=".mysql_result($re,$i,8)."&specific=0'>Specific":"specificRegister.php?id=".mysql_result($re,$i,8)."&specific=1'>Normal")."</a></td>");
                   }
                   else
                   {
                   echo("<td>".mysql_result($re,$i,$j)."</td>");
                   }
               }
               $r++;
               echo("<td><a href='delRegister.php?id=".mysql_result($re,$i,8)."'>X</a></td>");
               echo("</tr>");
           }
           
           ?>
        </table> 
        <h3>غیر عضو</h3>
        <table border="1" style="border-collapse:collapse;width:700px;margin:0 auto;">
            <tr style='background-color:#5cf;'><th>ردیف</th><th>نام</th><th>ایمیل</th><th>حذف</th></tr>
            <?php
            $r=Q("select id,`name`,family,email FROM client ",__LINE__,__FILE__);
            $i=1;
            while ($row=  mysql_fetch_assoc($r))
            {
                echo "<tr><td>$i</td><td>".$row['name']." ".$row['family']."</td><td>".$row['email']."</td><td><a href='delRegister.php?id2=".$row['id']."'>X</a></td></tr>";
                $i++;
            }
            ?>
        </table>
    </div>
<?php
require_once './template/footer.php';
?>