<?php
        require_once './lib/lang.php';
/****begin dic****/
/****public****/
/****private****/
addInDic("Start Chat", "Statr Chat","شروع گفتگو");
addInDic("Name", "Name","نام");
addInDic("Family", "Family","نام خانوادگی");
addInDic("Mail", "Mail","ایمیل");
addInDic("ER-NM", "Please enter your name. ","لطفا نام خود را وارد کنید. ");
addInDic("ER-FM", "Please enter your family. ","لطفا نام خانوادگی خود را وارد کنید. ");
addInDic("", "","");
$cv=array("cname"=>"","cfamily"=>"","cmail"=>"");
$cer="";
if(isset($_GET['start']))
{
    $cv=&$_GET;
    if($cv['cname']=="")
    {
        $cer=R("ER-NM");
    }
    if($cv['cfamily']=="")
    {
        $cer.=R("ER-FM");
    }
    require_once './lib/puLib.php';
    if($cer.=R(checkMail($cv['cmail'])))
    {
    }
    else 
    {
        require_once './lib/dbc.php';
        session_status()==PHP_SESSION_ACTIVE or session_start();
        $_SESSION['chat']=$cv['cmail'];
        $_SESSION['userName1']=$cv['cname']." ".$cv['cfamily'];
        Q("insert INTO client (`name`,family,email,`time`) VALUES('".$cv['cname']."','".$cv['cfamily']."','".$cv['cmail']."',".time().")", __LINE__,__FILE__);
        echo '<script>window.opener.location.reload(true); window.close();</script>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php E("Start Chat")?></title>
    </head>
    <body>
        <form>
            <p><label class="lbl2" for="cname"><?php E("Name")?></label><input id="cname" name="cname" value="<?php echo $cv['cname'];?>"></p>
            <p><label class="lbl2" for="cfamily"><?php E("Family")?></label><input id="cfamily" name="cfamily" value="<?php echo $cv['cfamily'];?>"></p>
            <p><label class="lbl2" for="cmail"><?php E("Mail")?></label><input id="cmail" name="cmail" value="<?php echo $cv['cmail'];?>"></p>
            <p><?php echo($cer)?></p>
            <input type="submit" value="<?php E("Start Chat")?>" name="start">
        </form>
    </body>
</html>
