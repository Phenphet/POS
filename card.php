<?php 
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($id)){
            if(!isset( $_SESSION['cardItem'])){
                $_SESSION['cardItem'] = [];
            }
            $_SESSION['cardItem'][] = $id;
            header('Location: sale.php');
        }
        else{
            echo 'not found id';
        }
    }