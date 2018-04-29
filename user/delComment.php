<?php
$lvl=5;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
if(isset($_GET['id']))
Q("delete FROM comment  WHERE id=".$_GET['id']);
header("location:./viewComments.php?status=1");
exit();