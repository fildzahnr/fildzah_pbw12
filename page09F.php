<?php
include 'dbconn.php';

try {

$nomor = $_GET['nomor'];
$sampul = $_GET['sampul'];

$sql = "DELETE FROM publikasi WHERE nomor='$nomor'";
$pdo->query($sql);

$file = basename($sampul);

if (file_exists("asset/" . $file)) {
    unlink("asset/" . $file);
}

echo "<script>
alert('Berhasil hapus');
window.location='page09A.php';
</script>";

} catch(PDOException $e){
exit($e->getMessage());
}
?>