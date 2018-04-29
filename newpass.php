<?php 
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "New Password","کلمه عبور جدید");
/****private****/
addInDic("Actived", "Your account Activate. ","حساب کاربری شما فعال شد. ");
addInDic("log in", "log in","ورود");
addInDic("Register", "Register","ثبت نام");
addInDic("Home", "Home","صفحه نخست");
addInDic("Go to", "Go to: ","بروید به: ");
addInDic("or", "or","یا");
addInDic("error", "Error<br>","خطا<br>");
addInDic("ER-PW", "Please enter Password","لطفا کلمه عبور را وارد کنید");
addInDic("ER-PW2", "Password is short than 6 letter","کلمه عبور کمتر از 6 حرف است");
addInDic("ER-PW3", "Password and repeat is not equal","کلمه عبور با تکرارش منطبق نیست");
addInDic("Change Password", "Change Password","تغییر کلمه عبور ");
addInDic("Repeat New Password", "Repeat New Password","تکرار کلمه عبور جدید ");
addInDic("New Password", "New Password","کلمه عبور جدید ");
addInDic("changed", "Password has been change successful. ","تغییر کلمه عبور با موفقیت انجام شد. ");
addInDic("check", "Registration complate. for active your account check your Email (inbox).","ثبت نام شما انجام شده است. جهت فعال شدن حساب کابریتان ، صندوق ورودی(inbox) ایمیل خود رابررسی کنید.");
/****end dic****/
$style="           .wrapper p{margin:20px 0;} .error{color:red;font-size:12px; position: absolute; padding: 8px;} .lbl{display:inline-block; width:150px; margin:5px 0;} .title{margin-bottom:50px;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
if(isset($_GET['Email']) && isset($_GET['Code']))
{
        require_once './lib/dbc.php';
        $r=Q("select password FROM register where email like '".$_GET['Email']."'");
    if($_GET['Code']==hash("md5",$_GET['Email'].mysql_result($r, 0,0)))
    {
        ?>
<form method="post" action="newpass.php">
    <input name="Email" type="hidden"  value="<?php echo $_GET['Email']; ?>">
    <input name="Code" type="hidden"  value="<?php echo $_GET['Code']; ?>">
    <p><label class="lbl" id="pass"><?php E("New Password");?></label><input name="pass" type="password" id="pass"></p>
    <p><label class="lbl" id="repass"><?php E("Repeat New Password");?></label><input name="repass" type="password" id="repass"></p>
    <p><input type="submit" value="<?php E("Change Password"); ?>"></p>
</form>
        <?php   
    }
    else
    {
        echo "<p>0".R("error")." ".R("Go to").'<a href="./logIn.php">'.R("log in")."</a> </p>";   
    }
}
else if(isset($_POST['Email']) && isset($_POST['Code']))
{
    require_once './lib/dbc.php';
        $r=Q("select password FROM register where email like '".$_POST['Email']."'",__LINE__,__FILE__);
    if($_POST['Code']==hash("md5",$_POST['Email'].mysql_result($r, 0,0)))
    {
        $er="";
        if($_POST['pass']=="")
        {
            $er=R("ER-PW");
        }
        else if(strlen($_POST['pass'])<6)
        {
            $er=R("ER-PW2");
        }
        else if($_POST['pass']!=$_POST['repass'])
        {
            $er=R("ER-PW3");
        }
        if($er!="")
        {
            ?>
<form method="post" action="newpass.php">
    <input name="Email" type="hidden"  value="<?php echo $_POST['Email']; ?>">
    <input name="Code" type="hidden"  value="<?php echo $_POST['Code']; ?>">
    <p><label class="lbl" id="pass"><?php E("New Password");?></label><input name="pass" type="password" id="pass"><span class="error"><?php echo $er; ?></span></p>
    <p><label class="lbl" id="repass"><?php E("Repeat New Password");?></label><input name="repass" type="password" id="repass"></p>
    <p><input type="submit" value="<?php E("Change Password"); ?>"></p>
</form>
        <?php
        }
        else
        {
            Q("update register set password='".$_POST['pass']."' WHERE email = '".$_POST['Email']."'");
            echo "<p>".R("changed")." ".R("Go to").'<a href="./logIn.php">'.R("log in")."</a> </p>"; 
        }
    }
    else
    {
        echo "<p>1".R("error")." ".R("Go to").'<a href="./logIn.php">'.R("log in")."</a> </p>";
    } 
}
else
{
    echo "<p>2".R("error")." ".R("Go to").'<a href="./logIn.php">'.R("log in")."</a> </p>";
}
echo '        </div>';
         require_once './template/footer.php';