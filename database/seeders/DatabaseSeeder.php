<?php

namespace Database\Seeders;

use App\Models\Produk;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama' => 'Baby Corn',
            'kategori' => 'Sayur',
            'foto' => 'https://vivregourmet.com/wp-content/uploads/2020/07/Baby-Corn.png',
            'harga' => '3000'
        ]);
        Produk::create([
            'nama' => 'Bawang Bombai',
            'kategori' => 'Bawang',
            'foto' => 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1621837004/attached_image/berbagai-nutrisi-di-balik-manfaat-bombay.jpg',
            'harga' => '5000'
        ]);

        Produk::create([
            'nama' => 'Bawang Merah',
            'kategori' => 'Bawang',
            'foto' => 'https://cdn.shopify.com/s/files/1/0369/8321/0116/products/015_640x.jpg?v=1646380408',
            'harga' => '8000',
        ]);

        Produk::create([
            'nama' => 'Bawang Pre',
            'kategori' => 'Sayur',
            'foto' => 'https://s1.bukalapak.com/img/1252238963/large/FB_IMG_15201696240303304_scaled.jpg',
            'harga' => '2000',
        ]);
        Produk::create([
            'nama' => 'Bawang Putih',
            'kategori' => 'Bawang',
            'foto' => 'https://www.car.co.id/media/267826/28-des_499x334.jpg',
            'harga' => '7000',
        ]);
        Produk::create([
            'nama' => 'Bawang Kating',
            'kategori' => 'Bawang',
            'foto' => 'https://id-test-11.slatic.net/p/997680ee9b3e7488c450a544efaec357.jpg',
            'harga' => '7500',
        ]);
        Produk::create([
            'nama' => 'Bayam',
            'kategori' => 'Sayur',
            'foto' => 'https://www.astronauts.id/blog/wp-content/uploads/2023/01/7-Manfaat-Sayur-Bayam-Untuk-Tubuh--1200x900.jpg',
            'harga' => '2000',
        ]);
        Produk::create([
            'nama' => 'Bokcoy',
            'kategori' => 'Sayur',
            'foto' => 'https://sumberplastik.co.id/wp-content/uploads/2018/10/mengenal-sayuran-bok-choy-dan-manfaatnya-bagi-kesehatan.png',
            'harga' => '3000',
        ]);
        Produk::create([
            'nama' => 'Brokoli',
            'kategori' => 'Sayur',
            'foto' => 'https://balifoodstore.com/18-large_default/brokoli-250gr.jpg',
            'harga' => '6000',
        ]);
        Produk::create([
            'nama' => 'Buncis',
            'kategori' => 'Sayur',
            'foto' => 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1645002933/attached_image/manfaat-buncis-ternyata-lebih-kaya-daripada-sayuran-kacang-sejenis.jpg',
            'harga' => '3000',
        ]);
        Produk::create([
            'nama' => 'Bunga Kol',
            'kategori' => 'Sayur',
            'foto' => 'https://storage.googleapis.com/manfaat/2018/01/2399fde4-bunga-kol.jpeg',
            'harga' => '4000',
        ]);
        Produk::create([
            'nama' => 'Cabe Hijau Besar',
            'kategori' => 'Cabai',
            'foto' => 'https://image1ws.indotrading.com/s3/productimages/webp/co246591/p1016780/w425-h425/d386a0ac-9e40-4cae-880d-ad2c7a5d89bd.jpg',
            'harga' => '3000',
        ]);
        Produk::create([
            'nama' => 'Cabe Keriting',
            'kategori' => 'Cabai',
            'foto' => 'https://images.tokopedia.net/img/cache/500-square/product-1/2019/2/17/49279413/49279413_13d77e42-ae91-44dd-8fb6-6d77c150babb_1050_1050.jpg',
            'harga' => '3000',
        ]);
        Produk::create([
            'nama' => 'Cabe Merah Besar',
            'kategori' => 'Cabai',
            'foto' => 'https://s2.bukalapak.com/img/23511571262/large/data.png',
            'harga' => '3000',
        ]);
        Produk::create([
            'nama' => 'Cabe Merah Besar',
            'kategori' => 'Cabai',
            'foto' => 'https://s2.bukalapak.com/img/23511571262/large/data.png',
            'harga' => '3000',
        ]);
        Produk::create([
            'nama' => 'Cabe Rawit',
            'kategori' => 'Cabai',
            'foto' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2020/11/13/61ae14ca-15d8-4d70-a6a2-e5b7813a06a2.jpg',
            'harga' => '5000',
        ]);

        

        

    }
}
