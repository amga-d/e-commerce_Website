<?php 
require_once __DIR__ ."/../config/db_conn.php";


function getFeaturedProducts(){
    $query='SELECT
                product_id,
                name,
                description,
                image_url,
                price,
                rate
            FROM
                products
                    
            LIMIT 4;';

    $conn = getDbConn();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>