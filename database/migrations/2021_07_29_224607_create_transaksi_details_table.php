<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi_detail', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('produk_id')->unsigned();
			$table->integer('jumlah');
			$table->bigInteger('transaksi_id')->unsigned();
		});

		Schema::table('transaksi_detail', function (Blueprint $table) {
			$table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('transaksi_detail');
	}
}
