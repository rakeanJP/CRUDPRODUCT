<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "login";
@$password = base64_encode($_POST['pass']);

@$field = array('username' => $_POST['user'], 'password' => $password);
$redirect = "?menu=user";
@$where = "id = $_GET[id]";

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




    <div class="container">

        <form method="post">

            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" name="user" value="<?php echo @$edit['username'] ?>" required>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="text" name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" required>
                <small id="emailHelp" class="form-text text-muted">*Ingat Password dengan benar</small>
            </div>
            <tr>
                <td></td>
                <td></td>
                <?php if (@$_GET['id'] == "") { ?>
                    <td><input class="btn btn-primary mb-5" type="submit" name="simpan" value="Simpan"></td>
                <?php } else { ?>
                    <td><input class="btn btn-primary mb-5" type="submit" name="ubah" value="Ubah"></td>
                <?php } ?>
            </tr>
        </form>


    </div>
    <table class="table" id="tb-user">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>

        </thead>

        <tbody>
            <?php
            $data = $go->tampil($con, $tabel);
            $no = 0;
            if ($data == "") {
                echo "<tr><td colspan ='5'>Data Kosong </td></tr>";
            } else {

                foreach ($data as $r) {
                    $no++
            ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $r['username'] ?></td>
                        <td><?php echo $r['password'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="?menu=user&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                            <a class="btn btn-primary" href="?menu=user&edit&id=<?php echo $r['id'] ?>">Edit</a>
                        </td>

                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
