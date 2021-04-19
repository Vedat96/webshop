anu index.php php

<?php
    require "../boot.php";

    $database = db();

    $products = $database->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 3');

    try {
        $products->execute([]);
        $products->setFetchMode(PDO::FETCH_ASSOC);
        $products = $products->fetchAll();
    }
    catch(Exception $e){
        http_response_code(500);
         dd($e->getMessage());
    }
?>

