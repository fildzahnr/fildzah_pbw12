<!-- 
Nama: Fildzah Nur Izzati
NIM: 222413578
Kelas: 2KS4
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan BPS Jambi</title>
    <link rel="stylesheet" href="myCSS.css">
</head>

<body>

    <header>
        <div class="header-left">
            <img src="logobps.png">
            <div class="judulweb">BPS PROVINSI JAMBI</div>
        </div>

        <nav>
            <a href="home.php">Home</a>
            <a href="page09A.php">Daftar Publikasi</a>
            <a href="page09C.php">Tambah Publikasi</a>
            <a class="active" href="galeri.php">Galeri</a>
            <a href="page10B.php">Akun</a>
        </nav>
    </header>

    <div class="welcome">
        <h2>Galeri Kegiatan BPS Jambi</h2>
        <p>Dokumentasi kegiatan BPS Provinsi Jambi</p>
    </div>

    <main>
        <div class="gallery-container">
            <!-- PREVIEW BESAR -->
            <div class="preview-box">
                <img id="gambarUtama" src="kegiatan/kegiatan1.jpg">
                <p id="caption">Galeri BPS Kota Jambi</p>
            </div>

            <!-- THUMBNAIL -->
            <div class="thumbnail">

                <img
                    src="kegiatan/kegiatan1.jpg"
                    data-caption="Rapat di BPS Kota Jambi pada tanggal 1 Januari 2026"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan2.jpg"
                    data-caption="Rapat di Kantor DPRD Jambi pada 2 Maret 2025"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan3.jpg"
                    data-caption="Sambutan kepala BPS Jambi pada peringatan Ulang Tahun kota Jambi"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan4.jpg"
                    data-caption="Rapat di BPS Kerinci pada 26 September 2024"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan5.jpg"
                    data-caption="Rapat memperingati Hari Statistik Nasional Tahun 2020"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan6.jpg"
                    data-caption="Peringatan Isra' Mi'raj di BPS Kota Jambi Tahun 2020"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan7.jpg"
                    data-caption="Rapat persiapan Sensus Ekonomi 2026"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan8.jpg"
                    data-caption="Sambutan Kepala BPS RI pada hari jadi BPS Kota Jambi"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan9.jpg"
                    data-caption="BPS Jambi meraih peringkat 1 BPS Teraktif se-Indonesia"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan10.jpg"
                    data-caption="BPS Kota Jambi siap menghadapi Sensus Ekonomi 2026"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan11.jpg"
                    data-caption="BPS Kota Jambi pada peringatan Idul Fitri 1445 H"
                    onclick="gantiGambar(this)"
                >

                <img
                    src="kegiatan/kegiatan12.jpg"
                    data-caption="Rapat Besar dalam rangka persiapan Sensus Ekonomi 2026"
                    onclick="gantiGambar(this)"
                >

            </div>

        </div>
    </main>

    <!-- footer -->

<footer class="main-footer">
    <div class="footer-container">
        <!-- KONTAK -->
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

        <!-- TENTANG KAMI -->

        <div class="footer-column">

            <h3>
                Tentang Kami
            </h3>


            <a
                href="bps.go.id"
                class="footer-link"
            >
                Profil BPS
            </a>

            <a
                href="https://ppid.bps.go.id/app/konten/1500/Profil-BPS.html"
                class="footer-link"
            >
                PPID
            </a>


            <a
                href="https://ppid.bps.go.id/?mfd=1500"
                class="footer-link"
            >
                Kebijakan Diseminasi
            </a>

        </div>

        <!-- TAUTAN LAINNYA -->

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

    <!-- FOOTER BOTTOM -->
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


    <script src="galeri.js"></script>

    <script>
    function gantiGambar(element) {
        let utama = document.getElementById("gambarUtama");
        let caption = document.getElementById("caption");

        utama.src = element.src;
        caption.innerHTML = element.getAttribute("data-caption");
    }
    </script>
</body>
</html>