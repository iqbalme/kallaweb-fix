<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
			'id' => 1,
			'nama' => 'Admin',
			'email' => 'admin@kallainstitute.ac.id',
			'password' => bcrypt('123')
		]);
    }
}
