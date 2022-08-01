<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'saiedislam.shuvo1124@gmail.com';
        $user = User::where('email', $email)->first();
        if(is_null($user))
        User::create([
            'name' => 'Saied Islam Shuvo',
            'email' => $email,
            'password' => Hash::make('12341234'),
        ]);
    }
}
