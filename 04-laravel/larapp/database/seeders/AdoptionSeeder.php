<?php

namespace Database\Seeders;

use App\Models\Adoption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Add a record with Eloquent ORM

        $adp = new Adoption;
        $adp->user_id = 3;
        $adp->pet_id = 1;
        $adp->save();

        $adp = new Adoption;
        $adp->user_id = 3;
        $adp->pet_id = 2;
        $adp->save();

        $adp = new Adoption;
        $adp->user_id = 5;
        $adp->pet_id = 3;
        $adp->save();
    }
}
