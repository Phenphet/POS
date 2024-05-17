<?php 
    session_start();
    
    if($_SESSION['cardItem']) {
        unset($_SESSION['cardItem']);
        // session_destroy();
        header('Location: sale.php');
    }else{
        header('Location: sale.php');
    }
