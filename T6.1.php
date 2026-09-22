<?php

interface Bentuk {
    public function hitungLuas();
    public function getNama();
}

class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }

    public function getNama() {
        return "Persegi (sisi=" . $this->sisi . ")";
    }
}

class Lingkaran implements Bentuk {
    private $radius;
    const PHI = 3.14;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function hitungLuas() {
        return self::PHI * $this->radius * $this->radius;
    }

    public function getNama() {
        return "Lingkaran (radius=" . $this->radius . ")";
    }
}

$Bentuk_Array = [
    new Persegi(5),
    new Lingkaran(7)
];

foreach ($Bentuk_Array as $bentuk) {
    echo "Luas " . $bentuk->getNama() . ": " . $bentuk->hitungLuas() . "<br>";
}
?>