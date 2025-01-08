<?php
require_once __DIR__ ."/../config/db_conn.php";
require_once __DIR__ . "/../includes/functions.php";

function getProductPreview($product_id)
{
    $query = 'SELECT
    
    name,
    product_id,
    description,
    image_url,
    price,
    rate,
    stock_quantity
FROM
    products
WHERE
    product_id = ?';

    $conn = getDbConn();
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s',$product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getRelatedProducts()
{
    $query = 'SELECT
    product_id,
    name,
    description,
    image_url,
    price,
    rate
FROM
    products
WHERE stock_quantity > 0 
ORDER BY RAND()
LIMIT 4';

    $conn = getDbConn();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>