<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/lib/app/bootstrap.min.css" rel="stylesheet">
    <link href="/lib/app/custom.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cab03a59e6.js" crossorigin="anonymous"></script>
    <title>Store Me</title>
    <link href="<?php echo base_url('/lib'); ?>/datatable/datatables.css" rel="stylesheet"/>
    <script src="/lib/app/bootstrap.bundle.min.js"></script>
    <script src="/lib/app/jquery.min.js"></script>

    <script src="<?php echo base_url('/lib'); ?>/datatable/datatables.js" type="text/javascript"></script>
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
    <?php if($page=='keranjang') { ?>
        <?=  view('app/keranjang'); ?> 
    <?php } ?>

    <?php if($page=='pengiriman') { ?>
        <?=  view('app/pengiriman'); ?> 
    <?php } ?>
    
    <script>
        $('#unregisterd_user').hide();
        $('#registerd_user').hide();

        if(window.localStorage.keranjang){
            const item =window.localStorage.keranjang.split(",");

            $('#user-keranjang').html('Keranjang ('+item.length+')')
        }

        $("#user-keranjang").click(function(){
            window.location.href = "<?php echo site_url('app/keranjang'); ?>";
        });

        if(window.localStorage.TOKEN){
            $('#registerd_user').show();
            $('#user-account-email').html(window.localStorage.USER_EMAIL)
            $('#user-dropdown').html(window.localStorage.USER_NAME)
        }else
            $('#unregisterd_user').show();


        const pages = ['home', 'product-detail', 'product-list', 'profile'];
        const showPage = (page = null) => {
            pages.forEach(e => {
                if (e !== page) $(`#${e}-page`).removeClass('active');    
            });
            return $(`#${page}-page`).addClass('active');
        }

        $(document).ready(() => {
            showPage('<?= $page ?>')

            $.ajax({
                url:'<?php echo site_url("cmb/kategori"); ?>',
                dataType:"json",
                type:'GET',
                success:function(res){
                            
                    $('#product-category').html('<li><a class="dropdown-item" href="#">Semua kategori</a></li>')
                    res.map((item,index)=>{
                        $('#product-category').append('<li><a class="dropdown-item" href="#">'+item.nama_kategori+'</a></li>')
                    })
                }
            })


            $('#btn-login').click(function(){
                $.ajax({
                    url:'<?php echo site_url("/auth/login"); ?>',
                    dataType:"json",
                    data:{
                        email: $('#login-email').val(),
                        password: $('#login-password').val(),
                    },
                    type:'POST',
                    success:function(res){
                        window.localStorage.USER_NAME = res.user.name
                        window.localStorage.USER_EMAIL = res.user.email
                        window.localStorage.TOKEN = res.access_token

                        window.location.href='<?php echo site_url("/app"); ?>'
                    }
                })
            });

            $("#user-account-logout").click(function(){
                window.localStorage.removeItem('USER_NAME')
                window.localStorage.removeItem('USER_EMAIL')
                window.localStorage.removeItem('TOKEN')
                window.location.href='<?php echo site_url("/app"); ?>'
            })

        });
    </script>
</body>
</html>