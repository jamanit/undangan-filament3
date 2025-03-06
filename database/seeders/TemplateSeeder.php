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
                'name'      => 'Template Name',
                'parameter' => 'parameter',
                'type'      => 'Undangan Pernikahan',
                'status'    => 'Publish',
                'image'     => null,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Template::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
