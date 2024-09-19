<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('pays') as $pays) {

            \App\Models\Pay::updateOrCreate(
                [
                    'CodePays' => $pays['CodePays'],
                ],
                [
                    'LibellePays' => $pays['LibellePays'],
                    'Nationalite' => $pays['Nationalite'],

                ]
            );
        }
    }
}
