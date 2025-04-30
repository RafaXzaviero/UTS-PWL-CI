<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .hero-branding {
        width: 100%;
        max-height: 800px;
        object-fit: cover;
        margin-bottom: 3rem;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .about-section {
        background-color: #f5f5f5;
        padding: 3rem 2rem;
        border-radius: 10px;
        margin: 0 auto 4rem auto;
        max-width: 900px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .about-title {
        font-weight: bold;
        font-size: 2rem;
        color: #c8102e;
        margin-bottom: 1rem;
        text-align: center;
    }

    .about-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #333;
        text-align: center;
    }
</style>

<!-- Gambar Branding Vertikal -->
<div class="container">
    <img src="https://sneakernews.com/wp-content/uploads/2023/10/new-balance-9060-u9060yga-u9060yso-release-date.jpg?" alt="Branding" class="hero-branding">
</div>

<!-- Tentang New Balance -->
<div class="about-section">
    <div class="about-title">About New Balance</div>
    <p class="about-text">
        New Balance is a global brand renowned for its perfect blend of cutting-edge technology and classic design. We are committed to creating footwear and apparel that are not only stylish but also support peak performance. Since our founding in 1906, New Balance has continued to innovate for all generations. Our products are crafted with exceptional attention to detail, comfort, and quality making them the ideal choice for those who lead active lives and value personal style. Whether for sports, everyday activities, or an urban lifestyle, New Balance delivers the perfect balance of function and aesthetics. Through our spirit of being “Fearlessly Independent ,” we aim to inspire every step you take toward your greatest achievements.
    </p>
</div>

<!-- Produk Unggulan -->
<div class="about-section">
    <div class="about-title">Featured Product</div>
    <div style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center; margin-top: 2rem;">
        <!-- Produk 1 -->
        <div style="flex: 1 1 250px; background-color: #fff; padding: 1rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWU9060ZGF00W10H-1.jpg" alt="NB 9060" style="max-width: 100%; border-radius: 8px;">
            <h4 style="margin-top: 1rem;">New Balance 9060</h4>
            <p style="font-size: 0.9rem; color: #555;">Klasik yang diperbarui untuk kenyamanan dan performa modern.</p>
        </div>

        <!-- Produk 2 -->
        <div style="flex: 1 1 250px; background-color: #fff; padding: 1rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWLAH51014W00WOSZ-1.jpg" alt="NB Athletics Unisex Caps" style="max-width: 100%; border-radius: 8px;">
            <h4 style="margin-top: 1rem;">NB Athletics Caps</h4>
            <p style="font-size: 0.9rem; color: #555;">Model retro running yang jadi tren fashion kekinian.</p>
        </div>

        <!-- Produk 3 -->
        <div style="flex: 1 1 250px; background-color: #fff; padding: 1rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWLAB51905W00WOSZ-1.jpg" alt="NB Utility SD Backpack" style="max-width: 100%; border-radius: 8px;">
            <h4 style="margin-top: 1rem;">NB Utility Backpack</h4>
            <p style="font-size: 0.9rem; color: #555;">Desain premium dan cushioning maksimal untuk aktivitas harian.</p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
