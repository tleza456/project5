<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = "Somchai Jaidee";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("1234");
        $user->save();
    }
}
