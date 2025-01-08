<?php 

require_once __DIR__ ."/../config/db_conn.php";
require_once __DIR__ . "/../includes/functions.php";

function getCartItems(){
        $conn = getDbConn();
        $stmt = $conn->prepare("SELECT cart.*, products.name, products.price, products.image_url 
                               FROM cart 
                               JOIN products ON cart.product_id = products.product_id 
                               WHERE user_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $result = $stmt-> get_result();
        return $result ->fetch_all(MYSQLI_ASSOC);
}

function deleteCartItem($productId) {
    $conn = getDbConn();
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $result = $stmt->execute([$_SESSION['user_id'], $productId]);
    return $result;
}
?>