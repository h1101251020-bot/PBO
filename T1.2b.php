<?php
class Fibonacci {
    public $jumlah = 10;

    public function cetak() {
        $a = 0;
        $b = 1;
        $hasil = [];

        for ($i = 0; $i < $this->jumlah; $i++) {
            $hasil[] = $a;
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }

        return implode(" -> ", $hasil);
    }
}

$fibo = new Fibonacci();

echo "<pre>";
echo "==============================================<br>";
echo "  Deret Fibonacci (10 Suku Pertama)<br>";
echo "==============================================<br>";
echo "Hasil : " . $fibo->cetak() . "<br>";
echo "==============================================";
echo "</pre>";
?>