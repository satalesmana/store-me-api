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