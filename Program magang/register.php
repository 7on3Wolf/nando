<?php
// Replace the following lines with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'magang';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    // Hash the password (use a more secure hashing method in a real-world scenario)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (username, nama, gender, password, hp, alamat) VALUES ('$username', '$nama', '$gender', '$hashedPassword', '$hp', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        header('location:login1.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-4">
        <h2>User Registration</h2>
        <form method="post" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" id="gender">
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label for="hp">No.HP</label>
                <input type="text" class="form-control" id="hp" name="hp" placeholder="Enter nomor hp" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter alamat" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
</body>
<style>
    /* Custom styles for the registration form */

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #f8f9fa;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    button {
        display: block;
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

</html>