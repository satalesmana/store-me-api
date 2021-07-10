<div class="container-fluid p-0 m-0 page" id="home-page">
    <!-- Recommended Products -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <div class="container">
                <div class="carousel-caption text-end">
                    <h1>One more for good measure.</h1>
                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End Recommended Products -->
    
    <!-- Products in Home -->
    <div class="container">
        <div class="container-fluid p-2">
            <div class="row p-0 m-0" style="width: 100% !important;" id="itemProduk">
                               
                
            </div>
        </div>
    </div>
    <!-- End Products in Home -->
</div>

<script>
    $(document).ready(function(){
       // var html = "";
        $.get( "<?php echo site_url('app/produkdata'); ?>", function( data ) {
            for(var i=0; i < data.length; i++){
                var gambar ="http://via.placeholder.com/150";
                if(data[i].gambar !='-'){
                    gambar = data[i].gambar
                }

                var html = '<div class="produk col-xs-12 col-sm-6 col-md-2 col-lg-2 p-2">';
                html += '<div class="card shadow-sm p-0">';
                html += '<img src="'+gambar+'" class="card-img-top" alt="Produk 1">';
                html += '<div class="card-body">';
                html += '<h5 class="card-title">'+data[i].nama_produk+'</h5>';
                html += '<p class="card-text">RP. '+data[i].harga_jual+'</p>';
                html += '<div class="d-flex  justify-content-between">';
                html += '<button onClick="$(this).prosesBeli('+data[i].id+')" class="btn btn-primary">Beli</button>'
                html += '<button onClick="$(this).cekDetail('+data[i].id+')" class="btn btn-secondary">Detail</button>'
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                $("#itemProduk").append(html);
            }
        });

        $.fn.prosesBeli = function(id){
            var keranjang = [];

            if(window.localStorage.keranjang){
                keranjang = window.localStorage.keranjang.split(",");
                if(keranjang.includes(id.toString())){
                    alert("data keranjang sudah ada")
                    return false;
                }else{
                    keranjang.push(id);
                }

            }else{
                keranjang.push(id);
            }
            
            window.localStorage.keranjang= keranjang.join();

            alert("data berhasil ditambahkan ke kranjang")
            location.reload();

        }

        $.fn.cekDetail = function(id){
            window.location.href = "<?php echo site_url('app/product-detail') ?>/" + id
        }
        
    });

</script>

<style>
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 18rem;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 18rem;
}
    </style>