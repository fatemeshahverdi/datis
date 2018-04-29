<?php
$lvl=6;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
if(isset($_GET['id']))
Q("delete FROM recruitment  WHERE id=".$_GET['id']);
header("location:./viewRecruitments.php?status=1");
exit();