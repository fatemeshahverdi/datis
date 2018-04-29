<?php
$lvl=1;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
if(isset($_GET['specific'])&&isset($_GET['id']))
Q("update register SET `specific`=".$_GET['specific']." WHERE id=".$_GET['id']);
header("location:./viewRegister.php");
exit();