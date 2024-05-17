<?php 
session_start();
    if(isset($_SESSION['cardItem'])){
        echo 'item = ';
        print_r($_SESSION['cardItem']);
        $item = $_SESSION['cardItem'];
        echo '<br>';
        echo 'จำนวน order'.count($_SESSION['cardItem']);
        echo '<br>';
        $countItem = array_count_values($item);
        echo "count oder = ";
        print_r($countItem);
        echo '<br>';

        foreach($countItem as $pId => $count){
            echo 'สินค้า : '.$pId.'จำนวน : ' .$count.'<br>';
        }
    }else{
        echo 'not item';
        echo '<br>';
    }

?>
    <a href="remove.php">remove </a>