<?php
abstract class ProdukPakaian{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar){
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId()         { return $this->id; }
    public function getNama()       { return $this->nama; }
    public function getHargaDasar() { return $this->hargaDasar; }

    abstract public function hitungTotal();
    abstract public function getJenis();
    abstract public function cetakDetail();

    protected function rupiah($angka){
        return "Rp " . number_format($angka, 0, ',', '.');
    }
}

class Kemeja extends ProdukPakaian{
    private $size; 

    public function __construct($id, $nama, $hargaDasar, $size){
        parent::__construct($id, $nama, $hargaDasar);
        $this->size = $size;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (5000 * $this->size);
    }

    public function getJenis() { return "Kemeja"; }

    public function cetakDetail(){
        return "[{$this->id}] {$this->getJenis()} {$this->nama} | Size {$this->size} | Total "
            . $this->rupiah($this->hitungTotal());
    }
}

class Celana extends ProdukPakaian{
    private $panjang;

    public function __construct($id, $nama, $hargaDasar, $panjang){
        parent::__construct($id, $nama, $hargaDasar);
        $this->panjang = $panjang;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (2000 * $this->panjang);
    }

    public function getJenis() { return "Celana"; }

    public function cetakDetail(){
        return "[{$this->id}] {$this->getJenis()} {$this->nama} | Panjang {$this->panjang} | Total "
            . $this->rupiah($this->hitungTotal());
    }
}

class Jaket extends ProdukPakaian{
    private $ketebalan;
    const D = 20;

    public function __construct($id, $nama, $hargaDasar, $ketebalan){
        parent::__construct($id, $nama, $hargaDasar);
        $this->ketebalan = $ketebalan;
    }

    public function hitungTotal(){
        $total = $this->hargaDasar + (15000 * $this->ketebalan);
        if ($this->ketebalan > self::D) {
            $total = $total * 0.8;}
        return $total;
    }

    public function getJenis() { return "Jaket"; }

    public function cetakDetail(){
        $diskon = ($this->ketebalan > self::D) ? "diskon 20%" : "tanpa diskon";
        return "[{$this->id}] {$this->getJenis()} {$this->nama} | Tebal {$this->ketebalan} ({$diskon}) | Total "
            . $this->rupiah($this->hitungTotal());
    }
}
$daftar = [
    new Kemeja("P001", "Dhini", 100000, 4), //4 adalah ketebalannnya
    new Celana("P002", "Zakiyatul", 150000, 30),
    new Jaket ("P003", "Wafa", 200000, 6),
    new Kemeja("P004", "Aiffy", 120000, 3),
    new Jaket ("P005", "Riri",  180000, 21), //Riri akan mendapatkan diskon karena memesan lebih dari 20 jaket
];

$totalKeseluruhan = 0;
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th><th>ID</th><th>Nama</th>
        <th>Jenis</th><th>Harga Dasar</th><th>Total</th>
    </tr>
    <?php foreach ($daftar as $i => $p):
        $totalKeseluruhan += $p->hitungTotal(); ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $p->getId() ?></td>
            <td><?= $p->getNama() ?></td>
            <td><?= $p->getJenis() ?></td>
            <td>Rp <?= number_format($p->getHargaDasar(), 0, ',', '.') ?></td>
            <td>Rp <?= number_format($p->hitungTotal(), 0, ',', '.') ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5"><b>Total Keseluruhan</b></td>
        <td><b>Rp <?= number_format($totalKeseluruhan, 0, ',', '.') ?></b></td>
    </tr>
</table>