<!-- 
Nama: Fildzah Nur Izzati
NIM: 222413578
Kelas: 2KS4
-->

<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

include 'api_bps.php';
include 'api_indikator.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home BPS Jambi</title>
    <link rel="stylesheet" href="myCSS.css">
</head>

<body>
    <header>
        <div class="header-left">
            <img src="logobps.png">
            <div class="judulweb">BPS PROVINSI JAMBI</div>
        </div>

        <nav>
            <a class="active" href="home.php">Home</a>
            <a href="page09A.php">Daftar Publikasi</a>
            <a href="page09C.php">Tambah Publikasi</a>
            <a href="galeri.php">Galeri</a>
            <a href="page10B.php">Akun</a>
        </nav>
    </header>

    <div class="welcome">
        <h2>Lembaga yang Independen, Tepercaya, dan Berperan Aktif</h2>
        <h2>dalam Mendukung Perumusan Kebijakan Berbasis Data</h2>
        <h2>Bersama Indonesia Maju Menuju Indonesia Emas 2045</h2>
        <p>Layanan Permintaan Data BPS Provinsi Jambi dapat diakses melalui chat call center whatsapp 0895 1818 5588 dan Saran dan pengaduan dapat disampaikan melalui email 222413578@stis.ac.id Terima kasih. </p>
    </div>

    <main>

        <!-- INDIKATOR STRATEGIS PROVINSI JAMBI -->

    <section class="indikator-section">

        <div class="indikator-header">
            <h2>Indikator Strategis</h2>
            <p>Indikator statistik utama Provinsi Jambi</p>
        </div>

        <div class="indikator-carousel">

    <button
        type="button"
        class="carousel-button"
        onclick="geserIndikator(-1)"
    >
        &#10094;
    </button>


    <div
        class="indikator-track"
        id="indikatorTrack"
    >

        <?php foreach ($indikatorList as $indikator) : ?>

            <?php
            $judul = htmlspecialchars(
                $indikator['title'] ?? '-',
                ENT_QUOTES,
                'UTF-8'
            );

            $nilai = htmlspecialchars(
                $indikator['value'] ?? '-',
                ENT_QUOTES,
                'UTF-8'
            );

            $satuan = htmlspecialchars(
                $indikator['unit'] ?? '',
                ENT_QUOTES,
                'UTF-8'
            );

            $deskripsi = htmlspecialchars(
                $indikator['desc'] ?? '',
                ENT_QUOTES,
                'UTF-8'
            );

            $link = htmlspecialchars(
                $indikator['link'] ?? 'https://jambi.bps.go.id/id/statistics-table',
                ENT_QUOTES,
                'UTF-8'
            );
            ?>

            <a
                href="<?php echo $link; ?>"
                target="_blank"
                class="indikator-card"
            >

                <div class="indikator-icon">
                    <span>▥</span>
                </div>

                <div class="indikator-content">

                    <h3>
                        <?php echo $judul; ?>
                    </h3>

                    <div class="indikator-value">
                        <?php echo $nilai; ?>
                    </div>

                    <div class="indikator-unit">
                        <?php echo $satuan; ?>
                    </div>

                    <p>
                        <?php echo $deskripsi; ?>
                    </p>

                </div>

            </a>

        <?php endforeach; ?>

    </div>


    <button
        type="button"
        class="carousel-button"
        onclick="geserIndikator(1)"
    >
        &#10095;
    </button>

