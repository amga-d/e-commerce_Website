<?php
require_once __DIR__ . "/../../includes/functions.php";
require_once __DIR__ . "/../../config/db_conn.php";


if (isLogedIn()) {
    header("location: /");
    exit();
}

$conn = getDbConn();
$email = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['errors'] = [];

    // Validate and sanitize email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "Invalid email address";
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    }

    // Validate and sanitize password
    if (empty($_POST['password'])) {
        $_SESSION['errors'][] = "Password cannot be empty";
    } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    }

    if (empty($_SESSION['errors'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $query = $conn->prepare("SELECT email, user_id, password_hash ,is_admin FROM users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password == $user['password_hash']) {
                $_SESSION['user_id'] = $user['user_id'];
                if ($user["is_admin"] == "true") {
                    $_SESSION['admin'] = true;
                }
                else{
                    $_SESSION['admin'] = false;
                }
                header("location: /");
                exit();
            } else {
                $_SESSION['errors'][] = "Incorrect password";
            }
        } else {
            $_SESSION['errors'][] = "No user found with this email address";
        }
    }
}


// Display errors if any
if (isset($_SESSION['errors'])) {
    echo "<script>";
    foreach ($_SESSION['errors'] as $error) {
        echo "alert('" . addslashes($error) . "');";
    }
    echo "</script>";
    unset($_SESSION['errors']);
}
