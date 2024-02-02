<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class statikController extends Controller
{
    public function index(): View
    {
        // Statistik Barang Masuk
        $masuks = DB::table('tb_masuks')
            ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw('MONTH(tanggal)'), DB::raw('MONTHNAME(tanggal)'))
            ->pluck('count', 'month_name');

        $labels = $masuks->keys();
        $data = $masuks->values();

        // Statistik Barang Keluar
        $keluars = DB::table('tb_keluars')
            ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw('MONTH(tanggal)'), DB::raw('MONTHNAME(tanggal)'))
            ->pluck('count', 'month_name');

        $keluarLabels = $keluars->keys();
        $keluarData = $keluars->values();

        return view('statik.index', compact('labels', 'data', 'keluarLabels', 'keluarData'));
    }
}

