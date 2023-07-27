<?php
// Koneksi ke database (ganti sesuai dengan detail koneksi Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "magang";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data dosen berdasarkan NIDN
    $sql_delete = "DELETE FROM users WHERE id = '$id'";

    if ($conn->query($sql_delete) === TRUE) {
        // Redirect kembali ke halaman index setelah berhasil menghapus data
        header("Location: tabel_users.php");
        exit();
    } else {
        echo "Error saat menghapus data: " . $conn->error;
    }
} else {
    echo " Bacoooot!!!.";
}

$conn->close();
