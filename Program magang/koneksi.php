<?php
// Informasi kredensial database
$host = "localhost"; // Ganti dengan nama host database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$dbname = "magang"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa apakah terjadi kesalahan pada koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil, Anda dapat menghapus baris di atas die() untuk melanjutkan eksekusi skrip.

// Setelah koneksi berhasil, Anda dapat melakukan operasi database di sini.

// ...

// Jangan lupa untuk menutup koneksi setelah selesai menggunakan database.
$conn->close();
