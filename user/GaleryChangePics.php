<?php
$lvl=8;
require_once '../lib/security.php';
require_once './template/header.php';

if(isset($_POST['change']))
{
    $b=fopen("../document/picAddress","w");
    fwrite($b,$_POST['pic1']."\n");
    fwrite($b,$_POST['pic2']."\n");
    fwrite($b,$_POST['pic3']."\n");
    fwrite($b,$_POST['pic4']);
    fclose($b);
    
}
$a=file("../document/picAddress");
?>

<a href="keyword.php">کلمات کلیدی</a> | <a href="./GaleryChangePics.php">تصاویر بنر</a>| <a href="./logo.php">logo</a>
</div>
<div style="float:left;">
<input type="button" id="gal" value="File Center"><script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
</div>
<div>
    <form method="post">
<div style="float:right;direction:rtl;">
    <p><label class="lbl">عکس اول</label><input id='pic1' name='pic1' type="text" value="<?php echo ($a[0]);?>"></p>
    <p><label class="lbl">عکس دوم</label><input id='pic2' name='pic2' type="text" value="<?php echo ($a[1]);?>"></p>
    <p><label class="lbl">عکس سوم</label><input id='pic3' name='pic3' type="text" value="<?php echo ($a[2]);?>"></p>
    <p><label class="lbl">عکس چهارم</label><input id='pic4' name='pic4' type="text" value="<?php echo ($a[3]);?>"></p>
    <input name="change" id='change' type="submit" value="تغییر">
</div>
</form>
<?php
require_once './template/footer.php';
?>