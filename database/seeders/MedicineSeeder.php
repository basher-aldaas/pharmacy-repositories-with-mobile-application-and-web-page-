<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Medicine::query()->insert([
        [
            'commercial_name'=>"Acetaminophen",
        ],
        [
            'commercial_name'=>"Ibuprofen",
        ],
        [
            'commercial_name'=>"Aspirin",
        ],
        [
            'commercial_name'=>"Naproxen",
        ],
        [
            'commercial_name'=>"Ketorolac",
        ],
        [
            'commercial_name'=>"Morphine",
        ],
      ///
        [
            'commercial_name'=>"Amoxicillin",

        ],
        [
            'commercial_name'=>"Ciprofloxacin",

        ],
        [
            'commercial_name'=>"Azithromycin",

        ],
        [
            'commercial_name'=>"Penicillin",

        ],
        [
            'commercial_name'=>"Doxycycline",

        ],
        [
            'commercial_name'=>"Erythromycin",

        ],
        ////
        [
            'commercial_name'=>"Sertraline",

        ],
        [
            'commercial_name'=>"Bupropion",

        ],
        [
            'commercial_name'=>"Fluoxetine",

        ],
        [
            'commercial_name'=>"Escitalopram",

        ],
        [
            'commercial_name'=>"Venlafaxine",

        ],
        [
            'commercial_name'=>"Amitriptyline",

        ],
        ///
        [
            'commercial_name'=>"Lisinopril",

        ],
        [
            'commercial_name'=>"Losartan",

        ],
        [
            'commercial_name'=>"Amlodipine",

        ],
        [
            'commercial_name'=>"Metoprolol",

        ],
        [
            'commercial_name'=>"Valsartan",

        ],
        [
            'commercial_name'=>"Hydrochlorothiazide",

        ],
        ////
        [
            'commercial_name'=>"Rolaids",

        ],
        [
            'commercial_name'=>"Maalox",

        ],
        [
            'commercial_name'=>"Tums",

        ],
        [
            'commercial_name'=>"Mylanta",

        ],
        [
            'commercial_name'=>"Gaviscon",

        ],
        [
            'commercial_name'=>"Pepto-Bismol",

        ],
        ///
        [
            'commercial_name'=>"Cetirizine",

        ],
        [
            'commercial_name'=>"Levocetirizine",

        ],
        [
            'commercial_name'=>"Fexofenadine",

        ],
        [
            'commercial_name'=>"Diphenhydramine",

        ],
        [
            'commercial_name'=>"Desloratadine",

        ],
        [
            'commercial_name'=>"Loratadine",

        ]
        ///

       ]);
    }
}
