<?php
include 'header.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Utama</title>
    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            padding-left: 200px;
        }

        .card {
            display: inline-block;
            width: 200px;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
            margin: 10px;
        }

        .card a {
            text-decoration: none;
            color: #333;
        }

        .card a:hover {
            color: #0066cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-deck mt-4">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-clipboard-list fa-3x mb-3"></i>
                    <h3 class="card-title">Pesanan</h3>
                    <a href="tindakan_admin.php" class="btn btn-primary">Buka Halaman</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h3 class="card-title">Pelanggan</h3>
                    <a href="pelanggan.php" class="btn btn-primary">Buka Halaman</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <i class="fas fa-plus-circle fa-3x mb-3"></i>
                    <h3 class="card-title">Tambah Produk</h3>
                    <a href="../produk/produk.php" class="btn btn-primary">Buka Halaman</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>