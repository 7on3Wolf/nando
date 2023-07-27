<?php
include 'header1.php';
?>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Status Pesanan</h2><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Jasa</th>
                    <th>Tanggal Pesan</th>
                    <th>Status Pesanan</th>
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
                $sql = "SELECT p.id_pemesanan, p.kd_jasa, p.tanggal_pesan, p.status_pesanan, j.nama_jasa
                        FROM pemesanan p
                        INNER JOIN jasa j ON p.kd_jasa = j.kd_jasa";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_pemesanan"] . "</td>";
                        echo "<td>" . $row["kd_jasa"] . " - " . $row["nama_jasa"] . "</td>";
                        echo "<td>" . $row["tanggal_pesan"] . "</td>";
                        echo "<td>" . $row["status_pesanan"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data pemesanan.</td></tr>";
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

</html>