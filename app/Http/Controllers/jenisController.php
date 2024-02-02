<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class jenisController extends Controller
{
    public function index(){
        $data = array(
            'query'    => DB::table('tb_jenis')->get(),
        );
        return view('jenis.index',$data);

    }
    public function create(){
        $data = array(
            'query'    => DB::table('tb_jenis')->get(),
        );
        return view('jenis.tambah',$data);
    }
    public function store(Request $request){
        $this->validate($request, [
            'nama_jenis' => 'required',
           
            
        ], [
            'required' => 'data tidak boleh kosong',
            
         ]);

         $check =DB::table('tb_jenis')->where('nama_jenis',$request->nama_jenis)->count()>0;
         if($check){
             session()->flash('danger', 'jenis barang sudah ada');
             return back();
         }
         $query=DB::table('tb_jenis')
        ->insert([
            'nama_jenis' => $request->nama_jenis,
        ]);
        if ($query) {
            session()->flash('success', 'Data berhasil di simpan');
            return redirect()->route('jeniss.index');
        }

    }

    public function destroy($id){
        $query =DB::table('tb_jenis')->where('id', $id)->delete();
        if($query)
        {
            session()->flash('success', 'Data berhasil di hapus');
            return back();
        }
    }
    public function edit($id)
    {
        $data = array(
            'result'    => DB::table('tb_jenis')->where('id', $id)->get(),
        );
        return view('jenis.edit', $data);
    }
     public function update(Request $req)
    {
        $query =DB::table('tb_jenis')->where('id', $req->id)->update([
            'nama_jenis' => $req->nama_jenis,

        ]);

        if($query)
        {
            session()->flash('success', 'Data berhasil diedit');
            return  redirect()->route('jeniss.index');
        }
        
    }
 //
}
