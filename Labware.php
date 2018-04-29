<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Labware","شیشه آلات");
/****private****/
/****end dic****/
/*if (isset($_POST['reg']))
{
    $haystack="glass#";
    $haystack=base64_encode($haystack);
    header("location:./Search.php?haystack=".$haystack."&needle=".$_POST['needle']);
}*/
$style=".wrapper form p{margin:20px 0;} ";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
require_once './document/labware'.$lang[0];
if(file_exists('./document/Zlabware'.$lang[0]) && filesize('./document/Zlabware'.$lang[0])>0)
{
    require_once isset($_SESSION['id'])? './document/Zlabware'.$lang[0]:'./document/alert'.$lang[0];
}
/*
?>
<form method="post" style=" margin-top: 50px;">
    <p><label  for="needle">subject</label>&nbsp;&nbsp;&nbsp;<input name="needle" id="needle"></p>
    <p><input type="submit" name="reg" value="Search in Labware Products"></p>
</form>
<?php
 */
echo '</div>';
require_once './template/footer.php';