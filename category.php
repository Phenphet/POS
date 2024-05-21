<?php 

    include_once('layout/header.php'); 

    include_once('config/Database.php');
    include_once('service/CategoryController.php');

    $db = new DB;
    $category = new CategoryController($db);
    $allCategory = $category->categoryAll();

?>
<div class="content-wrapper">   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active">see Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="content-header d-flex justify-content-between">
        <div class="mb-3">
               <button class="btn btn-info">เพิ่มรายการ</button>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <button type="button" class="btn btn-outline-secondary">ค้นหา</button>
                </div>
            </div>
        </div>
        <div class="container-fluid table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">รหัสกลุ่ม</th>
                    <th scope="col">กลุ่มของสินค้า</th>
                    <th scope="col">create_at</th>
                    <th scope="col">update_at</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach($allCategory as $item): ?>
                        <tr>
                            <th scope="row"><?php echo $item['categoryID']?></th>
                            <td><?php echo $item['categoryName']?></td>
                            <td><?php echo $item['created_at']?></td>
                            <td><?php echo $item['updated_at']?></td>
                            <td>
                                <div>
                                    <button class="btn btn-warning">edit</button>
                                    <button class="btn btn-danger">delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php  endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div> 
<?php include_once('layout/footer.php'); ?>