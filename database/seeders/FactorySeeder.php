<?php

namespace Database\Seeders;

use App\Models\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factories=['F1','F2','F3','F4','F5'];
        for($i=0;$i<5;$i++){
            Factory::query()->create([
                'name'=>$factories[$i],
            ]);
        }
    }
}
