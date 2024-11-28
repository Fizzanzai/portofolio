<?php
require 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Login</title>
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <div>
                <input type="password" id="loginPassword" name="password" placeholder="Password" required>
                <div class="toggle-password">   
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword">Show Password</label>
                </div>

            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <p class="center-text">Belum punya akun? <a href="register.php">Register</a></p>
    </div>

    <script>
        // Toggle visibility untuk password
        document.getElementById('showLoginPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('loginPassword');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>