<?php
$lvl=6;
require_once '../lib/security.php';
$ti="استخدام";
require_once './template/header.php';
require_once '../lib/dbc.php';
require_once '../lib/cal.php';
if(isset($_POST['del']))
{
    unlink($_POST['file']);
    Q("delete from recruitment where id=".$_GET['id']." ");
    header("location:viewRecruitments.php?status=1");
}
$re=Q("select * from recruitment where id=".$_GET['id']."");
$re=  mysql_fetch_assoc($re);
$bd=  jdate($re['birthDate']);
$rt=  jdate($re['regTime']);
$dr=array("زیر دیپلم","دیپلم","فوق دیپلم","لیسانس","","فوق لیسانس","دکتری");
$military=array("دارای کارت پایان خدمت","معافیت کامل پزشکی","مشمول","غیر مشمول (ویژه بانوان)","سایر موارد");
$sex=array("مرد","زن");
$marriage=array("متأهل","مجرد");
$re['resume']=$re['resume']==""?"#":"../files/recruitment/".$re['resume'];
$s=<<<DATIS1111
</div>
<div>
    <div style="direction: rtl;">
        <p><label>تاریخ درخواست : </label><label>{$rt[0]}/{$rt[1]}/{$rt[2]}</label></p>
    <p><label>نام : </label><label>{$re['fName']}</label></p>
    <p><label>نام  خانوادگی: </label><label>{$re['lName']}</label></p>
    <p><label>تاریخ تولد : </label><label>{$bd[0]}/{$bd[1]}/{$bd[2]}</label></p>
    <p><label>جنسیت: </label><label>{$sex[$re['sex']]}</label></p>
    <p><label>وضعیت تاهل: </label><label>{$marriage[$re['marriage']]}</label></p>
    <p><label>وضعیت نظام وظیفه: </label><label>{$military[$re['military']]}</label></p>
    <p><label>مدرک تحصیلی: </label><label>{$dr[$re['degree']]}</label></p>
    <p><label>دانشگاه محل تحصیل: </label><label>{$re['universityPl']}</label></p>
    <p><label>رشته تحصیلی: </label>{$re['major']}<label></label></p>
    <p><label>ایمیل : </label>{$re['email']}<label></label></p>
    <p><label>تلفن : </label><label>{$re['tel']}</label></p>
    <p><label>همراه : </label><label>{$re['cel']}</label></p>
    <p><label>شهر محل سکونت : </label><label>{$re['city']}</label></p>
    <p><label>آدرس : </label><label>{$re['address']}</label></p>
    <p><label>رزومه : </label><a href='{$re['resume']}'>دانلود</a></p>
    <form method="post"><input type='hidden' name='file' value='../files/recruitment/{$re['resume']}'><input type="submit" id="del" name="del" value="حذف درخواست"></form>
    </div>
DATIS1111;
echo $s;
require_once './template/footer.php';
?>