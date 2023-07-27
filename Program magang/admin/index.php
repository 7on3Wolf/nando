<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Sertakan link CSS Bootstrap di bawah ini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Sertakan file CSS kustom Anda di bawah ini (opsional) -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Panel</h1>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>

                        <a href="login.php" class="btn btn-primary btn-block">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registrasi</h5>
                        <a href="registrasi.php" class="btn btn-success btn-block">Registrasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sertakan script Bootstrap di bawah ini (opsional jika Anda menggunakan komponen yang memerlukan JavaScript) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    body {
        background-color: #f8f9fa;
    }
</style>

</html>