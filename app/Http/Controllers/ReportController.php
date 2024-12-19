<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();

        $totalPayments = Payment::sum('amount');

        $paymentsData = Payment::selectRaw('DATE(payment_date) as date, SUM(amount) as total')
                                ->groupBy('date')
                                ->orderBy('date')
                                ->get();

        $labels = $paymentsData->pluck('date');
        $data = $paymentsData->pluck('total');

        return view('reports.index', compact('totalClients', 'totalPayments', 'labels', 'data'));
    }
}
