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
                'discount'      => '10%',
                'description'   => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit corrupti at illum ducimus, dolores enim architecto corporis minima quibusdam ratione ipsam animi porro. Rerum incidunt optio maiores mollitia quas aliquid?</p>',
                'popular_label' => 'Yes',
            ],
            [
                'order'         => 2,
                'title'         => 'Premium',
                'price'         => 90000,
                'discount'      => null,
                'description'   => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit corrupti at illum ducimus, dolores enim architecto corporis minima quibusdam ratione ipsam animi porro. Rerum incidunt optio maiores mollitia quas aliquid?</p>',
                'popular_label' => 'No',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Price::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
