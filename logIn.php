<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Login","ورود");
/****private****/
addInDic("Forget Password", "Forget Password","فراموشی کلمه عبور");
addInDic("Login", "Login","ورود");
addInDic("Password", "Password","کلمه عبور");
addInDic("Username", "Username","نام کاربری");
addInDic("EP", "Please Enter Password","لطفا کلمه عبور را وارد کنید.");
addInDic("EU", "Please Enter Username","لطفا نام کاربری را وارد کنید.");
addInDic("IPU", "incorrect Username or Password","نام کاربری و یا کلمه عبور نادرست است.");
/****end dic****/
$v=array("userName"=>"");
$er=array("","","");
if(isset($_POST['reg']))
{
    $v['userName']=&$_POST['userName'];
    $e=0;
        if($_POST['userName']=="")
        {
            $er[0]=R("EU");
            $e++;
        }
        if($_POST['passWord']=="")
        {
            $er[1]=R("EP");
            $e++;
        }
    if($e==0)
    {
        
        require_once './lib/dbc.php';
        $_POST['userName']=  htmlentities($_POST['userName'],ENT_QUOTES);
        $_POST['passWord']=  htmlentities($_POST['passWord'],ENT_QUOTES);
        $re=Q("select id,`name`,`specific` from register where email='".$_POST['userName']."' and password='".$_POST['passWord']."' and active!=0");
        if(mysql_num_rows($re)!=1)
        {
        $er[2]=R("IPU");
        }
        else
        {
            session_status()==PHP_SESSION_ACTIVE or session_start();
            $_SESSION["id"]=mysql_result($re,0,0);
            $_SESSION["userName1"]= mysql_result($re, 0,1);
            $_SESSION['specific']=0<(int)mysql_result($re, 0,2);
            header("location:./");
            exit();
        }
    }
}
$style="           .wrapper p{margin:20px 0;} .error{color:red;font-size:12px; position: absolute; padding: 8px;} .lbl{display:inline-block; width:80px; margin:5px 0;} .title{margin-bottom:50px;}";
$title="Login";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
?>
        <div style="text-align:center;border-radius:5px;padding:35px 0px;">
            <p><label class="error" style="position: static;"><?php echo($er[2]); ?></label></p>
            <form method="post">
                <p><label class="lbl" for="userName"><?php E("Username") ?> </label><input type="text" id="userName" name="userName" value="<?php echo($v['userName']); ?>"><label class="error"><?php echo($er[0]); ?></label></p>
                <p><label class="lbl" for="password"><?php E("Password") ?> </label><input type="password" id="passWord" name="passWord"><label class="error"><?php echo($er[1]); ?></label></p>
                <p><label class="lbl"></label>&nbsp;<input type="submit" name="reg" value="      <?php E("Login") ?>      "></p>
                <p><a href="forgetpass.php">.:  <?php E("Forget Password") ?>  :.</a></p>
            </form>
        </div>
</div>
<?php
require_once './template/footer.php';