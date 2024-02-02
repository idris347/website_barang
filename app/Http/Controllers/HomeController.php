<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array
        (
            'konsumen'         => DB::table('users')->count(),
            'barang'         => DB::table('tb_barangs')->count(),
            'masuk'         => DB::table('tb_masuks')->count(),
            'keluar'         => DB::table('tb_keluars')->count(),
        );
        return view('home', $data);
    }
    public function ubah_password($role){
        $data = array(
            'data'    => DB::table('users')->where('role', $role)->get(),
        );
        return view('user.ubah',$data);
    }
    public function ubah_pass(Request $request){
        $this->validate($request, [
            'new_password' => 'required',
            'repeat_password' => 'required',
            
        ], [
            'new_password' => 'data tidak boleh kosong',
            'repeat_password' => 'data tidak boleh kosong',
         ]);
       
       if(!hash::check($request->old_password,auth()->user()->password)){

        return back()->with('error','password lama anda keliru');

       }
       if ($request->new_password != $request->repeat_password) {
        return back()->with('error','password yang ada masukan salah');
       }

       $query =DB::table('users')->where('role', $request->role)->update([
        'password'=>hash::make($request->new_password)

    ]);
    if ($query) {
        return back()->with('status','ubah password selesai');
    }
       
    }
}
