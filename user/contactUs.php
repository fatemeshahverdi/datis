<?php
$lvl=4;
require_once '../lib/security.php';
require_once './template/header.php';
$s="";
if(isset($_POST['reg']))
{
$c=fopen("../document/contactUsF","w");
$ce=fopen("../document/contactUsE","w");
fwrite($c,$_POST["contactUs"]);
fwrite($ce,$_POST["contactUsE"]);
fclose($c);
fclose($ce);
$c=fopen("../document/footercontactF","w");
$ce=fopen("../document/footercontactE","w");
fwrite($c,$_POST["footercontact"]);
fwrite($ce,$_POST["footercontactE"]);
fclose($c);
fclose($ce);
$s="تماس با ما با موفقیت ثبت شد";
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
        $c=fopen("../document/contactUsF","r");
        $ce=fopen("../document/contactUsE","r");
        $txt="";
        $txtE="";
        while (!feof($c))
        {
            $txt.=fread($c,1);
        }
         while (!feof($ce))
        {
            $txtE.=fread($ce,1);
        }
        fclose($c);
        fclose($ce);
        ?>
        <div style="direction:rtl">
            <form method="post">
                <label for="aboutUs">فارسی</label>
                <textarea style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" name="contactUs" id="contactUs"><?php echo($txt); ?></textarea>
                <br/>
                <label for="aboutUs">انگلیسی</label>
                <br>
                <textarea style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" name="contactUsE" id="contactUsE"><?php echo($txtE); ?></textarea>
                <br>
        <?php
        $c=fopen("../document/footercontactF","r");
        $ce=fopen("../document/footercontactE","r");
        $txt="";
        $txtE="";
        while (!feof($c))
        {
            $txt.=fread($c,1);
        }
         while (!feof($ce))
        {
            $txtE.=fread($ce,1);
        }
        fclose($c);
        fclose($ce);
        ?>
                <label for="aboutUs">فارسی فوتر</label>
                <textarea style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" name="footercontact" id="footercontact"><?php echo($txt); ?></textarea>
                <br/>
                <label for="aboutUs">انگلیسی فوتر</label>
                <br>
                <textarea style="max-width:700px;max-height:200px;min-width:700px;min-height:200px;" name="footercontactE" id="footercontactE"><?php echo($txtE); ?></textarea>
                <br>
                <input type="submit" name="reg" value="ثبت">
            </form>
            <script>
            var contactUs = CKEDITOR.replace( "contactUs", {
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
            var contactUsE = CKEDITOR.replace( "contactUsE", {
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
            var footercontact = CKEDITOR.replace( "footercontact", {
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
            var footercontactE = CKEDITOR.replace( "footercontactE", {
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