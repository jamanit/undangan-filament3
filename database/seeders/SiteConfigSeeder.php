<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Colored Logo',
                'key'  => 'colored_logo',
                'type' => 'file',
                'file' => null,
            ],
            [
                'name' => 'White Logo',
                'key'  => 'white_logo',
                'type' => 'file',
                'file' => null,
            ],
            [
                'name' => 'Favicon',
                'key'  => 'favicon',
                'type' => 'file',
                'file' => null,
            ],
            [
                'name' => 'Banner',
                'key'  => 'banner',
                'type' => 'file',
                'file' => null,
            ],
            [
                'name' => 'Hero Banner',
                'key'  => 'hero_banner',
                'type' => 'file',
                'file' => null,
            ],
            [
                'name'  => 'Title Banner',
                'key'   => 'title_banner',
                'type'  => 'textarea',
                'value' => '<p>Selamat Datang di Website</p><p>Site Name</p>',
            ],
            [
                'name'  => 'Caption Banner',
                'key'   => 'caption_banner',
                'type'  => 'textarea',
                'value' => '<p>Bergabunglah dengan kami untuk merayakan momen-momen berharga dengan cara yang lebih modern dan mudah.</p>',
            ],
            [
                'name'  => 'Site Name',
                'key'   => 'site_name',
                'type'  => 'text',
                'value' => 'Site Name',
            ],
            [
                'name'  => 'Website URL',
                'key'   => 'website_url',
                'type'  => 'url',
                'value' => 'https://wwww.example-website-url.com',
            ],
            [
                'name'  => 'Address',
                'key'   => 'address',
                'type'  => 'text',
                'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti, maxime.',
            ],
            [
                'name'  => 'Map URL',
                'key'   => 'map_url',
                'type'  => 'url',
                'value' => 'https://wwww.example-map-url.com',
            ],
            [
                'name'  => 'About Us',
                'key'   => 'about_us',
                'type'  => 'textarea',
                'value' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui quas voluptatem beatae ex dolorum! Hic saepe pariatur architecto tempora illo dicta, ducimus, odio laborum aperiam cum quisquam, natus molestiae nostrum libero vero id nesciunt quis. Et ipsa odit esse, voluptates atque quidem voluptas veritatis quas rerum, cumque exercitationem, ipsum excepturi!</p>',
            ],
            [
                'name'  => 'Phone Number',
                'key'   => 'phone_number',
                'type'  => 'number',
                'value' => '0987654321',
            ],
            [
                'name'  => 'Email',
                'key'   => 'email',
                'type'  => 'email',
                'value' => 'email@example.com',
            ],
            [
                'name'  => 'WhatsApp Number',
                'key'   => 'whatsapp_number',
                'type'  => 'number',
                'value' => '+620987654321',
            ],
            [
                'name'  => 'Instagram URL',
                'key'   => 'instagram_url',
                'type'  => 'url',
                'value' => null,
            ],
            [
                'name'  => 'Facebook URL',
                'key'   => 'facebook_url',
                'type'  => 'url',
                'value' => null,
            ],
            [
                'name'  => 'TikTok URL',
                'key'   => 'tiktok_url',
                'type'  => 'url',
                'value' => null,
            ],
            [
                'name'  => 'TikTok URL',
                'key'   => 'tiktok_url',
                'type'  => 'url',
                'value' => null,
            ],
            [
                'name'  => 'X URL',
                'key'   => 'x_url',
                'type'  => 'url',
                'value' => null,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\SiteConfig::updateOrCreate(['key' => $item['key']], $item);
        }
    }
}
