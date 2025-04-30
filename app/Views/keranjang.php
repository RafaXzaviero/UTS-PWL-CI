<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="mb-4 fw-bold">Keranjang Belanja</h2>

    <?php if (empty($keranjang)): ?>
        <div class="alert">Keranjang masih kosong.</div>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Aksi</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                <?php $grandTotal = 0; ?>
                <?php foreach ($keranjang as $item): ?>
                    <?php $total = $item['qty'] * $item['harga']; ?>
                    <?php $grandTotal += $total; ?>
                    <tr>
                        <td><?= esc($item['nama']) ?></td>
                        <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                        <td>
                            <div class="input-group" style="width: 120px;">
                                <button class="btn btn-outline-secondary btn-sm"
                                    onclick="updateQuantity(<?= $item['id'] ?>, 'kurang')">-</button>
                                <input type="text" class="form-control bg-light form-control-sm text-center" value="<?= $item['qty'] ?>"
                                    readonly>
                                <button class="btn btn-outline-secondary btn-sm"
                                    onclick="updateQuantity(<?= $item['id'] ?>, 'tambah')">+</button>
                            </div>
                        </td>
                        <td>Rp.<?= number_format($total, 0, ',', '.') ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="removeItem(<?= $item['id'] ?>)">
                                Hapus
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Grand Total</th>
                    <th>Rp<?= number_format($grandTotal, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>=
<script>
    function updateQuantity(productId, action) {
        fetch('<?= base_url('transaksi/update-keranjang') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                id: productId,
                action: action // 'tambah' atau 'kurang'
            })
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload halaman keranjang
                } else {
                    alert(data.message || 'Gagal update jumlah.');
                }
            })
            .catch(err => {
                console.error('Update gagal:', err);
            });
    }

    function removeItem(productId) {
        fetch('<?= base_url('transaksi/hapus-item') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({ id: productId })
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || 'Gagal menghapus item.');
                }
            })
            .catch(err => {
                console.error('Gagal hapus item:', err);
            });
    }
</script>

<?= $this->endSection() ?>