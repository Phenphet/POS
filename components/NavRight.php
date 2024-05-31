<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="badge badge-warning navbar-badge">
                <?php 
                    if(isset($_SESSION['cardItem'])) {
                        $countOder = count($_SESSION['cardItem']);
                        echo $countOder ;
                    }else{
                        echo '0';
                    }
                ?>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">
            <?php 
                    if(isset($_SESSION['cardItem'])) {
                        $countOder = count($_SESSION['cardItem']);
                        echo 'จำนวนรายการสินค้าทั้งหมด ' . $countOder ;
                    }else{
                        echo 'จำนวนรายการสินค้าทั้งหมด 0';
                    }
                ?>
            </span>
            <div class="dropdown-divider"></div> 
            <?php 
                if(isset($_SESSION['cardItem'])) {
                    $items = $_SESSION['cardItem'];
                    $countItem = array_count_values($items);
                    foreach($countItem as $productID => $count){ 
                        include_once('config/Database.php');
                        include_once('service/ProductController.php');

                        $db = new DB();
                        $product = new ProductController($db);

                        $getProduct = $product->getProductOneItem($productID); 

                        foreach ($getProduct as $item) {
                            echo "<a href='#' class='dropdown-item'>
                                    {$item['productName']}      
                                    <span class='float-right text-muted text-sm'>{$count} item</span>
                                </a>";
                        }
                    }
                }else{
                    echo '<a href="#" class="dropdown-item">
                            <span class="text-muted text-sm ">ไม่มีรายการสินค้า</span>
                        </a>';
                }
            ?>
            <div class="dropdown-divider"></div>
            <a href="order.php" class="dropdown-item dropdown-footer">See All</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
</ul>