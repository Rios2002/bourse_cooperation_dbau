<?php

namespace Database\Seeders;

use App\Models\TypeFormulaire;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeFormulaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = [
            [
                'CodeTypeFormulaire' => 'STANDARD',
                'LibelleTypeFormulaire' => 'Standard | Sera utilisé par toutes les bourses.',
            ],
            [
                'CodeTypeFormulaire' => 'NONSTANDARD',
                'LibelleTypeFormulaire' => 'Non Standard | Sera utilisé par certaines bourses.',
            ],
        ];

        foreach ($types as $type) {
            TypeFormulaire::updateOrCreate(
                [
                    'CodeTypeFormulaire' => $type['CodeTypeFormulaire'],
                ],
                [
                    'CodeTypeFormulaire' => $type['CodeTypeFormulaire'],
                    'LibelleTypeFormulaire' => $type['LibelleTypeFormulaire'],
                ]
            );
        }
    }
}
