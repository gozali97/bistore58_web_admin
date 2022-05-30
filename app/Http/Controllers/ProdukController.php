<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk['listProduk'] = Produk::all();
        $kategori['listKategori'] = Kategori::all();
        return view('produk')->with($produk)->with($kategori);
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
        // dd($request->all());die();
        $fileName = '';
        if ($request->gambar->getClientOriginalName()) {
            $file = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $fileName = 'public/produk/' . date('mYdHs') . rand(1, 999) . '_' . $file;
            $request->gambar->storeAs('public/produk', $fileName);
        }

        $user = Produk::create(array_merge($request->all(), [
            'gambar' => $fileName
        ]));
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // if (!$produk->image == NULL){
        //     unlink(public_path($produk->image));
        // }

        Produk::destroy($id);
        return redirect()->back()->with('status', 'Anda berhasil menghapus produk' . $produk->nama_produk);
    }
}
