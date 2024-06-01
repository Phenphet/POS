<?php include_once('layout/header.php'); ?>
<?php 
    include_once('config/Database.php');
    include_once('service/ProductController.php');
    include_once('service/CategoryController.php');

    $db = new DB();
    $product = new ProductController($db);
    $category = new CategoryController($db);

    $coutProduct =  $product->countProduct();
    $coutcategory =  $category->countcategory();
?> 
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashbord</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashbord</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <h3><?php  echo $coutProduct; ?></h3>
                            <p>Products</p>
                        </div>
                        <a href="product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <h3><?php echo $coutcategory; ?></h3>
                            <p>Category</p>
                        </div>
                        <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="small-box bg-danger">
                        <div class="inner text-center">
                            <h3>150</h3>
                            <p>Orders</p>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <h3>150</h3>
                            <p>Report</p>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            
            <section class="content">
        <div class="container-fluid">
            <div class="content-header">
                <h4>Report management</h4>
            </div>
            <div class="container-fluid table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < 20; $i++) : ?>
                        <tr>
                            <th scope="row"><?php echo $i+1;?></th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <div>
                                    <button class="btn btn-outline-info">view</button>
                                </div>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
        </div>
    </section>
</div>
<?php 
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == $_SERVER['REQUEST_URI']){
       echo "<script>
                const active = document.getElementById('Dashboard')
                active.classList.add('active')
            </script>";
    }
?>
<?php include_once('layout/footer.php'); ?>