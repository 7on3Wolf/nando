<?php include 'header1.php'; ?>
<style>
    h2 {
        padding: 15px;
    }
</style>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Produk Kami</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope=" col">Kode Jasa</th>
                    <th scope="col">Nama Jasa</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
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

                // Ambil data dari tabel jasa
                $sql = "SELECT * FROM jasa";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kd_jasa"] . "</td>";
                        echo "<td>" . $row["nama_jasa"] . "</td>";
                        echo "<td>" . $row["deskripsi"] . "</td>";
                        echo '<td><a href="pemesanan_jasa.php?kd_jasa=' . $row["kd_jasa"] . '" class="btn btn-primary">Pesan</a></td>'; // Tambahkan link dengan parameter kd_jasa
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data jasa.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Link JS Bootstrap -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>