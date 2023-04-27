<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateSupAdminSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'sanga ousmani',
            'email' => 'sanga@gmail.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);
    }
}
