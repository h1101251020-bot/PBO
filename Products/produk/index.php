<?php
require_once 'Product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_id'])) {
    $ok = Product::delete((int) $_POST['hapus_id']);
    header('Location: index.php?pesan=' . ($ok ? 'hapus_ok' : 'gagal'));
    exit;
}

$pesan = [
    'tambah_ok' => ['ok',  '🎀 Yay! Produk berhasil ditambahkan.'],
    'ubah_ok'   => ['ok',  '✨ Produk berhasil diperbarui.'],
    'hapus_ok'  => ['ok',  '🗑️ Produk berhasil dihapus.'],
    'gagal'     => ['err', '😢 Oops, operasi gagal.'],
];
$notif = $pesan[$_GET['pesan'] ?? ''] ?? null;

$produk = Product::findAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h1>🌸 Manajemen Produk 🌸</h1>
        <p class="subtitle">Kelola produk tokomu dengan manis~</p>

        <div class="toolbar">
            <a class="btn btn-lg" href="form.php">➕ Tambah Produk</a>
        </div>

        <?php if ($notif): ?>
            <div class="alert alert-<?= $notif[0] ?>"><?= $notif[1] ?></div>
        <?php endif; ?>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($produk)): ?>
                    <tr>
                        <td colspan="5" class="kosong">
                            <span class="big">🧸</span>
                            Belum ada produk, yuk tambah yang pertama!
                        </td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($produk as $p): ?>
                    <tr>
                        <td>#<?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['nama']) ?></td>
                        <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                        <td>
                            <span class="badge <?= $p['stok'] <= 5 ? 'badge-low' : '' ?>"><?= $p['stok'] ?></span>
                        </td>
                        <td class="aksi">
                            <a class="btn btn-warning" href="form.php?id=<?= $p['id'] ?>">✏️ Edit</a>
                            <form class="inline" method="post" onsubmit="return confirm('Hapus produk ini?')">
                                <input type="hidden" name="hapus_id" value="<?= $p['id'] ?>">
                                <button class="btn btn-danger" type="submit" style="width:auto">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>