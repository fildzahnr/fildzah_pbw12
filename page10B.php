<!--
Nama: Fildzah Nur Izzati
NIM: 222413578
Kelas: 2KS4
-->

<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: page10A.php");
    exit();
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun - BPS Provinsi Jambi</title>
    <link rel="stylesheet" href="myCSS.css">
</head>

<body class="account-page">

    <!-- HEADER -->
    <header>
        <div class="header-left">
            <img src="logobps.png" alt="logo">

            <div class="judulweb">
                BPS PROVINSI JAMBI
            </div>
        </div>

        <nav>
            <a href="home.php">
                Home
            </a>

            <a href="page09A.php">
                Daftar Publikasi
            </a>

            <a href="page09C.php">
                Tambah Publikasi
            </a>

            <a href="galeri.php">
                Galeri
            </a>

            <a class="active" href="page10B.php">
                Akun
            </a>
        </nav>
    </header>

    <!-- JUDUL -->
    <div class="account-title">
        <h2>
            INFORMASI AKUN
        </h2>
    </div>

    <!-- PROFIL -->
    <main class="account-main">

        <div class="account-card">

            <div class="account-sidebar">

                <div class="account-avatar">
                    <img src="foto.jpeg" alt="foto fildzah">
                </div>

                <h2>
                    <?php echo htmlspecialchars($username); ?>
                </h2>

                <p class="account-role">
                    Pengguna Website BPS Jambi
                </p>

                <div class="account-status">
                    <span>✓</span>
                    Akun Aktif
                </div>

                <button
                    type="button"
                    class="btn-account-logout"
                    onclick="prosesLogout()"
                >
                    Logout
                </button>

            </div>

            <div class="account-detail">

                <div class="account-detail-header">

                    <h3>
                        Detail Informasi Akun
                    </h3>

                    <p>
                        Informasi pengguna yang sedang login.
                    </p>

                </div>

                <div class="account-info-grid">

                    <!-- NAMA -->
                    <div class="account-info-item">

                        <span class="account-label">
                            Nama Lengkap
                        </span>

                        <span class="account-value">
                            Fildzah Nur Izzati
                        </span>

                    </div>

                    <!-- USERNAME -->
                    <div class="account-info-item">

                        <span class="account-label">
                            Username
                        </span>

                        <span class="account-value">
                            <?php echo htmlspecialchars($username); ?>
                        </span>

                    </div>

                    <!-- EMAIL -->
                    <div class="account-info-item">

                        <span class="account-label">
                            Email
                        </span>

                        <span class="account-value">
                            222413578@stis.ac.id
                        </span>

                    </div>

                    <!-- NO TELP -->
                    <div class="account-info-item">

                        <span class="account-label">
                            Nomor Telepon
                        </span>

                        <span class="account-value">
                            089518185588
                        </span>

                    </div>

                    <!-- STATUS -->
                    <div class="account-info-item">

                        <span class="account-label">
                            Status Akun
                        </span>

                        <span class="account-value account-active">
                            Aktif
                        </span>

                    </div>

                    <!-- AKSES -->
                    <div class="account-info-item">

                        <span class="account-label">
                            Akses
                        </span>

                        <span class="account-value">
                            Administrator
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="main-footer">

        <div class="footer-container">

            <div class="footer-column footer-contact">

                <div class="footer-brand">

                    <img
                        src="logobps.png"
                        alt="Logo BPS"
                    >

                    <span>
                        BADAN PUSAT STATISTIK
                    </span>

                </div>

                <div class="contact-item">

                    <span class="contact-icon">
                        📍
                    </span>

                    <span>
                        Jalan Otto Iskandar Dinata
                        Nomor 64C, Jakarta Timur
                    </span>

                </div>

                <div class="contact-item">

                    <span class="contact-icon">
                        ☎
                    </span>

                    <span>
                        089518185588
                    </span>

                </div>

                <div class="contact-item">

                    <span class="contact-icon">
                        ✉
                    </span>

                    <span>
                        222413578@stis.ac.id
                    </span>

                </div>

                <div class="berakhlak-container">

                    <img
                        src="berakhlak.png"
                        alt="BerAKHLAK"
                    >

                </div>

            </div>

            <div class="footer-column">

                <h3>
                    Tentang Kami
                </h3>

                <a
                    href="https://ppid.bps.go.id/app/konten/1500/Profil-BPS.html"
                    class="footer-link"
                >
                    Profil BPS
                </a>

                <a
                    href="https://ppid.bps.go.id/?mfd=1500"
                    class="footer-link"
                >
                    PPID
                </a>

                <a
                    href="https://ppid.bps.go.id/app/konten/0000/Layanan-BPS.html#pills-3"
                    class="footer-link"
                >
                    Kebijakan Diseminasi
                </a>

            </div>

            <div class="footer-column">

                <h3>
                    Tautan Lainnya
                </h3>

                <a
                    href="https://www.aseanstats.org/"
                    class="footer-link external-link"
                    target="_blank"
                >
                    <span>ASEAN Stats</span>
                    <span>↗</span>
                </a>

                <a
                    href="https://rb.bps.go.id/"
                    class="footer-link external-link"
                    target="_blank"
                >
                    <span>Reformasi Birokrasi</span>
                    <span>↗</span>
                </a>

                <a
                    href="https://www.stis.ac.id/"
                    class="footer-link external-link"
                    target="_blank"
                >
                    <span>Politeknik Statistika STIS</span>
                    <span>↗</span>
                </a>

                <a
                    href="https://lpse.bps.go.id/"
                    class="footer-link external-link"
                    target="_blank"
                >
                    <span>
                        Layanan Pengadaan
                        Secara Elektronik
                    </span>
                    <span>↗</span>
                </a>

                <a
                    href="https://pusdiklat.bps.go.id/"
                    class="footer-link external-link"
                    target="_blank"
                >
                    <span>
                        Pusdiklat BPS
                    </span>

                    <span>
                        ↗
                    </span>
                </a>

            </div>

        </div>

        <div class="footer-bottom">

            <div class="copyright">

                <div>
                    Copyright © 2026
                    Politeknik Statistika STIS
                </div>

                <div>
                    Created by Fildzah Nur Izzati
                </div>

            </div>

        </div>

    </footer>

    <!-- LOGOUT -->
    <script>
        function prosesLogout() {

            let yakin = confirm(
                "Apakah kamu yakin ingin logout?"
            );

            if (yakin) {

                window.location.href = "page10A.php";

            }
        }
    </script>

</body>
</html>