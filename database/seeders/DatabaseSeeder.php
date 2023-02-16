<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\EventKinds;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Vanguard',
            'last_name' => 'Vanguard',
            'phone_number' => '2348166219698',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'avatar' => null,
        ]);

       
    }
}
