<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$produk = Produk::all();
		$kategori = Kategori::all();
		return view('pages.produk.index', [
			'produk' => $produk,
			'kategori' => $kategori,
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
	public function store(ProdukRequest $request)
	{
		$data = $request->all();
		$data['gambar'] = $request->file('gambar')->store('assets/produk', 'public');
		Produk::create($data);

		return redirect()->route('produk.index')->with('success', 'Data berhasil ditambahkan');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Produk  $produk
	 * @return \Illuminate\Http\Response
	 */
	public function show(Produk $produk)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Produk  $produk
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Produk $produk)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Produk  $produk
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Produk $produk)
	{

		if ($request->file('gambar')) {
			unlink(public_path() . '/storage/' . $produk->gambar);
			$data = $request->all();
			$data['gambar'] = $request->file('gambar')->store('assets/produk', 'public');
			$produk->update($data);
		} else {
			$produk->update([
				'nama_produk' => $request->nama_produk,
				'kategori_id' => $request->kategori_id,
				'deskripsi' => $request->deskripsi,
				'harga' => $request->harga,
				'gambar' => $produk->gambar,
			]);
		}
		return redirect()->route('produk.index')->with('success', 'Data berhasil diedit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Produk  $produk
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Produk $produk)
	{
		$path = public_path() . '/storage/' . $produk->gambar;
		unlink($path);
		$produk->delete($produk->id);
		return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus');
	}
}
