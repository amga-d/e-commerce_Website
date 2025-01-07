<?php
require_once __DIR__ . "/../config/db_conn.php";
if (isset($_GET['action']) && ($_GET['action']) === "view" && isset(($_GET['product_id']))) {
    $product_id = intval($_GET['product_id']);

    $relatedProducts =getRelatedProducts();
    $product = getProductPreview($product_id);
    
    if ($product) {
        // Render the product view dynamically
        require_once __DIR__ . "/../view/product.php";
    } else {
        echo "Product not found.";
    }

}


function getProductPreview($product_id)
{
    $query = 'SELECT
    
    name,
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
