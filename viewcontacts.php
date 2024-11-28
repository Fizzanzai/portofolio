    <?php
    // Koneksi ke database
    require 'db.php';

    // Ambil data dari tabel contacts
    $sql = "SELECT * FROM contacts ORDER BY created_at DESC";
    $result = $conn->query($sql);
    ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kontak</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <nav>
        <span class="navbar-title">Portofolio</span>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#skills">My Skills</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <h1>Daftar Kontak</h1>
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . nl2br(htmlspecialchars($row['message'])) . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada pesan.</td></tr>";
            }
            ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Portofolio Saya</p>
    </footer>
</body>
</html>

