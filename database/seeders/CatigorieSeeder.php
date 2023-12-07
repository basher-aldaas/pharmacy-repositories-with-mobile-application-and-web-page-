<?php

namespace Database\Seeders;

use App\Models\Catigorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatigorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catigories=['Analgesics','Antibiotics','Antidepressants','Antihypertensives','Antacids','Antihistamines','Antiinfectives','Anticonvulsants'];
        for($i=0;$i<8;$i++){
            Catigorie::query()->create([
                'name'=>$catigories[$i],
            ]);
        }
    }
}
