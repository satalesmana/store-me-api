<h1 class="mt-4">Master Pelanggan/Member</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <?php echo anchor('/',"Dashboard"); ?>
    </li>
    <li class="breadcrumb-item active">Pelanggan</li>
</ol>

<div class="mb-5">
    <button class="btn btn-info" id="btn_reload">Reload</button>
    <button type="button" class="btn btn-primary" id="btn_add">Add New Item </button>
</div>

<table id="memberTable" class="display" style="width:100%">
    <thead class="bg">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Photo Profile</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

<script>
    //tampil data
    $(document).ready(function() {
        var EDIT_DATA="";

        var produk_table = $('#memberTable').DataTable({
            "ajax": "<?php echo site_url('api/member'); ?>",
            "processing": true,
            "serverSide": true,
            "columns":[
                { "data" : "nama_member" },
                { "data" : "email" },
                {   "data" : "foto",
                    "render": function ( data, type, full, meta ) {
                        //console.log(data)
                        if( data != null){
                            return "<img src='"+data+"' width='30px'/>"
                        }else
                            return "-"
                    } 
                },
                { "data" : "alamat" },
                { "data" : null, defaultContent: '<button class="btn btn-warning btn-edit btn-sm"><i class="fa fa-pencil"></i> Edit </button> <button class="btn btn-delete btn-danger btn-sm"><i class="fa fa-trash"></i> delete </button>' },
            ]
        });
    })
</script>