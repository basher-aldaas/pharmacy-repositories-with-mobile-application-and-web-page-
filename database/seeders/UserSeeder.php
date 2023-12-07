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
        User::query()->create([
             'userName'=>'basher',
             'email'=>'basher1@gmail.com',
            'phoneNumber'=>'0968538721',
            'password'=>'5748489k',
            'role'=>1
        ]);

        User::query()->create([
            'userName'=>'basher',
            'email'=>'basher2@gmail.com',
            'phoneNumber'=>'096853872',
            'password'=>'5748489k',
        ]);

        User::query()->create([
            'userName'=>'basher',
            'email'=>'basher3@gmail.com',
            'phoneNumber'=>'0968538723',
            'password'=>'5748489k',
        ]);

        User::query()->create([
            'userName'=>'basher',
            'email'=>'basher4@gmail.com',
            'phoneNumber'=>'0968538724',
            'password'=>'5748489k',
        ]);

        User::query()->create([
            'userName'=>'basher',
            'email'=>'basher5@gmail.com',
            'phoneNumber'=>'0968538725',
            'password'=>'5748489k',
        ]);

    }
}
