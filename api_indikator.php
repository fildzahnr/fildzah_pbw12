<?php

$apiKey = "61a3b84a1f0d97ea4da88d1a81fae6e8";
$domain = "1500";

/*  FUNCTION AMBIL DATA DARI BPS API */
function getBpsApi($url)
{
    $response = @file_get_contents($url);

    if ($response === false) {
        return null;
    }

    $data = json_decode($response, true);

    if (!is_array($data)) {
        return null;
    }

    return $data;
}

/* FUNCTION NORMALISASI JUDUL */
function normalizeTitle($text)
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    $text = preg_replace('/\s+/', ' ', $text);
    return $text;
}

function slugifyBps($text)
{
    $text = strtolower(trim($text));
    $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    $text = trim($text, '-');

    return $text;
}

/* CARI TABEL STATISTIK BERDASARKAN JUDUL INDIKATOR */
function cariLinkTabel($judul, $apiKey, $domain)
{

    $keyword = rawurlencode($judul);

    $url = "https://webapi.bps.go.id/v1/api/list"
         . "/model/statictable"
         . "/lang/ind"
         . "/domain/" . $domain
         . "/page/1"
         . "/keyword/" . $keyword
         . "/key/" . $apiKey;

    $data = getBpsApi($url);

    if (
        !$data ||
        !isset($data['data'][1]) ||
        !is_array($data['data'][1]) ||
        count($data['data'][1]) == 0
    ) {
        return "https://jambi.bps.go.id/id/statistics-table";
    }

    $hasil = $data['data'][1];
    $judulNormal = normalizeTitle($judul);
    $terbaik = null;
    $skorTerbaik = 0;

    foreach ($hasil as $tabel) {

        if (!isset($tabel['title'])) {
            continue;
        }

        $judulTabel = normalizeTitle($tabel['title']);

        if ($judulTabel === $judulNormal) {
            $terbaik = $tabel;
            $skorTerbaik = 100;
            break;
        }

        similar_text(
            $judulNormal,
            $judulTabel,
            $persen
        );

        if ($persen > $skorTerbaik) {
            $skorTerbaik = $persen;
            $terbaik = $tabel;
        }
    }

    if (
        !$terbaik ||
        !isset($terbaik['table_id']) ||
        !isset($terbaik['subj_id']) ||
        $skorTerbaik < 25
    ) {
        return "https://jambi.bps.go.id/id/statistics-table";
    }

    $tableId = $terbaik['table_id'];
    $subjId  = $terbaik['subj_id'];
    $encodedId = base64_encode($tableId . "#" . $subjId);
    $judulUntukSlug = $terbaik['title'] ?? $judul;
    $slug = slugifyBps($judulUntukSlug);
    $encodedId = rawurlencode($encodedId);

    $link = "https://jambi.bps.go.id/id/statistics-table/2/"
          . $encodedId
          . "/"
          . $slug
          . ".html";

    return $link;
}
/* AMBIL STRATEGIC INDICATORS */
$url = "https://webapi.bps.go.id/v1/api/list"
     . "/model/indicators"
     . "/lang/ind"
     . "/domain/" . $domain
     . "/page/1"
     . "/key/" . $apiKey;

$indikatorData = getBpsApi($url);

/*SIAPKAN DATA INDIKATOR */

$indikatorList = [];
if (
    $indikatorData &&
    isset($indikatorData['data'][1]) &&
    is_array($indikatorData['data'][1])
) {

    foreach ($indikatorData['data'][1] as $indikator) {

        $judul = $indikator['title'] ?? '-';
        $indikator['link'] = cariLinkTabel(
            $judul,
            $apiKey,
            $domain
        );

        $indikatorList[] = $indikator;
    }
}

?>