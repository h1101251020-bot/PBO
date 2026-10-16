<?php
require_once '../Catatan.php';

$id = 1;
$hapus = Catatan::delete($id);

if ($hapus) {
    echo "Catatan ($id) berhasil dihapus" . PHP_EOL;
} else {
    echo "Gagal menghapus catatan" . PHP_EOL;
}