<?php
$title="Merck";
require_once './lib/lang.php';
/****begin dic****/
/****public****/
addInDic("page title", "Gallery","گالری");
/****private****/
/****end dic****/
$style=".wrapper form p,.wrapper form fieldset{margin:20px 0;} fieldset{padding: 10px; max-width: 300px; }";
require_once './template/header.php';
echo '<div class="title">'.R("page title").'</div><div class="coontent">';
require_once './document/gallery'.$lang[0];
if(file_exists('./document/Zgallery'.$lang[0]) && filesize('./document/Zgallery'.$lang[0])>0)
{
    require_once isset($_SESSION['id'])? './document/Zgallery'.$lang[0]:'./document/alert'.$lang[0];
}
echo '</div>';
require_once './template/footer.php';

