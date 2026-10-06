<?php
include 'dbconn.php';

// CEK NOMOR PUBLIKASI
if (!isset($_GET['nomor'])) {
    header("Location: page09A.php");
    exit();

}

$nomor = $_GET['nomor'];

// AMBIL DATA PUBLIKASI DARI DATABASE

try {
    $sql = "
        SELECT *
        FROM publikasi
        WHERE nomor = :nomor
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nomor' => $nomor
    ]);

    $data = $stmt->fetch();

    // Jika data tidak ditemukan
    if (!$data) {

        echo "
        <script>
            alert('Data publikasi tidak ditemukan!');
            window.location.href = 'page09A.php';
        </script>
        ";

        exit();

    }

} catch (PDOException $e) {

    echo "
    <script>
        alert('Terjadi kesalahan saat mengambil data!');
        window.location.href = 'page09A.php';
    </script>
    ";

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Ubah Publikasi BPS Jambi</title>

    <!-- CSS UTAMA -->
    <link
        rel="stylesheet"
        type="text/css"
        href="myCSS.css"
    >

</head>

<!-- BODY -->

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

        <a
            class="active"
            href="page09A.php"
        >
            Daftar Publikasi
        </a>

        <a href="page09C.php">
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

<!-- EDIT -->

<main class="edit-section">

    <div class="edit-card">
        <div class="edit-title">

            <h2>
                Ubah Publikasi BPS Jambi
            </h2>

            <p>
                Silakan ubah informasi publikasi yang ingin diperbarui.
            </p>

        </div>

        <form
            class="edit-form"
            action="page09E_action.php"
            method="POST"
            enctype="multipart/form-data"
        >

            <label for="nomor">
                Nomor Publikasi
            </label>

            <input
                type="text"
                id="nomor"
                name="nomor"
                value="<?php
                    echo htmlspecialchars(
                        $data['nomor']
                    );
                ?>"
                readonly
            >

            <label for="judul">
                Judul Publikasi
            </label>

            <input
                type="text"
                id="judul"
                name="judul"
                value="<?php
                    echo htmlspecialchars(
                        $data['judul']
                    );
                ?>"
                required
            >

            <label for="tanggal_rilis">
                Tanggal Rilis
            </label>

            <input
                type="date"
                id="tanggal_rilis"
                name="tanggal_rilis"
                value="<?php
                    echo htmlspecialchars(
                        $data['tanggal_rilis']
                    );
                ?>"
                required
            >


            <label>
                Sampul Saat Ini
            </label>

            <div class="current-cover">

                <img
                    src="<?php
                        echo htmlspecialchars(
                            $data['sampul']
                        );
                    ?>"
                    alt="Sampul Publikasi"
                >

                <div class="cover-note">
                    Sampul saat ini akan tetap digunakan
                    jika kamu tidak memilih sampul baru.
                </div>

            </div>

            <input
                type="hidden"
                name="sampul_lama"
                value="<?php
                    echo htmlspecialchars(
                        $data['sampul']
                    );
                ?>"
            >

            <label for="sampul_baru">
                Ganti Sampul
            </label>

            <input
                type="file"
                id="sampul_baru"
                name="sampul_baru"
                accept="image/*"
            >

            <label for="isi_publikasi">
                Link Publikasi
            </label>

            <input
                type="url"
                id="isi_publikasi"
                name="isi_publikasi"
                value="<?php
                    echo htmlspecialchars(
                        $data['isi_publikasi']
                    );
                ?>"
                required
            >

            <div class="edit-buttons">

                <!-- BATAL -->

                <a
                    href="page09A.php"
                    class="btn-batal"
                >
                    Batal
                </a>

                <!-- SIMPAN -->

                <button
                    type="submit"
                    class="btn-simpan"
                >
                    Simpan Perubahan
                </button>

            </div>
        </form>
    </div>
</main>

<!--FOOTER -->

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

                <span>
                    ASEAN Stats
                </span>

                <span>
                    ↗
                </span>

            </a>


            <a
                href="https://rb.bps.go.id/"
                class="footer-link external-link"
                target="_blank"
            >

                <span>
                    Reformasi Birokrasi
                </span>

                <span>
                    ↗
                </span>

            </a>


            <a
                href="https://www.stis.ac.id/"
                class="footer-link external-link"
                target="_blank"
            >

                <span>
                    Politeknik Statistika STIS
                </span>

                <span>
                    ↗
                </span>

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

                <span>
                    ↗
                </span>

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
</body>
</html>