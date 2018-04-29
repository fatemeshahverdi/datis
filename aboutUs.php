<?php
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "About Us","درباره ما");
/****private****/
/****end dic****/
require_once './template/header.php';
echo '<div class="title">'.  R("page title") .'</div><div class="coontent">';
require_once './document/aboutUs'.$lang[0];
echo '</div>';
require_once './template/footer.php';
