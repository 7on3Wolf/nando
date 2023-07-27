<?php
// Koneksi ke database (sesuaikan dengan informasi kredensial Anda)
$host = "localhost";
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$dbname = "magang"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari parameter URL
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id_pemesanan"]) && isset($_GET["tindakan"])) {
        $id_pemesanan = $_GET["id_pemesanan"];
        $tindakan = $_GET["tindakan"];

        // Lakukan proses perubahan status pesanan sesuai dengan tindakan admin
        if ($tindakan === "diterima") {
            $status_pesanan = "Diterima";
        } elseif ($tindakan === "ditolak") {
            $status_pesanan = "Ditolak";
        } else {
            // Jika tindakan tidak valid, arahkan kembali ke halaman tindakan_admin.php
            header("Location: tindakan_admin.php");
            exit;
        }

        // Update status pesanan di database
        $sql_update_status = "UPDATE pemesanan SET status_pesanan='$status_pesanan' WHERE id_pemesanan=$id_pemesanan";
        if ($conn->query($sql_update_status) === TRUE) {
            // Jika berhasil melakukan perubahan status, arahkan kembali ke halaman tindakan_admin.php
            header("Location: tindakan_admin.php");
            exit;
        } else {
            echo "Error: " . $sql_update_status . "<br>" . $conn->error;
        }
    }
}

$conn->close();
