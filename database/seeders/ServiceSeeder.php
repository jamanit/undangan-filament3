<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'order'   => 1,
                'icon'    => 'fa-solid fa-heart',
                'title'   => 'Desain yang Menarik',
                'caption' => 'Kustomisasi undangan Anda dengan desain yang indah.',
            ],
            [
                'order'   => 2,
                'icon'    => 'fa-solid fa-paper-plane',
                'title'   => 'Pengiriman Digital',
                'caption' => 'Kirim undangan Anda secara digital dengan mudah.',
            ],
            [
                'order'   => 3,
                'icon'    => 'fa-solid fa-calendar-check',
                'title'   => 'Manajemen Acara',
                'caption' => 'Kelola acara Anda dengan mudah.',
            ],
            [
                'order'   => 4,
                'icon'    => 'fa-solid fa-cog',
                'title'   => 'Kustomisasi Fleksibel',
                'caption' => 'Sesuaikan setiap detail undangan Anda sesuai keinginan.',
            ],
            [
                'order'   => 5,
                'icon'    => 'fa-solid fa-mobile-alt',
                'title'   => 'Desain Responsif',
                'caption' => 'Tampilan undangan akan menyesuaikan dengan berbagai perangkat, dari desktop hingga ponsel.',
            ],
            [
                'order'   => 6,
                'icon'    => 'fa-solid fa-video',
                'title'   => 'Fitur Streaming',
                'caption' => 'Lakukan siaran langsung acara Anda untuk tamu yang tidak dapat hadir.',
            ],
            [
                'order'   => 7,
                'icon'    => 'fa-solid fa-message',
                'title'   => 'Pesan Tamu',
                'caption' => 'Tamu dapat meninggalkan pesan dan ucapan langsung melalui platform kami.',
            ],
            [
                'order'   => 8,
                'icon'    => 'fa-solid fa-image',
                'title'   => 'Galeri Foto',
                'caption' => 'Tampilkan momen-momen indah melalui galeri foto yang dapat diakses oleh tamu.',
            ],
            [
                'order'   => 9,
                'icon'    => 'fa-solid fa-gift',
                'title'   => 'Hadiah dari Tamu',
                'caption' => 'Tamu dapat memberikan hadiah melalui rekening atau pengiriman paket.',
            ],
            [
                'order'   => 10,
                'icon'    => 'fa-solid fa-music',
                'title'   => 'Fitur Audio',
                'caption' => 'Sediakan lagu-lagu favorit untuk menciptakan suasana yang lebih meriah.',
            ],
            [
                'order'   => 11,
                'icon'    => 'fa-solid fa-thumbs-up',
                'title'   => 'Pengalaman Pengguna yang Luar Biasa',
                'caption' => 'Kami fokus pada pengalaman pengguna untuk memastikan kepuasan Anda.',
            ],
            [
                'order'   => 12,
                'icon'    => 'fa-solid fa-headset',
                'title'   => 'Dukungan Pelanggan',
                'caption' => 'Kami siap membantu Anda setiap hari mulai pukul 09:00 - 20:00 WIB.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Service::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
