<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total'); //menghitung total transaksi
        $sales = Transaction::count(); //menghitung banyak transaksi yang masuk
        $items = Transaction::orderBy('id','DESC')->take(5)->get(); //mengambil lima item terakhir. artinya mengambil 5 data terakhir yang masuk
        $pie = [
            'pending' => Transaction::where('transaction_status','PENDING')->count(),
            'failed' => Transaction::where('transaction_status','FAILED')->count(),
            'success' => Transaction::where('transaction_status','SUCCESS')->count(),
        ];
        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
        ]);
    }
}
