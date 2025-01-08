<?php 

require_once __DIR__ ."/../config/db_conn.php";
require_once __DIR__ . "/../includes/functions.php";


function addToCart($product_id , $quantity){
    $user_id = getUserId();
    $conn = getDbConn();

    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
}
?>