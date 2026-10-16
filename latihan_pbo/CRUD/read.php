<?php
require_once '../Catatan.php';

$dataAll = Catatan::getAll();
$lastId = !empty($dataAll) ? $dataAll[0]['id'] : 1;

$detail = Catatan::getById($lastId);

if ($detail) {
   
    $judulText = isset($detail['Judul']) ? $detail['Judul'] : (isset($detail['judul']) ? $detail['judul'] : '');
    echo "Judul: " . $judulText . PHP_EOL;
    echo "Isi: " . $detail['isi'] . PHP_EOL;
} else {
    echo "Catatan tidak ditemukan." . PHP_EOL;
}