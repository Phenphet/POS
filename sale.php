<?php 
    include_once('layout/header.php'); 

    include_once('config/Database.php'); 
    include_once('service/ProductController.php'); 

    $conn = new DB;
    $product = new ProductController($conn);
?>
<div class="content-wrapper">   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Store</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Store</a></li>
                        <li class="breadcrumb-item active">Store management</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row align-items-center">
                <?php $allProduct = $product->getProduct(); 
                foreach($allProduct as $item): ?>
                    <div class="col-12 col-lg-3">
                        <button class="btn m-0 p-0" onclick='addcard(<?php echo $item["productID"]; ?>)'>
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo $item['productName']; ?></h5>
                                </div>
                                <div class="card-body">
                                    <img src="assets/img/<?php echo $item['img']; ?>" alt="" class="card-img-top">
                                </div>
                                <div class="card-footer">
                                    <h6>ราคา : <?php  echo $item['productPrice']; ?> บาท</h6>
                                </div>
                            </div>
                        </button>
                    </div>
                <?php  endforeach ?>
            </div>
        </div>
    </section>
</div> 

<?php 
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == $_SERVER['REQUEST_URI']){
       echo "<script>
                const active = document.getElementById('active4')
                active.classList.add('active')
            </script>";
    }
?>

<script>
    const addcard = (item) => {
        fetch(`views/card.php?item=${item}&action=add`)
        .then(response => {
            if (!response.ok) { throw new Error('Network response was not ok ' + response.statusText); }
            return response.json();
        })
        .then(data => {
            location.reload()
        })
        .catch(error => console.error('Error:', error))
    } 
</script>
<?php include_once('layout/footer.php'); ?>