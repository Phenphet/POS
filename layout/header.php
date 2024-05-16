<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE | 3</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
           <?php include_once('components/NavLeft.php'); ?>
           <?php include_once('components/NavRight.php'); ?>
        </nav>  
        <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
            <a href="index.php" class="brand-link text-center">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                    <div class="info ">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>
                <?php include_once('components/SideabarMenu.php'); ?>
            </div>
        </aside>       