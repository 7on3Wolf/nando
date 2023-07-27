<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Sertakan link CSS Bootstrap di bawah ini -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
        }

        .navbar {
            margin-bottom: 30px;
            background-color: #071952;
            color: white;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #071952;
            padding-top: 20px;
            color: #fff;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #212529;
            border-radius: 20px;
            padding: 10px;
        }


        .sidebar i {
            font-size: 25px;
            padding: 10px;
        }

        .sidebar img {
            margin-left: 75px;
        }

        .content {
            margin-left: 270px;
            /* Lebar sidebar + margin */
            padding: 20px;
        }

        .container {
            padding-left: 200px;

        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/halaman_admin.php"><i class="fas fa-home" style="padding: 10px; font-size: 24px;"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/tindakan_admin.php"><i class="fas fa-cubes" style="padding: 10px; font-size: 24px;"></i> Data Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        session_start();
        if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
            echo "Welcome, " . $_SESSION['admin_username'];
        } else {
            header("Location: login.php");
            exit();
        }
        ?>
    </nav>

    <div class="sidebar">
        <img src="https://png.pngtree.com/png-vector/20220630/ourmid/pngtree-electrik-logo-template-bold-bolt-png-image_5584137.png" class="img-fluid rounded-circle" width="80px" height="80px"><br>
        <i class="navbar-brand" href="#">Admin Dashboard</i>
        <a href="../admin/tabel_users.php">Data Pelanggan</a>
        <a href="../admin/tindakan_admin.php">Data Pesanan</a>
        <a href="../produk/tabel_produk.php">Daftar Produk</a>
        <a href="../produk/produk.php">Tambah Produk</a>
        <div><br><br><br><br><br><br><br><br><br><br></div>
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>


    <div class="content">
        <!-- Konten tambahan akan ditampilkan di sini -->
    </div>

    <!-- Sertakan script Bootstrap di bawah ini (opsional jika Anda menggunakan komponen yang memerlukan JavaScript) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>