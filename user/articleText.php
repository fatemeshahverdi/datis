<?php
$lvl=3;
require_once '../user/../lib/security.php';
require_once './template/header.php';
$s="";
if(isset($_POST['reg']))
{
    $a=fopen("../document/articleF","w");
    $aE=fopen("../document/articleE","w");
    fwrite($a,$_POST["aboutUs"]);
    fwrite($aE,$_POST["aboutUsE"]);
    fclose($a);
    fclose($aE);
    $s="متن مقاله با موفقیت ثبت شد";
}
?>
<script id="myeditorS" src="../ckeditor/ckeditor.js" type="text/javascript"></script>
<div><a href="addArticle.php">درج مقاله جدید</a> | <a href="articleText.php">متن صفحه مقالات</a></div>
</div>
<div>
    <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;">
      <?php
      echo ($s);
      ?>
    </div>
        <?php
        $a=fopen("../document/articleF","r");
        $aE=fopen("../document/articleE","r");
        $txt="";
        $txtE="";
        while (!feof($a))
        {
            $txt.=fread($a,1);
        }
         while (!feof($aE))
        {
            $txtE.=fread($aE,1);
        }
        fclose($a);
        fclose($aE);
        ?>
        <div style="direction:rtl">
        <form method="post">
            <label for="aboutUs">فارسی</label>
            <br/>
            <textarea class="ckeditor" style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="aboutUs" name="aboutUs" id="aboutUs"><?php echo($txt);?></textarea>
            <br/>
            <label for="aboutUs">انگلیسی</label>
            <br/>
            <textarea class="ckeditor" style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="aboutUsE" name="aboutUsE" id="aboutUsE"><?php echo($txtE);?></textarea>
            <br/>
            <input type="submit" name="reg" id="reg" value="ثبت">
        </form>
        <script>var aboutUs = CKEDITOR.replace( "aboutUs", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var aboutUsE = CKEDITOR.replace( "aboutUsE", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
       </div>
<?php
    require_once './template/footer.php';
?>