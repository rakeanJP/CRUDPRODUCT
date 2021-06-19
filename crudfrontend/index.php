<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();


$tabel = 'login';
@$username = $_POST['user'];
@$password = base64_encode($_POST['pass']);
$redirect = 'dashboard.php';


if (isset($_POST['login'])) {
    $go->login($con, $tabel, $username, $password, $redirect);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <form method="post">
    <table align="center">
        <div class="form-group  mt-5">
            <label >username</label>
            <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Pastikan password dan username yang dimasukan benar.</small>
        </div>
        <div class="form-group">
            <label >password</label>
            <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="login" value="masuk">Masuk</button>
        </table>
    </form>
    </div>
</body>

</html>