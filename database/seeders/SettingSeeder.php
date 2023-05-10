<?php

namespace Database\Seeders;

use App\Enums\SettingPrefix;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generals = [
            [
                'prefix' => SettingPrefix::GENERAL,
                'variable' => 'LOGO',
                'type' => 'image',
                'value' => null,
            ],
            [
                'prefix' => SettingPrefix::GENERAL,
                'variable' => 'TITLE',
                'type' => 'text',
                'value' => 'SD Negeri 1 Cermee',
            ],
            [
                'prefix' => SettingPrefix::GENERAL,
                'variable' => 'DESCRIPTION',
                'type' => 'text',
                'value' => 'SD Negeri 1 Cermee',
            ],
            [
                'prefix' => SettingPrefix::GENERAL,
                'variable' => 'KEYWORDS',
                'type' => 'text',
                'value' => 'SD CERMEE 1 BONDOWOSO, SDN 1 CERMEE BONDOWOSO',
            ]
        ];

        $greetings = [
            [
                'prefix' => SettingPrefix::GREETINGS,
                'variable' => 'KATA_SAMBUTAN',
                'type' => 'text',
                'value' => '<p><b>Assalamualaikum Wr. Wb</b><br /> Selamat datang di website kami SD Negeri 1 Cermee Bondowoso yang dapat digunakan sebagai salah satu media komunikasi, dan dapat dijadikan sebagai wahana interaksi yang positif antara civitas akademika maupun masyarakat pada umumnya.</p>',
            ],
        ];

        $contacts = [
            [
                'prefix' => SettingPrefix::CONTACT,
                'variable' => 'PUSAT_BANTUAN',
                'type' => 'text',
                'value' => '<p>Jika anda mengalami masalah dalam lingkup akademik, silahkan hubungi kami melalui kontak dibawah ini.</p>',
            ],
            [
                'prefix' => SettingPrefix::CONTACT,
                'variable' => 'PHONE',
                'type' => 'text',
                'value' => '0338 - 672507',
            ],
            [
                'prefix' => SettingPrefix::CONTACT,
                'variable' => 'JAM_KANTOR',
                'type' => 'text',
                'value' => 'Senin - Jumat (07.00 - 12.00)',
            ],
            [
                'prefix' => SettingPrefix::CONTACT,
                'variable' => 'EMAIL',
                'type' => 'text',
                'value' => 'info@sdn1cermee.sch.id',
            ],
        ];

        $systems = [
            [
                'prefix' => SettingPrefix::SYSTEM,
                'variable' => 'DEFAULT_ROLE',
                'type' => 'text',
                'value' => 1, // <-- Role ID
            ]
        ];

        $settings = collect([...$generals, ...$greetings, ...$contacts, ...$systems]);

        $settings->each(fn($setting) => Setting::create($setting));
    }
}
