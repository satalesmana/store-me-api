
<h1 class="mt-4">Master Produk</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <?php echo anchor('/',"Dashboard"); ?>
    </li>
    <li class="breadcrumb-item active">Produk</li>
</ol>

<div class="mb-5">
    <button class="btn btn-info" id="btn_reload">Reload</button>
    <button type="button" class="btn btn-primary" id="btn_add">Add New Item </button>
</div>

<table id="produkTable" class="display" style="width:100%">
    <thead class="bg">
        <tr>
            <th>No</th>
            <th>Images</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

<div class="modal fade" id="ProdukFormModal" tabindex="-1" role="dialog" aria-labelledby="ProdukFormModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kategoriFormModalLabel">Form Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_produk" method="POST" enctype='multipart/form-data'>
            
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan kategori">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" id="drowdown_kategori">
                    <option value="0">--Pilih Kategori---</option>
                </select>
            </div>

            <div class="form-group">
                <label >Deskripsi</label>
                <textarea class="form-control" name="deskripsi"></textarea>
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="numeric" class="form-control" name="harga_beli">
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="numeric" class="form-control" name="harga_jual">
            </div>

            <div class="form-group">
                <label>Jumlah Stock</label>
                <input type="numeric" class="form-control" name="stock">
            </div>

            <div class="form-group">
                <label >Images</label>
                <input type="file" class="form-control" name="images" placeholder="Pilih gambar">
            </div>
        </form>
      </div>
      <div class="modal-footer">
      <div class="row">
        <div id="pesan_holder" style="float: left; text-align:left; padding-right:10px; color:red"></div>
        <div style="float: right;" >
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn_save">Save changes</button>
            <button type="button" class="btn btn-primary" id="btn_edit">Edit changes</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    //tampil data
    $(document).ready(function() {
        var EDIT_DATA="";

        var produk_table = $('#produkTable').DataTable({
            "ajax": "<?php echo site_url('api/produk'); ?>",
            "processing": true,
            "serverSide": true,
            "columns":[
                { "data" : "id"},
                {   "data" : "gambar",
                    "render": function ( data, type, full, meta ) {
                        //console.log(data)
                        if( data != null){
                            return "<img src='"+data+"' width='30px'/>"
                        }else
                            return "-"
                    } 
                },
                { "data" : "nama_produk" },
                { "data" : "kategori.nama_kategori" },
                { "data" : "harga_beli" },
                { "data" : "harga_jual" },
                { "data" : "stock" },
                { "data" : null, defaultContent: '<button class="btn btn-warning btn-edit btn-sm"><i class="fa fa-pencil"></i> Edit </button> <button class="btn btn-delete btn-danger btn-sm"><i class="fa fa-trash"></i> delete </button>' },
            ]
        });

        $.fn.dropdownListKategori = function(){
            $.ajax({
                url:'<?php echo site_url("cmb/kategori"); ?>',
                dataType:"json",
                type:'GET',
                success:function(res){
                    $('#drowdown_kategori').html('<option value="0">--Pilih Kategori--</option>')
                    res.map((item,index)=>{
                        $('#drowdown_kategori').append('<option value="'+item.id+'">'+item.nama_kategori+'</option>')
                    })
                }
            })
        }

        $(this).dropdownListKategori();
        
        $("#btn_reload").click(function(){
            produk_table.ajax.reload();
        });

        $( "#produkTable" ).on('click','tr button', function() {
            let editBtn = $(this).hasClass('btn-edit')
            let deletBtn = $(this).hasClass('btn-delete')
            let data = produk_table.row($(this).parents('tr') ).data();
            EDIT_DATA = data.id

            if(editBtn){
                $("#btn_edit").show();
                $("#btn_save").hide();

                $.ajax({
                    url:'<?php echo site_url("api/produk"); ?>/'+data.id+"/edit",
                    dataType:"json",
                    type:'GET',
                    success:function(res){
                        $("input[name='nama_produk']").val(res.nama_produk);
                        //kategori
                        $("textarea[name='deskripsi']").val(res.deskripsi);
                        $("input[name='harga_beli']").val(res.harga_beli);
                        $("input[name='harga_jual']").val(res.harga_jual);
                        $("input[name='stock']").val(res.stock);
                        $('#ProdukFormModal').modal('toggle')
                    }
                })
                
            }

            if(deletBtn){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:'<?php echo site_url("api/produk"); ?>/'+data.id+"/delete",
                            dataType:"json",
                            type:'GET',
                            success:function(res){
                                Swal.fire(
                                    'Deleted!',
                                    res.success,
                                    'success'
                                )
                                produk_table.ajax.reload();
                            }
                        });
                        
                    }
                })
            }
        });

        $("#btn_add").click(function(){
            $("#btn_edit").hide();
            $("#btn_save").show();

            $("input[name='nama_produk']").val("");
            $("textarea[name='deskripsi']").val("");
            $("input[name='harga_beli']").val("");
            $("input[name='harga_jual']").val("");
            $("input[name='stock']").val("");

            $('#ProdukFormModal').modal('toggle')
        })

        $("#btn_edit").click(function(){
            $.ajax({
                url:'<?php echo site_url("api/kategori"); ?>/'+EDIT_DATA+"/update",
                dataType:"json",
                data:$("#form_").serialize(),
                type:'POST',
                beforeSend:function(){
                    $("#pesan_holder").html("Loading....")
                },
                success:function(res){
                    Swal.fire('Info',res.message, 'success' )
                    $('#kategoriFormModal').modal('toggle')

                    produk_table.ajax.reload();
                },
            }).done(function(){
                $("#pesan_holder").html("")
            })
        });

        $("#btn_save").click(function(){
            var form = $('#form_kategori')[0];
            var data = new FormData(form);

            $.ajax({
                url:'<?php echo site_url("api/kategori/add"); ?>',
                data:$("#form_produk").serialize(),
                type:'POST',
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend:function(){
                    $("#pesan_holder").html("Loading....")
                },
                success:function(res){
                    Swal.fire('Info',res.pesan, 'success' )
                    $('#ProdukFormModal').modal('toggle')

                    produk_table.ajax.reload();
                },
            }).done(function(){
                $("#pesan_holder").html("")
            })
        });

    });
</script>