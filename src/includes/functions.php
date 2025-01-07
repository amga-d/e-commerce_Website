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
session_start();
function isLogedIn(){
    if (!isset($_SESSION['user_id'])){
        echo "register";
    }
    else {
        return true;
    }
}
?>