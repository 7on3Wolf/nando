<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi Admin</title>
    <!-- Hubungkan CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Admin Login</h5>
                        <form method="post" action="proses_registrasi.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                            <a href="index.php" class="btn btn-secondary btn-block mt-3">Close</a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hubungkan JS Bootstrap dan jQuery (diperlukan untuk Bootstrap) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    /* styles.css */
    body {
        background-color: #f8f9fa;
    }

    .card {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 4px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

</html>