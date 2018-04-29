<?php
$lvl=2;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
if(isset($_GET['newsId']))
Q("delete FROM news  WHERE id=".$_GET['newsId']);
header("location:./viewNews.php?status=2");
exit();