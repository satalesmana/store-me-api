
<table border="1">
    <tr>
        <td>NO</td>
        <td>Kategori</td>
        <td>Deskripsi</td>
    </tr>

    <?php foreach($kategori_list as $key=>$row){ ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $row['nama_kategori']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
        </tr>
    <?php } ?>
</table>

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