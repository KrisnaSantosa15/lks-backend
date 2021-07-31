<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
	use HasFactory;

	protected $table = 'customer';
	protected $guarded = [];
	protected $primaryKey = 'id';

	public function transaksi()
	{
		$this->hasMany(Transaksi::class);
	}
}
