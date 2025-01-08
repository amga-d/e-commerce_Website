<?php 
require_once __DIR__."/../../includes/functions.php";
require_once __DIR__."/../../config/db_conn.php";

if (isLogedIn()){
    header("location: /");
}
function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = validate_input($_POST['name']);
    $email = validate_input($_POST['email']);
    $password = validate_input($_POST['password']);
    $confirm_password = validate_input($_POST['confirm-password']);

    $errors = [];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate username length
    if (strlen($username) < 3 || strlen($username) > 20) {
        $errors[] = "Username must be between 3 and 20 characters";
    }


    // Validate password match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }
}
$conn = getDbConn();
$username = $email =$password =$confirm_password = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    
    // Get and sanitize input
    $username = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm-password']);

    // Validate password match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // Check if username exists
    $query = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $errors[] = "Username already exists";
    }

    // Check if email exists
    $query = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $errors[] = "Email already exists";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        $is_admin= "false";
        $insert_query = $conn->prepare("INSERT INTO users (username, email, password_hash, is_admin) VALUES (?, ?, ?, ? )");
        $insert_query->bind_param("ssss", $username, $email, $password, $is_admin);
        if ($insert_query->execute()) {
            $user_id = $conn->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['admin'] = false;
            header("location: /");
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }

    // Store errors in session to display them
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
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

?>