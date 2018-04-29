<?php 
$lvl=9;
require_once '../lib/security.php';
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
        Q("update  glass set `brand`='".$v['brand']."',`fName`='".$v['fName']."',`eName`='".$v['eName']."',pic='".htmlentities($v['pic'])."',comment='".htmlentities($v['comment'], ENT_QUOTES) ."',`size`='".htmlentities($v['size'], ENT_QUOTES)."'where `gID`=".$_GET['gID'],__LINE__,__FILE__);
        header("location:Glass.php?".  urldecode($_GET['goto']));
    }
}
else if(isset($_GET['gID']))
{
    require_once '../lib/dbc.php';
    $r=Q("select * FROM glass WHERE `gID`=".$_GET['gID'],__LINE__,__FILE__);
    $v=  mysql_fetch_assoc($r);
}
else
{
    header("location:./");
}
$e=array("brand"=>"","fName"=>"","eName"=>"","pic"=>"","comment"=>"","size"=>"");

require_once './template/header.php';
?>
<a href="newGlass.php">شیشه جدید</a>
</div>
   <div>
        <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
        <script>
            var linkID="fcnt";
        </script>
        <script id="fcntS" src="../lib/fileCenter/fcnt.js" type="text/javascript"></script>
        <form method="post">
            <table>
                <tr><td><label for="brand">برند</label></td><td><input name="brand" id="brand" value="<?php echo $v['brand'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="fName">نام فارسی</label></td><td><input name="fName" id="fName" value="<?php echo $v['fName'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="eName">نام انگلیسی</label></td><td><input name="eName" id="eName" value="<?php echo $v['eName'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="pic">تصویر</label></td><td><textarea class="ckeditor" name="pic" id="pic"><?php echo html_entity_decode( $v['pic'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"><input type="button" id="fcnt" value="انتخاب تصویر"></span></td></tr>
                <tr><td><label for="comment">توضیحات</label></td><td><textarea class="ckeditor" name="comment" id="comment"><?php echo html_entity_decode($v['comment'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="size">ظرفیت</label></td><td><textarea class="ckeditor" name="size" id="size"><?php echo html_entity_decode($v['size'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
            </table>
            <input type="submit" value="ثبت" name="reg"><input type="reset" value="از نو">
              <script>
                  var pic =CKEDITOR.replace( "pic", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var size =CKEDITOR.replace( "size", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
        </form>
<?php
require_once './template/footer.php';
?>