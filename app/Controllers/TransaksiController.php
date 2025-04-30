<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
    public function tambahKeKeranjang()
    {
        $request = $this->request->getJSON(true);
        $idProduk = $request['id'] ?? null;

        // Data produk disamakan dengan yang ada di ProdukController
        $produkList = [
            //shoes
            ['id' => 1, 'nama' => 'New Balance 2002', 'deskripsi' => 'New Balance 2002 Unisex Sneakers Shoes - White/Green', 'harga' => 2599000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWU2002RWA00W10H-1.jpg', 'kategori' => 'shoes'],
            ['id' => 2, 'nama' => 'New Balance 1000 ', 'deskripsi' => 'New Balance 1000 Mens Sneakers Shoes - Black', 'harga' => 2799000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWM1000BBV00510H-1.jpg', 'kategori' => 'shoes'],
            ['id' => 3, 'nama' => 'New Balance 370', 'deskripsi' => 'New Balance 370 Unisex Sneakers Shoes - Grey/Black', 'harga' => 1799000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWU370CA00510H-1.jpg', 'kategori' => 'shoes'],
            ['id' => 4, 'nama' => 'New Balance 1906A', 'deskripsi' => 'New Balance 1906A Mens Sneakers Shoes - Brown/Black', 'harga' => 2599000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWU1906AA70010H-1.jpg', 'kategori' => 'shoes'],
            ['id' => 5, 'nama' => 'New Balance 9060', 'deskripsi' => 'New Balance 9060 Unisex Sneakers Shoes - White', 'harga' => 2599000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWU9060ZGF00W10H-1.jpg', 'kategori' => 'shoes'],
            ['id' => 6, 'nama' => 'New Balance 550', 'deskripsi' => 'New Balance 550 Mens Sneakers Shoes - White/Black', 'harga' => 2099000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWBB550GWB00W10H-1.jpg', 'kategori' => 'shoes'],

            // Accessories
            ['id' => 7, 'nama' => 'Athletics Packable Mens Jacket', 'deskripsi' => 'New Balance Athletics Packable Mens Jacket - Black', 'harga' => 1799000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWMO51501BK0050XL-1.jpg', 'kategori' => 'accessories'],
            ['id' => 8, 'nama' => 'NB Athletics Unisex Caps', 'deskripsi' => 'New Balance 6 Panel NB Athletics Unisex Caps - White', 'harga' => 45900, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWLAH51014W00WOSZ-1.jpg', 'kategori' => 'accessories'],
            ['id' => 9, 'nama' => 'Oversized League Womens T-shirt', 'deskripsi' => 'New Balance Athletics Oversized League Womens T-shirt - Grey', 'harga' => 367200, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWWT43549AHGRE0XS-1.jpg', 'kategori' => 'accessories'],
            ['id' => 10, 'nama' => 'Hoops Graphic Mens T-shirt', 'deskripsi' => 'New Balance Hoops Graphic Mens T-shirt - Beige', 'harga' => 399200, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWMT44585LI0180XL-1.jpg', 'kategori' => 'accessories'],
            ['id' => 11, 'nama' => 'NB Seasonal Unisex Hat ', 'deskripsi' => 'New Balance 6 Panel Seasonal Unisex Hat - Black', 'harga' => 319200, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWLAH43014B005OSZ-1.jpg', 'kategori' => 'accessories'],
            ['id' => 12, 'nama' => 'Ankle Unisex Socks 3 Pack', 'deskripsi' => 'New Balance Everyday Lightweight Ankle Unisex Socks 3 Pack - Multi', 'harga' => 139000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/e7484c88952c29947d60005fae580504/0/8/0888-NEWLAS51483E00W00M-1.jpg', 'kategori' => 'accessories'],

            // Bag
            ['id' => 13, 'nama' => 'Basic Unisex Backpack', 'deskripsi' => 'New Balance Basic Unisex Backpack - Black', 'harga' => 489300, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWLAB13193B005OSZ-1.jpg', 'kategori' => 'bag'],
            ['id' => 14, 'nama' => 'Pocket Unisex Backpack', 'deskripsi' => 'New Balance Mesh Pocket Unisex Backpack - Black/Red', 'harga' => 559300, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWLAB13194D00ROSZ-1.jpg', 'kategori' => 'bag'],
            ['id' => 15, 'nama' => 'Utility Unisex Small Duffel', 'deskripsi' => 'New Balance Utility Unisex Small Duffel - White', 'harga' => 359000, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWLAB51905W00WOSZ-1.jpg', 'kategori' => 'bag'],
            ['id' => 16, 'nama' => 'Utility Unisex Backpack', 'deskripsi' => 'New Balance Utility Unisex Backpack - White', 'harga' => 367200, 'gambar' => 'https://www.newbalance.co.id/media/catalog/product/cache/b444f50a64a092a2138a5e1cbd49879a/0/8/0888-NEWLAB51900W00WOSZ-1.jpg', 'kategori' => 'bag'],
        ];

        // Cari produk berdasarkan ID yang dikirim
        $produk = null;
        foreach ($produkList as $p) {
            if ($p['id'] == $idProduk) {
                $produk = $p;
                break;
            }
        }

        if (!$produk) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Produk tidak ditemukan']);
        }

        $session = session();
        $keranjang = $session->get('keranjang') ?? [];

        if (isset($keranjang[$idProduk])) {
            $keranjang[$idProduk]['qty'] += 1;
        } else {
            $keranjang[$idProduk] = [
                'id' => $produk['id'],
                'nama' => $produk['nama'],
                'harga' => $produk['harga'],
                'qty' => 1
            ];
        }

        $session->set('keranjang', $keranjang);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Berhasil ditambahkan',
            'totalItem' => array_sum(array_column($keranjang, 'qty'))
        ]);
    }

    public function updateKeranjang()
    {
        $request = $this->request->getJSON(true);
        $idProduk = $request['id'] ?? null;
        $action = $request['action'] ?? null;

        $keranjang = session()->get('keranjang') ?? [];

        if (isset($keranjang[$idProduk])) {
            if ($action === 'tambah') {
                $keranjang[$idProduk]['qty'] += 1;
            } elseif ($action === 'kurang') {
                $keranjang[$idProduk]['qty'] -= 1;
                if ($keranjang[$idProduk]['qty'] < 1) {
                    unset($keranjang[$idProduk]); // Hapus item jika qty menjadi 0
                }
            }

            session()->set('keranjang', $keranjang);
            return $this->response->setJSON(['success' => true, 'totalItem' => array_sum(array_column($keranjang, 'qty'))]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Produk tidak ditemukan di keranjang.']);
    }
    
    public function jumlahItemKeranjang(){
        $keranjang = session()->get('keranjang') ?? [];
        $totalItem = array_sum(array_column($keranjang, 'qty'));
        return $this->response->setJSON(['totalItem' => $totalItem]);
    }


    public function hapusItem()
    {
        $request = $this->request->getJSON(true);
        $idProduk = $request['id'] ?? null;

        $keranjang = session()->get('keranjang') ?? [];

        if (isset($keranjang[$idProduk])) {
            unset($keranjang[$idProduk]);
            session()->set('keranjang', $keranjang);
            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Item tidak ditemukan di keranjang.']);
    }

    public function keranjang()
    {
        $keranjang = session()->get('keranjang') ?? [];
        return view('keranjang', ['keranjang' => $keranjang]);
    }
}
