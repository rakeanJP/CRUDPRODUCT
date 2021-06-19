<?php

class controller
{
    //function login
    function login($con, $tabel, $username, $password, $redirect)
    {
        session_start();
        $sql = "SELECT * FROM $tabel WHERE username = '$username' and password = '$password' ";
        $jalan = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($jalan);
        if ($cek > 0) {
            $_SESSION['user']=$username;
            echo "<script>alert('Selamat Datang $username');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal Login, cek username dan password anda kembali');document.location.href='index.php'</script>";
        }
    }
    //function simpan
    function simpan($con, $tabel, array $field, $redirect)
    {
        $sql = "INSERT INTO $tabel  SET ";
        foreach($field as $key => $value){
            $sql .= " $key = '$value' ,";
        }
        $sql = rtrim($sql, ',');
        $jalan = mysqli_query($con, $sql);
        if ($jalan){
            echo "<script>alert('Data Tersimpan');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal Tersimpan');document.location.href='$redirect'</script>";
        }
    }

    function tampil($con, $tabel)
    {
        $sql = "SELECT * FROM $tabel";
        $jalan = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($jalan))
            $isi[] = $data;
        return @$isi;
    }

    function hapus($con, $tabel, $where, $redirect)
    {
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if ($jalan) {
            echo "<script>alert('Berhasil dihapus');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal dihapus');document.location.href='$redirect'</script>";
        }
    }

    function edit($con, $where, $tabel)
    {
        $sql = "SELECT * FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $tampung = mysqli_fetch_assoc($jalan);
        return $tampung;
    }

    function ubah($con,$tabel, array $field, $where , $redirect)
    {
        $sql = "UPDATE $tabel SET ";
        foreach ($field as $key => $value) {
            $sql .= " $key = '$value' ,";
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE $where";
        $jalan = mysqli_query($con, $sql);

        if ($jalan) {
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }
    function upload($foto, $tempat)
    {
        $alamat = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($alamat, "$tempat/$namafile");
        return $namafile;
    }
}
