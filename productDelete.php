<?php
    include_once('config/Database.php');
    include_once('service/ProductController.php');

    $db = new DB();
    $product = new ProductController($db);
    $getValue = isset($_GET['product']) && $_GET['product'] !== "" ? $_GET['product'] : 'None';

    if($getValue !== 'None'){
        $stmt = $product->deleteProduct($getValue);
        if($stmt){
           header('Location: product.php');
        }else{
            echo 'error';
        }
    }else{
        echo 'None test';

    }
?>