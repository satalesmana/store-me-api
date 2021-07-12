<div class="container mt-4" >
    <div class="card">
        <div class="card-header">
            Keranjang
        </div>
        <div class="card-body">
            <div class="mb-3">
                <button id="reload_keranjang" class="btn btn-primary"> Reload </button>
            </div>

            <table id="keranjangTbl" class="display" style="width:100%">
                <thead class="bg">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card-footer" style="text-align:right">
            <a href="<?php echo site_url('app/pengiriman'); ?>"> <button  class="btn btn-primary"> Proses Pengiriman </button></a>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    var keranjang_table = $('#keranjangTbl').DataTable({
            "ajax": {
                'url':"<?php echo site_url('app/keranjangdata'); ?>",
                'data': {
                    produkId: (window.localStorage.keranjang) ? window.localStorage.keranjang : '',
                },
            },
            "processing": true,
            "serverSide": true,
            "columns":[
                { "data" : "nama_produk" },
                { "data" : "harga_satuan" },
                { "data" : "qty" },
                { "data" : "total" },
                { "data" : null, defaultContent: '<button class="btn btn-warning btn-edit btn-sm"><i class="fa fa-pencil"></i> Edit Qty </button> <button class="btn btn-delete btn-danger btn-sm"><i class="fa fa-trash"></i> delete </button>' },
            ]
        });

    $("#reload_keranjang").click(function(){
        keranjang_table.ajax.reload()
    })
})
</script>