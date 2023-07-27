<?php
// Pastikan koneksi ke database sudah dibuat
// Misalnya menggunakan mysqli atau PDO

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi data di sini (misalnya, cek apakah username dan password kosong)

    // Cek username dan password di database
    $servername = "localhost"; // Ganti sesuai dengan host server Anda
    $username_db = "root"; // Ganti sesuai dengan username database Anda
    $password_db = ""; // Ganti sesuai dengan password database Anda
    $database = "magang"; // Ganti sesuai dengan nama database Anda

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Escape data untuk menghindari SQL Injection
    $username = $conn->real_escape_string($username);

    // Buat query untuk mendapatkan data admin berdasarkan username
    $sql = "SELECT id, username, password FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashedPassword)) {
            // Password cocok, masukkan ke sesi dan arahkan ke halaman admin
            session_start();
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];

            header("Location: halaman_admin.php");
            exit();
        } else {
            echo "Password salah";
        }
    } else {
        echo "Username tidak ditemukan";
    }

    // Tutup koneksi ke database
    $conn->close();
}
