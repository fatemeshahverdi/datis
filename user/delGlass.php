<?php 
$lvl=9;
require_once '../lib/security.php';
if(isset($_GET['goto'])&&isset($_GET['gID']))
Q("delete FROM glass where `gID`=".$_GET['gID'],__LINE__,__FILE__);
header("location:Glass.php?".  urldecode($_GET['goto']));