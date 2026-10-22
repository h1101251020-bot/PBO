<?php
require_once 'Product.php';

$id     = isset($_GET['id']) ? (int) $_GET['id'] : null;
$data   = ['nama' => '', 'harga' => '', 'stok' => ''];
$errors = [];

if ($id) {
    $row = Product::findById($id);
    if (!$row) {
        header('Location: index.php?pesan=gagal');
        exit;
    }
    $data = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['nama']  = trim($_POST['nama'] ?? '');
    $data['harga'] = $_POST['harga'] ?? '';
    $data['stok']  = $_POST['stok'] ?? '';

    if ($data['nama'] === '')                                  $errors[] = 'Nama produk wajib diisi.';
    if (!is_numeric($data['harga']) || $data['harga'] < 0)     $errors[] = 'Harga harus berupa angka >= 0.';
    if (filter_var($data['stok'], FILTER_VALIDATE_INT) === false || $data['stok'] < 0)
                                                               $errors[] = 'Stok harus berupa bilangan bulat >= 0.';

    if (empty($errors)) {
        $produk = new Product();
        $produk->setNama($data['nama'])
               ->setHarga($data['harga'])
               ->setStok((int) $data['stok']);

        if ($id) {
            $ok = $produk->update($id);
            $kode = 'ubah_ok';
        } else {
            $ok = $produk->save();
            $kode = 'tambah_ok';
        }
        header('Location: index.php?pesan=' . ($ok ? $kode : 'gagal'));
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $id ? 'Edit' : 'Tambah' ?> Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" style="max-width:520px">
    <div class="card">
        <h1><?= $id ? '✏️ Edit Produk' : '🎀 Tambah Produk' ?></h1>
        <p class="subtitle"><?= $id ? 'Perbarui data produkmu~' : 'Isi data produk barumu~' ?></p>

        <?php foreach ($errors as $e): ?>
            <div class="alert alert-err">😢 <?= htmlspecialchars($e) ?></div>
        <?php endforeach; ?>

        <form method="post">
            <label for="nama">🧸 Nama Produk</label>
            <input type="text" id="nama" name="nama" placeholder="contoh: Pensil Pink"
                   value="<?= htmlspecialchars($data['nama']) ?>">

            <label for="harga">💰 Harga (Rp)</label>
            <input type="number" id="harga" name="harga" step="0.01" min="0" placeholder="contoh: 3000"
                   value="<?= htmlspecialchars($data['harga']) ?>">

            <label for="stok">📦 Stok</label>
            <input type="number" id="stok" name="stok" min="0" placeholder="contoh: 50"
                   value="<?= htmlspecialchars($data['stok']) ?>">

            <div class="form-actions">
                <button class="btn btn-lg" type="submit">💾 Simpan</button>
                <a class="btn btn-lg btn-secondary" href="index.php">↩️ Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>