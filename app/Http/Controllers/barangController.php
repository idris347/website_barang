<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class barangController extends Controller
{
    public function index(){
        $data = array(
            'query'    => DB::table('tb_barangs')->get(),
        );
        return view('barang.index',$data);

    }
    public function create(){
        $data = array(
            'query'    => DB::table('tb_barangs')->get(),
            'data_jenis'    => DB::table('tb_jenis')->get(),
            'data_satuan'    => DB::table('tb_satuans')->get(),
        );
        return view('barang.tambah',$data);
    }
    public function store(Request $request) {
        $this->validate($request, [
            'nama_barang' => 'required',
            'stok_minimal' => 'required',
            'foto' => 'required'
            
        ], [
            'nama_barang' => 'Data Tidak boleh kosong',
            'stok_minimal' => 'Data Tidak boleh kosong',
            'foto' => 'Data Tidak boleh kosong'
         ]);
        $foto = $request->file('foto');
        $nama_file = time()."_".$foto->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $foto->move($tujuan_upload, $nama_file);
        
        // Ambil nilai maksimum id_barang yang sudah ada
        $get_max = DB::table('tb_barangs')->max('id_barang');
        
        // Ambil angka dari id_barang terakhir dan tambahkan 1
        $urutan = (int) substr($get_max, 1) + 1;
        $kode_otomatis = 'B' . sprintf("%03s", $urutan);
        
        $qry = DB::table('tb_barangs')->insert([
            'id_barang' => $kode_otomatis,
            'nama_barang' => $request->nama_barang,
            'jenis' => $request->nama_jenis,
            'stok_minimal' => $request->stok_minimal,
            'satuan' => $request->nama_satuan,
            'foto' => $nama_file,
        ]);
    
        if ($qry) {
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('barangs.index');       
        }
    }
    public function destroy($id_barang) {
        $barang = DB::table('tb_barangs')->where('id_barang', $id_barang)->first();
    
        if (!$barang) {
            // Handle jika data tidak ditemukan
            return redirect()->route('barangs.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Hapus foto
        if (File::exists(public_path('data_file/' . $barang->foto))) {
            File::delete(public_path('data_file/' . $barang->foto));
        }
    
        $qry = DB::table('tb_barangs')->where('id_barang', $id_barang)->delete();
    
        if ($qry) {
            session()->flash('success', 'Data berhasil dihapus');
        } else {
            session()->flash('error', 'Gagal menghapus data');
        }
    
        return redirect()->route('barangs.index');
    }
    
    public function edit($id_barang)
    {
        $data = array(
            'result'    => DB::table('tb_barangs')->where('id_barang', $id_barang)->get(),
        );
        return view('barang.edit', $data);
    }
    public function update(Request $request, $id) {
        $barang = DB::table('tb_barangs')->where('id_barang', $id)->first();
    
        if (!$barang) {
            // Handle jika data tidak ditemukan
            return redirect()->route('barangs.index')->with('error', 'Data tidak ditemukan');
        }
    
        $foto = $request->file('foto');
        $nama_file = $barang->foto;
    
        if ($foto) {
            // Hapus foto awal
            if (File::exists(public_path('data_file/' . $nama_file))) {
                File::delete(public_path('data_file/' . $nama_file));
            }
    
            // Upload foto baru
            $nama_file = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $foto->move($tujuan_upload, $nama_file);
        }
    
        $qry = DB::table('tb_barangs')
            ->where('id_barang', $id)
            ->update([
                'nama_barang' => $request->nama_barang,
                'jenis' => $request->nama_jenis,
                'stok_minimal' => $request->stok_minimal,
                'satuan' => $request->nama_satuan,
                'foto' => $nama_file,
            ]);
    
        if ($qry) {
            session()->flash('success', 'Data berhasil diupdate');
            return redirect()->route('barangs.index');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }
    
}
