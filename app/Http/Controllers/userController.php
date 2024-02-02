<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index(){
        $data = array(
            'query'    => DB::table('users')->get(),
        );
        return view('admin.index',$data);
    }
    public function create(){
        $data = array(
            'query'    => DB::table('users')->get(),
        );
        return view('admin.tambah',$data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ], [
            'username' => 'data tidak boleh kosong',
            'email' => 'data tidak boleh kosong',
            'password' => 'data tidak boleh kosong',
         ]);

         if ($request->hakakses == 'SuperAdmin') {
            $data = 1;
            $user = 'SuperAdmin';
         }elseif ($request->hakakses == 'Admin Gudang') {
            $data = 2;
            $user = 'AdminGudang';
         }elseif ($request->hakakses == 'Kepala Gudang') {
            $data = 3;
            $user = 'KepalaGudang';
         }
         $check =DB::table('users')->where('email',$request->email)->count()>0;
         if($check){
             session()->flash('danger', 'email sudah ada');
             return back();
         }
         $query=DB::table('users')
        ->insert([
            'name' => $user,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $data,
            'password' =>bcrypt($request->password),
        ]);
        if ($query) {
            session()->flash('success', 'Data berhasil di tambah');
            return redirect()->route('users.index');
        }

    }

    public function destroy($id){
        $query =DB::table('users')->where('id', $id)->delete();
        if($query)
        {
            session()->flash('success', 'Data berhasil di hapus');
            return back();
        }
    }
    public function edit($id)
    {
        $data = array(
            'result'    => DB::table('users')->where('id', $id)->get(),
            'aksi'       => url('updateadmin1')
        );
        return view('admin.edit', $data);
    }
     public function update(Request $req)
    {
        $query =DB::table('users')->where('id', $req->id)->update([
            'username' => $req->username,
            'email' => $req->email,

        ]);

        if($query)
        {
            session()->flash('success', 'Data berhasil diedit');
            return  redirect()->route('users.index');
        }
        
    }
 //
}
