<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Forget Password","فراموشی کلمه عبور");
/****private****/
addInDic("Please Enter Email", "Please Enter Email","لطفا ایمیل را وارد کنید");
addInDic("incorrect Email", "incorrect Email","ایمیل اشتباه است");
addInDic("send", "Email validate sent. Check your inbox or spam(junk).<a href='logIn.php'>Login</a>","تأییدیه ارسال شد. صندوق ورودی (inbox) و صندوق هرزه نامه ها(spam/junk) را بررسی کنید.<a href='logIn.php'>ورود</a>");
addInDic("send password", "send password","ارسال کلمه عبور");
addInDic("Email", "Email","ایمیل");
/****end dic****/
$v=array("userName"=>"");
$er=array("","","");
    $e=0;
if(isset($_POST['reg']))
{
    $v['userName']=&$_POST['userName'];    
        if($_POST['userName']=="")
        {
            $er[0]=R("Please Enter Email");
            $e++;
        }
    if($e==0)
    {    
        require_once './lib/dbc.php';
        $_POST['userName']=  htmlentities($_POST['userName'],ENT_QUOTES);
        $re=Q("select password from register where email like '".$_POST['userName']."' ");
        if(mysql_num_rows($re)!=1)
        {
        $er[2]=R("incorrect Email");
        }
        else
        {
        $body = "<h3>Datissanat.com :</h3>\r\n For set new Password click: <a href='http://datissanat.com/newpass.php?Email=".$_POST['userName']."&Code=".hash("md5", $_POST['userName'].mysql_result($re, 0,0))."'>NEW PASSWORD</a>";

    $headers = 'From: Datis Sanat <member@datissanat.com>' . "\r\n" ;
    $headers .='Reply-To: member@datissanat.com' . "\r\n" ;
    $headers .='X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            mail($_POST['userName'],"Forget Password ",$body , $headers);
            $er[2]=R("send");
            $e=1000;
        }
    }
}
$style="           .wrapper p{margin:20px 0;} .error{color:red;font-size:12px; position: absolute; padding: 8px;} .lbl{display:inline-block; width:80px; margin:5px 0;} .title{margin-bottom:50px;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
?>
        <div style="text-align:center;border-radius:5px;padding:35px 0px;">
            <p><label class="error" style="position: static;"><?php echo($er[2]); ?></label></p>
            <form method="post" style="<?php echo $e==1000?'visibility: hidden;':'' ?> ">
                <p><label class="lbl" for="userName"><?php E("Email") ?> </label><input type="text" id="userName" name="userName" value="<?php echo($v['userName']); ?>"><label class="error"><?php echo($er[0]); ?></label></p>
                <p><label class="lbl"></label>&nbsp;<input type="submit" name="reg" value="      <?php E("send password") ?>      "></p>
            </form>
        </div>
</div>
<?php
require_once './template/footer.php';