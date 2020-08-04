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
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $success = Transaction::where('transaction_status', 'SUCCESS')->count();
        $pending = Transaction::where('transaction_status', 'PENDING')->count();
        $failed = Transaction::where('transaction_status', 'FAILED')->count();
        $sales = Transaction::count();
        $total = Transaction::sum('transaction_total');
        $items = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count()
        ];


        return view('pages.dashboard')->with([
            'income' => $income,
            'success' => $success,
            'pending' => $pending,
            'failed' => $failed,
            'sales' => $sales,
            'total' => $total,
            'items' => $items,
            'pie' => $pie
        ]);
    }
}
