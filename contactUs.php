<?php
$title="";
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Contact Us","تماس با ما");
/****private****/
/****end dic****/
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
require_once './document/contactUs'.$lang[0];
echo '</div>';
require_once './template/footer.php';
