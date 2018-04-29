<?php
$title="Merck";
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Merck","مرک");
addInDic("alert", "Merck","مرک");
/****private****/
/****end dic****/
/*if (isset($_POST['reg']))
{
    $haystack="chemical#".$_POST['SBy']."# MERCK";
    $haystack=base64_encode($haystack);
    header("location:./Search.php?haystack=".$haystack."&needle=".$_POST['needle']);
}*/
$style=".wrapper form p,.wrapper form fieldset{margin:20px 0;} fieldset{padding: 10px; max-width: 300px; }";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
require_once './document/merck'.$lang[0];
if(file_exists('./document/Zmerck'.$lang[0]) && filesize('./document/Zmerck'.$lang[0])>0)
{
    require_once isset($_SESSION['id'])? './document/Zmerck'.$lang[0]:'./document/alert'.$lang[0];
}
/*
?>
<form method="post" style=" margin-top: 50px;">
    <p><label  for="needle">subject</label>&nbsp;&nbsp;&nbsp;<input name="needle" id="needle"></p>
    <fieldset><legend>Search By</legend>
        <label for="Name">Name</label><input type="radio" name="SBy" id="Name" value="Name" checked="checked">
        <label for="BPNo">BPNo</label><input type="radio" name="SBy" id="BPNo" value="BPNo">
        <label for="CasNo">CasNo</label><input type="radio" name="SBy" id="CasNo" value="CasNo">
        <label for="Formula">Formula</label><input type="radio" name="SBy" id="Formula" value="Formula">
    </fieldset>
    <p><input type="submit" name="reg" value="Search in Merck Products"></p>
</form>
<?php
 */
echo '</div>';
require_once './template/footer.php';