<?php

$apiKey = "61a3b84a1f0d97ea4da88d1a81fae6e8";
$domain = "1500";

$url = "https://webapi.bps.go.id/v1/api/list"
     . "/model/publication"
     . "/lang/ind"
     . "/domain/" . $domain
     . "/page/1"
     . "/key/" . $apiKey;

$response = file_get_contents($url);

if ($response === false) {
    die("Gagal mengambil data dari WebAPI BPS.");
}

$data = json_decode($response, true);

if (!$data) {
    die("Data dari WebAPI BPS tidak dapat dibaca.");
}

