<?php
class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;

    public function __construct($merek, $warna, $kecepatan) {
        $this->setMerek($merek);
        $this->setWarna($warna);
        $this->setKecepatan($kecepatan);
    }
    public function getMerek() {
        return $this->merek;
    }
    public function getWarna() {
        return $this->warna;
    }
    public function getKecepatan() {
        return $this->kecepatan;
    }
    public function setMerek($merek) {
        $this->merek = $merek;
    }
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            echo "<b style='color:red;'>[Error Validasi] Kecepatan tidak boleh negatif!</b><br>";
        } if ($kecepatan > 200) {
            echo "<b style='color:red;'>[Error Validasi] Kecepatan maksimal 200 km/jam!</b><br>";
        } else {
            $this->kecepatan = $kecepatan;
        }
    }
    public function setWarna($warna) {
        if (trim($warna) == "") {
            echo "<b style='color:red;'>[Error Validasi] Warna tidak boleh kosong!</b><br>";
        } if (strlen(trim($warna)) < 3) {
            echo "<b style='color:red;'>[Error Validasi] Warna minimal 3 karakter!</b><br>";
        } else {
            $this->warna = $warna;
        }
    }
    public function getInfo() {
        return "Merek: $this->merek, Warna: $this->warna, Kecepatan: $this->kecepatan km/jam";
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
echo "         TUGAS 1: CLASS MOBIL                <br>";
echo "=============================================<br>";

$mobil_1 = new Mobil("Toyota", "Merah", 200);
$mobil_2 = new Mobil("Honda", "Hitam", 140);
$mobil_3 = new Mobil("Avanza", "Pink", 170);

echo $mobil_1->getInfo() . "<br>";
echo $mobil_1->jalankan() . "<br>";
echo $mobil_1->berhenti() . "<br><br>";

echo $mobil_2->getInfo() . "<br>";
echo $mobil_2->jalankan() . "<br>";
echo $mobil_2->berhenti() . "<br><br>";

echo $mobil_3->getInfo() . "<br>";
echo $mobil_3->jalankan() . "<br>";
echo $mobil_3->berhenti() . "<br><br>";

echo "---------------------------------------------<br>";
echo "         PENGUJIAN ATURAN VALIDASI           <br>";
echo "---------------------------------------------<br>";

$mobil_2->setKecepatan(250); 
$mobil_3->setWarna("Ke");

echo "=============================================<br>";
echo "</pre>";
?>