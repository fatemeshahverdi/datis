<?php 
$lvl=10;
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
        Q("update  chempdt set `brand`='".$v['brand']."',`Name`='".htmlentities($v['Name'],ENT_QUOTES)."',`CasNo`='".$v['CasNo']."',`BPNo`='".$v['BPNo']."',`Formula`='".$v['Formula']."' where `cpID`=".$_GET['cpID'],__LINE__,__FILE__);
        Q("update  detail set `GPI`='".htmlentities($v['GPI'])."',`CPD`='".htmlentities($v['CPD'], ENT_QUOTES) ."',`Specification`='".htmlentities($v['Specification'], ENT_QUOTES)."',`Package`='"
                .htmlentities($v['Package'], ENT_QUOTES)."',`Toxicology`='".htmlentities($v['Toxicology'], ENT_QUOTES)."'where `cpID`=".$_GET['cpID'],__LINE__,__FILE__);
        header("location:Chem.php?".  urldecode($_GET['goto']));
    }
}
else if(isset($_GET['cpID']))
{
    require_once '../lib/dbc.php';
    $r=Q("select * FROM chempdt WHERE `cpID`=".$_GET['cpID'],__LINE__,__FILE__);
    $v=  mysql_fetch_assoc($r);
    $r=Q("select * FROM detail WHERE `cpID`=".$_GET['cpID'],__LINE__,__FILE__);
    $v=array_replace($v, mysql_fetch_assoc($r));
}
else
{
    header("location:./");
}
$e=array("brand"=>"","Name"=>"","CasNo"=>"","BPNo"=>"","Formula"=>"","GPI"=>"","CPD"=>"","Package"=>"","Specification"=>"","Toxicology"=>"");

require_once './template/header.php';
?>
<a href="newChem.php">ماده شیمیایی جدید</a>
</div>
   <div>
<input type="button" id="gal" value="File Center">
<script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
        <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
        <form method="post">
            <table>
                <tr><td><label for="brand">Brand</label></td><td><input name="brand" id="brand" value="<?php echo $v['brand'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="BPNo">BPNo</label></td><td><input name="BPNo" id="BPNo" value="<?php echo $v['BPNo'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="Name">Name</label></td><td><input name="Name" id="Name" value="<?php echo $v['Name'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="CasNo">CasNo</label></td><td><input name="CasNo" id="CasNo" value="<?php echo $v['CasNo'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="Formula">Formula</label></td><td><input name="Formula" id="Formula" value="<?php echo $v['Formula'] ?>"></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="GPI">General Product Information</label></td><td><textarea class="ckeditor" name="GPI" id="GPI"><?php echo html_entity_decode( $v['GPI'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="CPD">Chemical Physical Data</label></td><td><textarea class="ckeditor" name="CPD" id="CPD"><?php echo html_entity_decode($v['CPD'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="Package">Package</label></td><td><textarea class="ckeditor" name="Package" id="Package"><?php echo html_entity_decode($v['Package'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="Specification">Specification</label></td><td><textarea class="ckeditor" name="Specification" id="Specification"><?php echo html_entity_decode($v['Specification'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
                <tr><td><label for="Toxicology">Toxicology</label></td><td><textarea class="ckeditor" name="Toxicology" id="Toxicology"><?php echo html_entity_decode($v['Toxicology'], ENT_QUOTES) ?></textarea></td><td><span class="formCellComment"></span></td><td><span class="formCellError"></span></td></tr>
            </table>
            <input type="submit" value="ثبت" name="reg"><input type="reset" value="از نو">
              <script>
        var GPI =CKEDITOR.replace( "GPI", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var CPD =CKEDITOR.replace( "CPD", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var Package =CKEDITOR.replace( "Package",  {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var Specification =CKEDITOR.replace( "Specification", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var Toxicology =CKEDITOR.replace( "Toxicology",  {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
        </form>
<?php
require_once './template/footer.php';
?>