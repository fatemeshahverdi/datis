<?php
$lvl=6;
require_once '../lib/security.php';
$ti="استخدام";
require_once './template/header.php';
require_once '../lib/dbc.php';
require_once '../lib/cal.php';
$re=Q("select `fName`,`lName`,birthDate,degree,cel,regTime,id from recruitment");
$row=mysql_num_rows($re);

?>
</div>
<div>
    <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;"><?php if(isset($_GET['status'])){if($_GET['status']==1){echo("درخواست با موفقیت حذف گردید");}} ?></p></div>
    <div style="direction:rtl;">
        <table border="1" style="border-collapse:collapse;width:700px;margin:0 auto;">
            <tr style='background-color:#5cf;'><th>ردیف</th><th>نام</th><th>نام خانوادگی</th><th>تاریخ تولد</th><th>مدرک تحصیلی</th><th>همراه</th><th>تاریخ درخواست</th><th>مشاهده</th><th>حذف</th></tr>
            <?php
            $r=1;
            $dr=array("زیر دیپلم","دیپلم","فوق دیپلم","لیسانس","","فوق لیسانس","دکتری");
            while ($row=  mysql_fetch_assoc($re))
            {
                $bd= jdate( $row['birthDate']);
                $rt=  jdate($row['regTime']);
                echo($r%2==0?'<tr class="even">':'<tr class="odd">');
                echo("<td>".$r++."</td><td>".$row['fName']."</td><td>".$row['lName'].
                        "</td><td>".$bd[0]."/".$bd[1]."/".$bd[2]."</td><td>".$dr[$row['degree']].
                        "</td><td>".$row['cel']."</td><td>".$rt[0]."/".$rt[1]."/".$rt[2].
                        "</td><td><a href='viewRecruitment.php?id=".$row['id']."'>مشاهده</a>"."</td>".
                        "<td><a href='delRecruitment.php?id=".$row['id']."'>X</a>"."</td></tr>");
            }
            ?>
        </table> 
    </div>
    
<?php
require_once './template/footer.php';
?>