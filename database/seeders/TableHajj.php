<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableHajj extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_hajj')->insert([
            'name' => 'Nama Biro Haji 1',
            'location' => 'Lokasi Biro Haji 1',
            'rating' => 3,
            'description' => 'Deskripsi Biro Haji 1 yang menjelaskan layanan unggulan dan pengalaman kami dalam menyelenggarakan ibadah haji. Kami menawarkan pelayanan premium dengan panduan yang berpengalaman. Dapatkan pengalaman haji yang tak terlupakan bersama kami.',
            'image' => 'path/to/image1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tb_hajj')->insert([
            'name' => 'Nama Biro Haji 2',
            'location' => 'Lokasi Biro Haji 1',
            'rating' => 2,
            'description' => 'Deskripsi Biro Haji 2 yang merinci berbagai paket perjalanan haji yang kami tawarkan. Dengan komitmen kepada kenyamanan dan keselamatan jamaah, kami menjadi pilihan utama dalam menyelenggarakan perjalanan ibadah haji. Temukan keberangkatan haji yang sesuai dengan kebutuhan Anda.',
            'image' => 'path/to/image2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tb_hajj')->insert([
            'name' => 'Nama Biro Haji 3',
            'location' => 'Lokasi Biro Haji 1',
            'rating' => 4,
            'description' => 'Deskripsi Biro Haji 3 yang memberikan informasi rinci tentang fasilitas akomodasi, transportasi, dan layanan tambahan yang kami sediakan. Kami berkomitmen untuk memberikan pelayanan terbaik untuk memastikan ibadah haji Anda berjalan lancar.',
            'image' => 'path/to/image3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tb_hajj')->insert([
            'name' => 'Nama Biro Haji 4',
            'location' => 'Lokasi Biro Haji 1',
            'rating' => 5,
            'description' => 'Deskripsi Biro Haji 4 yang menekankan komitmen kami untuk memberikan pengalaman haji yang bermakna dan tanpa kesulitan. Dengan staf yang berdedikasi, kami siap memberikan dukungan penuh selama perjalanan ibadah haji Anda.',
            'image' => 'path/to/image4.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tb_hajj')->insert([
            'name' => 'Nama Biro Haji 5',
            'location' => 'Lokasi Biro Haji 1',
            'rating' => 3,
            'description' => 'Deskripsi Biro Haji 5 yang menawarkan beragam paket haji dengan harga yang kompetitif. Kami memahami pentingnya persiapan yang matang untuk ibadah haji, dan kami hadir untuk membantu Anda menjalani perjalanan spiritual ini dengan nyaman dan aman.',
            'image' => 'path/to/image5.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tb_hajj')->insert([
            'name' => 'Nama Biro Haji 6',
            'location' => 'Lokasi Biro Haji 1',
            'rating' => 4,
            'description' => 'Deskripsi Biro Haji 6 yang fokus pada pelayanan personal dan perhatian khusus kepada setiap jamaah. Dengan pengalaman bertahun-tahun, kami telah berhasil membantu ribuan jamaah menjalani ibadah haji dengan lancar dan berkesan.',
            'image' => 'path/to/image6.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
