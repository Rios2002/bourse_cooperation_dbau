<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cycles = [
            ['CodeCycle' => 'BAC+2'],
            ['CodeCycle' => 'TECHNICIEN SUPERIEUR'],
            ['CodeCycle' => 'LICENCE'],
            ['CodeCycle' => 'MASTER'],
            ['CodeCycle' => 'DOCTORAT'],
            ['CodeCycle' => 'SPECIALISATION'],
        ];

        foreach ($cycles as $cycle) {
            if (\App\Models\Cycle::where('CodeCycle', $cycle['CodeCycle'])->exists()) {
                continue;
            }
            \App\Models\Cycle::create([
                'CodeCycle' => $cycle['CodeCycle'],
                'LibelleCycle' => $cycle['CodeCycle'],
                "isWritable" => false,
            ]);
        }
    }
}
