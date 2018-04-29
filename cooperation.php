<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Cooperation","دعوت به همکاری");
/****private****/
addInDic("Please select", "Please select","انتخاب کنید");
addInDic("male", "male","مرد");
addInDic("female", "female","زن");
addInDic("single", "single","مجرد");
addInDic("married", "married","متأهل");
addInDic("Has enlisted the card", "Has enlisted the card","دارای کارت پایان خدمت");
addInDic("Full medical exemption", "Full medical exemption","معافیت کامل پزشکی");
addInDic("Subject", "Subject","مشمول");
addInDic("Ineligible (for women)", "Ineligible (for women)","غیر مشمول (ویژه بانوان)");
addInDic("Others", "Others","سایر موارد");
addInDic("Ph.D", "Ph.D","دکتری");
addInDic("Master degree", "Master degree","فوق لیسانس");
addInDic("Bachelor", "Bachelor","لیسانس");
addInDic("Associate", "Associate","فوق دیپلم");
addInDic("Diploma", "Diploma","دیپلم");
addInDic("Under Diploma", "Under Diploma","زیر دیپلم");
addInDic("First Name", "First Name","نام");
addInDic("Last Name", "Last Name","نام خانوادگی");
addInDic("Day", "Day","روز");
addInDic("Mounth", "Mounth","ماه");
addInDic("Year", "Year","سال");
addInDic("Sex", "Sex","جنسیت");
addInDic("Marriage", "Marriage","وضعیت تأهل");
addInDic("Military", "Military","خدمت سربازی");
addInDic("Education", "Last Education Degree","آخرین مدرک تحصیلی");
addInDic("University", "University","دانشگاه");
addInDic("Major", "Major","رشته");
addInDic("Email", "Email","ایمیل");
addInDic("Telephone", "Telephone","تلفن");
addInDic("Cellphone", "Cellphone","همراه");
addInDic("City", "City","شهر");
addInDic("Address", "Address","آدرس");
addInDic("Resume", "Resume","رزومه");
addInDic("Security Image", "Security Image","تصویر امنیتی");
addInDic("Register", "Register","ثبت");
addInDic("Birth Date", "Birth Date","زاد روز");
addInDic("ER-BD", "Please enter your date of birth","لطفا تاریخ تولد خود را صحیح وارد کنید");
addInDic("ER-FN", "Please enter your name","لطفا نام خود را وارد کنید");
addInDic("ER-LN", "Please enter your last name","لطفا نام خانوادگی خود را وارد کنید");
addInDic("ER-BD2", "Please enter your date of birth correctly","لطفا تاریخ تولد خود را به طور صحیح وارد کنید");
addInDic("ER-SX", "Please enter your gender","لطفا جنسیت خود را وارد کنید");
addInDic("ER-MR", "Please enter your marital status","لطفا وضعیت تأهل خود را وارد کنید");
addInDic("ER-ML", "Please enter the military","لطفا وضعیت نظام وظیفه خود را وارد کنید");
addInDic("ER-LD", "Please enter your last degree","لطفا آخرین مدرک تحصیلات خود را وارد کنید");
addInDic("ER-UN", "Please enter your university","لطفا دانشگاه خود را وارد کنید");
addInDic("ER-FS", "Please enter your field of study","لطفا رشته تحصیلی خود را وارد کنید");
addInDic("ER-CT", "Please enter your city","لطفا شهر خود را وارد کنید");
addInDic("ER-AD", "Please enter your address","لطفا نشانی محل سکونت خود را وارد کنید");
addInDic("ER-TL", "Please enter your phone number","لطفا شماره تلفن خود را وارد کنید");
addInDic("ER-TL2", "Please enter your phone number correctly","لطفا تلفن خود را به صورت صحیح وارد کنید");
addInDic("ER-MB", "Please enter your mobile number","لطفا شماره همراه خود را وارد کنید");
addInDic("ER-MB2", "Please enter your mobile number correctly","لطفا همراه خود را به صورت صحیح وارد کنید");
addInDic("ER-SI", "Please enter the security image","لطفا تصویر امنیتی را وارد کنید");
addInDic("ER-SI2", "security image is incorrect. Please enter carefully","تصویر امنیتی اشتباه است . لطفا با دقت وارد کنید");
addInDic("ER-FI", "File encountered an error, please try again","فایل ارسالی باخطا روبرو شده لطفا مجددا ارسال کنید");
addInDic("ER-FI2", "Because of the errors occurred in other fields, the file is not saved. Please try again","بدلیل خطاهای رخ داده شده در سایر فیلد ها، فایل ذخیره نشده. لطفا مجددا ارسال کنید");
addInDic("ER-FI3", "Uploaded file is large. Please try again","فایل ارسالی بزرگ میباشد لطفا مجددا ارسال کنید");
addInDic("", "","");
/****end dic****/
require_once './lib/dbc.php';
require_once './lib/cal.php';
require_once './lib/puLib.php';
$e=0;
$s=0;
$er=$v=array("fName"=>"","lName"=>"","day"=>"","mounth"=>"","year"=>"","sex"=>"","marriage"=>"","military"=>"","degree"=>"","universityPl"=>"","major"=>"","email"=>"","tel"=>"","cel"=>"","city"=>"","address"=>"","resume"=>"","kapcha"=>"");
if(isset($_POST['reg']))
{
    $v=&$_POST;
    
    $d=jtime($_POST['year'],$_POST['mounth'],$_POST['day']);
    $da=jdate($d);
    if($da[0]!=$_POST['year'] || $da[1]!=$_POST['mounth'] || $da[2]!=$_POST['day'])
    {
        $er['year']=R("ER-BD");
        $e++;
    }
    
    if($_POST['fName']=="")
    {
        $er['fName']=  R("ER-FN");
        $e++;
    }
    if($_POST['lName']=="")
    {
        $er['lName']=R("ER-LN");
        $e++;
    }
    if($_POST['day']==0 || $_POST['year']==0 || $_POST['mounth']==0)
    {
        $er['year']=R("ER-BD");
        $e++;
    }
    if($_POST['sex']=="-1")
    {
        $er['sex']=R("ER-SX");
        $e++;
    }
    if($_POST['marriage']=="-1")
    {
        $er['marriage']=R("ER-MR");
        $e++;
    }
    if($_POST['military']=="-1")
    {
        $er['military']=R("ER-ML");
        $e++;
    }
    if($_POST['degree']=="-1")
    {
        $er['degree']=R("ER-LD");
        $e++;
    }
    if($_POST['universityPl']=="")
    {
        $er['universityPl']=R("ER-UN");
        $e++;
    }
    if($_POST['major']=="")
    {
        $er['major']=R("ER-FS");
        $e++;
    }
    if($ert=checkMail($_POST['email']))
    {
        $er['email']=R($ert); 
        $e++;
    }
    if($_POST['city']=="")
    {
        $er['city']=R("ER-CT");
        $e++;
    }
    if($_POST['address']=="")
    {
        $er['address']=R("ER-AD");
        $e++;
    }
    if($_POST['tel']=="")
    {
        $er['tel']=R("ER-TL");
        $e++;
    }
   else if(!is_numeric($_POST['tel']) || strlen($_POST['tel'])<8)
    {
        $er['tel']=R("ER-TL2");
        $e++;
    }
    if($_POST['cel']=="")
    {
        $er['cel']=R("ER-MB");
        $e++;
    }
   else if(!is_numeric($_POST['cel'])  || strlen($_POST['cel'])<11)
    {
        $er['cel']=R("MB2");
        $e++;
    }
    if($_POST['kapcha']=="")
    {
        $er['kapcha']=R("ER-SI");
        $e++;
    }
    session_status()==PHP_SESSION_ACTIVE or session_start();
    if($_POST['kapcha']!=$_SESSION['kapcha'])
    {
        $er['kapcha']=R("ER-SI2");
        $e++;
    }
    if ($_FILES["resume"]["size"] <= 204800 && $_FILES["resume"]["size"]>0)
      {
      if (!($_FILES["resume"]["error"] == 0 || $_FILES["resume"]["error"] == 4)  )
        {
        $er['resume']=R("ER-FI");
        $e++;
        }
        else if($e>0)
        {
            $er['resume']=R("ER-FI2");
            $e++;
        }
      else
        {
           $fn=time()."_".$_POST['cel'].".". end(explode(".", $_FILES["resume"]["name"]));
          move_uploaded_file($_FILES["resume"]["tmp_name"], "files/recruitment/" . $fn   );
        }
      }
    else if($_FILES["resume"]["size"]> 204800)
      {
        $er['resume']=R("ER-FI3");
        $e++;
      }
  
    if($e==0)
    {
        
        Q("insert into recruitment (`fName`,`lName`,birthDate,sex,marriage,military,degree,`universityPl`,major,email,tel,cel,city,address,resume,regTime) values ('".$_POST["fName"]."','".$_POST["lName"]."',".$d.",".$_POST["sex"].",".$_POST["marriage"].",".$_POST["military"].",".$_POST["degree"].",'".$_POST["universityPl"]."','".$_POST["major"]."','".$_POST["email"]."',".$_POST["tel"].",".$_POST["cel"].",'".$_POST["city"]."','".$_POST["address"]."','".$fn."',".time().")",__LINE__,__FILE__);
        $s=1;
       header("location:cooperation.php?status=$s");
    }
}
$style="            .error{font-size:10px;color:red;}  .lbl{display:inline-block; width:150px; margin:10px 0;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
?>
        <div style="width:500;margin:0 auto;"><p style="text-align:center;"><?php if(isset($_GET['status'])){if($_GET['status']==1){echo("اطلاعات شما با موفقیت ثبت شد");}} ?></p></div>
        <div style="direction: rtl;">
            <form method="post" enctype="multipart/form-data">
                <p><label class="lbl" for="fName"><?php E("First Name") ?> </label> <input type="text" name="fName" id="fName" value="<?php echo($v['fName']);?>"><label class="error">*<?php echo($er['fName']); ?></label></p>
                <p><label class="lbl" for="lName"><?php E("Last Name") ?> </label> <input type="text" name="lName" id="lName" value="<?php echo($v['lName']);?>"><label class="error">*<?php echo($er['lName']); ?></label></p>
                <p><label class="lbl"><?php E("Birth Date") ?></label>
                    <select name="day" id="day">
                        <option value="0"><?php E("Day") ?></option>
                        <?php
                        for($i=1;$i<32;$i++)
                        {
                            echo("<option ".($v['day']==$i?'selected':"").">".$i."</option>");
                        }
                        ?>
                    </select>
                    <select name="mounth" id="mounth">
                        <option value="0"><?php E("Mounth") ?></option>
                        <option  <?php echo($v['mounth']==1?'selected':""); ?> value="1">فروردین</option>
                        <option  <?php echo($v['mounth']==2?'selected':""); ?> value="2">اردیبهشت</option>
                        <option  <?php echo($v['mounth']==3?'selected':""); ?> value="3">خرداد</option>
                        <option  <?php echo($v['mounth']==4?'selected':""); ?> value="4">تیر</option>
                        <option  <?php echo($v['mounth']==5?'selected':""); ?> value="5">مرداد</option>
                        <option  <?php echo($v['mounth']==6?'selected':""); ?> value="6">شهریور</option>
                        <option  <?php echo($v['mounth']==7?'selected':""); ?> value="7">مهر</option>
                        <option  <?php echo($v['mounth']==8?'selected':""); ?> value="8">آبان</option>
                        <option  <?php echo($v['mounth']==9?'selected':""); ?> value="9">آذر</option>
                        <option  <?php echo($v['mounth']==10?'selected':""); ?> value="10">دی</option>
                        <option  <?php echo($v['mounth']==11?'selected':""); ?> value="11">بهمن</option>
                        <option  <?php echo($v['mounth']==12?'selected':""); ?> value="12">اسفند</option>
                    </select>
                    <select name="year" id="year">
                        <option value="0"><?php E("Year") ?></option>
                        <?php
                        for($j=1342;$j<1385;$j++)
                        {
                          echo("<option ".($v['year']==$j?'selected':"").">".$j."</option>");  
                        }
                        ?>
                    </select><label class="error">*<?php echo($er['year']); ?></label>
                </p>
                <p><label class="lbl" for="sex"><?php E("Sex") ?></label><select name="sex" id="sex"><option value="-1" <?php echo($v['sex']=="" ||$v['sex']=="-1" ?'selected':"").">".R("Please select"); ?></option><option value="0" <?php echo($v['sex']=="0"?'selected':"").">".R("male"); ?></option><option value="1" <?php echo($v['sex']==1?'selected':"").">".R("female"); ?></option></select><label class="error">*<?php echo($er['sex']); ?></label></p>
                <p><label class="lbl" for="marriage"><?php E("Marriage") ?></label><select name="marriage" id="marriage"><option value="-1" <?php echo($v['marriage']=="" ||$v['marriage']=="-1" ?'selected':"").">".R("Please select"); ?></option><option value="0" <?php echo($v['marriage']=="0"?'selected':"").">".  R("married"); ?></option><option value="1" <?php echo($v['marriage']==1?'selected':"").">".  R("single"); ?></option></select><label class="error">*<?php echo($er['marriage']); ?></label></p>
                <p><label class="lbl" for="military"><?php E("Military") ?></label><select name="military" id="military"><option value="-1" <?php echo($v['military']=="" ||$v['military']=="-1" ?'selected':"").">".R("Please select"); ?></option><option value="0" <?php echo($v['military']=="0"?'selected':"").">".R("Has enlisted the card"); ?></option><option value="1" <?php echo($v['military']==1?'selected':"").">".R("Full medical exemption"); ?></option><option value="2" <?php echo($v['military']==2?'selected':"").">".R("Subject"); ?></option><option value="3" <?php echo($v['military']==3?'selected':"").">".R("Ineligible (for women)"); ?></option><option value="4" <?php echo($v['military']==4?'selected':"").">".R("Others"); ?></option></select><label class="error">*<?php echo($er['military']); ?></label></p>
                <p><label class="lbl" for="degree"><?php E("Education") ?></label><select name="degree" id="degree"><option value="-1" <?php echo($v['degree']=="" ||$v['degree']=="-1" ?'selected':"").">".R("Please select"); ?></option><option value="0" <?php echo($v['degree']=="0"?'selected':"").">".R("Under Diploma"); ?></option><option value="1" <?php echo($v['degree']==1?'selected':"").">".R("Diploma"); ?></option><option value="2" <?php echo($v['degree']==2?'selected':"").">".R("Associate"); ?></option><option value="3" <?php echo($v['degree']==3?'selected':"").">".R("Bachelor"); ?></option><option value="4" <?php echo($v['degree']==4?'selected':"").">".R("Master degree"); ?></option><option value="5" <?php echo($v['degree']==5?'selected':"").">".R("Ph.D"); ?></option></select><label class="error">*<?php echo($er['degree']); ?></label></p>
                <p><label class="lbl" for="universityPl"><?php E("University") ?></label><input type="text" name="universityPl" id="universityPl" value="<?php echo($v["universityPl"]); ?>"><label class="error">*<?php echo($er['universityPl']); ?></label></p>
                <p><label class="lbl" for="major"><?php E("Major") ?></label><input type="text" name="major" id="major" value="<?php echo($v["major"]); ?>"><label class="error">*<?php echo($er['major']); ?></label></p>
                <p><label class="lbl" for="email"><?php E("Email") ?></label><input type="text" name="email" id="email" value="<?php echo($v["email"]); ?>"><label class="error">*<?php echo($er['email']); ?></label></p>
                <p><label class="lbl" for="tel"><?php E("Telephone") ?></label><input type="text" name="tel" id="tel" value="<?php echo($v["tel"]); ?>"><label class="error">*<?php echo($er['tel']); ?></label></p>
                <p><label class="lbl" for="cel"><?php E("Cellphone") ?></label><input type="text" name="cel" id="cel" value="<?php echo($v["cel"]); ?>"><label class="error">*<?php echo($er['cel']); ?></label></p>
                <p><label class="lbl" for="city"><?php E("City") ?></label><input type="text" name="city" id="city" value="<?php echo($v["city"]); ?>"><label class="error">*<?php echo($er['city']); ?></label></p>
                <p><label class="lbl" for="address"><?php E("Address") ?></label><textarea name="address" id="address"><?php echo($v["address"]); ?></textarea><label class="error">*<?php echo($er['address']); ?></label></p>
                <p><label class="lbl"><?php E("Resume") ?></label><input type="file" id="resume" name="resume"><label class="error"><?php echo($er['resume']); ?></label></p>
                <p><label class="lbl">&nbsp;</label><img src="lib/kapcha.php?code=<?php echo rand(1000000, 9999999) ?>" style="border:3px dotted #000; margin: 10px 0 -10px;"></p>
                <p><label class="lbl"><?php E("Security Image") ?></label><input type="text" name="kapcha" id="kapcha"><label class="error">*<?php echo($er['kapcha']); ?></label></p>
                <p><label class="lbl">&nbsp;</label><input type="submit" name="reg" id="reg" value="<?php E("Register") ?>">
            </form>
        </div>
            </div>
                <?php
require_once './template/footer.php';