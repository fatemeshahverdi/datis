<?php 
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "No Result","بی نتیجه");
/****private****/
addInDic("Advance Search", "Advance Search","صفحه جستجوی پیشرفته");
addInDic("Home", "Home","صفحه نخست");
addInDic("Go to", "Go to","بروید به");
addInDic("or", "or","یا");
/****end dic****/
$style="           .wrapper p{margin:20px 0;}";
require_once './template/header.php';
?>
<div class="coontent">
<h3><?php E("page title") ?></h3>
<p><?php E("Go to") ?> :<a href="./"><?php E("Home") ?></a> <?php E("or") ?> <a href="./advanceSearch.php"><?php E("Advance Search") ?></a></p>
</div>
    <?php        
         require_once './template/footer.php';