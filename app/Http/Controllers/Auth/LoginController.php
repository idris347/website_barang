<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout(Request $request)
{
    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    Alert::info('Selamat Beristirahat');

    return $this->loggedOut($request) ?: redirect('/');
}
    public function username()
{
    return 'username';
}
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function authenticated(Request $request, $user)
    {
        if ($user->role) {
            Alert::success('anda berhasil login');
            return redirect()->route('home');
        }else {
            Alert::warning('status akun anda tidak aktif, untuk mengaktifkan kembali hubungi admin');     
        }

    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa string.',
        ]);
    }
}
