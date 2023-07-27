<?php
include '../admin/header.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Input Jasa</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS tambahan untuk mengatur tampilan form */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            padding-left: 200px;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 30px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    // Kode untuk menyimpan data ke database setelah tombol "Simpan" ditekan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Mengambil data dari form input
        $kd_jasa = $_POST['kd_jasa'];
        $nama_jasa = $_POST['nama_jasa'];
        $deskripsi = $_POST['deskripsi'];

        // Menyimpan data ke database
        $sql = "INSERT INTO jasa (kd_jasa, nama_jasa, deskripsi) VALUES ('$kd_jasa', '$nama_jasa', '$deskripsi')";

        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
            alert("berhasil tersimpan!");
          </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Menutup koneksi database
        mysqli_close($conn);
    }
    ?>

    <div class="container">
        <div class="form-container">
            <h1>Form Input Jasa</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="kd_jasa">Kode Jasa:</label>
                    <input type="text" name="kd_jasa" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama_jasa">Nama Jasa:</label>
                    <input type="text" name="nama_jasa" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Link ke Bootstrap JS dan jQuery (opsional, untuk fitur tertentu) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>