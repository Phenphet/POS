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
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">All product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="content-header d-flex justify-content-between">
        <div class="mb-3">
               <a href="addproduct.php" class="btn btn-info">เพิ่มรายการ</a>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <button type="button" class="btn btn-outline-secondary">ค้นหา</button>
                </div>
            </div>
        </div>
        <div class="container-fluid table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">รูปสินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">หมวดหมู่</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">create_at</th>
                    <th scope="col">update_at</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $allProduct = $product->tableProduct();
                    foreach($allProduct as $index => $item): ?>
                        <tr>
                            <th scope="row"><?php echo $index+1?></th>
                            <td><img src="assets/img/<?php echo $item['img']?>" alt="<?php echo $item['img']?>" width="50px" class="img-thumbnail"></td>
                            <td><?php echo $item['productName']?></td>
                            <td><?php echo $item['categoryName']?></td>
                            <td><?php echo $item['productStock']?></td>
                            <td><?php echo $item['productPrice']?> บาท</td>
                            <td><?php echo $item['created_at']?></td>
                            <td><?php echo $item['updated_at']?></td>
                            <td>
                                <div>
                                    <a href="editproduct.php?product=<?php echo $item['productID']; ?>" class="btn btn-warning">edit</a>
                                    <a href="productDelete.php?product=<?php echo $item['productID']; ?>" class="btn btn-danger">delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php  endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div> 
<?php 
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == $_SERVER['REQUEST_URI']){
       echo "<script>
                const active = document.getElementById('active2')
                active.classList.add('active')
            </script>";
    }
?>
<?php include_once('layout/footer.php'); ?>