<?php
// Proses penyimpanan data setelah tombol "Simpan" ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Konfigurasi koneksi database
    $host = "localhost"; // Ganti dengan host database Anda
    $username = "root"; // Ganti dengan username database Anda
    $password = ""; // Ganti dengan password database Anda
    $database = "magang"; // Ganti dengan nama database Anda

    // Membuat koneksi ke database
    $conn = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $kd_jasa = $_POST['kd_jasa'];
    $nama_jasa = $_POST['nama_jasa'];
    $deskripsi = $_POST['deskripsi'];

    $sql_update = "UPDATE jasa SET nama_jasa='$nama_jasa', deskripsi='$deskripsi' WHERE kd_jasa='$kd_jasa'";

    if (mysqli_query($conn, $sql_update)) {
        header("Location: ../produk/tabel_produk.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Menutup koneksi database
    mysqli_close($conn);
}
