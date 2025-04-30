<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="text-center text-danger fw-bold mb-5">NB PRODUCT</h2>

    <?php
    $kategori = [
        'LifeStyle' => array_filter($produk, fn($p) => $p['kategori'] === 'shoes'),
        'Accessories' => array_filter($produk, fn($p) => $p['kategori'] === 'accessories'),
        'Bag' => array_filter($produk, fn($p) => $p['kategori'] === 'bag'),
    ];
    ?>

    <?php foreach ($kategori as $namaKategori => $daftarProduk): ?>
        <h4 class="fw-semibold mb-3"><?= $namaKategori ?></h4>
        <div class="d-flex overflow-auto mb-5 gap-4 pb-3">
            <?php foreach ($daftarProduk as $id => $item): ?>
                <div class="card border-0 shadow-sm rounded-4 d-flex flex-column text-center p-3"
                    style="min-width: 320px; height: 100%;">
                    <h5 class="fw-bold mb-3"><?= esc($item['nama']) ?></h5>
                    <img src="<?= $item['gambar'] ?>" alt="<?= esc($item['nama']) ?>" class="mx-auto mb-4"
                        style="height: 250px; object-fit: contain;">
                        <p class="text-danger fw-semibold mt-2 mb-3" style="font-size: 1rem;"> Mulai dari Rp<?= number_format($item['harga'], 0, ',', '.') ?></p>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-center gap-3 mt-auto">
                <!-- Tombol View -->
                    <button class="btn btn-outline-secondary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#viewModal-<?= $item['id'] ?>">
                    <i class="fas fa-eye"></i>
                </button>

                <!-- Tombol Cart -->
                <button class="btn btn-sm rounded-circle text-white" style="background-color: darkred;" onclick="addToCart(<?= $item['id'] ?>)"><i class="fas fa-shopping-cart"></i>
                </button>
                </div>
                </div>

                <!-- Modal View Produk  -->
                <div class="modal fade" id="viewModal-<?= $item['id'] ?>" tabindex="-1"
                    aria-labelledby="viewModalLabel-<?= $item['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel-<?= $item['id'] ?>"><?= esc($item['nama']) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= $item['gambar'] ?>" alt="<?= esc($item['nama']) ?>" class="img-fluid mb-3" />
                                <p><?= esc($item['deskripsi']) ?></p>
                                <p><strong>Harga:</strong> Rp<?= number_format($item['harga'], 0, ',', '.') ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-dark btn-sm" onclick="addToCart(<?= $item['id'] ?>)">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="confirmModal-<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center">
                            <div class="modal-body py-5">
                                <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
                                <h5 class="fw-bold">Berhasil ditambahkan ke keranjang!</h5>
                                <p class="text-muted">Produk <strong><?= esc($item['nama']) ?></strong> telah ditambahkan.</p>
                                <button class="btn btn-outline-secondary mt-3" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Tambahkan Font Awesome untuk ikon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<script>
    function addToCart(productId) {
        fetch('<?= base_url('transaksi/tambah-ke-keranjang') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ id: productId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan modal konfirmasi
                    const modalId = '#confirmModal-' + productId;
                    const modal = new bootstrap.Modal(document.querySelector(modalId));
                    modal.show();

                    // (Opsional) Update badge keranjang
                    if (data.totalItem !== undefined) {
                        document.getElementById('cart-count').innerText = data.totalItem;
                    }
                } else {
                    alert(data.message || 'Gagal menambahkan ke keranjang.');
                }
            })
            .catch(error => {
                console.error('Gagal menambahkan ke keranjang:', error);
            });
    }
</script>

<?= $this->endSection() ?>
