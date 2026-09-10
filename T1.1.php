<?php
class PersegiPanjang {
    public $panjang;
    public $lebar;

    public function luas() {
        return $this->panjang * $this->lebar;
    }
}

$kotak = new PersegiPanjang();
$kotak->panjang = 10;
$kotak->lebar = 5;

echo "<pre>";
echo "========================================<br>";
echo "   <b>PERHITUNGAN LUAS PERSEGI PANJANG</b><br>";
echo "========================================<br>";
echo "Panjang : " . $kotak->panjang . " cm<br><br>";
echo "Lebar   : " . $kotak->lebar . " cm<br>";
echo "----------------------------------------<br>";
echo "<b>Luas    : " . $kotak->luas() . " cm²</b><br>";
echo "========================================";
echo "</pre>";
?>