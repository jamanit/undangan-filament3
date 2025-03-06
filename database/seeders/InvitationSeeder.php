<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id'      => 1,
                'code'         => 'KD1234',
                'template_id'  => 1,
                'expired_date' => '2025-10-23',
                'status'       => 'Active',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Invitation::updateOrCreate(['code' => $item['code']], $item);
        }
    }
}
