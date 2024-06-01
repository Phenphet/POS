<?php include_once('layout/header.php');?>
<?php 
    include_once('config/Database.php');
    include_once('service/ProductController.php');
    include_once('service/CategoryController.php');

    $db = new DB;
    $products = new ProductController($db);
    $category = new CategoryController($db);

    $path = 'assets/img/';
?>
<div class="content-wrapper">   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Edit product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit</h3>
            </div>
            <?php 
                if(isset($_GET['product'])) :
                    $idProduct = htmlspecialchars($_GET['product']);
                    if(isset($_SESSION['idGet'])){
                        unset($_SESSION['idGet']);
                    }
                    $_SESSION['idGet'] = $idProduct;
                    $dataProduct = $products->getProductOne($idProduct);
                    if(!empty($dataProduct)) : ?>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <?php foreach($dataProduct as $product): ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อสินค้า</label>
                                        <input name="productName" type="text" class="form-control" id="productName" placeholder="กรอกชื่อของสินค้า" value="<?php echo $product['productName']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>กลุ่มสินค้า</label>
                                        <select name="productCategory" class="form-control" id="productCategory">
                                            <option value="<?php echo $product['CategoryID']?>"><?php echo $product['categoryName']?></option>
                                            <?php 
                                                $selectItem = $category->categorySelectItem();
                                                foreach ($selectItem as $category) :
                                                    if($category['categoryID'] != $product['CategoryID']):
                                                        echo "<option value='{$category['categoryID']}'>{$category['categoryName']}</option>"; 
                                                    endif;
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">จำนวนในคลัง</label>
                                        <input name="productStock" type="text" class="form-control" id="productStock" placeholder="จำนวนในคลัง" value="<?php echo $product['productStock']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ราคา</label>
                                        <input name="productPrice" type="text" class="form-control" id="productPrice" placeholder="ราคา" value="<?php echo $product['productPrice']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input <?php echo $product['img']?></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="productImage" name="productImage" accept="image/png, image/gif, image/jpeg">
                                            <label class="custom-file-label" for="productImage">Choose file</label>
                                            </div>
                                                <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning" name="btnEdit">แก้ไข</button>
                                <button type="submit"  class="btn btn-danger" name="btnCancel">ยกเลิก</button>
                            </div>
                        </form>
                    <?php
                    endif;
                endif;
            ?>
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
<?php 
    if(isset($_POST['btnEdit'])){
        $productName = htmlspecialchars($_POST['productName']);
        $productCategory = htmlspecialchars($_POST['productCategory']);
        $productStock = htmlspecialchars($_POST['productStock']);
        $productPrice = htmlspecialchars($_POST['productPrice']);
        $productID = $_SESSION['idGet'];
        if (isset($_FILES['productImage']) && !empty($_FILES['productImage']['name'])){
            $productImage = $_FILES['productImage']['name'];
            $poductImageTmp = $_FILES['productImage']['tmp_name'];
            $stmt = $products->getProductOneItem($productID);
            foreach ($stmt as $item) {
                if($item['img'] && file_exists($path . $item['img'])){
                    unlink($path . $item['img']);
                }
            }
            $nameFile = time().'-'.$productImage;
            $stmtUpdate = $products->updateProductForImg( $productName,  $productCategory, $productStock,  $productPrice, $nameFile,  $productID);
            $allpath = $path.$nameFile;
            if($stmtUpdate){
                move_uploaded_file($poductImageTmp, $allpath);
                echo "<script>
                        alert('เเก้ไขข้อมูลสินค้าเรียบร้อย');
                        window.location.href='product.php'
                    </script>";
            }
        }
        else{
            $stmt = $products->updateProductNotImg($productName,  $productCategory,  $productStock,  $productPrice, $productID);
            if($stmt){
                unset($_SESSION['idGet']);
                echo "<script>
                        alert('เเก้ไขข้อมูลสินค้าเรียบร้อย');
                        window.location.href = 'product.php'
                    </script>";
            }
        }
    }
    
    if(isset($_POST['btnCancel'])){ ?>
        <script>
            const result = confirm('yes or no ?')
            if(result){
                window.location.href = 'product.php';
            }else{
                window.location.href = 'editproduct.php?product=<?php echo $_SESSION['idGet'] ; ?>'
            }
        </script>
<?php } ?>
<?php include_once('layout/footer.php'); ?>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>