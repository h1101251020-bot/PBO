<?php
class Tutor {
    private $nama;
    private $mataPelajaran;
    private $tarifPerJam;
    private $pengalamanMengajar;

    public function getNama() {
        return $this->nama;
    }

    public function getMataPelajaran() {
        return $this->mataPelajaran;
    }

    public function getTarifPerJam() {
        return $this->tarifPerJam;
    }

    public function getPengalamanMengajar() {
        return $this->pengalamanMengajar;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function setMataPelajaran($mapel) {
        $this->mataPelajaran = $mapel;
    }

    public function setTarifPerJam($tarif) {
        if ($tarif >= 50000) {
            $this->tarifPerJam = $tarif;
        } else {
            echo "<b>[Error Validasi]</b> Tarif per jam minimal Rp 50.000!<br>";
        }
    }

    public function setPengalamanMengajar($tahun) {
        if ($tahun >= 0) {
            $this->pengalamanMengajar = $tahun;
        } else {
            echo "<b>[Error Validasi]</b> Pengalaman mengajar tidak boleh negatif!<br>";
        }
    }
}

$tutor1 = new Tutor();

$tutor1->setNama("Dewi Lestari, S.Pd.");
$tutor1->setMataPelajaran("Matematika SMA");
$tutor1->setTarifPerJam(120000); 
$tutor1->setPengalamanMengajar(4); 

echo "========================================<br>";
echo "<b>     DATA TUTOR LES PRIVAT          </b><br>";
echo "========================================<br>";
echo "Nama Tutor         : " . $tutor1->getNama() . "<br>";
echo "Mata Pelajaran     : " . $tutor1->getMataPelajaran() . "<br>";
echo "Tarif per Jam      : Rp " . number_format($tutor1->getTarifPerJam(), 0, ',', '.') . "<br>";
echo "Pengalaman Mengajar: " . $tutor1->getPengalamanMengajar() . " Tahun<br>";
echo "========================================<br>";
?>