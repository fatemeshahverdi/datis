<?php
$lvl=8;
require_once '../user/../lib/security.php';
require_once './template/header.php';
$txt=$txtf="";     
if (isset($_POST["reg"]))
 {
     $b=fopen("../document/keyWordE","w");
     fwrite($b,$_POST["keyss"]);
     fclose($b);
     $txt=$_POST["keyss"];
     $b=fopen("../document/keyWordF","w");
     fwrite($b,$_POST["keyssF"]);
     fclose($b);
     $txtf=$_POST["keyssF"];
 }
 else
 {
     $a=fopen("../document/keyWordE","r");
    while(!feof($a))
    {
       $txt.=fread($a,1);
    }
    fclose($a);
     $a=fopen("../document/keyWordF","r");
    while(!feof($a))
    {
       $txtf.=fread($a,1);
    }
    fclose($a);
 }
?>
<a href="keyword.php">کلمات کلیدی</a> | <a href="./GaleryChangePics.php">تصاویر بنر</a>| <a href="./logo.php">logo</a>
</div>
<div>
        <div style="direction:rtl;">
            <form method="post">
            <p><label>کلمات کلیدی انگلیسی:</label></p>
            <p><textarea name="keyss" style="margin:0;padding:0;width:400px;height:100px;" ><?php echo($txt);?></textarea></p>
            <p><label>کلمات کلیدی  فارسی:</label></p>
            <p><textarea name="keyssF" style="margin:0;padding:0;width:400px;height:100px;" ><?php echo($txtf);?></textarea></p>
            <p><input type="submit" name="reg" value="ثبت"></p>
            </form>
        </div>
<?php
require_once './template/footer.php';
