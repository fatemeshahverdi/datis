<?php 
$lvl=9;
require_once '../lib/security.php';
$e=$v=array("brand"=>"","fName"=>"","eName"=>"","pic"=>"","comment"=>"","size"=>"");
$msg="";
if(isset($_POST['reg']))
{
    function formValid(&$val,&$err)
    {
        
        return true;
    }
    $v=&$_POST;
    if(formValid($v,$e))
    {
        require_once '../lib/dbc.php';
        Q("insert into glass (brand,`fName`,`eName`,pic,comment,`size`)VALUES('".$v['brand']."','".$v['fName']."','".$v['eName']."','".htmlentities($v['pic'], ENT_QUOTES)."','".htmlentities($v['comment'], ENT_QUOTES) ."','".htmlentities($v['size'], ENT_QUOTES)."')",__LINE__,__FILE__);
        //header("location:./");
        $v=$e;
        $msg="ثبت باموفقیت انجام شد.";
    }
    else 
    {
        $msg="خطا";
    }
}
require_once './template/header.php';
?>
<a href="newGlass.php">شیشه جدید</a>
</div>
   <div>
        <p style="color: red; text-align: center;"><?php echo $msg; ?></p>
        <script>
            var linkID="fcnt";
        </script>
        <script id="fcntS" src="../lib/fileCenter/fcnt.js" type="text/javascript"></script>
        <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
        <form method="post">
            <table>
                <tr><td><label for="brand">برند</label></td><td><input name="brand" id="brand" value="<?php echo $v['brand'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="fName">نام فارسی</label></td><td><textarea class="ckeditor" name="fName" id="fName" ><?php echo $v['fName'] ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="eName">نام انگلیسی</label></td><td><textarea class="ckeditor" name="eName" id="eName"><?php echo $v['eName'] ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="pic">تصویر</label></td><td><textarea class="ckeditor" name="pic" id="pic"><?php echo $v['pic'] ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"><input type="button" id="fcnt" value="انتخاب تصویر"></span></td></tr>
                <tr><td><label for="comment">توضیحات</label></td><td><textarea class="ckeditor" name="comment" id="comment"><?php echo $v['comment'] ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="size">ظرفیت</label></td><td><textarea class="ckeditor" name="size" id="size"><?php echo $v['size'] ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
            </table>
            <input type="submit" value="ثبت" name="reg"><input type="reset" value="از نو">
              <script>
        var fName =CKEDITOR.replace( "fName", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var eName =CKEDITOR.replace( "eName",{toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var comment =CKEDITOR.replace( "comment", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var size =CKEDITOR.replace( "size", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var pic =CKEDITOR.replace( "pic", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
        </form>
<?php
require_once './template/footer.php';
?>
