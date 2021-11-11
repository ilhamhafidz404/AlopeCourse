<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Token;
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user) {
        //kalau admin tidak perlu pengecekan
        if ($user->hasRole('admin')) {
          return redirect()->route('dashboard.admin');
        }
    
        //cek dulu si user punya token atau tidak
        $token = Token::whereUser_id($user->id)->first();
        if ($token) {
          if ($token->expired_at < date('Y-m-d H:s:i')) {
            Alert::toast('Paket Premium Anda telah habis', 'info');
            $user->syncRoles('active');
            $token->delete();
          }
        }
        return redirect()->route('beranda');
      }
    }
