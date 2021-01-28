<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//       User::insert([
//            'username' => '123123123',
//            'email' => Str::random(10).'@gmail.com',
//            'password'=> Hash::make('123123123'),
//            'phone_number' => '283717216',
//            'Admin'=> '1'
//        ]);
    }
}
