<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('customer_id')->unsigned();
			$table->date('tanggal');
			$table->string('kode', 15);
		});

		Schema::table('transaksi', function (Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('transaksi');
	}
}
