<?php
    include_once('config/Database.php');
    include_once('service/ProductController.php');

    $db = new DB();
    $product = new ProductController($db);
    $getValue = isset($_GET['product']) && $_GET['product'] !== "" ? $_GET['product'] : 'None';

    if($getValue !== 'None'){
        $stmt = $product->deleteProductPermanently($getValue);
        if($stmt){
           header('Location: productremove.php');
        }else{
            echo 'error';
            header('Location: productremove.php');
        }
    }else{
        header('Location: productremove.php');
    }
?>