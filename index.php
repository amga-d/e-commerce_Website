<?php
require_once __DIR__."/src/includes/functions.php";
// $_SESSION['user_id'] = 12;
if (isLogedIn()){
    if(isAdmin()){
        require_once __DIR__. "/src/view/admin/dashboard.php";
    }
    else{
        require_once __DIR__. "/src/view/index.php";
    }
}else{
    header("location: /src/view/auth/login.php");
}


?>

