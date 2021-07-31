<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produk', function (Blueprint $table) {
			$table->id();
			$table->string('nama_produk');
			$table->bigInteger('kategori_id')->unsigned();
			$table->text('deskripsi');
			$table->integer('harga');
			$table->text('gambar');
		});

		Schema::table('produk', function (Blueprint $table) {
			$table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('produk');
	}
}
