<?php
include 'dbconn.php';

try {

$nomor = $_POST['nomor'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal_rilis'];
$hariIni = date('Y-m-d');

if ($tanggal > $hariIni) {
    echo "<script>
    alert('Tanggal rilis tidak boleh melebihi hari ini');
    window.location='page09C.php';
    </script>";
    exit();
}
$isi = $_POST['isi_publikasi'];

$file = $_FILES['sampul']['name'];
$tmp = $_FILES['sampul']['tmp_name'];

move_uploaded_file($tmp, "asset/" . $file);

$sql = "INSERT INTO publikasi
(nomor, judul, tanggal_rilis, sampul, isi_publikasi)
VALUES
('$nomor', '$judul', '$tanggal', 'asset/$file', '$isi')";

$pdo->query($sql);

echo "<script>
alert('Berhasil tambah data');
window.location='page09A.php';
</script>";

} catch(PDOException $e){
exit($e->getMessage());
}
?>