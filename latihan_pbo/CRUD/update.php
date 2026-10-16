<?php
require_once '../Catatan.php';

$id = 1;
$catatanData = Catatan::getById($id);

if ($catatanData) {
    $catatan = new Catatan();
    
    $judulLama = isset($catatanData['judul']) ? $catatanData['judul'] : 'Catatan Pertama';
    $isiLama   = isset($catatanData['isi']) ? $catatanData['isi'] : 'Isi Catatan';

    $catatan->setJudul($judulLama . ' (Diperbarui)')
            ->setIsi($isiLama . ' (Diperbarui)');

    if ($catatan->update($id)) {
        echo "Catatan ($id) berhasil diperbarui" . PHP_EOL;
    } else {
        echo "Gagal memperbarui catatan" . PHP_EOL;
    }
} else {
    echo "Catatan dengan ID $id tidak ditemukan." . PHP_EOL;
}