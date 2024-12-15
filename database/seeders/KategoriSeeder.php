<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produk')->insert([
            [
                'id'        => 1,
                'nama'      => 'Mask',
                'deskripsi' => 'Produk skincare yang berfungsi untuk perawatan wajah dengan cara diaplikasikan sebagai masker.',
                'path_img'  => 'images/0ysbN2XOROMZLlPsgQdt2Gev3lT60eV6J5JgZzw0.jpg',
            ],
            [
                'id'        => 2,
                'nama'      => 'Eye Cream',
                'deskripsi' => 'Krim yang digunakan untuk merawat area sekitar mata agar tetap lembap dan terhindar dari kerutan.',
                'path_img'  => 'https://i.pinimg.com/736x/7e/03/bb/7e03bb4463c264f94260ecfefec6780b.jpg',
            ],
            [
                'id'        => 3,
                'nama'      => 'Sunscreen',
                'deskripsi' => 'Produk yang melindungi kulit dari efek buruk sinar matahari dengan SPF dan PA.',
                'path_img'  => 'https://i.pinimg.com/736x/f8/51/fb/f851fb4bd2e6ebc1db96862816ef1534.jpg',
            ],
            [
                'id'        => 4,
                'nama'      => 'Moisturizer',
                'deskripsi' => 'Produk pelembap yang digunakan untuk menjaga kelembapan kulit wajah.',
                'path_img'  => 'https://i.pinimg.com/736x/e3/78/27/e378274dac759d12b3f0db56722dc552.jpg',
            ],
            [
                'id'        => 5,
                'nama'      => 'Serum',
                'deskripsi' => 'Produk yang mengandung bahan aktif untuk menargetkan masalah kulit tertentu, seperti penuaan, jerawat, atau hiperpigmentasi.',
                'path_img'  => 'https://i.pinimg.com/736x/1b/db/e8/1bdbe87471a748a56fe44d98d5b2f6db.jpg',
            ],
            [
                'id'        => 6,
                'nama'      => 'Toner',
                'deskripsi' => 'Produk yang digunakan setelah mencuci muka untuk menyeimbangkan pH kulit dan mengangkat sisa-sisa kotoran.',
                'path_img'  => 'https://cdn.wconcept.com/products/resize/632x843/migration/i/imgpin.wconceptusa.com/18987166860/d469f/49/hCXSEYkSK6f7cLRT4oV7YvyqnhE.png',
            ],
            [
                'id'        => 7,
                'nama'      => 'Exfoliator',
                'deskripsi' => 'Produk yang membantu mengangkat sel-sel kulit mati dari permukaan kulit.',
                'path_img'  => 'https://www.belleandblush.com/cdn/shop/products/Layer3derma.jpg?v=1714587501',
            ],
            [
                'id'        => 8,
                'nama'      => 'Cleanser',
                'deskripsi' => 'Produk pembersih wajah yang digunakan untuk menghilangkan kotoran, minyak, dan makeup dari kulit.',
                'path_img'  => 'https://imageskincare.com/cdn/shop/products/ilumaexfoliatingcleanserpdpr02a.jpg?v=1679328827&width=700',
            ]
        ]);
    }
}
