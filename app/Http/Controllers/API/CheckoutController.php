<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {

        $data = $request->except('transaction_details'); //membuat variabel data yang nantinya akan disimpan kedalam tabel transaksi
        $data['trans_id'] = 'TRANS' . mt_rand(10000,99999) . mt_rand(100,999); //menambahkan identifier transaksi 

        $transaction = Transaction::create($data); // data yang berada dalam variabel data akan disimpan kedalam fungsi ini yang mempresentasikan sebuah tabel transaksi



        foreach ($request->transaction_details as $product) 
        {
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            Product::find($product)->decrement('quantity'); // fungsi mengurangi quantiti product, setiap ada barang yang di pesang akan mengurangi quantity setiap product
        }

        $transaction->details()->saveMany($details); //menyimpan data details ke dalam transaction
        // printf($transaction);

        return ResponseFormatter::success($transaction);

        foreach ($variable as $key => $value) {
            # code...
        }
    }
    
}



