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
                'name'  => 'Site Name',
                'key'   => 'site_name',
                'type'  => 'text',
                'value' => 'UndangBae',
            ],
            [
                'name'  => 'Description',
                'key'   => 'description',
                'type'  => 'textarea',
                'value' => 'UndangBae adalah platform undangan digital yang didirikan oleh Jaman IT pada 23 Oktober 2024.',
            ],
            [
                'name'  => 'Website URL',
                'key'   => 'website_url',
                'type'  => 'url',
                'value' => 'https://undangbae.site',
            ],
            [
                'name'  => 'Address',
                'key'   => 'address',
                'type'  => 'text',
                'value' => 'Jl. Patimura Simp. Rimbo Kota Jambi.',
            ],
            [
                'name'  => 'Map URL',
                'key'   => 'map_url',
                'type'  => 'url',
                'value' => 'https://maps.app.goo.gl/BzF4gAmrKWkrqMVa6',
            ],
            [
                'name'  => 'About Us',
                'key'   => 'about_us',
                'type'  => 'textarea',
                'value' => '<p>UndangBae adalah platform undangan digital yang didirikan oleh Jaman IT pada 23 Oktober 2024. Kami hadir untuk membawa inovasi dalam cara orang merayakan momen spesial mereka. Dengan latar belakang di bidang teknologi dan desain, kami memahami pentingnya memberikan pengalaman yang mulus dan menyenangkan bagi pengguna. Visi kami adalah untuk menciptakan solusi undangan yang praktis, estetis, dan ramah lingkungan. Kami percaya bahwa setiap momen berharga, baik itu pernikahan, ulang tahun, atau acara khusus lainnya, pantas dirayakan dengan cara yang unik dan berarti. Dengan berbagai fitur canggih yang kami tawarkan, termasuk desain kustom, interaktivitas, dan kemudahan pengiriman, kami berkomitmen untuk memberikan pengalaman yang tidak hanya modern tetapi juga sesuai dengan kebutuhan zaman. Kami di Jamundangan percaya bahwa teknologi dapat membantu menyatukan orang-orang, dan kami bersemangat untuk menjadi bagian dari perjalanan spesial Anda.</p>',
            ],
            [
                'name'  => 'Colored Logo',
                'key'   => 'colored_logo',
                'type'  => 'file',
                'file'  => null,
            ],
            [
                'name'  => 'White Logo',
                'key'   => 'white_logo',
                'type'  => 'file',
                'file'  => null,
            ],
            [
                'name'  => 'Favicon',
                'key'   => 'favicon',
                'type'  => 'file',
                'file'  => null,
            ],
            [
                'name'  => 'Primary Color',
                'key'   => 'primary_color',
                'type'  => 'text',
                'value' => 'violet',
            ],
            [
                'name'  => 'Banner',
                'key'   => 'banner',
                'type'  => 'file',
                'file'  => null,
            ],
            [
                'name'  => 'Hero Banner',
                'key'   => 'hero_banner',
                'type'  => 'file',
                'file'  => null,
            ],
            [
                'name'  => 'Title Banner',
                'key'   => 'title_banner',
                'type'  => 'textarea',
                'value' => '<p>Selamat Datang di Website</p><p>UndangBae</p>',
            ],
            [
                'name'  => 'Caption Banner',
                'key'   => 'caption_banner',
                'type'  => 'textarea',
                'value' => '<p>Bergabunglah dengan kami untuk merayakan momen-momen berharga dengan cara yang lebih modern dan mudah.</p>',
            ],
            [
                'name'  => 'Phone Number',
                'key'   => 'phone_number',
                'type'  => 'number',
                'value' => '6289508475453',
            ],
            [
                'name'  => 'Email',
                'key'   => 'email',
                'type'  => 'email',
                'value' => 'undangan.jaman@gmail.com',
            ],
            [
                'name'  => 'WhatsApp Number',
                'key'   => 'whatsapp_number',
                'type'  => 'number',
                'value' => '6289508475453',
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
