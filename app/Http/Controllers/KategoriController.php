<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$kategori = Kategori::all();
		return view('pages.kategori.index', [
			'kategori' => $kategori
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
	public function store(KategoriRequest $request)
	{
		Kategori::create($request->all());
		return redirect()->route('kategori.index')->with('success', 'Data Berhasil ditambah');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Kategori  $kategori
	 * @return \Illuminate\Http\Response
	 */
	public function show(Kategori $kategori)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Kategori  $kategori
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Kategori $kategori)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Kategori  $kategori
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Kategori $kategori)
	{

		if (!$request->nama_kategori) {
			$request->nama_kategori = $kategori->nama_kategori;
		} else {
			$kategori->update($request->all());
		}
		return redirect()->route('kategori.index')->with('success', 'Data berhasi diedit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Kategori  $kategori
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Kategori $kategori)
	{
		$kategori->delete($kategori->id);
		return redirect()->route('kategori.index')->with('warning', 'Data Terhapus');
	}
}
