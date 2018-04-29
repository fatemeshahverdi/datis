<?php 
$lvl=2;
require_once '../lib/security.php';
$ti="خبر";
require_once './template/header.php';
require_once '../lib/dbc.php';
$er=array("","");
$e=0;
$s=0;
$re=Q("select title,news,`keys` from news where id=".$_GET['newsId']."",8);
$v=array("title"=>mysql_result($re,0,0),"news"=>mysql_result($re,0,1),"keys"=>mysql_result($re,0,2));
if(isset($_POST["update"]))
{
    if($_POST["title"]=="")
    {
        $e++;
        $er[0]="لطفا عنوان خبر را وارد کنید";
    }
    if($_POST["news"]=="")
    {
        $e++;
        $er[1]="لطفا خبر را وارد کنید";
    }
    if($e==0)
    {
        Q("update news set title='".$_POST["title"]."' ,news='".$_POST["news"]."' ,`keys`='".$_POST["keys"]."' where id=".$_GET["newsId"]."",25);
        $s=1;
        header("location:viewNews.php?status=$s");
    }
}
if(isset($_POST["delete"]))
{
    $re=Q("delete from news where id=".$_GET['newsId']."",32);
    $s=2;
    header("location:viewNews.php?status=$s");
}
?>
<script id="myeditorS" src="../ckeditor/ckeditor.js" type="text/javascript"></script>
<div><a href="addNews.php">افزودن خبر جدید</a></div>
</div>
   <div>
<input type="button" id="gal" value="File Center">
<script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
       <form method="post">
       <p class="d"><label>عنوان خبر</label></p>
       <p class="d"><textarea style="width:700px;height:50px;" type="text" name="title" id="title"><?php echo($v["title"]); ?></textarea></p>
       <p style="direction:rtl;margin:0;"><label class="error"><?php echo($er[0]); ?></label></p>
       <p class="d"><label>مشروح خبر</label></p>
       <p class="d"><textarea style="max-width:700px;max-height:150px;min-width:700px;min-height:40px;" id="news" name="news"><?php echo($v["news"]); ?></textarea></p>
       <p  style="direction:rtl;margin:0;"><label class="error"><?php echo($er[1]); ?></label></p>
       <p class="d"><label>کلمات کلیدی</label></p> 
       <p class="d"><textarea style="max-width:700px;max-height:40px;min-width:700px;min-height:40px;" id="keys" name="keys"><?php echo($v["keys"]); ?></textarea></p>
       
       <p class="d"><input type="submit" id="update" name="update" value="ویرایش خبر" ></p>
       <p class="d"><input type="submit" id="delete" name="delete" value="حذف خبر"></p>
       </form>
        <script>var title = CKEDITOR.replace( "title", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var news = CKEDITOR.replace( "news", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
<?php
require_once './template/footer.php';
?>