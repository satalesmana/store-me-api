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

<div class="modal fade" id="MemberFormModal" tabindex="-1" role="dialog" aria-labelledby="MemberFormModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="memberFormModalLabel">Form Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_member" method="POST" enctype='multipart/form-data'>
            
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" class="form-control" name="nama_member" placeholder="Masukan Nama Member">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>alamat</label>
                <textarea class="form-control" name="alamat"></textarea>
            </div>

            <div class="form-group">
                <label>Photo Profile</label>
                <input type="file" class="form-control" name="foto" placeholder="Pilih gambar">
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

        var member_table = $('#memberTable').DataTable({
            "ajax": "<?php echo site_url('api/member'); ?>",
            "processing": true,
            "serverSide": true,
            "columns":[
                { "data" : "nama_member" },
                { "data" : "email" },
                { "data" : "foto",
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

        $("#btn_reload").click(function(){
            member_table.ajax.reload();
        });

        
        $( "#memberTable" ).on('click','tr button', function() {
            let editBtn = $(this).hasClass('btn-edit')
            let deletBtn = $(this).hasClass('btn-delete')
            let data = member_table.row($(this).parents('tr') ).data();
            EDIT_DATA = data.id

            if(editBtn){
                $("#btn_edit").show();
                $("#btn_save").hide();

                $.ajax({
                    url:'<?php echo site_url("api/member"); ?>/'+data.id+"/edit",
                    dataType:"json",
                    type:'GET',
                    success:function(res){
                        $("input[name='nama_member']").val(res.nama_member);
                        $("input[name='email']").val(res.email);
                        $("input[name='password']").val(res.password);
                        $("textarea[name='alamat']").val(res.alamat);
                        $("input[name='foto']").val(res.foto);
                        $('#MemberFormModal').modal('toggle')
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
                            url:'<?php echo site_url("api/member"); ?>/'+data.id+"/delete",
                            dataType:"json",
                            type:'GET',
                            success:function(res){
                                Swal.fire(
                                    'Deleted!',
                                    res.success,
                                    'success'
                                )
                                member_table.ajax.reload();
                            }
                        });
                        
                    }
                })
            }
        });

        $("#btn_add").click(function(){
            $("#btn_edit").hide();
            $("#btn_save").show();

            $("input[name='nama_member']").val(res.nama_member);
            $("input[name='email']").val(res.email);
            $("input[name='password']").val(res.password);
            $("textarea[name='alamat']").val(res.alamat);
            $("input[name='foto']").val(res.foto);

            $('#MemberFormModal').modal('toggle')
        })

        $("#btn_edit").click(function(){
            var form = $('#form_produk')[0];
            var data = new FormData(form);
            
            $.ajax({
                url:'<?php echo site_url("api/produk"); ?>/'+EDIT_DATA+"/update",
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
                    Swal.fire('Info',res.message, 'success' )
                    $('#kategoriFormModal').modal('toggle')

                    produk_table.ajax.reload();
                },
            }).done(function(){
                $("#pesan_holder").html("")
            })
        });

        $("#btn_save").click(function(){
            var form = $('#form_produk')[0];
            var data = new FormData(form);

            $.ajax({
                url:'<?php echo site_url("api/produk/add"); ?>',
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
    })
</script>