<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zeta',
            'email' => 'zeta@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('alifgg12'),
        ]);

        $user->assignRole('admin');
    }
}
