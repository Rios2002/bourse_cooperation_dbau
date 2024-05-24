<?php

namespace Database\Seeders;

use App\Models\AttributTypeChamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributTypeChampsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*  $CodeTypeChamp
 * @property $SpatieFunction
 * @property $Description
 * @property $TypeValeur */

        $attributs = [
            //SAISIE_COURTE
            [
                "CodeTypeChamp" => "SAISIE_COURTE",
                "SpatieFunction" => "maxlength",
                "LaravelValidationKey" => "max",
                "TypeValeur" => "integer",
                "Description" => "Permet de définir le nombre maximum de caractères autorisés dans le champ de saisie"
            ],
            [
                "CodeTypeChamp" => "SAISIE_COURTE",
                "SpatieFunction" => "minlength",
                "LaravelValidationKey" => "min",
                "TypeValeur" => "integer",
                "Description" => "Permet de définir le nombre manimum de caractères autorisés dans le champ de saisie"
            ],

            // SAISIE_LONGUE
            [
                "CodeTypeChamp" => "SAISIE_LONGUE",
                "SpatieFunction" => "maxlength",
                "LaravelValidationKey" => "max",
                "TypeValeur" => "integer",
                "Description" => "Permet de définir le nombre maximum de caractères autorisés dans le champ de saisie"
            ],
            [
                "CodeTypeChamp" => "SAISIE_LONGUE",
                "SpatieFunction" => "minlength",
                "LaravelValidationKey" => "min",
                "TypeValeur" => "integer",
                "Description" => "Permet de définir le nombre manimum de caractères autorisés dans le champ de saisie"
            ],

            // NUMERIC
            [
                "CodeTypeChamp" => "NUMERIC",
                "SpatieFunction" => "min",
                "LaravelValidationKey" => "min",
                "TypeValeur" => "double",
                "Description" => "Permet de définir la valeur numéric minimum autorisés dans le champ de saisie"
            ],
            [
                "CodeTypeChamp" => "NUMERIC",
                "SpatieFunction" => "max",
                "LaravelValidationKey" => "max",
                "TypeValeur" => "double",
                "Description" => "Permet de définir la valeur numéric maximum autorisés dans le champ de saisie"
            ],


        ];

        foreach ($attributs as $attr) {
            AttributTypeChamp::updateOrCreate(
                [
                    "CodeTypeChamp" => $attr["CodeTypeChamp"],
                    "SpatieFunction" => $attr['SpatieFunction'],
                ],
                $attr
            );
        }
    }
}
