<?php
$lvl=8;
require_once '../lib/security.php';
require_once './template/header.php';

if(isset($_POST['change']))
{
    $b=fopen("../document/logo","w");
    fwrite($b,$_POST['pic1']."\n");
    fclose($b);
    
}
$a=file("../document/logo");
?>

<a href="keyword.php">کلمات کلیدی</a> | <a href="./GaleryChangePics.php">تصاویر بنر</a>| <a href="./logo.php">logo</a>
</div>
<div style="float:left;">
<input type="button" id="gal" value="File Center">
</div>
<script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
<div>
    <form method="post">
<div style="float:right;direction:rtl;">
    <p><label class="lbl">logo</label><input id='pic1' name='pic1' type="text" value="<?php echo ($a[0]);?>"></p>
    <input name="change" id='change' type="submit" value="تغییر">
</div>
</form>
<?php
require_once './template/footer.php';
?>