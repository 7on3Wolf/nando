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

// Tangkap data dari form pemesanan_jasa.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kd_jasa = $_POST["kd_jasa"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];
    $tanggal_pesan = $_POST["tanggal_pesan"];

    // Lakukan proses penyimpanan data pemesanan ke tabel pemesanan (sesuaikan dengan struktur tabel yang Anda buat)
    $sql = "INSERT INTO pemesanan (kd_jasa, nama_pelanggan, alamat, telepon, tanggal_pesan) VALUES ('$kd_jasa', '$nama', '$alamat', '$telepon', '$tanggal_pesan')";

    if ($conn->query($sql) === TRUE) {
        header('location:hasil_pemesan.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Set status pesanan menjadi "Menunggu" untuk pemesanan baru
$status_pesanan = "Menunggu";
$id_pemesanan = $conn->insert_id; // Mendapatkan ID pemesanan terakhir yang di-generate
$sql_update_status = "UPDATE pemesanan SET status_pesanan='$status_pesanan' WHERE id_pemesanan=$id_pemesanan";
$conn->query($sql_update_status);

$conn->close();
