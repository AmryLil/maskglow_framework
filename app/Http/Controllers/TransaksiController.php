<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi');
    }

    public function showAll(Request $request)
    {
        return view('dashboard.transaksi.index');
    }

    public function generatePdf($filter, Request $request)
    {
        return view('dashboard.transaksi.pdf');
    }

    public function showAllLaporan(Request $request)
    {
        return view('dashboard.transaksi.laporan');
    }
}
