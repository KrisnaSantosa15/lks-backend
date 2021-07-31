<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\Transaksi_detail;
use Illuminate\Database\Seeder;
use Database\Seeders\CustomerSeeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(CustomerSeeder::class);
		$this->call(TransaksiBaruSeeder::class);
		$this->call(TransaksiDetailSeeder::class);
	}
}
