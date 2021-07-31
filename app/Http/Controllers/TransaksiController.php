<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$produk = Produk::all();
		$customer = Customer::all();
		return view('pages.transaksi.index', [
			'produk' => $produk,
			'customer' => $customer
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Transaksi  $transaksi
	 * @return \Illuminate\Http\Response
	 */
	public function show(Transaksi $transaksi)
	{
		$detailTransaksi = DB::table('transaksi')->join('customer', 'customer.id', '=', 'transaksi.customer_id')->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.id')->join('produk', 'transaksi_detail.produk_id', '=', 'produk.id')->where('transaksi_detail.transaksi_id', '=', $transaksi->id)->get();
		return view('pages.transaksi.detail_transaksi', [
			'detailTransaksi' => $detailTransaksi
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Transaksi  $transaksi
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Transaksi $transaksi)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Transaksi  $transaksi
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Transaksi $transaksi)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Transaksi  $transaksi
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Transaksi $transaksi)
	{
		//
	}
}
