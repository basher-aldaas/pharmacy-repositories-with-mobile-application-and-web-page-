<?php

namespace Database\Seeders;

use App\Models\FactoryMedicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactoryMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FactoryMedicine::query()->insert([
            [
                'factory_id'=>1,
                'catigorie_id'=>1,
                'medicine_id'=>1,
                'scientific_name'=>'Aspirin',
                'commercial_name'=>'Aspirin',
                'catigorie'=>'Analgesics',
                'man_company'=>'tameco',
                'exp_day'=>'2024-9-15',
                'price'=>2500,
                'amount'=>90
            ],
            [
                'factory_id'=>1,
                'catigorie_id'=>1,
                'medicine_id'=>2,
                'scientific_name'=>'Morphine',
                'commercial_name'=>'Morphine',
                'catigorie'=>'Analgesics',
                'man_company'=>'tameco',
                'exp_day'=>'2024-9-15',
                'price'=>2500,
                'amount'=>90
            ],
            [
                'factory_id'=>2,
                'catigorie_id'=>2,
                'medicine_id'=>7,
                'scientific_name'=>'Lisinopril',
                'commercial_name'=>'Lisinopril',
                'catigorie'=>'Antibiotics',
                'man_company'=>'tameco',
                'exp_day'=>'2024-9-15',
                'price'=>2500,
                'amount'=>90
            ],
        ]);
    }
}
