<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name'      => 'Calm Pink',
                'parameter' => 'calm-pink',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Calm Red',
                'parameter' => 'calm-red',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Calm Green',
                'parameter' => 'calm-green',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Calm Blue',
                'parameter' => 'calm-blue',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Sideright Golden Brown',
                'parameter' => 'sideright-golden-brown',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Sideright Green Tosca',
                'parameter' => 'sideright-green-tosca',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Floral Purple',
                'parameter' => 'floral-purple',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Floral Green Cream',
                'parameter' => 'floral-green-cream',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Floral Golden Brown',
                'parameter' => 'floral-golden-brown',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
            [
                'name'      => 'Floral Brown',
                'parameter' => 'floral-brown',
                'type'      => 'Undangan Pernikahan',
                'status'    => true,
                'image'     => null,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Template::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
