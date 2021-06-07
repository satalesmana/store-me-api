
<h1 class="mt-4">Daftar Pesanan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <?php echo anchor('/',"Dashboard"); ?>
    </li>
    <li class="breadcrumb-item active">Pesanan</li>
</ol>

<div class="mb-5">
    <button class="btn btn-info" id="btn_reload">Reload</button>
</div>

<table id="pesanaTable" class="display" style="width:100%">
    <thead class="bg">
        <tr>
            <th>NO</th>
            <th>ID PEMESAN</th>
            <th>NAMA PEMESAN</th>
            <th>TGL PESAN</th>
            <th>ALAMAT PENGIRIMAN</th>
            <th>ACTION</th>
        </tr>
    </thead>
</table>

<script>
$(document).ready(function() {

    var produk_table = $('#pesanaTable').DataTable({
        "ajax": "<?php echo site_url('api/pesanan'); ?>",
        "processing": true,
        "serverSide": true,
        "columns":[
            { "data" : "deskripsi" },
            { "data" : "deskripsi" },
            { "data" : "deskripsi" },
            { "data" : "deskripsi" },
            { "data" : "deskripsi" },
            { "data" : null, 
                defaultContent: '<button class="btn btn-warning btn-approve btn-sm"><i class="fa fa-pencil"></i> Approve </button> <button class="btn btn-reject btn-danger btn-sm"><i class="fa fa-trash"></i> Reject </button>' },
        ]
    });

    $('#btn_reload').click(function(){
        produk_table.ajax.reload()
    })

});
</script>
