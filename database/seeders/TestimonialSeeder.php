<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name'   => 'Riki David',
                'text'   => 'Sangat puas dengan undangannya! Desainnya elegan dan proses pembuatannya sangat mudah. Terima kasih!',
                'star'   => 5,
                'status' => true,
            ],
            [
                'name'   => 'Rahmawati',
                'text'   => 'Undangannya cantik dan sesuai harapan. Banyak yang memuji desainnya. Layanan yang sangat profesional!',
                'star'   => 5,
                'status' => true,
            ],
            [
                'name'   => 'Zaki Dhia',
                'text'   => 'Proses pemesanan mudah dan cepat. Hasil undangannya sangat memuaskan, sangat direkomendasikan!',
                'star'   => 4,
                'status' => true,
            ],
            [
                'name'   => 'Heri Saputra',
                'text'   => 'Layanan luar biasa! Undangan yang dipesan sangat sesuai dengan keinginan kami. Terima kasih banyak!',
                'star'   => 5,
                'status' => true,
            ],
            [
                'name'   => 'Khairani',
                'text'   => 'Undangan yang indah dan berkualitas tinggi. Sangat senang bisa bekerja sama dengan tim yang profesional.',
                'star'   => 5,
                'status' => true,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Testimonial::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
