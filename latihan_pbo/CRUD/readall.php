<?php
require_once '../Catatan.php';

$data = Catatan::getAll();

foreach ($data as $item) {
  
    $judulText = isset($item['Judul']) ? $item['Judul'] : (isset($item['judul']) ? $item['judul'] : '');
    
    echo $item['id'] . ". " . $judulText . " - " . $item['isi'];
    echo PHP_EOL;
}