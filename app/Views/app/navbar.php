
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm border-bottom sticky-top">
        <div class="container">
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
                        <ul class="dropdown-menu shadow-sm" id="product-category" aria-labelledby="product-category-dropdown"></ul>
                    </li>
                </ul>
                <form class="d-flex px-2">
                    <input class="form-control me-2" type="search" placeholder="Cari produk disini..." aria-label="Cari produk disini...">
                    <button class="btn btn-outline-primary" type="submit">Cari!</button>
                </form>
                <div id="unregisterd_user">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#login-modal">Login </button>
                    <button class="btn btn-outline-info" type="button">Register </button>
                </div>
                <ul class="navbar-nav" id="registerd_user"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="user-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Anonymous</a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="user-dropdown">
                            <div class="d-flex flex-column justify-content-center align-items-center mx-4 my-2">
                                <img src="http://via.placeholder.com/240" class="cs-user-profile-pic rounded-circle m-2">
                                <h6 class="text-center" id="user-account-email"></h6>
                            </div>
                            <li><a class="dropdown-item" id="user-account-logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
