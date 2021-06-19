<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tanggal = date('Y-m-d');
$tabel = "product";
$redirect = '?menu=product';
@$where = "productID = '$_GET[id]'";
@$tempat = "foto";


if (isset($_POST['simpan'])) {
    $foto = $_FILES['foto'];
    $upload = $go->upload($foto, $tempat);
    @$field = array(
        'nama' => $_POST['product'],
        'jenisID' => $_POST['jenis'],
        'foto' => $upload,
        'tglInput' => $tanggal,
        'ket' => $_POST['ket']
    );
    $go->simpan($con, $tabel, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $sql = "SELECT product .*, jenis FROM product 
    INNER JOIN jenis on product.jenisID = jenis.jenisID
    WHERE $where";
    $jalan = mysqli_query($con, $sql);
    $edit = mysqli_fetch_assoc($jalan);
}


if (isset($_POST['ubah'])) {
    $foto = $_FILES['foto'];
    $upload = $go->upload($foto, $tempat);
    if (empty($_FILES['foto']['name'])) {
        @$field = array(
            'nama' => $_POST['product'],
            'jenisID' => $_POST['jenis'],
            'tglinput' => $tanggal,
            'ket' => $_POST['ket']
        );
        $go->ubah($con, $tabel, $field, $where, $redirect);
    } else {
        @$field = array(
            'nama' => $_POST['product'],
            'jenisID' => $_POST['jenis'],
            'foto' => $upload,
            'tglinput' => $tanggal,
            'ket' => $_POST['ket']
        );
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }
}

?>




<div class="container">
    
    <form method="post" enctype="multipart/form-data">
        <table align="center">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Nama Produk</label>
                    <input type="text" name="product" value="<?php echo @$edit['nama'] ?>" class="form-control" id="validationCustom01" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04">Jenis</label>
                    <select name="jenis" class="custom-select" id="validationCustom04" required>
                        <option value="<?php echo $edit['jenisID'] ?>"><?php echo @$edit['jenis'] ?></option>
                        <?php
                        $jenis = $go->tampil($con, "jenis");
                        foreach ($jenis as $r) {
                        ?>
                            <option value="<?php echo $r['jenisID'] ?>"><?php echo $r['jenis'] ?></option>
                        <?php } ?>
                    </select>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Keterangan</label>
                    <input type="text" name="ket" class="form-control" id="validationCustom03" value="<?php echo @$edit['ket'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Foto</label>
                    <br>
                    <input type="file" name="foto">
                </div>

            </div>                       
                    <?php if (@$_GET['id'] == "") { ?>
                        <input type="submit" class="btn btn-primary mb-5" name="simpan" value="simpan">
                    <?php } else { ?>
                        <input type="submit" class="btn btn-primary mb-5" name="ubah" value="ubah">
                    <?php } ?>         
        </table>
    </form>





    <table class="table" align="center" id="tb-product">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Jenis</th>
                <th>Foto</th>
                <th>Tanggal Input</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = "SELECT product .*, jenis FROM product
        INNER JOIN jenis on product.jenisID = jenis.jenisID";
            $jalan = mysqli_query($con, $sql);
            while ($r = mysqli_fetch_assoc($jalan)) {
                $no++
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['jenis'] ?></td>
                    <td><img src="foto/<?php echo $r['foto'] ?>" width="50" height="50"></td>
                    <td><?php echo $r['tglinput'] ?></td>
                    <td><?php echo $r['ket'] ?></td>
                    <td>
                        <a href="?menu=product&hapus&id=<?php echo $r['productID'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                        <a href="?menu=product&edit&id=<?php echo $r['productID'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>