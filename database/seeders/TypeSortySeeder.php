<?php

namespace Database\Seeders;

use App\Models\TypeSorty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSortySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // integer , string , double , date
        $ts = [
            [
                "CodeTypeSortie" => "string",
                "LibelleTypeSortie" => "Chaîne de caractère",
            ],
            [
                "CodeTypeSortie" => "integer",
                "LibelleTypeSortie" => "Nombre entier",
            ],
            [
                "CodeTypeSortie" => "double",
                "LibelleTypeSortie" => "Nombre décimal",
            ],
            [
                "CodeTypeSortie" => "date",
                "LibelleTypeSortie" => "Date",
            ],
        ];

        foreach ($ts as $t) {
            TypeSorty::updateOrCreate(
                [
                    "CodeTypeSortie" => $t["CodeTypeSortie"],
                ],
                [
                    "CodeTypeSortie" => $t["CodeTypeSortie"],
                    "LibelleTypeSortie" => $t["LibelleTypeSortie"],
                ]
            );
        }
    }
}
