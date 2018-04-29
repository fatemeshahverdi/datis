<?php
$lvl=4;
require_once '../user/../lib/security.php';
require_once './template/header.php';
$s="";
if(isset($_POST['reg']))
{
    $a=fopen("../document/aboutUsF","w");
    $aE=fopen("../document/aboutUsE","w");
    fwrite($a,$_POST["aboutUs"]);
    fwrite($aE,$_POST["aboutUsE"]);
    fclose($a);
    fclose($aE);
    $s="درباره ما با موفقیت ثبت شد";
}
?>
<script id="myeditorS" src="../lib/ckeditor/ckeditor.js" type="text/javascript"></script>
<a href="aboutUs.php">درباره ما</a> | <a href="contactUs.php">تماس با ما</a> | <a href="gallery.php">گالری</a> |<a href="merck.php">مرک</a> | <a href="sigma.php">سیگما</a> | <a href="labware.php">شیشه آلات</a>
</div>
<div>
    <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;">
      <?php
      echo ($s);
      ?>
    </div>
        <?php
        $a=fopen("../document/aboutUsF","r");
        $aE=fopen("../document/aboutUsE","r");
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
            <script>
            var aboutUs = CKEDITOR.replace( "aboutUs", {
	allowedContent:  ['h1 h2 h3 blockquote b em ul ol li hr sub sup;' +
		'a[!href,target];' +
		'img[!src,alt,width,height];' +
		"table[border,cellpadding,cellspacing]; tr th td;" +
		'span{!font-family};' +
		'span{!color};' +
		'span(!marker);' +
		'del ins'],
        toolbar: [	
		[ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ], [ 'Bold', 'Italic', 'Strike','Pow','Sup', '-', 'RemoveFormat'  ] ,
                ['Link','Unlink','Anchor'],[ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ],['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ],
                ['Format']
	]
} );
            var aboutUsE = CKEDITOR.replace( "aboutUsE", {
	allowedContent:  ['h1 h2 h3 blockquote b em ul ol li hr sub sup;' +
		'a[!href,target];' +
		'img[!src,alt,width,height];' +
		"table[border,cellpadding,cellspacing]; tr th td;" +
		'span{!font-family};' +
		'span{!color};' +
		'span(!marker);' +
		'del ins'],
        toolbar: [	
		[ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ], [ 'Bold', 'Italic', 'Strike','Pow','Sup', '-', 'RemoveFormat'  ] ,
                ['Link','Unlink','Anchor'],[ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ],['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ],
                ['Format']
	]
} );
        </script>
       </div>
<?php
    require_once './template/footer.php';
?>