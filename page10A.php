<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BPS Provinsi Jambi</title>
    <link rel="stylesheet" type="text/css" href="./myCSS.css">
</head>

<body class="login-page">

<header class="main-header">
    <div class="header-left">
        <img src="logobps.png" alt="Logo BPS">
        <div class="judulweb">BPS PROVINSI JAMBI</div>
    </div>
</header>

<main class="login-section">
    <div class="login-card">
        <div class="login-logo">
            <img src="logobpsbg.jpg" alt="Logo BPS">
        </div>

        <h2>Login</h2>

        <p class="login-description">
            Masuk untuk mengakses website publikasi BPS Provinsi Jambi
        </p>

        <?php if (isset($_GET["error"])): ?>
            <div class="login-warning">
                <span class="warning-icon">!</span>
                <span><?php echo htmlspecialchars($_GET["error"]); ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="page10A_action.php" class="login-form">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" value="<?php echo htmlspecialchars($_GET["username"] ?? ""); ?>" autocomplete="username" required>

            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required>
                <button type="button" class="toggle-password" onclick="togglePassword('password', this)" aria-label="Tampilkan password">
                    <img src="matatutup.png" alt="Tampilkan password" class="password-icon">
                </button>
            </div>

            <button type="submit" class="login-button">Login</button>

            <div class="register-link">
                Belum punya akun?
                <a href="register.php">Daftar sekarang</a>
            </div>
        </form>
    </div>
</main>

<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-column footer-contact">
            <div class="footer-brand">
                <img src="logobps.png" alt="Logo BPS">
                <span>BADAN PUSAT STATISTIK</span>
            </div>

            <div class="contact-item">
                <span class="contact-icon">📍</span>
                <span>Jalan Otto Iskandar Dinata Nomor 64C, Jakarta Timur</span>
            </div>

            <div class="contact-item">
                <span class="contact-icon">☎</span>
                <span>089518185588</span>
            </div>

            <div class="contact-item">
                <span class="contact-icon">✉</span>
                <span>222413578@stis.ac.id</span>
            </div>

            <div class="berakhlak-container">
                <img src="berakhlak.png" alt="BerAKHLAK">
            </div>
        </div>

        <div class="footer-column">
            <h3>Tentang Kami</h3>
            <a href="https://ppid.bps.go.id/app/konten/1500/Profil-BPS.html" class="footer-link">Profil BPS</a>
            <a href="https://ppid.bps.go.id/?mfd=1500" class="footer-link">PPID</a>
            <a href="https://ppid.bps.go.id/app/konten/0000/Layanan-BPS.html#pills-3" class="footer-link">Kebijakan Diseminasi</a>
        </div>

        <div class="footer-column">
            <h3>Tautan Lainnya</h3>
            <a href="https://www.aseanstats.org/" class="footer-link external-link" target="_blank">
                <span>ASEAN Stats</span><span>↗</span>
            </a>
            <a href="https://rb.bps.go.id/" class="footer-link external-link" target="_blank">
                <span>Reformasi Birokrasi</span><span>↗</span>
            </a>
            <a href="https://www.stis.ac.id/" class="footer-link external-link" target="_blank">
                <span>Politeknik Statistika STIS</span><span>↗</span>
            </a>
            <a href="https://lpse.bps.go.id/" class="footer-link external-link" target="_blank">
                <span>Layanan Pengadaan Secara Elektronik</span><span>↗</span>
            </a>
            <a href="https://pusdiklat.bps.go.id/" class="footer-link external-link" target="_blank">
                <span>Pusdiklat BPS</span><span>↗</span>
            </a>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="copyright">
            <div>Copyright © 2026 Politeknik Statistika STIS</div>
            <div>Created by Fildzah Nur Izzati</div>
        </div>
    </div>
</footer>

<script>
function togglePassword(inputId, button) {
    const passwordInput = document.getElementById(inputId);
    const icon = button.querySelector("img");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.src = "matabuka.png";
        icon.alt = "Sembunyikan password";
    } else {
        passwordInput.type = "password";
        icon.src = "matatutup.png";
        icon.alt = "Tampilkan password";
    }
}
</script>

</body>
</html>