</div>

    </section>


        <!-- INFORMASI TERBARU-->
        <section class="informasi-terbaru">

            <div class="informasi-header">
                <h2>Informasi Terbaru</h2>

                <div class="informasi-tabs">
                    <button class="tab-active">Publikasi</button>
                    <button>Berita Resmi Statistik</button>
                    <button>Tabel Statistik</button>
                    <button>Infografik</button>
                </div>
            </div>


            <!-- PUBLIKASI -->
            <div class="publikasi-section">

                <div class="publikasi-title">
                    <h3>Publikasi Terbaru</h3>
                    <a href="page09A.php">Lihat Semua →</a>
                </div>


                <div class="publikasi-grid">

                    <?php

                    if (
                        isset($data['data']) &&
                        isset($data['data'][1]) &&
                        is_array($data['data'][1])
                    ) {

                        $publikasi = array_slice($data['data'][1], 0, 6);

                        foreach ($publikasi as $pub) {

                            $judul = htmlspecialchars($pub['title'] ?? '-');
                            $cover = htmlspecialchars($pub['cover'] ?? '');
                            $pdf   = htmlspecialchars($pub['pdf'] ?? '');
                            $tanggal = $pub['rl_date'] ?? '-';

            
                            if ($tanggal != '-') {
                                $tanggal = date('d F Y', strtotime($tanggal));
                            }

                            echo "
                            <div class='publikasi-card'>

                                <div class='publikasi-cover'>
                                    <img src='{$cover}' alt='Sampul Publikasi'>
                                </div>

                                <div class='publikasi-info'>

                                    <div class='publikasi-date'>
                                        {$tanggal}
                                    </div>

                                    <h4>{$judul}</h4>

                                    <a
                                        href='{$pdf}'
                                        target='_blank'
                                        class='publikasi-link'
                                    >
                                        Lihat Publikasi →
                                    </a>

                                </div>

                            </div>
                            ";
                        }

                    } else {

                        echo "
                        <div class='api-error'>
                            Data publikasi dari WebAPI BPS belum dapat ditampilkan.
                        </div>
                        ";

                    }

                    ?>

                </div>

            </div>

        </section>

    </main>

    <!-- FOOTER -->
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
                href="https://ppid.bps.go.id/app/konten/1500/Profil-BPS.html?_gl=1*qe1obg*_ga*MjAyMTk4NzE0Ni4xNzI5NjQ1MTk4*_ga_XXTTVXWHDB*czE3ODg5Njg0NDQkbzU2JGcwJHQxNzg4OTY4NDQ0JGo2MCRsMCRoMA.."
                class="footer-link"
            >
                Profil BPS
            </a>

            <a
                href="https://ppid.bps.go.id/?mfd=1500&_gl=1*qe1obg*_ga*MjAyMTk4NzE0Ni4xNzI5NjQ1MTk4*_ga_XXTTVXWHDB*czE3ODg5Njg0NDQkbzU2JGcwJHQxNzg4OTY4NDQ0JGo2MCRsMCRoMA.."
                class="footer-link"
            >
                PPID
            </a>

            <a
                href="https://ppid.bps.go.id/app/konten/0000/Layanan-BPS.html?_gl=1*qe1obg*_ga*MjAyMTk4NzE0Ni4xNzI5NjQ1MTk4*_ga_XXTTVXWHDB*czE3ODg5Njg0NDQkbzU2JGcwJHQxNzg4OTY4NDQ0JGo2MCRsMCRoMA..#pills-3"
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

    <script>
    function goTo(page){
        window.location.href = page;
    }

    function logout(){
        let konfirmasi = confirm("Apa Anda yakin ingin logout?");
        if(konfirmasi){
            alert("Anda berhasil logout!");
            window.location.href = "home.php";
        }
    }
    </script>

    <script>

function goTo(page){
    window.location.href = page;
}

function logout(){
    let konfirmasi = confirm("Apa Anda yakin ingin logout?");

    if(konfirmasi){
        alert("Anda berhasil logout!");
        window.location.href = "home.php";
    }
}


/* CAROUSEL INDIKATOR*/
const track = document.getElementById("indikatorTrack");

if (track) {

    window.geserIndikator = function(arah) {

        track.scrollBy({
            left: arah * 450,
            behavior: "smooth"
        });

    };


    /* ---------------DRAG MOUSE---------------- */
    let isDown = false;
    let startX;
    let scrollLeft;


    track.addEventListener("mousedown", function(e) {

        isDown = true;
        track.classList.add("dragging");
        startX = e.pageX - track.offsetLeft;
        scrollLeft = track.scrollLeft;

    });


    track.addEventListener("mouseleave", function() {
        isDown = false;
        track.classList.remove("dragging");
    });


    track.addEventListener("mouseup", function() {
        isDown = false;
        track.classList.remove("dragging");

    });


    track.addEventListener("mousemove", function(e) {
        if (!isDown) {
            return;
        }

        e.preventDefault();
        const x = e.pageX - track.offsetLeft;
        const walk = (x - startX) * 1.5;
        track.scrollLeft = scrollLeft - walk;
    });


    let touchStartX = 0;
    let touchScrollLeft = 0;

    track.addEventListener("touchstart", function(e) {
        touchStartX = e.touches[0].pageX;
        touchScrollLeft = track.scrollLeft;
    }, { passive: true });

    track.addEventListener("touchmove", function(e) {
        const touchX = e.touches[0].pageX;
        const jarak = touchX - touchStartX;
        track.scrollLeft =
            touchScrollLeft - jarak;
    }, { passive: true });

}

</script>
</body>
</html>