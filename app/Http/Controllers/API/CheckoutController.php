<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;

use App\Http\Requests\API\CheckoutRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TXR' . mt_rand(10000,99999) . mt_rand(100,999);
        // pangil model
        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) 
        {
            //membuat array untuk transaction detail
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);
            //pengurangan qty
            Product::find($product)->decrement('quantity');
        }
        //menyimpan transaksi detail
        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}