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

<table id="produkTable" class="display" style="width:100%">
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