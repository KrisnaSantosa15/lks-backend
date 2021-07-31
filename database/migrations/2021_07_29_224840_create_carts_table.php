<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('produk_id')->unsigned();
			$table->bigInteger('customer_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('cart', function (Blueprint $table) {
			$table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('cart');
	}
}
