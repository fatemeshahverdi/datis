<?php
$lvl=3;
require_once '../lib/security.php';
$ti="درج مقاله";
require_once '../lib/dbc.php';
$e=0;
$s=0;
$v=array("title"=>"","article"=>"","abstract"=>"","keys"=>"");
$er=array("","","");
if(isset($_POST['reg']))
{
    $v=$_POST;
    if($_POST['title']=="")
    {
        $e++;
        $er[0]="لطفا عنوان مقاله را وارد کنید";
    }
    if($_POST['article']=="")
    {
        $e++;
        $er[1]="لطفا مقاله را وارد کنید";
    }
    if($_POST['abstract']=="")
    {
        $e++;
        $er[2]="لطفا چکیده را وارد کنید";
    }
    if($e==0)
    {
        $_POST['status']=isset($_POST['status']);
        Q("insert into article (title,article,abstract,`keys`,time,status) values ('".$_POST["title"]."','".$_POST["article"]."','".$_POST["abstract"]."','".$_POST["keys"]."',".time().",'".$_POST['status']."')",29);
        $s=3;
        header("location:viewArticles.php?status1=$s");
    }
}
require_once './template/header.php';
?>
<div><a href="addArticle.php">درج مقاله جدید</a> | <a href="articleText.php">متن صفحه مقالات</a></div>
</div>
<div>
    <div style="direction:rtl">
<input type="button" id="gal" value="File Center">
<script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
    <form method="post">
        <p><label for="title">عنوان مقاله</label></p>
        <p><textarea style="width:700px;height:50px;" id="title" name="title"><?php echo($v["title"]); ?></textarea></p>
        <label class="error"><?php echo($er[0]); ?></label>
        <p><label for="article">مقاله</label></p>
        <p><textarea style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="article" name="article"><?php echo($v["article"]); ?></textarea></p>
        <label class="error"><?php echo($er[1]); ?></label>
        <p><label for="abstract">چکیده</label></p>
        <p><textarea style="max-width:700px;max-height:100px;min-width:700px;min-height:100px;" id="abstract" name="abstract"><?php echo($v["abstract"]); ?></textarea></p>
        <label class="error"><?php echo($er[2]); ?></label>
        <p><label for="keys">کلمات کلیدی</label></p>
        <p><textarea style="max-width:700px;max-height:150px;min-width:700px;min-height:40px;" id="keys" name="keys"><?php echo($v["keys"]); ?></textarea></p>
        <p><label for="status">مقاله رایگان</label>
        <input type="checkbox" id="status" name="status"></p>
        <br>
        <input type="submit" id="reg" name="reg" value="درج مقاله">
    </form> 
        <script src="../ckeditor/ckeditor.js"></script>
        <script>var title = CKEDITOR.replace( "title", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var article = CKEDITOR.replace( "article", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor','Iframe' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
    var abstract = CKEDITOR.replace( "abstract",  {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
    </div>
<?php
require_once './template/footer.php';
?>
