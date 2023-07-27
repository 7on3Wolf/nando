<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Jasa</title>
    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Pemesanan Jasa</h2>
        <?php
        // Cek apakah parameter kd_jasa ada dan tidak kosong
        if (isset($_GET['kd_jasa']) && !empty($_GET['kd_jasa'])) {
            $kd_jasa = $_GET['kd_jasa'];
            echo "<p>Kode Jasa: " . $kd_jasa . "</p>";

            // Anda dapat melakukan proses pemesanan berdasarkan kode jasa ini di bagian ini.
            // Misalnya, menampilkan formulir untuk mengisi data pemesanan atau melakukan proses penyimpanan data pemesanan ke database.
        } else {
            echo "<p>Kode Jasa tidak valid.</p>";
        }
        ?>

        <form action="proses_pemesan.php" method="post">
            <input type="hidden" name="kd_jasa" value="<?php echo $kd_jasa; ?>">
            <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pesan">Tanggal Pesan</label>
                <input type="text" class="form-control" id="tanggal_pesan" name="tanggal_pesan" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="text-center mt-3">
            <a href="home1.php" class="btn btn-secondary">Kembali ke Data Jasa</a>
        </div>
    </div>

    <!-- Link JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script untuk mengisi tanggal saat ini ke input tanggal_pesan
        $(document).ready(function() {
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1; // Bulan dimulai dari 0 (Januari = 0)
            var year = currentDate.getFullYear();
            var formattedDate = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
            $('#tanggal_pesan').val(formattedDate);
        });
    </script>
</body>

</html>