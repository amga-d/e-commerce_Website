<?php
require_once __DIR__."/../../includes/functions.php";

session_start();
session_destroy();
returnToLogin();
exit();
?>