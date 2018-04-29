<?php
$title="Merck";
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Order","سفارش");
addInDic("Name", "Name","نام");
addInDic("Family", "Family","نام خانوادگی");
addInDic("compeny", "Compeny","شرکت");
addInDic("Email", "Email","ایمیل");
addInDic("Telphone", "Telphone","تلفن");
addInDic("Order", "Order","درخواست");
addInDic("Register", "Register","ثبت");
addInDic(FALSE, "","");
addInDic("ER-NM", "Pliease Enter your name","لطفا نام خود را وارد کنید");
addInDic("ER-FM", "Pliease Enter your family","لطفا نام خانوادگی خود را وارد کنید");
addInDic("ER-CP", "Pliease Enter your compeny","لطفا نام شرکت خود را وارد کنید");
addInDic("ER-TL", "Pliease Enter your telephone","لطفا شماره تلفن خود را وارد کنید");
addInDic("ER-OR", "Pliease Enter your order","لطفا سفارش خود را وارد کنید");
addInDic("sent", "Your ord has been registerd.","سفارش شما ثبت شد.");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
addInDic("", "","");
/****private****/
/****end dic****/
$e=array("Name"=>"","Family"=>"","compeny"=>"","Email"=>"","Telphone"=>"","Order"=>"");
session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_SESSION['id']))
{
    require_once './lib/dbc.php';
    $r=Q("select `name`,email,`workP`,tel from register WHERE id=".$_SESSION['id'],__LINE__,__FILE__);
    $v['Name']=  explode(" ", mysql_result($r, 0,0) ) ;
    $v['Family']=$v['Name'][1];
    $v['Name']=$v['Name'][0];
    $v['Email']=   mysql_result($r, 0,1) ;
    $v['compeny']=   mysql_result($r, 0,2) ;
    $v['Telphone']=   mysql_result($r, 0,3) ;
    $v['Order']="";
}
else 
{
    $v=$e;
}
if(isset($_POST['Register']))
{
    require_once './lib/puLib.php';
    $er=0;
    $v=&$_POST;
    if($v['Name']=="")
    {
        $er++;
        $e['Name']=R("ER-NM");
    }
    if($v['Family']=="")
    {
        $er++;
        $e['Family']=R("ER-FM");
    }
    if($v['compeny']=="")
    {
        $er++;
        $e['compeny']=R("ER-CP");
    }
    if($e['Email']=R(checkMail($v['Email'])))
    {
        $er++;
    }
    if($v['Telphone']=="")
    {
        $er++;
        $e['Telphone']=R("ER-TL");
    }
    if($v['Order']=="")
    {
        $er++;
        $e['Order']=R("ER-OR");
    }
    if($er==0)
    {
        $body = "<h3>Datissanat.com :</h3>\r\nName: ".$v['Name']."\r\nFamily: ".$v['Family']."\r\ncompeny: ".$v['compeny']."\r\nEmail: ".$v['Email']."\r\nTelphone: ".$v['Telphone']."\r\nOrder: ".$v['Order'];
        $headers = 'From: Datis Sanat <order@datissanat.com>' . "\r\n" ;
        $headers .='Reply-To: order@datissanat.com' . "\r\n" ;
        $headers .='X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            mail("datissanat@gmail.com","NEW ORDER",$body , $headers);
    }
}
$style=".lbl{display: inline-block;width:100px; }.error{color:red;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
//require_once './document/gallery'.$lang[0];
//if(file_exists('./document/Zgallery'.$lang[0]) && filesize('./document/Zgallery'.$lang[0])>0)
//{
//    require_once isset($_SESSION['id'])? './document/Zgallery'.$lang[0]:'./document/alert'.$lang[0];
//}
 if( isset($er)&& $er==0)echo '<h3 class="error">'.R("sent").'</h3>'; ?>
<form method="post" style="line-height: 30px;">
    <p><label class="lbl" for="Name"><?php E("Name") ?></label><input id="Name" name="Name" value="<?php echo($v['Name']) ?>">
        <span class="error">*&nbsp;<?php echo($e['Name']) ?></span></p>
    <p><label class="lbl" for="Family"><?php E("Family") ?></label><input id="Family" name="Family" value="<?php echo($v['Family']) ?>">
        <span class="error">*&nbsp;<?php echo($e['Family']) ?></span></p>
    <p><label class="lbl" for="compeny"><?php E("compeny") ?></label><input id="compeny" name="compeny" value="<?php echo($v['compeny']) ?>">
        <span class="error">*&nbsp;<?php echo($e['compeny']) ?></span></p>
    <p><label class="lbl" for="Email"><?php E("Email") ?></label><input id="Email" name="Email" value="<?php echo($v['Email']) ?>">
        <span class="error">*&nbsp;<?php echo($e['Email']) ?></span></p>
    <p><label class="lbl" for="Telphone"><?php E("Telphone") ?></label><input id="Telphone" name="Telphone" value="<?php echo($v['Telphone']) ?>">
        <span class="error">*&nbsp;<?php echo($e['Telphone']) ?></span></p>
    <p><label class="lbl" for="Order"><?php E("Order") ?></label><textarea id="Order" name="Order" cols="50" rows="15"><?php echo($v['Order']) ?></textarea>
        <span class="error">*&nbsp;<?php echo($e['Order']) ?></span></p>
    <p><label class="lbl" for="Register"></label>&nbsp;<input id="Register" name="Register" type="submit" value="<?php E('Register') ?>"></p>
</form>
<?php
echo '</div>';
require_once './template/footer.php';