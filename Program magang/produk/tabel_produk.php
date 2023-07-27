<?php
include '../admin/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tabel Jasa</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Tabel Jasa</h1>
        <?php
        // Konfigurasi koneksi database
        $host = "localhost"; // Ganti dengan host database Anda
        $username = "root"; // Ganti dengan username database Anda
        $password = ""; // Ganti dengan password database Anda
        $database = "magang"; // Ganti dengan nama database Anda

        // Membuat koneksi ke database
        $conn = mysqli_connect($host, $username, $password, $database);

        // Cek koneksi
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Proses hapus data jasa
        if (isset($_GET['hapus'])) {
            $kd_jasa_hapus = $_GET['hapus'];
            $sql_hapus = "DELETE FROM jasa WHERE kd_jasa='$kd_jasa_hapus'";
            if (mysqli_query($conn, $sql_hapus)) {
                echo '<script type="text/javascript">
                alert("berhasil dihapus!");
              </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Query untuk mengambil data jasa dari tabel
        $query = "SELECT * FROM jasa";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Kode Jasa</th>';
            echo '<th>Nama Jasa</th>';
            echo '<th>Deskripsi</th>';
            echo '<th>Aksi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Menampilkan data jasa dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['kd_jasa'] . '</td>';
                echo '<td>' . $row['nama_jasa'] . '</td>';
                echo '<td>' . $row['deskripsi'] . '</td>';
                echo '<td>';
                echo '<a href="edit_jasa.php?id=' . $row['kd_jasa'] . '" class="btn btn-primary btn-sm mr-1">Edit</a>';
                echo '<a href="?hapus=' . $row['kd_jasa'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "Tidak ada jasa.";
        }

        // Menutup koneksi database
        mysqli_close($conn);
        ?>
    </div>

    <!-- Link ke Bootstrap JS dan jQuery (opsional, untuk fitur tertentu) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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