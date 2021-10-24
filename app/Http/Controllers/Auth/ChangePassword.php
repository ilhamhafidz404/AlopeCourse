<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ChangePassword extends Controller
{
    public function edit(){
        return view('auth/passwords/change');
    }

    public function update(Request $request){
        request()->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],
        ]);

        if(Hash::check($request->old_password, auth()->user()->password)){
            auth()->user()->update([
                'password' => Hash::make($request->password)
            ]);
            Alert::toast('Password Telah Diganti', 'success');
            return back();
        }
        return back()->withErrors(['old_password' => 'Password Lama tidak sesuai']);

    }
}
