<?php include_once('layout/header.php'); ?>
<?php
    include_once('config/Database.php');
    include_once('service/CategoryController.php');
    include_once('service/ProductController.php');

    $db = new DB;
    $product = new ProductController($db);
    $category = new CategoryController($db);
    $path = 'assets/img/';
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Add product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product</h3>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่อสินค้า</label>
                            <input name="productName" type="text" class="form-control" id="productName" placeholder="กรอกชื่อของสินค้า">
                            <!-- <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a password</span> -->
                        </div>
                        <div class="form-group">
                            <label>กลุ่มสินค้า</label>
                            <select name="productCategory" class="form-control" id="productCategory">
                                <option value="">เลือกกลุ่มสินค้า</option>
                                <?php 
                                    $selectItem = $category->categorySelectItem();
                                    foreach ($selectItem as $items) {
                                        echo "<option value='{$items['categoryID']}'>{$items['categoryName']}</option>";
                                    }     
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">จำนวนในคลัง</label>
                            <input name="productStock" type="text" class="form-control" id="productStock" placeholder="จำนวนในคลัง">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ราคา</label>
                            <input name="productPrice" type="text" class="form-control" id="productPrice" placeholder="ราคา">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="productImage" name="productImage">
                                <label class="custom-file-label" for="productImage">Choose file</label>
                                </div>
                                    <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['btnSubmit'])) {
        $productName = htmlspecialchars($_POST['productName']);
        $productCategory = htmlspecialchars($_POST['productCategory']);
        $productStock = htmlspecialchars($_POST['productStock']);
        $productPrice = htmlspecialchars($_POST['productPrice']);
        $productImage = $_FILES['productImage']['name'];
        $poductImageTmp = $_FILES['productImage']['tmp_name'];

        if(empty($productName) && empty($productCategory) && empty($productStock) && empty($productPrice)){
            echo "<script>
                    const productName = document.getElementById('productName')
                    const productCategory = document.getElementById('productCategory')
                    const productStock = document.getElementById('productStock')
                    const productPrice = document.getElementById('productPrice')
                    productName.classList.add('is-invalid')  
                    productCategory.classList.add('is-invalid')  
                    productStock.classList.add('is-invalid')  
                    productPrice.classList.add('is-invalid')  
                </script>";
        }else{
            $nameFile = time().'-'.$productImage;
            $stmt = $product->addProduct($productName,$productCategory, $productStock,$productPrice, $nameFile);
            $allPathUpload = $path.$nameFile;
            if($stmt){
                move_uploaded_file($poductImageTmp , $allPathUpload);
                echo "<script>
                        alert('เพิ่มข้อมูลสืนค้าเรียบร้อย');
                    </script>";
                $productName = "";
                $productCategory = "";
                $productStock = "";
                $productPrice = "";
                $productImage = "";
            }else{
                die();
            }
        }
    }
    ?>
</div>
<?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == $_SERVER['REQUEST_URI']) {
    echo "<script>
                const active = document.getElementById('active2')
                active.classList.add('active')
            </script>";
}
?>
<?php include_once('layout/footer.php'); ?>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>