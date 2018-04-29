<?php
$ti="مدیریت اعضا";
$lvl=7;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
$ad="location:manageUsers.php";
require_once './template/header.php';

$re=Q("select name,userName,IP,passWord,level,id from users",8);
$row=mysql_num_rows($re);
?>  
<div><a href="addUser.php">افزودن کاربر جدید</a></div>
 </div>
                <div>
                    
                   <div style="direction:rtl;" >
                       <div style="text-align: center; color: red;"> 
                       <?php
                       if(isset($_GET['msg']))
                       {
                           if($_GET['msg']=="1")
                           {
                               echo 'کاربر جدید با موفقیت ثبت شد.';
                           }
                           elseif($_GET['msg']=="2")
                           {
                               echo 'حذف با موفقیت انجام شد.';
                           }
                           else
                           {
                               echo 'ویرایش با موفقیت انجام شد.';
                           }
                       }
                       ?>
                       </div>
        <table border="1" style="border-collapse:collapse;width:500px;margin:0 auto;">
            <tr style="background-color:#5cf;"><th>ردیف</th><th>نام</th><th>نام کاربری</th><th>IP</th><th>ویرایش</th><th>حذف</th></tr>
            <?php
            $r=1;
            for ($i=0;$i<$row;$i++)
            {
            echo($i%2==0?'<tr class="even">':'<tr class="odd">');
            echo("<td>".$r."</td>");
               for($j=0;$j<3;$j++)
                {
            
                  echo("<td>".mysql_result($re,$i,$j)."</td>");
            
                }
            
            echo("<td><a href='editUser.php?id=".  mysql_result($re, $i,5)."'>ویرایش</a></td>");
            echo("<td><a href='delUser.php?id=".  mysql_result($re, $i,5)."'>X</a></td></tr>");
            $r++;
        
            }
            ?>
        </table>
                    </div>
              
        
<?php
  require_once 'template/footer.php';
?>
