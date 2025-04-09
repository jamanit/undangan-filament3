<?php

namespace Database\Seeders;

use App\Models\Inbox;
use App\Models\Invitation;
use App\Models\SiteConfig;
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

        User::factory()->create([
            'name'     => 'User',
            'email'    => 'user@gmail.com',
            'password' => 'password',
        ]);

        $this->call([
            SiteConfigSeeder::class,
            SyncPermissionsSeeder::class,
            RolePermissionSeeder::class,
            TemplateSeeder::class,
            InvitationSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            PriceSeeder::class,
            InboxSeeder::class,
        ]);
    }
}
