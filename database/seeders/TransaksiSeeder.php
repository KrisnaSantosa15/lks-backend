<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dt = Carbon::now();
		$tgl = $dt->toDateString();
		DB::table('transaksi')->insert([
			'customer_id' => 1,
			'tanggal' => $tgl,
			'kode' => 'INV/210731003'
		]);
	}
}
