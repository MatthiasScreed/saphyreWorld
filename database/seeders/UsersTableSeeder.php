<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Matthias Screed',
            'email' => 'christopher.massamba@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $user = User::create([
            'name' => 'Saphyre',
            'email' => 'chretien.an@gmail.com',
            'password' => bcrypt('cuni'),
            'role' => 'redac',
        ]);
    }
}
