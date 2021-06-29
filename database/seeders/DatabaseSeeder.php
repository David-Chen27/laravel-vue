<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Wei Chen',
            'email' => 'kart.david93@gmail.com',
            'password' => Hash::make('123123123')
        ]);
        User::factory(10)->create();
        Community::factory(100)->create();
    }
}
