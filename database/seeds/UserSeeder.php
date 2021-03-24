<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->name = "Patricio";
        $user->apellido = "Polito";
        $user->type = "admin";
        $user->email = "patricioprp06@gmail.com";
        $user->password = bcrypt('32460264');
        $user->save();

    }
}
