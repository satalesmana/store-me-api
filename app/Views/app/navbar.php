<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="/" class="navbar-brand">StoreMe</a>

        <div class="navbar-collapse collapse flex-shrink-1 flex-grow-0" id="navbar7">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/app">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="product-category-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                    <ul class="dropdown-menu shadow-sm" id="product-category" aria-labelledby="product-category-dropdown"></ul>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-grow-1 ">
            <form class="mr-2 my-auto w-100 d-inline-block order-1">
                <div class="input-group">
                    <input type="text" class="form-control border border-right-0" placeholder="Cari Produk...">
                    <span class="input-group-append">
                        <button class="btn btn-outline-light border border-left-0 " type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <button class="navbar-toggler order-0" type="button" data-toggle="collapse" data-target="#navbar7">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="unregisterd_user">
            <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#login-modal">Login </button>
            <button class="btn btn-outline-light" type="button">Register </button>
        </div>

        <ul class="navbar-nav" id="registerd_user"> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="user-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Anonymous</a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="user-dropdown">
                    <div class="d-flex flex-column justify-content-center align-items-center mx-4 my-2">
                        <img src="http://via.placeholder.com/240" class="cs-user-profile-pic rounded-circle m-2">
                        <h6 class="text-center" id="user-account-email"></h6>
                    </div>
                    <li><a class="dropdown-item" id="user-keranjang">Keranjang</a></li>
                    <li><a class="dropdown-item" id="user-account-logout">Log Out</a></li>
                </ul>
            </li>
        </ul>
        
    </div>
</nav>
