<?php
$lvl=1;
require_once '../lib/security.php';
require_once '../lib/dbc.php';
if(isset($_GET['id']))
{Q("delete FROM register  WHERE id=".$_GET['id']);
header("location:./viewRegister.php?status=2");}
else if(isset($_GET['id2']))
{Q("delete FROM client  WHERE id=".$_GET['id2']);
header("location:./viewRegister.php?status=1");}
exit();