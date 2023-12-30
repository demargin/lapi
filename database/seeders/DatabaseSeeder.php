<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Student_Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Elimina el código para crear usuarios
        \DB::table('users')->truncate();

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'password' => 'password',
         ]);


         // Vacía la tabla students antes de ejecutar el seeder
         \DB::table('students')->truncate();

         // Código para generar los estudiantes
         $faker = Factory::create();

         for ($i = 0; $i < 100; $i++) {
             $student = new Student_Model();
             $student->name = $faker->name();
             $student->course = $faker->name();
             $student->email = $faker->safeEmail();
             $student->phone = $faker->phoneNumber();
             $student->save();
        }
    }
}