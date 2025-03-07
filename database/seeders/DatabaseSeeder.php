<?php

namespace Database\Seeders;

use App\Models\Invitation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'     => 'Superadmin',
            'email'    => 'superadmin@gmail.com',
            'password' => 'password',
        ]);

        $this->call([
            RolePermissionSeeder::class,
            TemplateSeeder::class,
            InvitationSeeder::class,
        ]);
    }
}
