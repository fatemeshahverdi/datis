<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Comments","پیشنهادات و انتقادات");
/****private****/
addInDic("Name", "Name","نام");
addInDic("Tel", "Tel","تلفن");
addInDic("Email", "Email","ایمیل");
addInDic("Message", "Message","پیام");
addInDic("Register", "Register","ثبت");
addInDic("Empety Name", "Please enter your name.","لطغا نام خود را وارد کنید");
addInDic("Empety MSG", "Please enter your message","لطفا پیام خود را وارد کنید");
addInDic("", "","");
/****end dic****/
$e=0;
$s=0;
$er=array("","","");
$v=array("name"=>"","tel"=>"","email"=>"","comment"=>"");
if(isset($_POST['reg']))
{
  $v=&$_POST;
  if($_POST['name']=="")
  {
      $er[1]=R("Empety Name");
      $e++;
  }
  if($_POST['comment']=="")
  {
     $er[2]=R("Empety MSG"); 
     $e++;
  }
  require_once './lib/puLib.php';
  if($err=checkMail($_POST['email']))
  {
     $er[0]=R($err); 
     $e++;
  }
  if($e==0)
    {
      require_once './lib/dbc.php';
      Q("insert into comment (name,tel,email,matn,`read`,time) values ('".$_POST["name"]."',".("0"+$_POST["tel"]).",'".$_POST["email"]."','".$_POST["comment"]."',1,".time().")",31);
      $s=1;
      header("location:comment.php?id=$s");
    }
}
$style="            .error{font-size:10px;color:red;}  .lbl{display:inline-block; width:150px; margin:10px 0;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
?>
        <div style="height:30px;width:500px;margin:0 auto;"><p style="text-align:center;"><?php if(isset($_GET['id'])){ if($_GET['id']==1){echo("پیام شما با موفقیت ثبت گردید");} } ?></p></div>
    <form method="post">
        <div style="direction:rtl;">
        <p><label class="lbl" for="name"><?php E("Name") ?></label><input type="text" id="name" name="name" value="<?php echo($v["name"]); ?>" ><label class="error">*<?php echo($er[1]); ?></label></p>
        <p><label class="lbl" for="tel"><?php E("Tel") ?></label><input type="text" id="tel" name="tel" value="<?php echo($v["tel"]); ?>"></p>
        <p><label class="lbl" for="email"><?php E("Email") ?></label><input type="text" id="email" name="email" value="<?php echo($v["email"]); ?>"><label class="error">*<?php echo($er[0]); ?></label></p>
        <p><label class="lbl" for="comment"><?php E("Message") ?></label><textarea style="width:300px;height:100px;" in="comment" name="comment"><?php echo($v["comment"]); ?></textarea><label class="error">*<?php echo($er[2]); ?></label></p>
        <p><label class="lbl" for="comment">&nbsp;</label><input type="submit" name="reg" id="reg" value="<?php E("Register") ?>"></p>
        </div>
    </form>
</div>
<?php        
         require_once './template/footer.php';