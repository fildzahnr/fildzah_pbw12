<?php

include 'dbconn.php';

header('Content-Type: application/json; charset=utf-8');

$keyword = $_GET['keyword'] ?? '';

try {

    $sql = "
        SELECT
            nomor,
            judul,
            tanggal_rilis,
            sampul,
            isi_publikasi
        FROM publikasi
        WHERE judul LIKE :keyword
        ORDER BY nomor ASC
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':keyword' => '%' . $keyword . '%'
    ]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(
        $data,
        JSON_UNESCAPED_UNICODE
    );

} catch (PDOException $e) {

    echo json_encode([
        'error' => $e->getMessage()
    ]);

}

?>