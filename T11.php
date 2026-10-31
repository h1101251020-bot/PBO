<?php
class Buku 
{
    private string $kodeBuku;
    private string $judul;
    private string $penulis;
    private int $tahunTerbit;

    public function __construct(string $kodeBuku, string $judul, string $penulis, int $tahunTerbit) 
    {
        $this->kodeBuku = $kodeBuku;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }

    public function getKodeBuku(): string 
    {
        return $this->kodeBuku;
    }

    public function getJudul(): string 
    {
        return $this->judul;
    }

    public function getDetailBuku(): string 
    {
        return "Kode: {$this->kodeBuku} | Judul: {$this->judul} | Penulis: {$this->penulis} | Tahun: {$this->tahunTerbit}";
    }
}

class Anggota 
{
    private string $idAnggota;
    private string $nama;
    private string $alamat;
    private string $noTelepon;

    public function __construct(string $idAnggota, string $nama, string $alamat, string $noTelepon) 
    {
        $this->idAnggota = $idAnggota;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->noTelepon = $noTelepon;
    }

    public function getIdAnggota(): string 
    {
        return $this->idAnggota;
    }

    public function getNama(): string 
    {
        return $this->nama;
    }

    public function getDetailAnggota(): string 
    {
        return "ID Anggota: {$this->idAnggota} | Nama: {$this->nama} | Alamat: {$this->alamat} | No. Telp: {$this->noTelepon}";
    }
}

class Peminjaman 
{
    private string $idPeminjaman;
    private Anggota $anggota;
    private Buku $buku;      
    private string $tanggalPeminjaman;
    private string $tenggatPengembalian;
    private string $statusPeminjaman;

    public function __construct(string $idPeminjaman, Anggota $anggota, Buku $buku, string $tanggalPeminjaman, string $tenggatPengembalian) 
    {
        $this->idPeminjaman = $idPeminjaman;
        $this->anggota = $anggota;
        $this->buku = $buku;
        $this->tanggalPeminjaman = $tanggalPeminjaman;
        $this->tenggatPengembalian = $tenggatPengembalian;
        $this->statusPeminjaman = "Dipinjam";
    }

    public function getIdPeminjaman(): string 
    {
        return $this->idPeminjaman;
    }

    public function getAnggota(): Anggota 
    {
        return $this->anggota;
    }

    public function getBuku(): Buku 
    {
        return $this->buku;
    }

    public function getTenggatPengembalian(): string 
    {
        return $this->tenggatPengembalian;
    }

    public function perbaruiStatus(string $statusBaru): void 
    {
        $this->statusPeminjaman = $statusBaru;
    }

    public function getStatusPeminjaman(): string 
    {
        return $this->statusPeminjaman;
    }

    public function catatPeminjaman(): void 
    {
        echo "================================================================================\n";
        echo "                    SISTEM INFORMASI MANAJEMEN PERPUSTAKAAN                    \n";
        echo "================================================================================\n\n";
        echo "--------------------------------------------------------------------------------\n";
        echo "                     [1] PENCATATAN PEMINJAMAN BUKU BERHASIL                     \n";
        echo "--------------------------------------------------------------------------------\n";
        echo "ID Peminjaman   : {$this->idPeminjaman}\n";
        echo "ID Anggota      : {$this->anggota->getIdAnggota()}\n";
        echo "Nama Peminjam   : {$this->anggota->getNama()}\n";
        echo "Kode Buku       : {$this->buku->getKodeBuku()}\n";
        echo "Judul Buku      : {$this->buku->getJudul()}\n";
        echo "Tgl Peminjaman  : {$this->tanggalPeminjaman}\n";
        echo "Tenggat Kembali : {$this->tenggatPengembalian}\n";
        echo "Status Pinjam   : {$this->statusPeminjaman}\n";
        echo "--------------------------------------------------------------------------------\n\n";
    }
}
class Denda 
{
    private string $idDenda;
    private int $jumlahHariTerlambat;
    private float $tarifPerHari;
    private float $dendaKondisi;
    private float $totalDenda;
    private string $statusPembayaran;

    public function __construct(string $idDenda, int $jumlahHariTerlambat, float $dendaKondisi = 0.0, float $tarifPerHari = 1000.0) 
    {
        $this->idDenda = $idDenda;
        $this->jumlahHariTerlambat = max(0, $jumlahHariTerlambat);
        $this->tarifPerHari = $tarifPerHari;
        $this->dendaKondisi = $dendaKondisi;
        $this->totalDenda = $this->hitungTotalDenda();
        $this->statusPembayaran = ($this->totalDenda > 0) ? "Belum Lunas" : "Tidak Ada Denda";
    }

    public function hitungTotalDenda(): float 
    {
        return ($this->jumlahHariTerlambat * $this->tarifPerHari) + $this->dendaKondisi;
    }

