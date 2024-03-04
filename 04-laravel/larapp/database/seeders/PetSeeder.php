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
    }
}
