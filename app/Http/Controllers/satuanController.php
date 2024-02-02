<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class satuanController extends Controller
{
    public function index(){
        $data = array(
            'query'    => DB::table('tb_satuans')->get(),
        );
        return view('satuan.index',$data);

    }
    public function create(){
        $data = array(
            'query'    => DB::table('tb_satuans')->get(),
        );
        return view('satuan.tambah',$data);
    }
    public function store(Request $request){
        $this->validate($request, [
            'nama_satuan' => 'required',
           
            
        ], [
            'required' => 'data tidak boleh kosong',
            
         ]);

         $check =DB::table('tb_satuans')->where('nama_satuan',$request->nama_satuan)->count()>0;
         if($check){
             session()->flash('danger', 'satuan barang sudah ada');
             return back();
         }
         $query=DB::table('tb_satuans')
        ->insert([
            'nama_satuan' => $request->nama_satuan,
        ]);
        if ($query) {
            session()->flash('success', 'Data berhasil di tambah');
            return redirect()->route('satuans.index');
        }

    }

    public function destroy($id){
        $query =DB::table('tb_satuans')->where('id', $id)->delete();
        if($query)
        {
            session()->flash('success', 'Data berhasil di hapus');
            return back();
        }
    }
    public function edit($id)
    {
        $data = array(
            'result'    => DB::table('tb_satuans')->where('id', $id)->get(),
        );
        return view('satuan.edit', $data);
    }
     public function update(Request $req)
    {
        $query =DB::table('tb_satuans')->where('id', $req->id)->update([
            'nama_satuan' => $req->nama_satuan,

        ]);

        if($query)
        {
            session()->flash('success', 'Data berhasil diedit');
            return  redirect()->route('satuans.index');
        }
        
    }
}
