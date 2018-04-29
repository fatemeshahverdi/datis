<?php
$title="Sigma Aldrich";
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Sigma Aldrich","سیگما آلدریچ");
/****private****/
/****end dic****/
/*if (isset($_POST['reg']))
{
    $haystack="chemical#".$_POST['SBy']."#";
    if (isset($_POST['Brand'])&& !in_array("All",$_POST['Brand']))
    {
            $haystack.=implode(" ", $_POST['Brand']);
    }
    else 
    {
        $haystack.=" SUPELCO ALDRICH SIGMA RIEDEL GENOSYS FLUKA SIGMA&nbsp;ALDRICH";
    }
    $haystack=base64_encode($haystack);
    header("location:./Search.php?haystack=".$haystack."&needle=".$_POST['needle']);
}*/
$style=".wrapper form p,.wrapper form fieldset{margin:20px 0;} fieldset{padding: 10px; max-width: 400px; }";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
require_once './document/sigma'.$lang[0];
if(file_exists('./document/Zsigma'.$lang[0]) && filesize('./document/Zsigma'.$lang[0])>0)
{
    require_once isset($_SESSION['id'])? './document/Zsigma'.$lang[0]:'./document/alert'.$lang[0];
}
/*
?>
<form method="post" style=" margin-top: 50px;" id="search">
    <p><label  for="needle">subject</label>&nbsp;&nbsp;&nbsp;<input name="needle" id="needle"></p>
    <ul style="list-style-type: none;padding:0;"><li><fieldset class="brandf" id="brandF"><legend>Brand</legend>
                <label for="All">All</label><input type="checkbox" name="Brand[]" id="All" value="All" checked="checked"> |
                <label for="SIAL">SIGMA ALDRICH</label><input type="checkbox" name="Brand[]" id="SIAL" value="SIGMA&nbsp;ALDRICH"> |
                <label for="FLUKA">FLUKA</label><input type="checkbox" name="Brand[]" id="FLUKA" value="FLUKA"> |
                <label for="GENOSYS">GENOSYS</label><input type="checkbox" name="Brand[]" id="GENOSYS" value="GENOSYS"> |
                <label for="RIEDEL">RIEDEL</label><input type="checkbox" name="Brand[]" id="RIEDEL" value="RIEDEL"> |
                <label for="SIGMA">SIGMA</label><input type="checkbox" name="Brand[]" id="SIGMA" value="SIGMA"> |
                <label for="ALDRICH">ALDRICH</label><input type="checkbox" name="Brand[]" id="ALDRICH" value="ALDRICH"> |
                <label for="SUPELCO">SUPELCO</label><input type="checkbox" name="Brand[]" id="SUPELCO" value="SUPELCO">
                <script>
                    var sea=document.getElementById('brandF').childNodes;
                    var all=document.getElementById('All');
                    for(var i=0;i<sea.length;i++)
                    {
                        if(sea[i].checked!=="undefined" && sea[i].id!="All")
                        {
                            sea[i].onchange=function ()
                            {
                                if(this.checked)
                                {
                                    all.checked=false;
                                }
                            };
                        }
                    }
                    all.onchange=function ()
                    {
                        if(this.checked)
                        {
                            with (this.parentNode)
                            {
                                for(var i=0;childNodes.length>i;i++)
                                {
                                    if(childNodes[i].checked!=="undefined" && childNodes[i].id!="All")
                                        childNodes[i].checked=false;
                                }
                            }
                        }
                    };
                </script>
            </fieldset></li>
        <li><fieldset><legend>Search By</legend>
                <label for="Name">Name</label><input type="radio" name="SBy" id="Name" value="Name" checked="checked">
                <label for="BPNo">BPNo</label><input type="radio" name="SBy" id="BPNo" value="BPNo">
                <label for="CasNo">CasNo</label><input type="radio" name="SBy" id="CasNo" value="CasNo">
                <label for="Formula">Formula</label><input type="radio" name="SBy" id="Formula" value="Formula">
            </fieldset></li></ul>
    <p><input type="submit" name="reg" value="Search in Sigma Aldrich Products"></p>
</form>
<?php
 */
echo '</div>';
require_once './template/footer.php';