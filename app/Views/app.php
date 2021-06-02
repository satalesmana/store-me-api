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
    <?= view('app/navbar') ?>
    <!-- End Navigation Bar -->
    <!-- Models -->
    <?= view('app/models') ?>
    <!-- End Models -->
    <!-- Home Page -->
    <?= view('app/home') ?>
    <!-- End Home Page -->
    <!-- Product List Page -->
    <?= view('app/productlist') ?>
    <!-- End Product List Page -->
    <!-- Product Detail Page -->
    <?= view('app/productdetail') ?>
    <!-- End Product Detail Page -->
    <!-- Profile Page -->
    <?= view('app/profile') ?>
    <!-- End Profile Page -->
    <script src="/lib/app/bootstrap.bundle.min.js"></script>
    <script src="/lib/app/jquery.min.js"></script>
    <script>
        const pages = ['home', 'product-detail', 'product-list', 'profile'];
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