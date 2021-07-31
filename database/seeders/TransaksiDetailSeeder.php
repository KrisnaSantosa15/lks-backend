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
			'produk_id' => 1,
			'jumlah' => 2,
			'transaksi_id' => 1
		]);
		DB::table('transaksi_detail')->insert([
			'produk_id' => 2,
			'jumlah' => 4,
			'transaksi_id' => 1
		]);
		DB::table('transaksi_detail')->insert([
			'produk_id' => 3,
			'jumlah' => 3,
			'transaksi_id' => 1
		]);
	}
}
