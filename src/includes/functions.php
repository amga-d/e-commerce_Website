<?php
// This file contains various utility functions that can be used throughout the application.

// function sanitizeInput($data) {
//     return htmlspecialchars(strip_tags($data));
// }

// function redirect($url) {
//     header("Location: $url");
//     exit();
// }

// function formatDate($date) {
//     return date("Y-m-d", strtotime($date));
// }

// function isPostRequest() {
//     return $_SERVER['REQUEST_METHOD'] === 'POST';
// }

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function isLogedIn(){
    if (isset($_SESSION['user_id'])){
        return true;
    }
    else {
        return false;
    }
}
function returnToLogin(){
    header("Location: /src/view/auth/login.php");
    exit();
}

function isAdmin(){
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
        return true;
    }
    else{
        return false;
    }
}
?>