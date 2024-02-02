<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\PDF;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function barang(){
        $data = array(
            'query' => DB::table('tb_barangs')->get(),
            'selectedFilter' => '',
        );
        return view('laporan.barang', $data);
    }
public function masuk(Request $request){
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $query = DB::table('tb_masuks')
        ->join('tb_barangs','tb_barangs.id_barang','=','tb_masuks.barang')
        ->select('tb_masuks.*','tb_barangs.*')
        ->whereBetween('tb_masuks.tanggal', [$start_date, $end_date])
        ->get();

    $data = array(
        'query' => $query,
    );

    return view('laporan.masuk', $data);
}
public function keluar(Request $request){
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $query = DB::table('tb_keluars')
        ->join('tb_barangs','tb_barangs.id_barang','=','tb_keluars.barang')
        ->select('tb_keluars.*','tb_barangs.*')
        ->whereBetween('tb_keluars.tanggal', [$start_date, $end_date])
        ->get();

    $data = array(
        'query' => $query,
    );

    return view('laporan.keluar', $data);
}
public function cetak(){
    $data = DB::table('tb_barangs')->get();

    $pdf = app()->make('dompdf.wrapper');
    $pdf->loadView('laporan.cetak', ['laporan' => $data]);

    return $pdf->stream('laporan');
}
public function cetak1(Request $request){
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $data = DB::table('tb_masuks')
        ->join('tb_barangs', 'tb_barangs.id_barang', '=', 'tb_masuks.barang')
        ->select('tb_masuks.*', 'tb_barangs.*')
        ->whereBetween('tb_masuks.tanggal', [$start_date, $end_date])
        ->get();

    $pdf = app()->make('dompdf.wrapper');
    $pdf->loadView('laporan.cetak1', ['laporan' => $data]);

    return $pdf->stream('laporan');
}
public function cetak2(Request $request){
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $data = DB::table('tb_keluars')
        ->join('tb_barangs', 'tb_barangs.id_barang', '=', 'tb_keluars.barang')
        ->select('tb_keluars.*', 'tb_barangs.*')
        ->whereBetween('tb_keluars.tanggal', [$start_date, $end_date])
        ->get();

    $pdf = app()->make('dompdf.wrapper');
    $pdf->loadView('laporan.cetak2', ['laporan' => $data]);

    return $pdf->stream('laporan');
}
public function filterBarang(Request $request)
{
    $filter = $request->input('filter');
    $selectedFilter = $filter; // Menyimpan filter terpilih dalam variabel

    if ($filter === 'minimal') {
        $data = DB::table('tb_barangs')->where('stok_minimal', '>', 0)->get();
    } else {
        $data = DB::table('tb_barangs')->get();
    }

    return view('laporan.barang', ['query' => $data, 'selectedFilter' => $selectedFilter]);
}

}