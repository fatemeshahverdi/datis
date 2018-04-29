<?php
if (isset($_POST['reg']))
{
    $haystack=$_POST['type']."#".$_POST['SBy']."#";
    if (isset($_POST['Brand'])&& !in_array("All",$_POST['Brand']))
    {
            $haystack.=implode(" ", $_POST['Brand']);
    }
    else 
    {
        $haystack.="All";
    }
    $haystack=base64_encode($haystack);
    header("location:./Search.php?haystack=".$haystack."&needle=".$_POST['needle']);
}
$style="            form p,form li{margin:15px 0;} fieldset{width:200px;line-height: 30px;} ";
$title="Advance Search";
require_once './template/header.php';
?>
<div class="title">Advance Search</div>
        <form method="post">
            <p><p><label for="needle">subject</label>&nbsp;&nbsp;&nbsp;<input name="needle" id="needle"></p>
            <ul style="clear: both;">
                <li><p><label for="chemical" >Chemical</label><input type="radio" name="type" id="chemical" value="chemical" checked="checked">
                    <ul style="list-style: none;">
                        <li>
                            <fieldset class="brandf"  id="brandF" style="float: left; margin:0 30px 25px 0; " ><legend>Brand</legend>
                                <label for="All">All</label><input type="checkbox" name="Brand[]" id="All" value="All" checked="checked"> <br>
                                <label for="MERCK">MERCK</label><input type="checkbox" name="Brand[]" id="MERCK" value="MERCK"> <br>
                                <label for="SIAL">SIGMA ALDRICH</label><input type="checkbox" name="Brand[]" id="SIAL" value="SIGMA ALDRICH"> <br>
                                <label for="FLUKA">FLUKA</label><input type="checkbox" name="Brand[]" id="FLUKA" value="FLUKA"> </br>
                                <label for="GENOSYS">GENOSYS</label><input type="checkbox" name="Brand[]" id="GENOSYS" value="GENOSYS"> <br>
                                <label for="RIEDEL">RIEDEL</label><input type="checkbox" name="Brand[]" id="RIEDEL" value="RIEDEL"> <br>
                                <label for="SIGMA">SIGMA</label><input type="checkbox" name="Brand[]" id="SIGMA" value="SIGMA"> <br>
                                <label for="ALDRICH">ALDRICH</label><input type="checkbox" name="Brand[]" id="ALDRICH" value="ALDRICH"> <br>
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
                                <label for="Name">Name</label><input type="radio" name="SBy" id="Name" value="Name" checked="checked"><br>
                                <label for="BPNo">ProductNo</label><input type="radio" name="SBy" id="BPNo" value="BPNo"><br>
                                <label for="CasNo">CasNo</label><input type="radio" name="SBy" id="CasNo" value="CasNo"><br>
                                <label for="Formula">Formula</label><input type="radio" name="SBy" id="Formula" value="Formula">
                            </fieldset></li></ul></li>
                <li style="clear: both;"><p><label for="labware" >Labware</label><input type="radio" name="type" id="labware" value="labware"></li>
            </ul>
            <p><input type="submit" name="reg" value="Advance Search"></p>
        </form>
<?php        
         require_once './template/footer.php';
