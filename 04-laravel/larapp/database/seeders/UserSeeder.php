<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //Add a record with Eloquent ORM
        $user = new User;
        $user->document = 75000001;
        $user->fullname = 'Jeon Jungkook';
        $user->photo = 'jung.png';
        $user->phone = 3103456789;
        $user->email = 'jeonjung@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'Admin';
        $user->save();

        //Add a record with Array
        DB::table('users')->insert([
            'document' => 75000002,
            'fullname' => 'Park Jimin',
            'photo' => 'jimin.avif',
            'phone' => 3245674321,
            'email' => 'parkjimin@gmail.com',
            'password' => bcrypt('12345')
        ]);
    }
}
