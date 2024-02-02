<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class keluarController extends Controller
{
    public function index(){
        $data = array(
            'query'    => DB::table('tb_keluars')->join('tb_barangs','tb_barangs.id_barang','=','tb_keluars.barang')->select('tb_keluars.*','tb_barangs.*')->get(),
        );
        return view('keluar.index',$data);

    }
    public function create(){
        $data = array(
            'query'    => DB::table('tb_keluars')->get(),
            'barangs'    => DB::table('tb_barangs')->get(),
        );
        return view('keluar.tambah',$data);
    }
    public function store(Request $request) {
        $this->validate($request, [
            'barang' => 'required',
            'jumlah1' => 'required|numeric',
            'tanggal' => 'required',
        ], [
            'barang.required' => 'Data Tidak boleh kosong',
            'jumlah1.required' => 'Data Tidak boleh kosong',
            'jumlah1.numeric' => 'Data Harus Berupa angka',
            'tanggal.required' => 'Data Tidak boleh kosong',
        ]);
        // Ambil nilai maksimum id_barang yang sudah ada
        $get_max = DB::table('tb_keluars')->max('id_keluar');
        
        // Ambil angka dari id_barang terakhir dan tambahkan 1
        $urutan = (int) substr($get_max, 1) + 1;
        $kode_otomatis = 'K' . sprintf("%03s", $urutan);
        
        $totalStok = $request->jumlah2 - $request->jumlah1;

        if ($totalStok < 0) {
            session()->flash('error', 'jumlah keluar melebihi stok');
            return redirect()->route('keluars.create');
        }
        
        $qry = DB::table('tb_keluars')->insert([
            'id_keluar' =>$kode_otomatis,
            'barang' => $request->id_barang,
            'jumlah' => $request->jumlah1,
            'tanggal'=> Carbon::now()
        ]);
        $qry = DB::table('tb_barangs')->where('id_barang', $request->id_barang)->update([
            'stok_minimal' => $request->jumlah
        ]);
        $log_qry = DB::table('logs')->insert([
            'kode' => $kode_otomatis,
            'nama' => $request->id_barang,
            'status' => 'Keluar',
            'tanggal' => Carbon::now()
        ]);
    
        if ($qry) {
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('keluars.index');       
        }else{
            echo"data berhasil masuk akan tetapi gagal";
        }
    }

    public function destroy($id_keluar){
        $query =DB::table('tb_keluars')->where('id_keluar', $id_keluar)->delete();
        if($query)
        {
            session()->flash('success', 'Data berhasil di hapus');
            return back();
        }
    }
    // public function edit($id_keluar)
    // {
    //     $data = array(
    //         'result'    => DB::table('tb_keluars')->where('id_keluar', $id_keluar)->get(),
    //     );
    //     return view('keluar.edit', $data);
    // }
    //  public function update(Request $req)
    // {
    //     $query =DB::table('tb_keluars')->where('id_keluar', $req->id_keluar)->update([
    //         'id_keluar' => $req->nama_masuk,
    //         'barang' => $req->nama_masuk,

    //     ]);

    //     if($query)
    //     {
    //         session()->flash('success', 'Data berhasil diedit');
    //         return  redirect()->route('masuks.index');
    //     }
        
    // }

}
