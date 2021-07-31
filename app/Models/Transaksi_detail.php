<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_detail extends Model
{
	use HasFactory;

	protected $table = 'transaksi_detail';
	protected $guarded = [];
	protected $primaryKey = 'id';

	public function transaksi()
	{
		$this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
	}

	public function produk()
	{
		$this->hasMany(Produk::class, 'produk_id', 'id');
	}
}
