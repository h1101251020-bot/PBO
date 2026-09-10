<?php
class Mobil{
    public $merek;
    public $warna;
    public $kecepatan;

    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    public function getInfo() {
        return "Merek: $this->merek, Warna: $this->warna, Kecepatan: $this->kecepatan";
    }

    public function jalankan() {
        return "Mobil $this->merek berjalan...";
    }
    
    public function berhenti() {
        return "Mobil $this->merek berhenti.";
    }
}

echo "<pre>";
echo "=============================================<br>";
echo "         TUGAS 1: CLASS MOBIL<br>";
echo "=============================================<br>";

$mobil_1 = new Mobil("Toyota", "Merah", 120);
$mobil_2 = new Mobil("Honda", "Hitam", 140);
$mobil_3 = new Mobil("Avanza", "Pink", 170);

echo $mobil_1->getInfo()."<br>";
echo $mobil_1->jalankan()."<br>";
echo $mobil_1->berhenti()."<br><br>";

echo $mobil_2->getInfo()."<br>";
echo $mobil_2->jalankan()."<br>";
echo $mobil_2->berhenti()."<br><br>";

echo $mobil_3->getInfo()."<br>";
echo $mobil_3->jalankan()."<br>";
echo $mobil_3->berhenti()."<br><br>";

echo "=============================================<br>";
echo "</pre>"
?>