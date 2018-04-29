<?php
$lvl=4;
require_once '../user/../lib/security.php';
require_once './template/header.php';
$s="";
if(isset($_POST['reg']))
{
    $a=fopen("../document/sigmaF","w");
    $aE=fopen("../document/sigmaE","w");
    fwrite($a,$_POST["aboutUs"]);
    fwrite($aE,$_POST["aboutUsE"]);
    fclose($a);
    fclose($aE);
    $a=fopen("../document/ZsigmaF","w");
    $aE=fopen("../document/ZsigmaE","w");
    fwrite($a,$_POST["ZaboutUs"]);
    fwrite($aE,$_POST["ZaboutUsE"]);
    fclose($a);
    fclose($aE);
    $s="سیگما با موفقیت ثبت شد";
}
?>
<script id="myeditorS" src="../ckeditor/ckeditor.js" type="text/javascript"></script>
<a href="aboutUs.php">درباره ما</a> | <a href="contactUs.php">تماس با ما</a> | <a href="gallery.php">گالری</a> |<a href="merck.php">مرک</a> | <a href="sigma.php">سیگما</a> | <a href="labware.php">شیشه آلات</a>
</div>
<div>
    <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;">
      <?php
      echo ($s);
      ?>
    </div>
        <?php
        $a=fopen("../document/sigmaF","r");
        $aE=fopen("../document/sigmaE","r");
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
        
        $a=fopen("../document/ZsigmaF","r");
        $aE=fopen("../document/ZsigmaE","r");
        $Ztxt="";
        $ZtxtE="";
        while (!feof($a))
        {
            $Ztxt.=fread($a,1);
        }
         while (!feof($aE))
        {
            $ZtxtE.=fread($aE,1);
        }
        fclose($a);
        fclose($aE);
        ?>
        <div style="direction:rtl">
        <form method="post">
            
            <input type="button" id="gal" value="File Center" style="position: fixed;left: 100px;"><script>
                var linkID="gal";
            </script>
            <script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>

            <label for="aboutUs">فارسی</label>
            <br/>
            <textarea class="ckeditor" style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="aboutUs" name="aboutUs"><?php echo($txt);?></textarea>
            <br/>
            <label for="aboutUsE">انگلیسی</label>
            <br/>
            <textarea class="ckeditor" style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="aboutUsE" name="aboutUsE"><?php echo($txtE);?></textarea>
            <hr>
            <h3>ضمیمه</h3>
            <label for="ZaboutUs">فارسی</label>
            <br/>
            <textarea class="ckeditor" style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="ZaboutUs" name="ZaboutUs" ><?php echo($Ztxt);?></textarea>
            <br/>
            <label for="ZaboutUsE">انگلیسی</label>
            <br/>
            <textarea class="ckeditor" style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" id="ZaboutUsE" name="ZaboutUsE" ><?php echo($ZtxtE);?></textarea>
            <br/>
            <input type="submit" name="reg" id="reg" value="ثبت">
        </form>
            <script>
            var aboutUs = CKEDITOR.replace( "aboutUs", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
            var aboutUsE = CKEDITOR.replace( "aboutUsE", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
            var ZaboutUs = CKEDITOR.replace( "ZaboutUs", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
            var ZaboutUsE = CKEDITOR.replace( "ZaboutUsE", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
       </div>
<?php
    require_once './template/footer.php';
?>