<?php
$lvl=7;
require_once '../lib/security.php';
if (!isset($_GET['id']) || $_GET['id']=="")
{
    header ("location:./manageUsers.php");
}
$e=0;
$er=array("","","","","","");
if(isset($_POST["reg"]))
  {
    $v=&$_POST;
    if($_POST["name"]=="")
    {
        $e++;
        $er[0]="لطفا نام را وارد کنید";
        
    }
    
    if($_POST["userName"]=="")
    {
      $e++; 
      $er[1]="لطفا نام کاربری را وارد کنید";
    }
    if($_POST["passWord"]=="")
    {
      $e++; 
      $er[2]="لطفا کلمه عبور را وارد کنید";
    }
    $re=  Q("select count(*) from `level` ",__LINE__,__FILE__);
    $n=(int)  mysql_result($re, 0,0);
    $lvl=1;
    for($i=0;$i<=$n;$i++)
    {
        if(isset($_POST['lvl'.$i]))
        {
            $lvl+=pow(2, (int)$_POST['lvl'.$i]);
        }
    }
    if($lvl==1)
    {
      $e++; 
      $er[3]="لطفا سطح دسترسی را وارد کنید";
    }
    if($_POST["IP"]=="")
    {
      $e++; 
      $er[4]="لطفا ای پی را وارد کنید";
    }
    if(strlen($_POST["passWord"])<6)
    {
      $e++;
      $er[2]="طول کلمه عبور حداقل شش کاراکتر باشد";
    }
    if($e==0)
    {
      $v['active']=  isset($v['active'])?1:0;
      $re=Q("update  users SET name='".$v["name"]."',userName='".$v["userName"]."',passWord='".$v["passWord"]."',level=$lvl,IP='".$v["IP"]."',active=".$v['active']." WHERE id=".$_GET['id'],__LINE__,__FILE__);
      header("location:manageUsers.php?msg=3");
    }
    
  }
  else 
  {
    $r=  Q("select * from users where id=".$_GET['id'],__LINE__,__FILE__);
    $v=  mysql_fetch_assoc($r);
    $v['level']=(int)$v['level'];
    for($i=0;pow(2,$i)<$v['level'];$i++)
    {
        if(pow(2,$i)&$v['level'])
        {
            $v['lvl'.$i]=$i;
        }
    }
  }
$ti="edit User";
$style=".celpad{padding-right: 40px; }";
require_once './template/header.php';
?><div><a href="addUser.php">افزودن کاربر جدید</a></div>
     </div>
     <div>
    
        <div style="width:700px;margin:0 auto;direction:rtl;">
            <form method="post">
                <table>
                   <tr>
                        <td><label for="name">نام</label></td>
                        <td><input name="name" id="name" value="<?php echo($v["name"])?>"></td>
                        <td class="celpad"><label for="userName">نام کاربری</label></td>
                        <td><input name="userName" id="userName" value="<?php echo($v["userName"])?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="1"><span class="error"><?php echo($er[0]);?></span></td>
                        <td class="celpad"></td>
                        <td><span class="error"><?php echo($er[1]);?></span></td>
                    </tr>
                    <tr>
                        <td><label for="passWord">کلمه عبور</label></td>
                        <td><input name="passWord" id="passWord" value="<?php echo($v["passWord"])?>"></td>
                        <td class="celpad"><label for="IP">IP</label></td>
                        <td><input name="IP" id="IP" value="<?php echo($v["IP"])?>"></td>
                    </tr>
                    <tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><span class="error"><?php echo($er[2]);?></td>
                        <td colspan="2"><span class="error"><?php echo($er[4]);?></span></td>
                    </tr>
                        <td colspan="4">
                            <fieldset><legend>سطح دسترسی</legend>
                            <?php
                            $re=Q("select * from `level`",__LINE__,__FILE__);
                            while ($row=mysql_fetch_assoc($re))
                            {
                                echo "<label for='lvl".$row['id']."'>".$row['text']."</label><input type='checkbox' id='lvl".
                                        $row['id']."' name='lvl".$row['id']."' value='".$row['id']."' ".(isset($v["lvl".$row['id']])?"checked='checked'":"")." ><br>";
                            }
                            ?>
                            </fieldset>
                        </td>
                    <tr>
                        <td></td> 
                        <td colspan="2"><span class="error"><?php echo($er[3]);?></span></td> 
                        <td class="celpad"></td> 
                        <td colspan="2"></span></td> 
                    </tr>
                     <tr>
                         <td><label>فعال</label></td> 
                         <td><input type="checkbox" name="active" <?php if (isset($v['active']) && $v['active']>0) {echo "checked='checked'";} ?> ></td> 
                        <td></td> 
                        <td></td> 
                    </tr>
                    <tr>
                        <td><input type="submit" id="reg" name="reg" value="ویرایش"></td>
                    </tr>
                </table>   
            </form>
        </div>
<?php
        require_once './template/footer.php';
?>
