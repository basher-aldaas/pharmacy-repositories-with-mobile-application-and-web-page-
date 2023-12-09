<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FactoryMedicine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CatigorieSeeder::class,
            UserSeeder::class,
            FactorySeeder::class,
            MedicineSeeder::class,
            FactoryMedicineSeeder::class

        ]);
    }
}
