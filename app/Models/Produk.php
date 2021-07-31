<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	use HasFactory;

	protected $table = 'produk';
	protected $guarded = [];
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function kategori()
	{
		$this->belongsTo(Kategori::class);
	}

	public function transaksi_detail()
	{
		$this->hasMany(Transaksi_detail::class);
	}
}
