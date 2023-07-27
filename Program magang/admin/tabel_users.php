<?php
include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tindakan Admin</title>
    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Daftar Nama Pelanggan</h2><br>
        <table class="table table-striped">
            <thead>
                <tr>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>HP</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
                <!-- Kolom baru untuk menampilkan opsi tindakan -->
                </tr>
            </thead>
            <tbody>
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

                // Ambil data dari tabel pemesanan dan tabel jasa (menggunakan JOIN untuk menggabungkan kedua tabel)
                $sql = "SELECT id, username, nama, gender, gender, hp, alamat FROM users
                        WHERE id"; // Hanya ambil data pemesanan dengan status "Menunggu"
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['hp'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>";
                        echo "<a href='hapus_data.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Belum ada pesanan.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Link JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        padding-left: 200px;
    }
</style>

</html>