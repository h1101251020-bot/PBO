<?php
class Produk {
    protected $nama;
    protected $harga;
    protected $merek;

    public function __construct($nama, $harga, $merek) {
        $this->nama = $nama;
        if ($harga < 0) {
            $this->harga = 0;
            echo "<br><b>Peringatan:</b> Harga tidak boleh negatif! Harga diatur ke Rp 0.<br>";
        } else {
            $this->harga = $harga;
        }
        $this->merek = $merek;
    }

    public function getInfo() {
        return "Produk: " . $this->nama . "<br>" .
               "Merek: " . $this->merek . "<br>" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }

    public function getHarga() {
        return $this->harga;
    }
}

class Makanan extends Produk {
    private $tanggalKadaluarsa;

    public function __construct($nama, $harga, $merek, $tanggalKadaluarsa) {
        parent::__construct($nama, $harga, $merek);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    public function getInfo() {
        return parent::getInfo() . "<br>" .
               "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "<br>" .
               "Status: " . $this->cekKadaluarsa();
    }

    public function cekKadaluarsa() {
        $today = date('Y-m-d');
        return ($this->tanggalKadaluarsa < $today) ? "Kadaluarsa" : "Segar";
    }
}

class Elektronik extends Produk {
    private $garansi; 

    public function __construct($nama, $harga, $merek, $garansi) {
        parent::__construct($nama, $harga, $merek);
        $this->garansi = $garansi;
    }

    public function getInfo() {
        return parent::getInfo() . "<br>" .
               "Garansi: " . $this->garansi . " bulan";
    }
}

$makanan = new Makanan("Mie Instan", 3500, "Indomie", "2025-06-30");
$elektronik = new Elektronik("Smart TV", 5000000, "Samsung", 12);

echo "<h3>Output Tugas 1:</h3>";
echo $makanan->getInfo() . "<br><br><hr><br>";
echo $elektronik->getInfo() . "<br>";
?>