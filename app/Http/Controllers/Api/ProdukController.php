<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return @response()->json([
            'success' => 1,
            'message' => 'Get Produk berhasil',
            'produks' => $produk
        ]);
    }

    // public function delete(Request $request)
    // {
    //     $product = Produk::where('id', $request->id)->first();
    //     if ($product) {
    //         $product->delete();

    //         return @response()->json([
    //             'success' => 1,
    //             'message' => 'produk berhasil dihapus',
    //         ]);
    //     } else {
    //     }
    //     return @response()->json([
    //         'success' => 0,
    //         'message' => 'produk tidak ditemukan',
    //     ]);
    // }
}
