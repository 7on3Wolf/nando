<?php
// Mulai sesi
session_start();

// Koneksi ke database (ganti sesuai dengan konfigurasi database Anda)
$host = 'localhost';
$username_db = 'root';
$password_db = '';
$database = 'magang';

$conn = mysqli_connect($host, $username_db, $password_db, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari data pengguna berdasarkan username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Jika password benar, simpan username ke dalam sesi
            $_SESSION['username'] = $row['username'];
            header('Location: home1.php'); // Ganti dengan halaman setelah login berhasil
        } else {
            echo "<script>alert('Password Salah');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan');</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">User Login</h2>
        <form method="post" action="login1.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <?php
        if (isset($error_message)) {
            echo '<p class="text-danger mt-3">' . $error_message . '</p>';
        }
        ?>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    /* Custom styles for the login page */

    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    button {
        display: block;
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

</html>