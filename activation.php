<?php 
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "activation","فعال سازى");
/****private****/
addInDic("Actived", "Your account Activate. ","حساب کاربری شما فعال شد. ");
addInDic("log in", "log in","ورود");
addInDic("Register", "Register","ثبت نام");
addInDic("Home", "Home","صفحه نخست");
addInDic("Go to", "Go to","بروید به");
addInDic("or", "or","یا");
addInDic("check", "Registration complate. for active your account check your Email (inbox/spam/junk) .","ثبت نام شما انجام شده است. جهت فعال شدن حساب کابریتان ، صندوق ورودی(inbox/spam/junk) ایمیل خود رابررسی کنید.");
/****end dic****/
$style="           .wrapper p{margin:20px 0;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
if(isset($_GET['Email']))
{
    if(isset($_GET['Code'])&&$_GET['Code']==hash("md5",base64_encode(strrev($_GET['Email']))))
    {
        require_once './lib/dbc.php';
        Q("update register SET active=1 where email like '".$_GET['Email']."'");
        ?>
        <p><?php E("Actived");E("Go to"); ?> :<a href="./logIn.php"><?php E("log in") ?></a> </p>
        </div>
        <?php   
    }
    else
    {
        ?>
        <p><?php E("check") /*?> :<a href="./register.php"><?php E("Register") */?></a> </p>
        </div>
        <?php   
    }
}
else
{
?>
<p><?php E("Go to") ?> :<a href="./logIn.php"><?php E("Home") ?></a> </p>
</div>
    <?php  
}
         require_once './template/footer.php';