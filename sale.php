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
                    <h1 class="m-0">Sale</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Sale</a></li>
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
                        <div class="card">
                            <div class="card-header">
                                <h5><?php echo $item['productName'] ; ?></h5>
                            </div>
                            <div class="card-body">
                                <img src="<?php echo $item['img']; ?>" alt="" class="card-img-top">
                            </div>
                            <div class="card-footer text-center">
                            </div>
                        </div>
                    </div>
                <?php  endforeach ?>
            </div>
        </div>
    </section>
</div> 
<?php include_once('layout/footer.php'); ?>   