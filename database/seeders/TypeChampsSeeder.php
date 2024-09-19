<?php

namespace Database\Seeders;

use App\Models\TypeChamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeChampsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $typeChamps = [
            [
                "CodeTypeChamp" => "SAISIE_COURTE",
                "LibelleTypeChamp" => "Champs pour une courte saisie (255 caractères au maximum)",
                "SpatieFunction" => "input",
                "ClassCSS" => "form-control",

                "CodeTypeSortie" => "string",
                "SpatieAttributes" => json_encode(['maxlength' => 255, 'type' => 'text']),
            ],
            [
                "CodeTypeChamp" => "SAISIE_LONGUE",
                "LibelleTypeChamp" => "Champs pour une longue saisie / saisie d'un paragraphe (500 caractères au maximum)",
                "SpatieFunction" => "textarea",
                "ClassCSS" => "form-control w-100",

                "CodeTypeSortie" => "string",
                "SpatieAttributes" => json_encode(['maxlength' => 500, 'rows' => 3]),
            ],
            [
                "CodeTypeChamp" => "NUMERIC",
                "LibelleTypeChamp" => "Champs pour une saisie numérique",
                "SpatieFunction" => "input",
                "ClassCSS" => "form-control",

                "CodeTypeSortie" => "double",
                "SpatieAttributes" => json_encode(['type' => 'number', "min" => 0, "max" => 100]),
            ],
            [
                "CodeTypeChamp" => "DATE",
                "LibelleTypeChamp" => "Champs pour une saisie de date",
                "SpatieFunction" => "input",
                "ClassCSS" => "form-control",

                "CodeTypeSortie" => "date",

                "SpatieAttributes" => json_encode(['type' => 'date']),
            ],
            // [
            //     "CodeTypeChamp" => "SELECT",
            //     "LibelleTypeChamp" => "Choix dans une liste déroulante",
            //     "SpatieFunction" => "select",
            //     "ClassCSS" => "",

            //     "CodeTypeSortie" => "string",
            //     "RawHTML" => '',
            //     "SpatieAttributes" => "[]",
            // ],
        ];

        foreach ($typeChamps as $tc) {
            TypeChamp::updateOrCreate([
                "CodeTypeChamp" => $tc["CodeTypeChamp"]
            ], $tc);
        }
    }
}
