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
                'name'   => 'Name 1',
                'text'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex quo aliquid quisquam possimus? Soluta quisquam aliquid ad, fugiat illum autem.',
                'star'   => 5,
                'status' => true,
            ],
            [
                'name'   => 'Name 2',
                'text'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex quo aliquid quisquam possimus? Soluta quisquam aliquid ad, fugiat illum autem.',
                'star'   => 5,
                'status' => true,
            ],
            [
                'name'   => 'Name 3',
                'text'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex quo aliquid quisquam possimus? Soluta quisquam aliquid ad, fugiat illum autem.',
                'star'   => 5,
                'status' => true,
            ],
            [
                'name'   => 'Name 4',
                'text'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex quo aliquid quisquam possimus? Soluta quisquam aliquid ad, fugiat illum autem.',
                'star'   => 5,
                'status' => true,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Testimonial::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
