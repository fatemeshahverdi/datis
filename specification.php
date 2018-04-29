<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Specification of Analysis","مشخصات تجزیه و تحلیل");
/****private****/
addInDic("Product No", "Product No","کد محصول");
addInDic("Not Found", "Not Found","یافت نشد");
addInDic("Search", "Search","جستجو");
addInDic("Advance Search", "Advance Search","صفحه جستجوی پیشرفته");
addInDic("Home", "Home","صفحه نخست");
addInDic("Go to", "Go to","بروید به");
addInDic("or", "or","یا");
/****end dic****/
$s="";
$style="           .wrapper p{margin:20px 0;} table{border-collapse: collapse;border: 1px solid #999;}td,th{ padding:5px;} tr{} .spec,.spec *{direction:ltr;}";
$title="Specification of Analysis";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
if(isset($_SESSION['id']))
{
    ?>
    <form>
        <p><label for="needle"><?php E("Product No") ?>: </label><input name="needle" id="needle"><input type="submit" value="<?php E("Search") ?>"></p>
    </form>
    <?php    
    if(isset($_GET['needle']) && strlen($_GET['needle'])>=3)
    {
        $_GET['needle']=  htmlentities($_GET['needle'],ENT_QUOTES);
        require_once './lib/dbc.php';
        $r=  Q("select d.`Specification`,c.brand,c.`Name` FROM detail as d , chempdt as c WHERE c.`cpID` = d.`cpID` and c.`BPNo`='".$_GET['needle']."'",__LINE__,__FILE__);
        while ($row=  mysql_fetch_assoc($r))
        {
            $s= '<div class="spec"><p><b>Brand: </b>'.$row['brand'].'</p><p><b>Name: </b>'.$row['Name'].'</p>';
            $s.= '<p><b>Specification: </b>'.$row['Specification'].'</p></div>';
        }
        echo strlen($s)?$s:'<h3>'.R("Not Found").'!</h3><p>'.R("Go to").' :<a href="./">'.R("Home").'</a> '.R("or").' <a href="./advanceSearch.php">'.R("Advance Search").'</a></p>';
    }
}
else
{
    require_once './document/alert'.$lang[0];
}
echo '</div>';
        require_once './template/footer.php';


