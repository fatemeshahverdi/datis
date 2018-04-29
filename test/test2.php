<?php
        require_once '../lib/lang.php';
/****begin dic****/
/****public****/
/****private****/
addInDic("Start Chat", "Statr Chat","شروع گفتگو");
addInDic("Name", "Name","نام");
addInDic("Family", "Family","نام خانوادگی");
addInDic("Mail", "Mail","ایمیل");
addInDic("", "","");
$cv=array("cname"=>"","cfamily"=>"","cmail"=>"");
$cer="";
if(isset($_GET['start']))
{
    $cv=&$_GET;
    require_once '../lib/puLib.php';
    if($cer=checkMail($cv['cmail']))
    {
    }
    else 
    {
        require_once '../lib/dbc.php';
        session_status()==PHP_SESSION_ACTIVE or session_start();
        $_SESSION['chat']=$cv['cmail'];
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
            <p><?php E($cer)?></p>
            <input type="submit" value="<?php E("Start Chat")?>" name="start">
        </form>
    </body>
</html>
