<?php

namespace App\Http\Controllers\API;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        //ambil data transaksi berserta produknya
        $product = Transaction::with(['details.product'])->find($id);
        if ($product) 
                return ResponseFormatter::success($product,'Data Produk Berhasil Di Ambil');
            else
                return ResponseFormatter::error(null,'Data Produk Tidak Ada', 404);
    }
}
