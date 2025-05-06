<?php

namespace Database\Seeders;

use App\Models\Inbox;
use App\Models\Invitation;
use App\Models\SiteConfig;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => Str::uuid(),
            'name'     => 'Superadmin',
            'email'    => 'superadmin@email.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'id' => Str::uuid(),
            'name'     => 'Admin',
            'email'    => 'admin@email.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'id' => Str::uuid(),
            'name'     => 'User',
            'email'    => 'user@email.com',
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
