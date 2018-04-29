<?php 
$lvl=10;
require_once '../lib/security.php';
if(isset($_GET['goto'])&&isset($_GET['cpID']))
Q("delete FROM chempdt where `cpID`=".$_GET['cpID'],__LINE__,__FILE__);
header("location:Chem.php?".  urldecode($_GET['goto']));