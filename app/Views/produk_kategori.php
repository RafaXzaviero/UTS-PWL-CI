<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-body {
    padding: 20px;
    transition: background-color 0.3s ease;
}

.card-body:hover {
    background-color:#CF0A2C;
}

.card-footer .btn:hover {
    background-color: #CF0A2C;
    border-color: #CF0A2C;
    transform: translateY(-2px);
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card-img-top:hover {
    transform: scale(1.1);
}
</style>

<h2 class="text-center mb-5 text-dark"><?= esc($kategori) ?></h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($produk as $p): ?>
        <div class="col">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden h-100">
                <img src="<?= esc($p['gambar']) ?>" class="card-img-top" alt="<?= esc($p['nama']) ?>" style="height: 400px; object-fit: cover;">
                <div class="card-body bg-light d-flex flex-column justify-content-between">
                    <h5 class="card-title text-center"><?= esc($p['nama']) ?></h5>
                    <p class="card-text"><?= esc($p['deskripsi']) ?></p>
                    <p class="card-text font-weight-bold text-success">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
                </div>
                <div class="card-footer bg-transparent text-center">
                    <a href="#" class="btn bg-danger btn-lg w-75 mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
