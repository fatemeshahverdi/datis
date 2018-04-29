<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Advance Search","جستجوی پیشرفته");
/****private****/
addInDic("Chemical", "Chemical","مواد شیمیایی");
addInDic("Labware", "Labware","َشیشه آلات");
addInDic("Product name", "Product name","نام محصول");
addInDic("Search for", "Search for","جستجو براساس");
addInDic("Brand", "Brand","برند");
addInDic("Product number", "Product number","کد محصول");
addInDic("CAS number", "CAS number","کد (CAS)");
addInDic("Formula", "Formula Hill","فرمول");
addInDic("Occurs anywhere", "Occurs anywhere","واقع شدن در هرجا");
addInDic("Starts with", "Starts with","شروع با");
addInDic("Ends with", "Ends with","خاتمه با");
addInDic("First word", "First word","کلمه شروع");
/****end dic****/
if (isset($_POST['regc']))
{
    switch ($_POST['SBy'])
    {
        case "start":$_POST['SBy']="#%";break;
        case "end":$_POST['SBy']="%#";break;
        case "word":$_POST['SBy']="# %";break;
        default :$_POST['SBy']="%#%";break;
    }
    $haystack="chemical"."#".$_POST['SBy']."#";
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
if (isset($_POST['reg']))
{
    $haystack="Labware###";
    $haystack=base64_encode($haystack);
    header("location:./Search.php?haystack=".$haystack."&needle=".$_POST['needle']);
}
$style="            form p,form li{margin:15px 0;} .brandf{width:200px;} fieldset{line-height: 30px;width: auto; } .wrapper form input[type=submit]{margin:0 20px;}";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
?>
    <div style="background-color:#ddd; padding: 20px;">
    <h3><?php E("Chemical") ?></h3>
    <form method="post">
        <fieldset class="brandf"  id="brandF" style="float: left; margin:0 30px 25px 0; " ><legend><?php E("Brand") ?></legend>
            <label for="All">All</label><input type="checkbox" name="Brand[]" id="All" value="All" checked="checked"> <br>
            <label for="MERCK">MERCK</label><input type="checkbox" name="Brand[]" id="MERCK" value="MERCK"> <br>
            <label for="SIAL">SIGMA ALDRICH</label><input type="checkbox" name="Brand[]" id="SIAL" value="SIGMA&nbsp;ALDRICH"> <br>
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
        </fieldset>
        <fieldset><legend><?php E("Search for") ?></legend>
            <?php echo R("Product name")." , ".R("Product number")." , ".R("CAS number")." , ".R("Formula") ?> :
                    <p><input name="needle" id="needle" style="width: 450Px;"><input type="submit" name="regc" value="<?php E("page title") ?>"></p>
        </fieldset>
        <fieldset style="margin-top: 14px;"><legend><?php E("Search for") ?></legend>
            <label for="Name"><?php E("Occurs anywhere") ?></label><input type="radio" name="SBy" id="Name" value="any" checked="checked"><br>
            <label for="BPNo"><?php E("Starts with") ?></label><input type="radio" name="SBy" id="BPNo" value="start"><br>
            <label for="CasNo"><?php E("Ends with") ?></label><input type="radio" name="SBy" id="CasNo" value="end"><br>
            <label for="Formula"><?php E("First word") ?></label><input type="radio" name="SBy" id="Formula" value="word">
        </fieldset>
    </form>
    <h3 style="clear: both;margin-top: 40px; position: relative;top: 25px;"><?php E("Labware") ?></h3>
    <fieldset style="margin: 0 <?php echo R("dir")=="ltr"?"0 0 260px":"260px 0 0" ;?>;"><legend><?php E("Search for") ?></legend>
    <form method="post">
            <?php E("Product name") ?> :
            <p style=" "><input name="needle" id="needle" style="width: 450Px;">
            <input type="submit" name="reg" value="<?php E("page title") ?>"></p>
    </form>
    </fieldset>
    </div>
</div>
<?php 
         require_once './template/footer.php';
