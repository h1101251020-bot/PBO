<?php
class Product {
    public $nama;
    public $harga;
    public $kategori;

    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfo(){
        return "Nama Produk : $this->nama<br>".
                "Harga      : Rp ". number_format($this->harga, 0, ',','.')."<br>".
                "Kategori   : $this->kategori<br>";
    }

    public function applyDiskon($persen){
        $potongan = $this->harga * ($persen / 100);
        $this->harga = $this->harga - $potongan;
    }
}


echo "<pre>";
echo "=============================================<br>";
echo "             TUGAS 2: CLASS PRODUCT          <br>";
echo "=============================================<br>";

$produk_1 = new Product("Laptop Asus", 1000000, "Elektronik");
$produk_2 = new Product("Jilbab Viscose", 600000, "Fashion");

echo "----PRODUK 1----<br>";
echo $produk_1->getInfo();
$produk_1->applyDiskon(10);
echo "Setelah Diskon 10%:<br>";
echo $produk_1->getInfo()."<br>";

echo "----PRODUK 2----<br>";
echo $produk_2->getInfo();
$produk_2->applyDiskon(15);
echo "Setelah Diskon 15%:<br>";
echo $produk_2->getInfo()."<br";

echo "=============================================<br>";
echo "</pre>"
?>

