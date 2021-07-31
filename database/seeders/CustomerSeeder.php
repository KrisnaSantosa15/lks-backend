<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('customer')->insert([
			'nama_lengkap' => 'Krisna Santosa',
			'no_hp' => '08979137748',
			'alamat_lengkap' => 'Garut',
			'email' => 'customer@gmail.com',
			'password' => Hash::make('customer')
		]);
	}
}
