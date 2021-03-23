<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

//creation de variable avec les users
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $editeur = User::create([
            'name' => 'editeur',
            'email' => 'editeur@editeur.com',
            'password' => Hash::make('editeur'),
        ]);

//créer une variable pour les roles

        $adminRole  = Role::where('name', 'admin')->first();
        $editeurRole  = Role::where('name', 'editeur')->first();

//affecter chaque variables roles à un utilisateur
        $admin ->roles()->attach($adminRole);
        $editeur->roles()->attach($editeurRole);
    }
}
