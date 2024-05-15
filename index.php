<?php include_once('layout/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="content-header d-flex justify-content-between">
                <h4>items</h4>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <button type="button" class="btn btn-outline-secondary">ค้นหา</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php for($i = 0; $i < 10; $i++) : ?>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>title | <?php echo $i+1; ?> </h5>
                        </div>
                        <div class="content p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae assumenda nihil eaque nulla at id vero sapiente et quisquam ratione. Vero fuga culpa voluptate. Cumque inventore nihil odio ut eligendi voluptate id harum voluptates nobis amet velit natus quia, sapiente unde odit enim dolorum corrupti exercitationem nisi vero ea dolores?</p>
                        </div>
                        <div class="card-footer">
                            footer card items
                        </div>
                    </div>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div> 
<!-- /.content-wrapper -->
<?php include_once('layout/footer.php'); ?>