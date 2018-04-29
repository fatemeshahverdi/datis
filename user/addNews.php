<?php  
$lvl=2;
require_once '../lib/security.php';
$ti="درج خبر";
require_once './template/header.php';
require_once '../lib/dbc.php';
$e=0;
$s=0;
$v=array("title"=>"","news"=>"","keys"=>"");
$er=array("","","");
if(isset($_POST["reg"]))
{
    $v=&$_POST;
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
        Q("insert into news (title,news,`keys`,time) values ('".$_POST["title"]."','".$_POST["news"]."','".$_POST["keys"]."',".time().")",__LINE__,__FILE__);
        $s=3;
        header("location:viewNews.php?status=$s");
    }
}
?>
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
       <p class="d"><textarea class="ckeditor" style="width:700px;height:50px;" type="text" name="title" id="title"><?php echo($v["title"]); ?></textarea></p>
       <label class="error"><?php echo($er[0]); ?></label>
       <p class="d"><label>مشروح خبر</label></p>
       <p class="d"><textarea class="ckeditor"  style="max-width:700px;max-height:150px;min-width:700px;min-height:40px;" id="news" name="news"><?php echo($v["news"]); ?></textarea></p>
       <label class="error"><?php echo($er[1]); ?></label>
       <p class="d"><label>کلمات کلیدی</label></p> 
       <p class="d"><textarea style="max-width:700px;max-height:40px;min-width:700px;min-height:40px;" id="keys" name="keys"><?php echo($v["keys"]); ?></textarea></p>
       
       <p class="d"><input type="submit" id="reg" name="reg" value="ثبت خبر"></p>
       </form>
        <script src="../ckeditor/ckeditor.js"></script>
        <script>var title = CKEDITOR.replace( "title", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var news = CKEDITOR.replace( "news", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
<?php
require_once './template/footer.php';
?>