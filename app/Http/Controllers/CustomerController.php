<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$customer = Customer::all();
		return view('pages.customer.index', [
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
	 * @param  \App\Models\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function show(Customer $customer)
	{
		// $dataTransaksi = DB::table('customer')->join('transaksi', 'customer_id', '=', 'customer.id')->join('transaksi_detail', 'transaksi.id', '=', 'transaksi_detail.transaksi_id')->join('produk', 'transaksi_detail.produk_id', '=', 'produk.id')->where('customer.id', '=', $customer->id)->get();

		$dataTransaksi = DB::table('customer')->join('transaksi', 'transaksi.customer_id', '=', 'customer.id')->where('transaksi.customer_id', '=', $customer->id)->get();

		return view('pages.customer.detail', [
			'dataTransaksi' => $dataTransaksi
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Customer $customer)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function update(CustomerRequest $request, Customer $customer)
	{
		if ($request->password) {
			$data = $request->all();
			$data['password'] = Hash::make($request->password);
			$customer->update($data);
		} else {
			$data = $request->all();
			$data['password'] = $customer->password;
			$customer->update($data);
		}
		return redirect()->route('customer.index')->with('success', 'Data berhasi diedit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Customer $customer)
	{
		//
	}
}
