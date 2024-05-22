<?php include_once('layout/header.php');?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <?php 
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
                    } ?>

                    <button onclick="removeCard()">remove</button>
                   
                <?php }else{
                    echo '<a href="sale.php">no item</a>';
                    
                    echo '<br>';
                }
            ?>
        </div>
    </section>
</div>

<script>
    const removeCard = () => {
        fetch(`views/card.php?action=remove`)
        .then(response => {
            if (!response.ok) { throw new Error('Network response was not ok ' + response.statusText);}
            return response.json();
        })
        .then(data => {
            location.reload()
        })
        .catch(error => console.error('Error:', error))
    } 
</script>
<?php include_once('layout/footer.php'); ?>