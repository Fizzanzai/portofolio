<?php
// Proses form jika ada input
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact_submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql)) {
        $success_message = "Pesan berhasil dikirim!";
    } else {
        $error_message = "Gagal mengirim pesan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Portofolio</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <span class="navbar-title">Rafi Altaf Rivara</span>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#skills">My Skills</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>


    <section id="intro">
        <div class="intro-content">
            <div class="intro-text">
                <p>Hello World, I'm</p>
                <h1>Rafi Altaf Rivara</h1>
                <div class="typing-animation-container">
                    <span class="typing-animation" id="typingText">Teks Pertama</span>
                </div>
                <p>Welcome to My personal website. 👋</p>
            </div>
            <div class="intro-image">
                <img src="rafi.jpg" alt="Rafi Altaf Rivara" class="rounded-image">
            </div>
        </div>
    </section>





    <!-- Konten lainnya -->
    <section id="about">
        <div class="about-content">
            <div class="about-image">
                <img src="rafi.jpg" alt="Rafi Altaf Rivara" class="rounded-about-image">
            </div>
            <div class="about-text">
                <h2>About Me</h2>
                <p>Hi everyone! My name is Rafi Altaf Rivara. I’m a web developer from Bogor, West Java.
                    I have 1 year of experience in back-end web development. I really enjoy what I do right now,
                    in my opinion, creating programs is not just a job, but also an art that has aesthetic value.</p>
                <p>My job is to build your website to be functional and user-friendly yet still attractive.
                    In addition, I provide a personal touch to your product and ensure that the website catches
                    attention and is easy to use. My goal is to convey your message and identity in the most creative way.
                    If you are interested in hiring me, please contact the listed contact.</p>
            </div>
        </div>
    </section>


    <section id="skills">
        <h1>My Skills</h1>
        <p>Berbagai keterampilan saya.</p>
        <div class="skills-container">
            <div class="skill-card">
                <img src="img/HTML.png" alt="HTML Icon">
                <p>HTML</p>
            </div>
            <div class="skill-card">
                <img src="img/CSS.png" alt="CSS Icon">
                <p>CSS</p>
            </div>
            <div class="skill-card">
                <img src="img/PHP.png" alt="PHP Icon">
                <p>PHP</p>
            </div>
            <div class="skill-card">
                <img src="img/JS.png" alt="JavaScript Icon">
                <p>JavaScript</p>
            </div>
        </div>
        <!-- Section Sosial Media -->
        <section id="social-media">
            <h2>My Sosial Media</h2>
            <div class="social-icons">
                <a href="https://wa.me/+6282299606685" target="_blank" class="social-circle facebook">
                    <img src="img/whatsappp.png" alt="Facebook">
                </a>
                <a href="https://www.tiktok.com/@rafialtafrivara" target="_blank" class="social-circle twitter">
                    <img src="img/tiktokk.png" alt="Twitter">
                </a>
                <a href="https://www.instagram.com/rafialtafrivara_" target="_blank" class="social-circle instagram">
                    <img src="img/instagramm.png" alt="Instagram">
                </a>
            </div>
        </section>
    </section>




    <!-- Form Kontak -->
    <section id="contact">
        <div class="contact-header">
            <h2>Contact</h2> <!-- Teks 'Contact' di atas form -->
        </div>
        <form method="post" class="contact-form">
            <input type="text" name="name" placeholder="Nama Anda" required>
            <input type="email" name="email" placeholder="Email Anda" required>
            <textarea name="message" placeholder="Pesan Anda" rows="5" required></textarea>
            <button type="submit" name="contact_submit">Kirim</button>
        </form>
        <?php
        if (isset($success_message)) {
            echo "<p class='success'>$success_message</p>";
        } elseif (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
    </section>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Portofolio Saya</p>
    </footer>

    <script>
        document.querySelectorAll('nav ul li a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                // Hilangkan class aktif dari semua item navbar
                document.querySelectorAll('nav ul li a').forEach(item => item.classList.remove('active'));

                // Tambahkan class aktif ke tombol yang diklik
                this.classList.add('active');
            });
        });


        const texts = [
            "Selamat datang di website kami!",
            "Temukan informasi terbaru di sini.",
            "Kami siap membantu Anda 24/7!"
        ];
        let textIndex = 0;
        const typingElement = document.getElementById("typingText");

        // Fungsi untuk menghapus animasi ketik
        function resetTypingAnimation() {
            typingElement.style.animation = 'none'; // Hapus animasi typing
            void typingElement.offsetWidth; // Force reflow agar animasi di-reset
            typingElement.style.animation = ''; // Tambahkan kembali animasi
        }

        setInterval(() => {
            resetTypingAnimation(); // Reset animasi sebelum mengganti teks
            typingElement.textContent = texts[textIndex];
            textIndex = (textIndex + 1) % texts.length; // Mengulang teks
        }, 4000); // Ganti teks setiap 4 detik
    </script>

</body>

</html>