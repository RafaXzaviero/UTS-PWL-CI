<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
<!-- home -->
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>    
        </li>
<!-- End Home Nav -->


<!-- Cart -->
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Cart</span>
            </a>
        </li>
<!-- End Cart -->

<!-- Produk -->
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
                    <i class="bi bi-receipt"></i>
                    <span>Products</span>
                </a>
            </li>
<!-- End Produk-->

<!-- kategori -->
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'kategori') ? "" : "collapsed" ?>" href="<?= base_url('kategori')?>">
                    <i class="bi bi-filter"></i>
                    <span>Categories</span>
                </a>
            </li>
<!-- End kategori -->
</ul>    
</aside>
<!-- End Sidebar-->