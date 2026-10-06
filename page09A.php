<?php
include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Publikasi BPS Jambi</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="myCSS.css"
    >

</head>
<body>

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



<!-- WELCOME -->

<div class="welcome">

    <h2>
        Daftar Publikasi BPS Jambi
    </h2>


    <p>
        Seluruh informasi terkait data yang dihasilkan oleh BPS Provinsi Jambi
        akan ditampilkan pada publikasi di bawah.
    </p>

</div>

<!-- MAIN -->

<main>


    <!-- LIVE SEARCH  -->
    <div class="search-publikasi">
        <label for="txt1">
            Cari Judul Publikasi
        </label>

        <input
            type="text"
            id="txt1"
            placeholder="Ketik judul publikasi..."
            autocomplete="off"
            oninput="cariPublikasi(this.value)"
        >
    </div>

    <!-- TABEL PUBLIKASI-->
    <table
        id="tabelPublikasi"
        border="1"
        style="
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        "
    >


        <!--HEADER -->
        <thead>
            <tr>
                <th>
                    No
                </th>

                <th>
                    Judul Publikasi
                </th>

                <th>
                    Tanggal Rilis
                </th>

                <th>
                    Sampul
                </th>

                <th>
                    Selengkapnya
                </th>

                <th>
                    Aksi
                </th>
            </tr>
        </thead>

        <!-- ISI TABEL -->
        <tbody id="hasilPublikasi">

<?php

try {
    $result = $pdo->query("
        SELECT
            nomor,
            judul,
            tanggal_rilis,
            sampul,
            isi_publikasi
        FROM publikasi
        ORDER BY nomor ASC
    ");

    foreach ($result as $row) {

?>
        <tr>
            <td>
                <?php
                echo htmlspecialchars(
                    $row['nomor']
                );
                ?>
            </td>

            <!--JUDUL PUBLIKASI-->
            <td>
                <?php
                echo htmlspecialchars(
                    $row['judul']
                );
                ?>
            </td>

            <td>
                <?php
                echo htmlspecialchars(
                    $row['tanggal_rilis']
                );
                ?>
            </td>

            <td>
                <img
                    src="<?php echo htmlspecialchars($row['sampul']); ?>"
                    width="70"
                    height="100"
                    alt="Sampul Publikasi"
                >
            </td>

            <td>
                <a
                    href="<?php echo htmlspecialchars($row['isi_publikasi']); ?>"
                    target="_blank"
                >
                    Lihat
                </a>

            </td>


            <td>
                <!-- EDIT -->
                <a
                    href="page09E.php?nomor=<?php echo urlencode($row['nomor']); ?>"
                    title="Edit Publikasi"
                >
                    <img
                        src="asset/edit.png"
                        alt="Edit"
                        style="
                            width:25px;
                            height:25px;
                        "
                    >

                </a>
                &nbsp;&nbsp;

                <!-- HAPUS -->

                <a
                    href="page09F.php?nomor=<?php echo urlencode($row['nomor']); ?>&sampul=<?php echo urlencode($row['sampul']); ?>"
                    title="Hapus Publikasi"
                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                >

                    <img
                        src="asset/remove.png"
                        alt="Hapus"
                        style="
                            width:30px;
                            height:30px;
                        "
                    >

                </a>
            </td>
        </tr>

<?php
    }
}
catch (PDOException $e) {
?>
        <tr>
            <td
                colspan="6"
                style="text-align:center;"
            >
                Error:
                <?php
                echo htmlspecialchars(
                    $e->getMessage()
                );
                ?>
            </td>
        </tr>

<?php
}
?>

        </tbody>
    </table>
</main>

<hr
    style="
        margin: 20px 0;
    "
>

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

<!-- PENCARIAN JAVASCRIPT -->
<script>
function cariPublikasi(keyword) {
    var tbody =
        document.getElementById("hasilPublikasi");

    var semuaBaris =
        tbody.querySelectorAll("tr");

    var kataKunci =
        keyword.toLowerCase().trim();

    var jumlahDitemukan = 0;

    var pesanLama =
        document.getElementById(
            "pesanTidakTersedia"
        );

    if (pesanLama) {
        pesanLama.remove();

    }

    if (kataKunci === "") {
        semuaBaris.forEach(
            function(baris) {
                baris.style.display = "";
            }
        );
        return;

    }

    // live search  
    semuaBaris.forEach(
        function(baris) {

            var kolomJudul =
                baris.cells[1];

            if (!kolomJudul) {
                return;
            }

            var judul =
                kolomJudul.textContent
                    .toLowerCase()
                    .trim();

            if (
                judul.includes(kataKunci)
            ) {

                baris.style.display = "";
                jumlahDitemukan++;
            } else {

                baris.style.display = "none";
            }
        }
    );

    if (jumlahDitemukan === 0) {
        var barisPesan =
            document.createElement("tr");

        barisPesan.id =
            "pesanTidakTersedia";

        barisPesan.innerHTML = `
            <td
                colspan="6"
                style="
                    text-align: center;
                    padding: 30px;
                    font-weight: 500;
                "
            >
                Publikasi tidak tersedia
            </td>

        `;
        tbody.appendChild(
            barisPesan
        );
    }
}

</script>
</body>
</html>