    public function bayarDenda(): void 
    {
        if ($this->totalDenda > 0) {
            $this->statusPembayaran = "Lunas";
            echo "--------------------------------------------------------------------------------\n";
            echo "                       [3] SIMULASI PEMBAYARAN DENDA                            \n";
            echo "--------------------------------------------------------------------------------\n";
            echo "ID Denda        : {$this->idDenda}\n";
            echo "Nominal Dibayar : Rp " . number_format($this->totalDenda, 0, ',', '.') . "\n";
            echo "-> Pembayaran Berhasil Diproses! \n";
            echo "   Status Pembayaran Berubah Menjadi: [ LUNAS ]\n";
            echo "================================================================================\n\n";
        }
    }

    public function getDetailDenda(): string 
    {
        $dendaTerlambat = $this->jumlahHariTerlambat * $this->tarifPerHari;
        $output  = "ID Denda        : {$this->idDenda}\n";
        $output .= "Keterlambatan   : {$this->jumlahHariTerlambat} Hari (Tarif: Rp " . number_format($this->tarifPerHari, 0, ',', '.') . " / hari -> Rp " . number_format($dendaTerlambat, 0, ',', '.') . ")\n";
        $output .= "Denda Fisik     : Rp " . number_format($this->dendaKondisi, 0, ',', '.') . "\n";
        $output .= "Total Denda     : Rp " . number_format($this->totalDenda, 0, ',', '.') . "\n";
        $output .= "Status Bayar    : {$this->statusPembayaran}";
        return $output;
    }
}

class Pengembalian 
{
    private string $idPengembalian;
    private Peminjaman $peminjaman; 
    private string $tanggalDikembalikan;
    private string $kondisiBuku;
    private ?Denda $denda;          

    public function __construct(string $idPengembalian, Peminjaman $peminjaman, string $tanggalDikembalikan, string $kondisiBuku = "Baik") 
    {
        $this->idPengembalian = $idPengembalian;
        $this->peminjaman = $peminjaman;
        $this->tanggalDikembalikan = $tanggalDikembalikan;
        $this->kondisiBuku = $kondisiBuku;
        $this->denda = null;

        $this->prosesPengembalian();
    }

    public function hitungKeterlambatan(): int 
    {
        $tenggat = new DateTime($this->peminjaman->getTenggatPengembalian());
        $kembali = new DateTime($this->tanggalDikembalikan);
        
        if ($kembali > $tenggat) {
            return $kembali->diff($tenggat)->days;
        }
        return 0;
    }

    public function prosesPengembalian(): void 
    {
        $this->peminjaman->perbaruiStatus("Dikembalikan");

        $hariTerlambat = $this->hitungKeterlambatan();
        $dendaKondisi = 0.0;

        if ($this->kondisiBuku === "Rusak") {
            $dendaKondisi = 20000.0; 
        } elseif ($this->kondisiBuku === "Hilang") {
            $dendaKondisi = 50000.0; 
        }

        if ($hariTerlambat > 0 || $dendaKondisi > 0) {
            $this->denda = new Denda("DND-" . $this->idPengembalian, $hariTerlambat, $dendaKondisi);
        }
    }

    public function getDenda(): ?Denda 
    {
        return $this->denda;
    }

    public function cetakStrukPengembalian(): void 
    {
        echo "--------------------------------------------------------------------------------\n";
        echo "                    [2] STRUK TRANSAKSI PENGEMBALIAN BUKU                       \n";
        echo "--------------------------------------------------------------------------------\n";
        echo "ID Pengembalian : {$this->idPengembalian}\n";
        echo "ID Peminjaman   : {$this->peminjaman->getIdPeminjaman()}\n";
        echo "Nama Peminjam   : {$this->peminjaman->getAnggota()->getNama()}\n";
        echo "Judul Buku      : {$this->peminjaman->getBuku()->getJudul()}\n";
        echo "Tgl Dikembalikan: {$this->tanggalDikembalikan}\n";
        echo "Kondisi Fisik   : {$this->kondisiBuku}\n";
        echo "Status Pinjam   : {$this->peminjaman->getStatusPeminjaman()}\n\n";
        
        if ($this->denda !== null) {
            echo "[ Rincian Kalkulasi Denda ]\n";
            echo $this->denda->getDetailDenda() . "\n";
        } else {
            echo "[ Rincian Kalkulasi Denda ]\n";
            echo "Status          : Tidak ada denda (Tepat Waktu & Kondisi Baik).\n";
        }
        echo "--------------------------------------------------------------------------------\n\n";
    }
}

$buku1 = new Buku("BK-001", "Pemrograman Berorientasi Objek", "Syahru Rahmayuda", 2026);
$anggota1 = new Anggota("AG-101", "Ahmad Rahman", "Jl. Ahmad Yani Pontianak", "08123456789");

$peminjaman1 = new Peminjaman("TRX-2026-001", $anggota1, $buku1, "2026-10-21", "2026-10-28");
$peminjaman1->catatPeminjaman();

$pengembalian1 = new Pengembalian("RET-2026-001", $peminjaman1, "2026-10-31", "Rusak");
$pengembalian1->cetakStrukPengembalian();

if ($pengembalian1->getDenda() !== null) {
    $pengembalian1->getDenda()->bayarDenda();
}

?>