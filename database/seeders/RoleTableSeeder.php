<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
			'id' => 1,
			'nama_role' => 'Super Admin'
		]);
        \App\Models\Role::create([
			'id' => 2,
			'nama_role' => 'Admin Web Utama',
            'prodi_id' => 1
		]);
    }
}
