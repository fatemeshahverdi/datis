<?php
$e=0;
$er="";
$v=array("userName"=>"");
if(isset($_POST["enter"]))
{
$v= &$_POST;
require_once '../lib/dbc.php';
$re=Q("select id,`level` from users where userName='".$_POST["userName"]."' and passWord='".$_POST["passWord"]."' and active!=0 and ( `IP`='*' or `IP`='".$_SERVER['REMOTE_ADDR']."')",__LINE__,__FILE__);

    if(mysql_num_rows($re)!=1)
    {
        $er="نام کاربری و یا کلمه عبور اشتباه است";
        $e++;
    }
    if($_POST["userName"]=="")
    {
        $er="نام کاربری را وارد کنید";
        $e++;
    }
    if($_POST["passWord"]=="")
    {
        $er="لطفا پسورد را وارد کنید";
        $e++;
    }
    
    if($e==0)
    {
        session_status()==PHP_SESSION_ACTIVE or session_start();
        $_SESSION["userName"]=$_POST["userName"];
        $_SESSION["idU"]=mysql_result($re,0,0);
        $_SESSION["level"]=mysql_result($re,0,1);
        $_SESSION["time"]=time();
        header("location:panel.php");
        exit(0);
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ورود</title>
    </head>
    <body>
        <div style="width:500px;margin:0 auto;direction:rtl;">
            <form method="post">
                <p><label for="userName">نام کاربری</label><input type="text" name="userName" id="userName" value="<?php echo($v["userName"]); ?>"></p> 
                <p><label for="passWord">کلمه عبور</label><input type="password" name="passWord" id="passWord"></p>
                <span>
                    <?php echo($er); ?>
                 </span>   
                <input type="submit" id="enter" name="enter">
            </form>
        </div>
    </body>
</html>
