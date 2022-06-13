<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $fromDate = $request->from;
        $toDate = $request->to;

        $transactions = Transaction::with('details', 'user')->whereBetween('created_at', [$fromDate, $toDate])->get();

        return view('admin.report.index', compact('transactions', 'fromDate', 'toDate'));
    }
}
