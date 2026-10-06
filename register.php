<?php

session_start();
include "dbconn.php";


/* proses registrasi */

$error = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username =
        trim($_POST["username"] ?? "");
    $password =
        $_POST["password"] ?? "";
    $confirm_password =
        $_POST["confirm_password"] ?? "";


    /* validasi input */
    if (
        $username === "" ||
        $password === "" ||
        $confirm_password === ""
    ) {
        $error =
            "Semua data harus diisi.";
    }

    elseif ($password !== $confirm_password) {
        $error =
            "Konfirmasi password tidak sesuai.";
    }

    elseif (strlen($password) < 6) {
        $error =
            "Password minimal 6 karakter.";
    }

    else {

        /* cek username*/
        $check = $pdo->prepare("
            SELECT username
            FROM user
            WHERE username = :username
        ");

        $check->execute([
            ":username" => $username
        ]);

        $existingUser =
            $check->fetch();

        if ($existingUser) {
            $error =
                "Username sudah digunakan. Silakan pilih username lain.";
        }
        else {

            /* hash password */
            $hashedPassword =
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

            /* simpan user*/
            $sql = "
                INSERT INTO user
                (
                    username,
                    password
                )
                VALUES
                (
                    :username,
                    :password
                )
            ";

            $stmt =
                $pdo->prepare($sql);

            $stmt->execute([
                ":username" => $username,
                ":password" => $hashedPassword
            ]);

            $success =
                "Registrasi berhasil! Silakan login.";

            $_POST["username"] = "";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Registrasi - BPS Provinsi Jambi
    </title>

    <link
        rel="stylesheet"
        type="text/css"
        href="./myCSS.css"
    >

</head>

<body class="login-page">


<!-- header -->
<header class="main-header">
    <div class="header-left">
        <img
            src="logobps.png"
            alt="Logo BPS"
        >

        <div class="judulweb">
            BPS PROVINSI JAMBI
        </div>

    </div>
</header>

<!-- register -->
<main class="login-section">
    <div class="login-card">
        <!-- LOGO -->
        <div class="login-logo">
            <img
                src="logobpsbg.jpg"
                alt="Logo BPS"
            >
        </div>

        <!-- JUDUL -->
        <h2>
            Registrasi
        </h2>

        <p class="login-description">
            Buat akun untuk mengakses website publikasi BPS Provinsi Jambi
        </p>

        <!-- error -->
        <?php if ($error !== ""): ?>
            <div class="login-warning">
                <span class="warning-icon">
                    !
                </span>

                <span>
                    <?php
                    echo htmlspecialchars($error);
                    ?>
                </span>

            </div>
        <?php endif; ?>



        <!-- sukses -->
        <?php if ($success !== ""): ?>
            <div class="register-success">
                <span>
                    ✓
                </span>

                <span>
                    <?php
                    echo htmlspecialchars($success);
                    ?>
                </span>
            </div>

        <?php endif; ?>

        <!-- form register -->
        <form
            method="POST"
            action=""
            class="login-form"
        >

            <!-- USERNAME -->
            <label for="username">
                Username
            </label>

            <input
                type="text"
                id="username"
                name="username"
                placeholder="Buat username"
                value="<?php
                    echo htmlspecialchars(
                        $_POST["username"] ?? ""
                    );
                ?>"
                autocomplete="username"
                required
            >

            <!-- PASSWORD -->
            <label for="password">
                Password
            </label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Buat password"
                    autocomplete="new-password"
                    required
                >


                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword(
                        'password',
                        this
                    )"
                    aria-label="Tampilkan password"
                >

                    <img
                        src="matatutup.png"
                        alt="Tampilkan password"
                        class="password-icon"
                    >

                </button>
            </div>

            <!-- KONFIRMASI PASSWORD -->

            <label for="confirm_password">
                Konfirmasi Password
            </label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    required
                >


                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword(
                        'confirm_password',
                        this
                    )"
                    aria-label="Tampilkan password"
                >

                    <img
                        src="matatutup.png"
                        alt="Tampilkan password"
                        class="password-icon"
                    >
                </button>
            </div>

            <!-- TOMBOL DAFTAR -->

            <button
                type="submit"
                class="login-button"
            >
                Daftar
            </button>

            <!-- LINK LOGIN -->
            <div class="register-link">
                Sudah punya akun?
                <a href="page10A.php">
                    Login di sini
                </a>
            </div>

        </form>
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
                href="#"
                class="footer-link"
            >
                Profil BPS
            </a>

            <a
                href="#"
                class="footer-link"
            >
                PPID
            </a>

            <a
                href="#"
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

<!-- javasripct -->
<script>
function togglePassword(inputId, button) {
    const passwordInput =
        document.getElementById(inputId);

    const icon =
        button.querySelector("img");


    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.src = "matabuka.png";

        icon.alt =
            "Sembunyikan password";

    } else {
        passwordInput.type = "password";
        icon.src = "matatutup.png";
        icon.alt =
            "Tampilkan password";

    }

}
</script>
</body>
</html>