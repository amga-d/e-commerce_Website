<?php
require_once __DIR__."/src/includes/functions.php";
$_SESSION['user_id'] = 12;
if (isLogedIn()){
    require_once __DIR__. "/src/view/index.php";
    
}


?>

