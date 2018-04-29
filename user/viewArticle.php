<?php
$lvl=3;
require_once '../lib/security.php';
require_once './template/header.php';
$ti="مشاهده مقاله";
require_once '../lib/dbc.php';
$re=Q("select title,article,abstract,`keys` from article where id=".$_GET['newId1']."",6);
$v=array("title"=>mysql_result($re,0,0),"article"=>mysql_result($re,0,1),"abstract"=>mysql_result($re,0,2),"keys"=>mysql_result($re,0,3));
$er=array("","","");
$e=0;
$s=0;
if(isset($_POST['delete']))
{
    
   Q("delete from article where id=".$_GET['newId1']."");
    $s=2;
    header("location:viewArticles.php?status1=$s");
}
if(isset($_POST['update']))
{
    Q("update article set title='".$_POST['title']."',article='".$_POST['article']."',abstract='".$_POST['abstract']."',`keys`='".$_POST['keys']."' where id=".$_GET['newId1']."");
    $s=1;
    header("location:viewArticles.php?status1=$s");
}
?>
<script id="myeditorS" src="../ckeditor/ckeditor.js" type="text/javascript"></script>
<div><a href="addArticle.php">درج مقاله جدید</a> | <a href="articleText.php">متن صفحه مقالات</a></div>
  </div>
  <div>
<input type="button" id="gal" value="File Center">
<script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
      <div>
          <form method="post">
              <p class="d"><label>عنوان مقاله</label></p>
              <p class="d"><textarea style="width:700px;height:50px;" type="text" name="title" id="title"><?php echo($v["title"]);?></textarea></p>
              <p style="direction:rtl;margin:0;"><label class="error"><?php echo($er[0]); ?></label></p>
              <p class="d"><label>مقاله</label></p>
              <p class="d"><textarea style="width:700px;height:50px;" type="text" name="article" id="article"><?php echo($v["article"]);?></textarea></p>
              <p style="direction:rtl;margin:0;"><label class="error"><?php echo($er[1]); ?></label></p>
              <p class="d"><label>چکیده</label></p>
              <p class="d"><textarea style="width:700px;height:50px;" type="text" name="abstract" id="abstract"><?php echo($v["title"]);?></textarea></p>
              <p style="direction:rtl;margin:0;"><label class="error"><?php echo($er[2]); ?></label></p>
              <p class="d"><label>کلمات کلیدی</label></p>
              <p class="d"><textarea style="max-width:700px;max-height:40px;min-width:700px;min-height:40px;" id="keys" name="keys"><?php echo($v["keys"]); ?></textarea></p>
              <p class="d"><input type="submit" id="update" name="update" value="ویرایش مقاله"></p>
              <p class="d"><input type="submit" id="delete" name="delete" value="حذف مقاله"></p>
          </form> 
        <script>var title = CKEDITOR.replace( "title", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        var article = CKEDITOR.replace( "article", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor','Iframe' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
    var abstract = CKEDITOR.replace( "abstract",  {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );
        </script>
      </div>
<?php
require_once './template/footer.php';
?>