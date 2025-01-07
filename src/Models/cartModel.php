<?php 

require_once __DIR__ ."/../config/db_conn.php";
require_once __DIR__ . "/../includes/functions.php";



function getCartItems(){
        $conn = getDbConn();
        $stmt = $conn->prepare("SELECT cart.*, products.name, products.price, products.image 
                               FROM cart 
                               JOIN products ON cart.product_id = products.id 
                               WHERE user_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $result = $stmt-> get_result();
        return $result ->fetch_all(MYSQLI_ASSOC);
}
?>