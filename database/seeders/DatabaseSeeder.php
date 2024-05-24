<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $admin = User::updateOrCreate(
            [
                'email' => 'admin@admin',
            ],
            [
                'name' => 'Administrateur',
                'email' => 'admin@admin',
                'password' => bcrypt('p@ssw0rd'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('Super-admin');

        $this->call(PaysSeeder::class);
        $this->call(CycleSeeder::class);
        $this->call(DiplomeDeBaseSeeder::class);
        $this->call(TypeFormulaireSeeder::class);
        $this->call(TypeSortySeeder::class);
        $this->call(TypeChampsSeeder::class);
        $this->call(AttributTypeChampsSeeder::class);
        $this->call(AnneeAcademiqueSeeder::class);
    }
}
