<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>"Abdul-Rahman Omar",
            'email'=>"abdulrahmanom568@gmail.com",
            'password'=> bcrypt(">$(T6P,JPv^x9HF"),
        ]);
        User::create([
            'name'=>"Ahmed Omar",
            'email'=>"Ahmed@gmail.com",
            'password'=>bcrypt("<_@.Q$+QO7uM!R@"),
        ]);
    }


}
