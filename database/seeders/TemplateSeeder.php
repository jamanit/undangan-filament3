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
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Calm Pink',
                'parameter'       => 'wedding-calm-pink',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Calm Red',
                'parameter'       => 'wedding-calm-red',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Calm Green',
                'parameter'       => 'wedding-calm-green',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Calm Blue',
                'parameter'       => 'wedding-calm-blue',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Sideright Golden Brown',
                'parameter'       => 'wedding-sideright-goldenbrown',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Sideright Green Tosca',
                'parameter'       => 'wedding-sideright-greentosca',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Floral Purple',
                'parameter'       => 'wedding-floral-purple',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Floral Green Cream',
                'parameter'       => 'wedding-floral-greencream',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Floral Golden Brown',
                'parameter'       => 'wedding-floral-goldenbrown',
                'status'          => true,
                'image'           => null,
            ],
            [
                'invitation_type' => 'Undangan Pernikahan',
                'name'            => 'Floral Brown',
                'parameter'       => 'wedding-floral-brown',
                'status'          => true,
                'image'           => null,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Template::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
