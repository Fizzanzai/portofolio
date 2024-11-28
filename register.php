<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql)) {
        header('Location: login.php');
        exit();
    } else {
        echo "Gagal mendaftar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Register</title>
</head>

<body>
    <div class="form-container">
        <h2>Register</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <div>
                <input type="password" id="registerPassword" name="password" placeholder="Password" required>
                <div class="toggle-password">
                    <input type="checkbox" id="showRegisterPassword">
                    <label for="showRegisterPassword">Show Password</label>
                </div>
            </div>
            <button type="submit">Register</button>
        </form>
        <p class="center-text">Sudah punya akun? <a href="login.php">Login</a></p>
    </div>


    <script>
        // Toggle visibility untuk password
        document.getElementById('showRegisterPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('registerPassword');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>