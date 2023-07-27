<?php
// Pastikan koneksi ke database sudah dibuat
// Misalnya menggunakan mysqli atau PDO

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Lakukan validasi data di sini (misalnya, cek kesamaan password)

    // Simpan data ke database
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
    $email = $conn->real_escape_string($email);
    // Hash password sebelum menyimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Buat query untuk menyimpan data ke database
    $sql = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        header('location:login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi ke database
    $conn->close();
}
