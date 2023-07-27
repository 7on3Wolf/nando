<?php
include '../admin/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Jasa</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Edit Jasa</h1>
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

        // Mendapatkan kode jasa dari parameter URL
        $kd_jasa = $_GET['id'];

        // Query untuk mendapatkan data jasa berdasarkan kode jasa
        $query = "SELECT * FROM jasa WHERE kd_jasa='$kd_jasa'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        ?>
            <form action="../produk/proses_edit_jasa.php" method="POST">
                <input type="hidden" name="kd_jasa" value="<?php echo $row['kd_jasa']; ?>">
                <div class="form-group">
                    <label for="nama_jasa">Nama Jasa:</label>
                    <input type="text" name="nama_jasa" class="form-control" value="<?php echo $row['nama_jasa']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?php echo $row['deskripsi']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="../produk/tabel_produk.php" class="btn btn-secondary">Batal</a>
            </form>
        <?php
        } else {
            echo "Data jasa tidak ditemukan.";
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