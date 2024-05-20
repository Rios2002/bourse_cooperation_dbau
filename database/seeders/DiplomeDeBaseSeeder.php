<?php

namespace Database\Seeders;

use App\Models\DiplomeDeBase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiplomeDeBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diplomes = [
            ['CodeDiplome' => 'BAC', 'LibelleDiplome' => 'Baccalauréat', "Cible" => "LICENCE"],
            ['CodeDiplome' => 'LICENCE', 'LibelleDiplome' => 'LICENCE', "Cible" => "MASTER"],
            ['CodeDiplome' => 'MASTER', 'LibelleDiplome' => 'MASTER', "Cible" => "DOCTORAT"],
            ['CodeDiplome' => 'DOCTORAT', 'LibelleDiplome' => 'DOCTORAT', "Cible" => "SPECIALISATION"],
            ['CodeDiplome' => 'SPECIALISATION', 'LibelleDiplome' => 'SPECIALISATION', "Cible" => NULL],

        ];
        foreach ($diplomes as $diplome) {
            if (DiplomeDeBase::where('CodeDiplome', $diplome['CodeDiplome'])->exists()) {
                continue;
            }
            DiplomeDeBase::create([
                'CodeDiplome' => $diplome['CodeDiplome'],
                'LibelleDiplome' => $diplome['LibelleDiplome'],
                'CycleCible' => $diplome['Cible'],
                "isWritable" => false,
            ]);
        }
    }
}
