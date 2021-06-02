<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/lib/app/bootstrap.min.css" rel="stylesheet">
    <link href="/lib/app/custom.css" rel="stylesheet">
    <title>Store Me</title>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="container-fluid sticky-top px-2 pt-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded border">
        <div class="container-fluid">
            <a class="navbar-brand" href="/app">Store Me</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile-navbar-menu" aria-controls="mobile-navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mobile-navbar-menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/app">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="product-category-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                        <ul class="dropdown-menu shadow-sm" aria-labelledby="product-category-dropdown">
                            <li><a class="dropdown-item" href="#">Semua kategori</a></li>
                            <li><a class="dropdown-item" href="#">Kategori 1</a></li>
                            <li><a class="dropdown-item" href="#">Kategori 2</a></li>
                            <li><a class="dropdown-item" href="#">Kategori 3</a></li>
                            <li><a class="dropdown-item" href="#">Kategori 4</a></li>
                            <li><a class="dropdown-item" href="#">Kategori 5</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex px-2">
                    <input class="form-control me-2" type="search" placeholder="Cari produk disini..." aria-label="Cari produk disini...">
                    <button class="btn btn-outline-primary" type="submit">Cari!</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="user-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Anonymous</a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="user-dropdown">
                            <div class="d-flex flex-column justify-content-center align-items-center mx-4 my-2">
                                <img src="http://via.placeholder.com/240" class="cs-user-profile-pic rounded-circle m-2">
                                <h6 class="text-center">Kamu belum masuk :(</h6>
                            </div>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registration-modal">Daftar</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#login-modal">Masuk</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <!-- End Navigation Bar -->
    <!-- Registration -->
    <div class="modal fade" id="registration-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Sekarang!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating m-2">
                            <input type="text" class="form-control" id="register-name" placeholder="Nama">
                            <label>Nama</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="email" class="form-control" id="register-email" placeholder="Email">
                            <label>Email</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" id="register-password" placeholder="Password">
                            <label>Password</label>
                        </div>
                        <div class="m-2">
                            <label class="mb-2">Upload fotomu</label>
                            <input class="form-control" type="file" id="register-photo">
                        </div>
                        <div class="form-floating m-2">
                            <textarea type="text" class="form-control" id="register-address" placeholder="Alamat" style="height: 120px"></textarea>
                            <label>Alamat</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Registration -->
    <!-- Login -->
    <div class="modal fade" id="login-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating m-2">
                            <input type="email" class="form-control" id="login-email" placeholder="Email">
                            <label>Email</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" id="login-password" placeholder="Password">
                            <label>Password</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Masuk</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
    <!-- Home Page -->
    <?= view('home') ?>
    <!-- End Home Page -->
    <!-- Product Page -->
    <?= view('product') ?>
    <!-- End Product Page -->
    <!-- Profile Page -->
    <?= view('profile') ?>
    <!-- End Profile Page -->
    <script src="/lib/app/bootstrap.bundle.min.js"></script>
    <script src="/lib/app/jquery.min.js"></script>
    <script>
        const pages = ['home'];
        const showPage = (page = null) => {
            pages.forEach(e => {
                if (e !== page) $(`#${e}-page`).removeClass('active');    
            });
            return $(`#${page}-page`).addClass('active');
        }

        $(document).ready(() => {
            showPage('<?= $page ?>')
        });
    </script>
</body>
</html>