<?php
session_start();
include "../lib/koneksi.php";

// dari <input name="username" ...
$username = $_POST['username'];
$password = $_POST['password'];

// ... periksa username

$query = "SELECT * FROM pelanggan WHERE Username = '$username'"; //where Username sesuai database
$hasil = mysqli_query($koneksi, $query);
$data_user = mysqli_fetch_assoc($hasil);

if ($data_user != null) {

    // ... jika hasil tidak null berarti user ketemu,
    // ... lanjut periksa password

    if ($password == $data_user['Password']) { //Password disini sesuai database
        $_SESSION['user'] = $data_user;
        header('Location: index.php');
    } else {
        header('Location: login_user.php');
    }
} else {
    header('Location: error.php');
}
