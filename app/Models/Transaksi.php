<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	use HasFactory;

	protected $table = 'transaksi';
	protected $guarded = [];
	protected $primaryKey = 'id';

	public function customer()
	{
		$this->belongsTo(Customer::class);
	}

	public function transaksi_detail()
	{
		$this->hasMany(Transaksi_detail::class);
	}
}
