<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'order'         => 1,
                'title'         => 'Reguler',
                'price'         => 70000,
                'discount'      => null,
                'description'   => '<p>Pilihan hemat untuk undangan yang praktis dan elegan.</p>',
                'popular_label' => true,
            ],
            [
                'order'         => 2,
                'title'         => 'Premium',
                'price'         => 90000,
                'discount'      => '10%',
                'description'   => '<p>Undangan eksklusif dengan pengalaman yang lebih berkesan.</p>',
                'popular_label' => false,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Price::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
