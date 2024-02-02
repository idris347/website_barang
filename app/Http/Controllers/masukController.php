<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class masukController extends Controller
{
    public function index(){
        $data = array(
            'query'    => DB::table('tb_masuks')->join('tb_barangs','tb_barangs.id_barang','=','tb_masuks.barang')->select('tb_masuks.*','tb_barangs.*')->get(),
        );
        return view('masuk.index',$data);

    }
    public function create(){
        $data = array(
            'query'    => DB::table('tb_masuks')->get(),
            'barangs'    => DB::table('tb_barangs')->get(),
        );
        return view('masuk.tambah',$data);
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
        $get_max = DB::table('tb_masuks')->max('id_masuk');
        
        // Ambil angka dari id_barang terakhir dan tambahkan 1
        $urutan = (int) substr($get_max, 1) + 1;
        $kode_otomatis = 'M' . sprintf("%03s", $urutan);
        
        $qry = DB::table('tb_masuks')->insert([
            'id_masuk' =>$kode_otomatis,
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
            'status' => 'Masuk',
            'tanggal' => Carbon::now()
        ]);
    
        if ($qry) {
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('masuks.index');       
        }else{
            echo"data berhasil masuk akan tetapi gagal";
        }
    }

    public function destroy($id_masuk){
        $query =DB::table('tb_masuks')->where('id_masuk', $id_masuk)->delete();
        if($query)
        {
            session()->flash('success', 'Data berhasil di hapus');
            return back();
        }
    }
    public function edit($id_masuk)
    {
        $data = array(
            'result'    => DB::table('tb_masuks')->where('id_masuk', $id_masuk)->get(),
        );
        return view('masuk.edit', $data);
    }
     public function update(Request $req)
    {
        $query =DB::table('tb_masuks')->where('id_masuk', $req->id)->update([
            'id_masuk' => $req->nama_masuk,
            'barang' => $req->nama_masuk,

        ]);

        if($query)
        {
            session()->flash('success', 'Data berhasil diedit');
            return  redirect()->route('masuks.index');
        }
        
    }
}
