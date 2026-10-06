<?php
/*
Nama: Fildzah Nur Izzati
NIM: 222413578
Kelas: 2KS4
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Publikasi BPS Jambi</title>

    <link
        rel="stylesheet"
        type="text/css"
        href="myCSS.css"
    >

    <script src="validasiForm.js"></script>
</head>

<body class="edit-page">

    <!-- HEADER -->

    <header>

        <div class="header-left">

            <img
                src="logobps.png"
                alt="Logo Web"
            >

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

            <a
                class="active"
                href="page09C.php"
            >
                Tambah Publikasi
            </a>

            <a href="galeri.php">
                Galeri
            </a>

            <a href="page10B.php">
                Akun
            </a>

        </nav>

    </header>



    <!-- TAMBAH PUBLIKASI -->

    <main class="edit-section">

        <div class="edit-card">

            <!-- JUDUL-->
            <div class="edit-title">

                <h2>
                    Tambah Publikasi BPS Jambi
                </h2>

                <p>
                    Silakan isi informasi publikasi yang ingin ditambahkan.
                </p>

            </div>

            <!-- PESAN EROR-->

            <div
                id="pesanError"
                style="display:none; color:red;"
            ></div>

            <!-- form -->

            <form
                class="edit-form"
                action="page09C_action.php"
                method="post"
                enctype="multipart/form-data"
                onsubmit="return validate06C()"
            >

                <!-- NOMOR -->

                <label for="nomor">
                    Nomor Publikasi
                </label>

                <input
                    type="text"
                    name="nomor"
                    id="nomor"
                    placeholder="Masukkan nomor publikasi"
                    required
                >

                <!-- JUDUL -->
                <label for="judul">
                    Judul Publikasi
                </label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    placeholder="Masukkan judul publikasi"
                    required
                >

                <!-- TANGGAL -->

                <label for="tanggal_rilis">
                    Tanggal Rilis
                </label>

                <input
                    type="date"
                    name="tanggal_rilis"
                    id="tanggal_rilis"
                    required
                >

                <!-- SAMPUL -->

                <label for="sampul">
                    Sampul Publikasi
                </label>

                <input
                    type="file"
                    name="sampul"
                    id="sampul"
                    accept="image/*"
                    required
                >

                <!-- LINK PUBLIKASI -->

                <label for="isi_publikasi">
                    Link Publikasi
                </label>

                <input
                    type="url"
                    name="isi_publikasi"
                    id="isi_publikasi"
                    placeholder="Masukkan link publikasi"
                    required
                >

                <!-- BUTTON -->

                <div class="edit-buttons">

                    <a
                        href="page09A.php"
                        class="btn-batal"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn-simpan"
                    >
                        Tambah Publikasi
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- FOOTER-->
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
                    <span>Pusdiklat BPS</span>
                    <span>↗</span>
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
</body>
</html>