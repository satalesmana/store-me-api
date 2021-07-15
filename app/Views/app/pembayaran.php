<div class="container mt-4" >
    <div class="card">
        <div class="card-header">
            Proses Pembayaran
        </div>
        <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Baju</li>
            <li class="list-group-item">Tas</li>
            <li class="list-group-item">Celana</li>
        </ul>
        <h4>Total : <span class="badge badge-info">1000</span></h4>
        </div>
        <div class="card-footer text-muted" style="text-align: right;">
            <button class="btn btn-danger" id="btn_back">Back</button>
            <button class="btn btn-primary" id="btn_proses_pesanan">Proses Pesanan</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#btn_back').click(function(){
            window.location.href ='<?php echo site_url('app/pengiriman'); ?>'
        })
        
        $('#btn_proses_pesanan').click(function(){
            
            alert('Pesanan anda sedang di proses')
            localStorage.removeItem("keranjang");
            window.location.href='<?php echo site_url("app/home"); ?>'
        })
    })
</script>