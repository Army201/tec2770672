<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //Add a record with Eloquent ORM
        $pet = new Pet;
        $pet->name = 'Peluche';
        $pet->photo = 'pelu.png';
        $pet->kind = 'Dog';
        $pet->weight = 5;
        $pet->age = 2;
        $pet->breed = 'Chitzu';
        $pet->location = 'Bogota';
        $pet->save();

        //Add a record with Eloquent ORM
        $pet = new Pet;
        $pet->name = 'Pichui';
        $pet->photo = 'pelu.png';
        $pet->kind = 'Dog';
        $pet->weight = 7;
        $pet->age = 4;
        $pet->breed = 'Pequenes';
        $pet->location = 'Pereira';
        $pet->save();

        //Add a record with Eloquent ORM
        $pet = new Pet;
        $pet->name = 'Halou';
        $pet->photo = 'pelu.png';
        $pet->kind = 'Cat';
        $pet->weight = 8;
        $pet->age = 5;
        $pet->breed = 'Persa';
        $pet->location = 'Medellin';
        $pet->save();
    }
}
