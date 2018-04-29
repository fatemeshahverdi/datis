<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Register","ثبت نام");
/****private****/
addInDic("Register", "Register","ثبت");
addInDic("Cell phone", "Cell phone","همراه");
addInDic("Occupation Tel", "Occupation Tel","تلفن محل کار");
addInDic("Occupation Place", "Occupation Place","محل کار");
addInDic("Occupation", "Occupation","شغل");
addInDic("Email", "Email","ایمیل");
addInDic("Name", "Name","نام");
addInDic("Family", "Family","نام خانوادگی");
addInDic("Password", "Password","کلمه عبور");
addInDic("Repeat Password", "Repeat Password","تکرار کلمه عبور");
addInDic("ER-MB", "Please enter your mobile number correctly","لطفا تلفن همراه خود را صحیح وارد کنید");
addInDic("ER-MB2", "Please enter your mobile number","لطفا تلفن همراه خود را وارد کنید");
addInDic("ER-TL", "Please enter your telephone number correctly","لطفا تلفن خود را صحیح وارد کنید");
addInDic("ER-OP", "Please enter your Occupation Place","لطفا محل کار خود را وارد کنید");
addInDic("ER-OC", "Please enter your Occupation","لطفا شغل خود را وارد کنید");
addInDic("ER-PW", "Please enter Password","لطفا کلمه عبور را وارد کنید");
addInDic("ER-PW2", "Password is short than 6 letter","کلمه عبور کمتر از 6 حرف است");
addInDic("ER-PW3", "Password and repeat is not equal","کلمه عبور با تکرارش منطبق نیست");
addInDic("ER-DE", "Duplicate email","ایمیل تکراری است");
addInDic("ER-NA", "Please enter your name","لطفا نام خود را وارد کنید");
addInDic("ER-FA", "Please enter your family","لطفا نام خانوادگی خود را وارد کنید");
addInDic("", "","");
/****end dic****/
require_once './lib/cal.php';
require_once './lib/puLib.php';
$d=jtime(1356,12,31);
$da=jdate($d);
require_once './lib/dbc.php';
$v=array("name"=>"","family"=>"","pass"=>"","repass"=>"","email"=>"","work"=>"","workP"=>"","tel"=>"","mob"=>"");
$e=0;
$er=array("","","","","","","","");
$s=0;
if(isset($_POST['reg']))
{
    if($_POST['name']=="")
    {
        $er[0]=R("ER-NA");
        $e++;
    }
    if($_POST['family']=="")
    {
        $er[7]=R("ER-FA");
        $e++;
    }
    if($ert=checkMail($_POST['email'])) 
    {
        $er[1]=R($ert);
        $e++;
    }
    $re=Q("select id from register where email like '".$_POST['email']."'",__LINE__,__FILE__);
    
    if(mysql_num_rows($re)>=1) 
    {
        $er[1]=R("ER-DE");
        $e++;
    }
    /*if($_POST['work']=="")
    {
        $er[2]=R("ER-OC");
        $e++;
    }
    if($_POST['workP']=="")
    {
        $er[3]=R("ER-OP");
        $e++;
    }
    if($_POST['tel']=="")
    {
        $er[4]="لطفا تلفن محل کار خود را وارد کنید";
        $e++;
    }
    else */if($_POST['tel']!="" && (!is_numeric($_POST['tel']) || strlen ($_POST['tel'])<8 ) )
    {
        $er[4]=R("ER-TL");
        $e++;
    }
    if($_POST['pass']=="")
    {
        $er[6]=R("ER-PW");
        $e++;
    }
    else if(strlen ($_POST['pass'])<6)
    {
        $er[6]=R("ER-PW2");
        $e++;
    }
    else if($_POST['pass']!=$_POST['repass'])
    {
        $er[6]=R("ER-PW3");
        $e++;
    }
    if($_POST['mob']=="")
    {
        $er[5]=R("ER-MB2");
        $e++;
    }
     else if(!is_numeric($_POST['mob']) || strlen ($_POST['mob'])<11 )
    {
        $er[5]=R("ER-MB");
        $e++;
    }
    if($e==0)
    {
        Q("insert into register (`name`,email,work,workP,tel,mob,regTime,password) values ('".$_POST['name']."&nbsp;".$_POST['family']."','".$_POST['email']."','".$_POST['work']."','".$_POST['workP']."','".$_POST['tel']."','".$_POST['mob']."',".time().",'".$_POST['pass']."')");
        $body = "<h3>Datis Sanat Registraion :</h3>\r\n Your Username is : ".$_POST['email']."\r\n<br>To active your account click on <a href='http://datissanat.com/activation.php?Email=".$_POST['email']."&Code=".  hash("md5",base64_encode(strrev($_POST['email'])))."'>Active Registration</a>.";

    $headers = 'From: Datis Sanat <member@datissanat.com>' . "\r\n" ;
    $headers .='Reply-To: member@datissanat.com' . "\r\n" ;
    $headers .='X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
        mail($_POST['email'], "Datis Sanat Registraion", $body,$headers);
        $s++;
        header("location:activation.php?Email=".$_POST['email']);
        exit();
    }
    $v=&$_POST;
}
$style="            .error{font-size:10px;color:red;}  .lbl{display:inline-block; width:150px; margin:10px 0;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
?>
        <div style="direction:rtl;">
            <div>
            <form method="post"> 
                <p><label class="lbl" for="name"><?php E("Name") ?></label><input type="text" id="name" name="name" value="<?php echo($v['name']); ?>"><label class="error">*<?php echo($er[0]); ?></label></p>
                <p><label class="lbl" for="family"><?php E("Family") ?></label><input type="text" id="family" name="family" value="<?php echo($v['family']); ?>"><label class="error">*<?php echo($er[7]); ?></label></p>
                <p><label class="lbl" for="email"><?php E("Email") ?></label><input type="text" id="email" name="email" value="<?php echo($v['email']); ?>"><label class="error">*<?php echo($er[1]); ?></label></p>
                <p><label class="lbl" for="pass"><?php E("Password") ?></label><input type="password" id="pass" name="pass"><label class="error">*<?php echo($er[6]); ?></label></p>
                <p><label class="lbl" for="repass"><?php E("Repeat Password") ?></label><input type="password" id="repass" name="repass"><label class="error">*</label></p>
                <p><label class="lbl" for="work"><?php E("Occupation") ?></label><input type="text" id="work" name="work" value="<?php echo($v['work']); ?>"><label class="error"><?php echo($er[2]); ?></label></p>
                <p><label class="lbl" for="workP"><?php E("Occupation Place") ?></label><input type="text" id="workP" name="workP" value="<?php echo($v['workP']); ?>"><label class="error"><?php echo($er[3]); ?></label></p>
                <p><label class="lbl" for="tel"><?php E("Occupation Tel") ?></label><input type="text" id="tel" name="tel" value="<?php echo($v['tel']); ?>"><label class="error"><?php echo($er[4]); ?></label></p>
                <p><label class="lbl" for="mob"><?php E("Cell phone") ?></label><input type="text" id="mob" name="mob" value="<?php echo($v['mob']); ?>"><label class="error">*<?php echo($er[5]); ?></label></p>
                <p><label class="lbl">&nbsp;</label><input type="submit" value="<?php E("Register") ?>" id="reg" name="reg"></p>
                    
            </form>
            </div>
        </div>
</div>
<?php
require_once './template/footer.php';