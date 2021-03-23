<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UserSeeder::class);
        // désactiver la vérification de la clé étrangère
        //pour cette connexion avant d'exécuter les seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // censé ne s'appliquer qu'à une seule connexion et se réinitialiser soi-même
        // mais j'aime annuler explicitement ce que j'ai fait pour plus de clarté
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
