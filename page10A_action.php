<?php
session_start();
include "dbconn.php";

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    header("Location: page10A.php?error=" . urlencode("Username dan password harus diisi."));
    exit();
}

$sql = "SELECT * FROM user WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute([":username" => $username]);
$user = $stmt->fetch();

if ($user) {
    $passwordValid = password_verify($password, $user["password"]);

    if ($passwordValid) {
        $_SESSION["username"] = $user["username"];
        $_SESSION["login"] = true;

        header("Location: home.php");
        exit();
    }
}

header("Location: page10A.php?error=" . urlencode("Username atau password salah.") . "&username=" . urlencode($username));
exit();
?>