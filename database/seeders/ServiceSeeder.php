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
                'icon'    => 'uil uil-server',
                'title'   => 'Title',
                'caption' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo magni id placeat dolor tenetur odio!',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Service::updateOrCreate(['icon' => $item['icon']], $item);
        }
    }
}
