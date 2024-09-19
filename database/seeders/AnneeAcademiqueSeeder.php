<?php

namespace Database\Seeders;

use App\Models\AnneeAcademique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnneeAcademiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = date("Y"); $i > date("Y") - 20; $i--) {
            AnneeAcademique::create([
                "CodeAnneeAcademique" => $i,
                "LibelleAnneeAcademique" => $i . "-" . ($i + 1),
                "AnneeDebut" => $i,
            ]);
        }
    }
}
