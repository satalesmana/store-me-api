<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Store</title>
        <link href="<?php echo base_url('/templates/sbadmin'); ?>/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url('/lib'); ?>/datatable/datatables.css" rel="stylesheet"/>
        <link href="<?php echo base_url('/lib'); ?>/font-awesome-4/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url('/lib'); ?>/bootstrap-4/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo base_url('/lib'); ?>/swal/dist/sweetalert2.min.css">
        
        <script src="<?php echo base_url('/lib'); ?>/swal/dist/sweetalert2.min.js"></script>
        <script src="<?php echo base_url('/lib/jquery-ui/external/jquery'); ?>/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url('/lib/bootstrap-4'); ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('/templates/sbadmin'); ?>/js/scripts.js" type="text/javascript"></script>
        <script src="<?php echo base_url('/lib'); ?>/datatable/datatables.js" type="text/javascript"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fa fa-dashboard"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
                                    Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php echo anchor("/kategori","Kategori",["class"=>"nav-link"]); ?>
                                    <?php echo anchor("/produk","Produk",["class"=>"nav-link"]); ?>
                                    <?php echo anchor("/member","Pelanggan",["class"=>"nav-link"]); ?>
                                </nav>
                            </div>

                            <!-- Star Menu Transaksi-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsTransaksi" aria-expanded="false" aria-controls="collapseLayoutsTransaksi">
                                <div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
                                    Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsTransaksi" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php echo anchor("/pesanan","Pesanan",["class"=>"nav-link"]); ?>
                                    <?php echo anchor("/pembayaran","Pembayaran",["class"=>"nav-link"]); ?>
                                    <?php echo anchor("/pengiriman","Pengiriman",["class"=>"nav-link"]); ?>
                                </nav>
                            </div>
                            <!-- End Menu Transaksi-->

                            <!-- Star Menu Config-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsConfig" aria-expanded="false" aria-controls="collapseLayoutsConfig">
                                <div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
                                    Config
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsConfig" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php echo anchor("/user","User Account",["class"=>"nav-link"]); ?>
                                </nav>
                            </div>
                            <!-- End Menu Config-->

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                            Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?= $this->include($page) ?>
                    </div>
                </main>
            </div>
        </div>

    </body>
    <script>
         if(!window.localStorage.TOKEN)
            window.location.href='<?php echo site_url("/app"); ?>'

    </script>
</html>