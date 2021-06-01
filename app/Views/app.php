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
                                <h5 class="text-center">Kamu belum masuk :(</h5>
                            </div>
                            <li><a class="dropdown-item" href="#">Daftar</a></li>
                            <li><a class="dropdown-item" href="#">Masuk</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <div id="recommended-product-controls" class="carousel slide shadow-sm rounded mx-2 mt-2 border" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#recommended-products-indicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#recommended-products-indicator" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#recommended-products-indicator" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://via.placeholder.com/1280x720" class="cs-recommended-product">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Produk rekomendasi 1</h5>
                    <p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="http://via.placeholder.com/1280x720" class="cs-recommended-product">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Produk rekomendasi 2</h5>
                    <p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="http://via.placeholder.com/1280x720" class="cs-recommended-product">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Produk rekomendasi 3</h5>
                    <p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#recommended-product-controls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#recommended-product-controls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid p-2">
        <div class="row p-0 m-0" style="width: 100% !important;">
            <div class="produk col-md-4 p-2">
                <div class="card shadow-sm p-0">
                    <img src="http://via.placeholder.com/400" class="card-img-top product-image" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 1</h5>
                        <p class="card-text">Deskripsi produk 1.</p>
                    </div>
                </div>
            </div>
            <div class="produk col-md-4 p-2">
                <div class="card shadow-sm p-0">
                    <img src="http://via.placeholder.com/400" class="card-img-top product-image" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 2</h5>
                        <p class="card-text">Deskripsi produk 2.</p>
                    </div>
                </div>
            </div>
            <div class="produk col-md-4 p-2">
                <div class="card shadow-sm p-0">
                    <img src="http://via.placeholder.com/400" class="card-img-top product-image" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 3</h5>
                        <p class="card-text">Deskripsi produk 3.</p>
                    </div>
                </div>
            </div>
            <div class="produk col-md-4 p-2">
                <div class="card shadow-sm p-0">
                    <img src="http://via.placeholder.com/400" class="card-img-top product-image" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 4</h5>
                        <p class="card-text">Deskripsi produk 4.</p>
                    </div>
                </div>
            </div>
            <div class="produk col-md-4 p-2">
                <div class="card shadow-sm p-0">
                    <img src="http://via.placeholder.com/400" class="card-img-top product-image" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 5</h5>
                        <p class="card-text">Deskripsi produk 5.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/lib/app/bootstrap.bundle.min.js"></script>
</body>
</html>