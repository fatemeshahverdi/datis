<?php
$lvl=12;
require_once '../lib/security.php';
require_once '../lib/puLib.php';
$ti="پنل مدیریتی";
require_once 'template/header.php';
?>

</div>

<div dir="rtl">
       <?php
       if(!isset($_POST['step']))
       {
       ?>
    <form method="Post" enctype="multipart/form-data">
           <p><label for="from">فرستنده :</label><input id="from" name="from"></p>
           <p><label for="to">گیرنده(ها) :</label><textarea id="to" name="to"></textarea></p>
           <p><label for="file">گیرنده(ها) :</label><input id="file" name="file" type="file"></p>
           <p><input type="submit" name="step" value="بعدی"></p>
       </form>
       <?php
       }
       else if($_POST['step']=="بعدی")
       {
               $email=$list=array();
           if($_FILES['file']['error']!=4 && $_FILES['file']['error']==0)
           {
               move_uploaded_file($_FILES["file"]["tmp_name"], "temp");
               $file = implode("",file("temp"));
               $charList=file("../lib/characterList.csv");
               $file=mb_convert_encoding($file,"UTF-8",mb_detect_encoding($file, $charList[0], TRUE));
               $file=str_replace("\r\n", "\t", $file);
               $file=str_replace("\n", "\t", $file);
               $file=str_replace("\r", "\t", $file);
               $list=  explode("\t", $file);
               $file=str_replace("\t", ",", $file);
               $list=  array_merge($list, explode(",", $file));
               $file=str_replace("\t", ";", $file);
               $list=  array_merge($list, explode(";", $file));
                foreach ($list as $k => $v)
                {
                    if(!checkMail($v))
                    {
                        array_push($email, $v);
                    }
                }
                
           }
           $list=explode(";", $_POST['to']);
           foreach ($list as $k => $v)
            {
                if(!checkMail($v))
                {
                    array_push($email, $v);
                }
            }
                $email=array_unique($email);
                $t=implode(",", $email);
                $to="";
                for($i=0;$i<strlen($t);$i++)
                {
                    if(ord($t[$i])>32 && ord($t[$i])<127)
                        $to.=$t[$i];
                }
           ?>
<input type="button" id="gal" value="File Center">
<script>
    var linkID="gal";
</script>
<script id="fcntS" src="../lib/fileCenter/fcnt.js"></script>
    <form method="post" enctype="multipart/form-data">
           <p><b>فرستنده:</b><?php echo $_POST['from'];?><input type="hidden" name="from" value="<?php echo $_POST['from'];?>"></p>
           <p><b>گیرنده (ها):</b><?php echo $to;?><input type="hidden" name="to" value="<?php echo $to;?>"></p>
           <p><label for="sub">موضوع :</label><input id="sub" name="sub"></p>
           <script src="../ckeditor/ckeditor.js"></script>
           <p><label for="file">فایل ضمیمه :</label><input id="file" name="file" type="file"></p>
           <p><label for="msg">متن :</label><textarea id="msg" name="msg" id="msg" class="ckeditor"></textarea></p>
        <script>var msg = CKEDITOR.replace( "msg", {toolbar : [	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },	'/',	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },	'/',	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }]} );</script>
           <p><input type="submit" name="step" value="ارسال"></p>
       </form>
       <?php
       }
       else if($_POST['step']=="ارسال")
       {
           //$_POST['to']=  str_replace(chr(0), "", $_POST['to']);
//           $headers = 'From: Datis Sanat <'.$_POST['from'].'>' . "\r\n" ;
//            $headers .='Reply-To: '.$_POST['from']. "\r\n" ;
//            $headers .='X-Mailer: PHP/' . phpversion();
//            $headers .= "MIME-Version: 1.0\r\n";
//            $headers .= "Bcc:". $_POST['to']."\r\n";
//            $headers .= "Content-type: text/html; charset=utf-8\r\n";
//            mail("",$_POST['sub'],$_POST['msg'] , $headers);
                $hash = md5(uniqid(time()));
                $header = "From: Satis Sanat Abnous <".$_POST['from'].">\r\n";
                $header .= "Reply-To: ".$_POST['from']."\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .='X-Mailer: PHP/'. phpversion()."\r\n";
                $header .= "Content-Type: multipart/mixed; boundary=\"".$hash."\"\r\n\r\n";
                $header .= "This is a multi-part message in MIME format.\r\n";
                $header .= "--".$hash."\r\n";
                $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
                $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
                $header .= $_POST['msg']."\r\n\r\n";
                $header .= "--".$hash."\r\n";
               if($_FILES['file']['error']!=4 && $_FILES['file']['error']==0)
                {
                    $filename = basename($_FILES['file']['tmp_name']);
                    $file_size = filesize($_FILES['file']['tmp_name']);
                    $handle = fopen($_FILES['file']['tmp_name'], "r");
                    $content = fread($handle, $file_size);
                    fclose($handle);
                    $content = chunk_split(base64_encode($content));
                    $header .= "Content-Type: application/octet-stream; name=\"".$_FILES['file']['name']."\"\r\n"; 
                    $header .= "Content-Transfer-Encoding: base64\r\n";
                    $header .= "Content-Disposition: attachment; filename=\"".$_FILES['file']['name']."\"\r\n\r\n";
                    $header .= $content."\r\n\r\n";
                    $header .= "--".$hash."--";
                }
            if(mail($_POST['to'], $_POST['sub'], "", $header))
            {
            ?>
    <p style="color: red; text-align: center; font-size: 200%;">ارسال با موفقیت انجام شد.</p>
    <p><b>فرستنده:</b><?php echo $_POST['from'];?></p>
    <p><b>گیرنده (ها):</b><?php echo $_POST['to'];?></p>
    <p><b>موضوع:</b><?php echo $_POST['sub'];?></p>
    <p><b>متن:</b></p>
    <div><?php echo $_POST['msg'];?></div>
    <?php
            }
            else
            {
                echo '    <p style="color: red; text-align: center; font-size: 200%;">ارسال انجام نشد.</p>';
            }
       }
       else
       {
           
       }
  require_once './template/footer.php';
?>
