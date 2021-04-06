
<h1 class="mt-4">Master Kategori Produk</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <?php echo anchor('/',"Dashboard"); ?>
    </li>
    <li class="breadcrumb-item active">Kategori</li>
</ol>

<table id="produkTable" class="display" style="width:100%">
    <thead class="bg">
        <tr>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Acttion</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        var produk_table = $('#produkTable').DataTable({
            "ajax": "<?php echo site_url('api/kategori'); ?>",
            "columns":[
                { "data" : "nama_kategori" },
                { "data" : "deskripsi" },
                { "data" : null, defaultContent: '<button class="btn btn-warning btn-edit btn-sm"><i class="fa fa-pencil"></i> Edit </button> <button class="btn btn-delete btn-danger btn-sm"><i class="fa fa-trash"></i> delete </button>' },
            ]
        });

        $( "#produkTable" ).on('click','tr button', function() {
            let editBtn = $(this).hasClass('btn-edit')
            let deletBtn = $(this).hasClass('btn-delete')

            if(editBtn){
                alert("ini action on edit")
            }

            if(deletBtn){
                alert("ini action on delete")
            }
        });

    });
</script>


<!-- 
<hr>
<form action="<?php echo site_url('kategori/add'); ?>" method="POST">
    <table>
        <tr>
            <td>Nama Kategori</td>
            <td>
                <input name="nama_kategori">
            </td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>
                <textarea name="deskripsi"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Simpan">
            </td>
        </tr>
    </table>

</form>

 -->