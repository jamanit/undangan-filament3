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
        $invitaions = [
            [
                'user_id'      => 1,
                'code'         => 'KD1234',
                'template_id'  => 9,
                'expired_date' => '2025-10-23',
                'status'       => 'Active',
            ],
        ];
        foreach ($invitaions as $invitaion) {
            \App\Models\Invitation::updateOrCreate(['code' => $invitaion['code']], $invitaion);
        }

        $weddingCouples = [
            [
                'invitation_id'      => 1,
                'bride_photo'        => null,
                'bride_full_name'    => 'Sri Melati',
                'bride_nickname'     => 'Melati',
                'bride_child_number' => 'Anak ke-2',
                'bride_mother_name'  => 'Ibu Siti Khadijah',
                'bride_father_name'  => 'Bapak Hasan Basri',
                'groom_photo'        => null,
                'groom_full_name'    => 'Fikri Putra',
                'groom_nickname'     => 'Fikri',
                'groom_child_number' => 'Anak ke-1',
                'groom_mother_name'  => 'Ibu Nur Aini',
                'groom_father_name'  => 'Bapak Zainal Abidin',
                'opening_greeting'   => "Assalamu'alaikum Warahmatullahi Wabarakatuh",
                'text_greeting'      => '<p>Dengan memohon Rahmat dan Ridho Allah SWT kami bermaksud untuk mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami:</p>',
            ],
        ];
        foreach ($weddingCouples as $weddingCouple) {
            \App\Models\WeddingCouple::updateOrCreate(['invitation_id' => $weddingCouple['invitation_id']], $weddingCouple);
        }

        $quotes = [
            [
                'invitation_id' => 1,
                'text'          => '<p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir." <p>(QS Ar-Rum 21)</p></p>',
                'image_1'       => null,
                'image_2'       => null,
                'image_3'       => null,
                'image_4'       => null,
            ]
        ];
        foreach ($quotes as $quote) {
            \App\Models\Quote::updateOrCreate(['invitation_id' => $quote['invitation_id']], $quote);
        }
    }
}
