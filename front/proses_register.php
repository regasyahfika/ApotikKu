
<?php
session_start();
// ... jika belum login, alihkan ke halaman login
include '../lib/koneksi.php';

$id_pelanggan= $_POST['id_pelanggan'];
$username= $_POST['username'];
$password= $_POST['password']; //id katgor
$alamat= $_POST['alamat'];
$email= $_POST['email'];
$telepon= $_POST['telepon'];


//urutan di sini hrs urut sesuai database
$query = "INSERT INTO pelanggan (Id_Pelanggan,Username,Password, Alamat, Email,Telepon)  
    VALUES ('$id_pelanggan','$username','$password','$alamat','$email','$telepon')";
$hasil = mysqli_query($koneksi, $query);

if ($hasil == true) {
    echo "<script>alert('Anda telah daftar dari halaman pelanggan'); window.location = 'login_user.php'</script>";
} else {
    header('Location: error.php');
}
?>