<?php
require_once '../Catatan.php';

$c = new Catatan();
$hasil = $c->setJudul("Catatan Pertama")
          ->setIsi("Belajar Koneksi Database dengan PDO")
          ->save();

echo $hasil ? "Berhasil disimpan" . PHP_EOL : "Gagal" . PHP_EOL;