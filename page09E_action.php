<?php
include 'dbconn.php';

try {

$nomor = $_POST['nomor'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal_rilis'];
$isi = $_POST['isi_publikasi'];
$sampul_lama = $_POST['sampul_lama'];

if (isset($_FILES['sampul_baru']) && $_FILES['sampul_baru']['error'] == 0) {

    $file = $_FILES['sampul_baru']['name'];
    $tmp = $_FILES['sampul_baru']['tmp_name'];

    move_uploaded_file($tmp, "asset/" . $file);

    $sampul = "asset/$file";

} else {
    $sampul = $sampul_lama;
}

$sql = "UPDATE publikasi SET
judul='$judul',
tanggal_rilis='$tanggal',
sampul='$sampul',
isi_publikasi='$isi'
WHERE nomor='$nomor'";

$pdo->query($sql);

echo "<script>
alert('Berhasil update');
window.location='page09E.php';
</script>";

} catch(PDOException $e){
exit($e->getMessage());
}
?>