<?php 
    include_once('layout/header.php'); 
    
    include_once('config/Database.php');
    include_once('service/ProductController.php');

    $db = new DB;
    $product = new ProductController($db);

    ?>
<div class="content-wrapper">   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product Remove</a></li>
                        <li class="breadcrumb-item active">All product remove</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid table-responsive">
            
        </div>
    </section>
</div> 
<?php 
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == $_SERVER['REQUEST_URI']){
       echo "<script>
                const active = document.getElementById('ProductRemove')
                active.classList.add('active')
            </script>";
    }
?>
<?php include_once('layout/footer.php'); ?>