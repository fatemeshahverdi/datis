<?php
$lvl=7;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
if(isset($_GET['id']))
Q("delete FROM users  WHERE id=".$_GET['id']);
header("location:./manageUsers.php?msg=2");
exit(0);