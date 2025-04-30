<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="fw-bold mb-4">Kategori Produk</h2>

    <div class="row">
        <?php
        // Daftar kategori dan gambar representatif
        $kategoriList = [
            'shoes' => [
                'label' => 'LifeStyle',
                'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWU2002RWA00W10H-1.jpg'
            ],
            'accessories' => [
                'label' => 'Accessories',
                'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWLAH51014W00WOSZ-1.jpg'
            ],
            'bag' => [
                'label' => 'Bag',
                'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWLAB13193B005OSZ-1.jpg'
            ]
        ];
        ?>

        <?php foreach ($kategoriList as $slug => $kategori): ?>
            <div class="col-md-4 mb-4">
                <a href="<?= base_url('kategori/' . $slug) ?>" class="text-decoration-none text-dark">
                    <div class="card p-3 shadow-sm h-100">
                        <img src="<?= $kategori['gambar'] ?>" class="img-fluid mb-3" alt="<?= esc($kategori['label']) ?>">
                        <h5 class="fw-bold text-center"><?= esc($kategori['label']) ?></h5>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
