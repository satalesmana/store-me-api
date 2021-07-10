<h1 class="mt-4">Upload Photo</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <?php echo anchor('/',"Dashboard"); ?>
    </li>
    <li class="breadcrumb-item active">Photo</li>
</ol>

<div class="mb-5">
    <button class="btn btn-info" id="btn_reload">Reload</button>
    <button type="button" class="btn btn-primary" id="btn_add">Add New Item </button>
</div>

<table id="produkTable" class="display" style="width:100%">
    <thead class="bg">
        <tr>
            <th>Images</th>
        </tr>
    </thead>
</table>

<div class="modal fade" id="ProdukFormModal" tabindex="-1" role="dialog" aria-labelledby="ProdukFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriFormModalLabel">Form Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

            <div class="modal-body">
                <form id="my-awesome-dropzone" method="POST" enctype='multipart/form-data' action="/file-upload" class="dropzone">
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="photo" placeholder="Pilih gambar">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div style="float: right;" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var myDropzone = new Dropzone("#my-awesome-dropzone", { url: "/public/uploads"});
    $("#btn_add").click(function(){
        $("#btn_save").show();

        $('#ProdukFormModal').modal('toggle')
    })
</script>
