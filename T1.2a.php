<?php
class Nilai_Akhir{
    public $UTS;
    public $UAS;
    public $TUGAS;

    public function Hitung() {
        return ($this -> UTS * 0.3) + ($this -> UAS * 0.4) + ($this -> TUGAS * 0.3);
    }

}

$Nilai = new Nilai_Akhir();
$Nilai ->UTS = 80;
$Nilai ->UAS = 90;
$Nilai ->TUGAS = 85;

echo "<pre>";
echo "========================================<br>";
echo "          Nilai Akhir Mahasiswa<br>";
echo "========================================<br>";
echo "Nilai UTS   : " . $Nilai->UTS . "<br><br>";
echo "Nilai UAS   : " . $Nilai->UAS . "<br><br>";
echo "Nilai Tugas : " . $Nilai->TUGAS . "<br><br>";
echo "----------------------------------------<br>";
echo "Total Nilai Akhir : " . $Nilai->Hitung() . "<br>";
echo "========================================";
echo "</pre>";
?>