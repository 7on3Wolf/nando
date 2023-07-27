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
        <h2 class="text-center">Pesanan</h2><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Jasa</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Pesan</th>
                    <th>Status Pesanan</th>
                    <th>Action</th>
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
                $sql = "SELECT p.id_pemesanan, p.kd_jasa, p.nama_pelanggan, p.alamat, p.telepon, p.tanggal_pesan, p.status_pesanan, j.nama_jasa
                        FROM pemesanan p
                        INNER JOIN jasa j ON p.kd_jasa = j.kd_jasa
                        WHERE p.status_pesanan = 'Menunggu'"; // Hanya ambil data pemesanan dengan status "Menunggu"
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_pemesanan"] . "</td>";
                        echo "<td>" . $row["kd_jasa"] . " - " . $row["nama_jasa"] . "</td>";
                        echo "<td>" . $row["nama_pelanggan"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["telepon"] . "</td>";
                        echo "<td>" . $row["tanggal_pesan"] . "</td>";
                        echo "<td>" . $row["status_pesanan"] . "</td>";
                        echo "<td>";
                        echo "<a href='proses_tindakan.php?id_pemesanan=" . $row["id_pemesanan"] . "&tindakan=diterima'>Terima</a>";
                        echo "<a href='proses_tindakan.php?id_pemesanan=" . $row["id_pemesanan"] . "&tindakan=ditolak'>Tolak</a>";
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
    a {
        display: inline inline-block;
        padding: 5px;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .container {
        padding-left: 200px;
    }
</style>

</html>