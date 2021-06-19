<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "jenis";
@$field = array('jenis' => $_POST['jenis']);
$redirect = '?menu=jenis';
@$where = "jenisID = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $edit =  $go->edit($con, $where, $tabel);
}

if (isset($_POST['ubah'])) {
    $go->ubah($con, $tabel, $field, $where, $redirect);
}

?>



<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Jenis</label>
        <input type="text" name="jenis" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$edit['jenis'] ?>">
    </div>

    <tr>
        <td></td>
        <td></td>
        <td>
            <?php if (@$_GET['id'] == "") { ?>
                <input class="btn btn-primary mb-5" type="submit" name="simpan" value="simpan">
            <?php } else { ?>
                <input class="btn btn-primary mb-5" type="submit" name="ubah" value="ubah">
            <?php } ?>
        </td>
    </tr>
</form>

<table class="table" id="tb-jenis">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th class="text-center">Aksi</th>
        </tr>    
    </thead>
    <tbody>
    <?php
        $data = $go->tampil($con, $tabel);
        $no = 0;
        if ($data == "") {
            echo "<tr><td colspan='4'>Data Kosong</td></tr>";
        } else {
            foreach ($data as $r) {
                $no++
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $r['jenis'] ?></td>
            <td class="text-center">
                <a href="?menu=jenis&hapus&id=<?php echo $r['jenisID'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a>
                <a href="?menu=jenis&edit&id=<?php echo $r['jenisID'] ?>" class="btn btn-primary">Edit</a>
            </td>
        </tr>
<?php }
        } ?>
    </tbody>
</table>