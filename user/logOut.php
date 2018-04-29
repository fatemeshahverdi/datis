<?php
session_status()==PHP_SESSION_ACTIVE or session_start();
session_destroy();
header("location:./logInUser.php");
exit();