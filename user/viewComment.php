<?php
$lvl=5;
require_once '../lib/security.php';
$ti="مشاهده پیشنهاد و انتقاد";
require_once './template/header.php';
require_once '../lib/dbc.php';
$s=0;
Q("update comment set `read`=0 where id=".$_GET['id']."");
$re=Q("select name,tel,email,matn from comment where id=".$_GET['id']."");
if(isset($_POST['del']))
{
    Q("delete from comment where id=".$_GET['id']."");
    $s++;
    header("location:viewComments.php?status=$s");
}

?>
</div>
<div>
    <div style="direction:rtl;width: 700px;margin:0 auto;">
    <form method="post">
    <p><label>نام : </label><label style="width:500px;"><?php echo(mysql_result($re,0,0)); ?></label></p>  
    <p><label>تلفن : </label><label style="width:500px;"><?php echo(mysql_result($re,0,1)); ?></label></p>
    <p><label>ایمیل : </label><label style="width:500px;"><?php echo(mysql_result($re,0,2)); ?></label></p>
    <p><label>پیام : </label></p>
    <p><label style="width:500px;height:80px;border:1 solid black;display:inline-block;"><?php echo(mysql_result($re,0,3)); ?></label></p>
    <input type="submit" id="del" name="del" value="حذف پیام"> 
    </form>
    </div>
<?php
require_once './template/footer.php';
?>
