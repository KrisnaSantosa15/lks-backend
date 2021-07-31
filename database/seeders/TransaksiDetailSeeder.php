<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiDetailSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('transaksi_detail')->insert([
			'produk_id' => 5,
			'jumlah' => 2,
			'transaksi_id' => 3
		]);
		DB::table('transaksi_detail')->insert([
			'produk_id' => 6,
			'jumlah' => 4,
			'transaksi_id' => 3
		]);
		DB::table('transaksi_detail')->insert([
			'produk_id' => 7,
			'jumlah' => 3,
			'transaksi_id' => 3
		]);
	}
}
